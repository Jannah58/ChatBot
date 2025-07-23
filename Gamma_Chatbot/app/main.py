from fastapi import FastAPI, HTTPException
from fastapi.staticfiles import StaticFiles
from fastapi.responses import HTMLResponse
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import requests
import json
from langchain_ollama import OllamaLLM
from langchain.prompts import PromptTemplate
from datetime import datetime
from typing import List, Dict

app = FastAPI()

# Add CORS middleware
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Mount static files
app.mount("/static", StaticFiles(directory="static"), name="static")

OLLAMA_HOST = "http://ollama:11434"

# Simple in-memory chat history storage (use database in production)
chat_history: List[Dict] = []

class PromptRequest(BaseModel):
    prompt: str

class ChatRequest(BaseModel):
    message: str
    use_langchain: bool = True

@app.get("/", response_class=HTMLResponse)
def root():
    """Serve the main HTML page"""
    try:
        with open("static/index.html", "r") as f:
            return HTMLResponse(content=f.read())
    except FileNotFoundError:
        return HTMLResponse(content="<h1>Frontend not found. Please check static/index.html</h1>")

@app.get("/health")
def health_check():
    """Health check endpoint for Laravel integration"""
    try:
        # Check if Ollama is responding
        response = requests.get(f"{OLLAMA_HOST}/api/tags", timeout=5)
        ollama_status = "online" if response.status_code == 200 else "offline"
        
        # Check if Gemma model is available
        model_status = "unavailable"
        if response.status_code == 200:
            models = response.json().get("models", [])
            gemma_model = next((m for m in models if "gemma" in m["name"]), None)
            if gemma_model:
                model_status = "available"
        
        return {
            "status": "online",
            "ollama": ollama_status,
            "model": model_status,
            "timestamp": datetime.now().isoformat(),
            "version": "1.0.0"
        }
    except Exception:
        return {
            "status": "online",
            "ollama": "offline",
            "model": "unavailable",
            "timestamp": datetime.now().isoformat(),
            "version": "1.0.0"
        }

@app.get("/history")
def get_chat_history():
    """Get chat history"""
    return {
        "history": chat_history,
        "count": len(chat_history),
        "timestamp": datetime.now().isoformat()
    }

@app.post("/clear")
def clear_chat_history():
    """Clear chat history"""
    global chat_history
    chat_history = []
    return {
        "success": True,
        "message": "Chat history cleared",
        "timestamp": datetime.now().isoformat()
    }

@app.get("/status")
def check_model_status():
    """Check if Ollama model is ready"""
    try:
        response = requests.get(f"{OLLAMA_HOST}/api/tags", timeout=5)
        if response.status_code == 200:
            models = response.json().get("models", [])
            gemma_model = next((m for m in models if "gemma" in m["name"]), None)
            if gemma_model:
                return {"status": "ready", "model": gemma_model["name"]}
            else:
                return {"status": "no_model", "message": "No Gemma model found"}
        else:
            return {"status": "error", "message": "Ollama service not responding"}
    except requests.exceptions.RequestException as e:
        return {"status": "loading", "message": "Connecting to Ollama service..."}

@app.post("/generate")
def generate(request: PromptRequest):
    """Generate response from Ollama model"""
    try:
        # First check if model is available
        status_response = check_model_status()
        if status_response["status"] != "ready":
            raise HTTPException(status_code=503, detail="Model not ready")
        
        response = requests.post(
            f"{OLLAMA_HOST}/api/generate", 
            json={
                "model": "gemma2:2b",
                "prompt": request.prompt,
                "stream": False
            },
            timeout=60
        )
        
        if response.status_code == 200:
            return response.json()
        else:
            raise HTTPException(status_code=response.status_code, detail="Error from Ollama service")
            
    except requests.exceptions.RequestException as e:
        raise HTTPException(status_code=503, detail=f"Service unavailable: {str(e)}")

@app.post("/chat")
def chat_with_langchain(request: ChatRequest):
    """Generate response using LangChain with Gemma 2B model"""
    try:
        # First check if model is available
        status_response = check_model_status()
        if status_response["status"] != "ready":
            raise HTTPException(status_code=503, detail="Model not ready")
        
        # Store user message in history
        user_message = {
            "type": "user",
            "message": request.message,
            "timestamp": datetime.now().isoformat()
        }
        chat_history.append(user_message)
        
        if request.use_langchain:
            # Initialize LangChain Ollama
            llm = OllamaLLM(
                model="gemma2:2b",
                base_url="http://ollama:11434"
            )
            
            # Create a prompt template for better formatting
            prompt_template = PromptTemplate(
                input_variables=["question"],
                template="""You are a helpful AI assistant powered by Gemma 2B. Please provide a clear and concise response to the following question:

Question: {question}

Answer:"""
            )
            
            # Format the prompt
            formatted_prompt = prompt_template.format(question=request.message)
            
            # Generate response using LangChain
            response = llm(formatted_prompt)
            
            # Store AI response in history
            ai_message = {
                "type": "assistant",
                "message": response.strip(),
                "timestamp": datetime.now().isoformat(),
                "model": "gemma2:2b",
                "method": "langchain"
            }
            chat_history.append(ai_message)
            
            return {
                "response": response.strip(),
                "model": "gemma2:2b",
                "method": "langchain"
            }
        else:
            # Fallback to direct API call
            response = requests.post(
                f"{OLLAMA_HOST}/api/generate", 
                json={
                    "model": "gemma2:2b",
                    "prompt": request.message,
                    "stream": False
                },
                timeout=60
            )
            
            if response.status_code == 200:
                result = response.json()
                ai_response = result.get("response", "")
                
                # Store AI response in history
                ai_message = {
                    "type": "assistant",
                    "message": ai_response,
                    "timestamp": datetime.now().isoformat(),
                    "model": "gemma2:2b",
                    "method": "direct"
                }
                chat_history.append(ai_message)
                
                return {
                    "response": ai_response,
                    "model": "gemma2:2b",
                    "method": "direct"
                }
            else:
                raise HTTPException(status_code=response.status_code, detail="Error from Ollama service")
                
    except Exception as e:
        # Store error in history for debugging
        error_message = {
            "type": "error",
            "message": f"Service error: {str(e)}",
            "timestamp": datetime.now().isoformat()
        }
        chat_history.append(error_message)
        raise HTTPException(status_code=503, detail=f"Service error: {str(e)}")

@app.get("/api/docs")
def api_documentation():
    """API documentation endpoint"""
    return {
        "title": "Gamma Chatbot API",
        "version": "1.0.0",
        "description": "FastAPI backend for Gamma AI chatbot using Ollama and Gemma 2B",
        "endpoints": {
            "/health": "Health check for Laravel integration",
            "/chat": "Chat with AI using LangChain",
            "/history": "Get chat history",
            "/clear": "Clear chat history",
            "/status": "Check model availability",
            "/generate": "Direct generation endpoint"
        },
        "integration": "Laravel Frontend",
        "model": "gemma2:2b",
        "timestamp": datetime.now().isoformat()
    }
