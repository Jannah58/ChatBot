# Gamma Chatbot - Laravel + FastAPI Integration

A modern web interface for interacting with Ollama models through FastAPI, now featuring Laravel frontend integration with the lightweight Gemma 2B model and LangChain support.

## 🌟 Integration Options

### Option 1: Laravel Frontend (Recommended)
Modern Laravel application with beautiful UI and production-ready features.

### Option 2: Original FastAPI Frontend  
The original standalone FastAPI interface.

## Features

✅ **Laravel Frontend**: Modern PHP web application with Tailwind CSS
✅ **Modern Chat UI**: Beautiful, responsive design with chat bubbles
✅ **FastAPI Backend**: High-performance Python API with LangChain
🔄 **Model Status Indicator**: Real-time health monitoring and status updates
📤 **Easy Input**: Enhanced text area with character counting and shortcuts
💬 **Real-time Responses**: Live typing indicators and message animations
🎨 **Mobile Friendly**: Fully responsive design that works on all devices
🤖 **Gemma 2B Model**: Lightweight Google Gemma 2B model for efficient performance
🔗 **LangChain Integration**: Enhanced prompt handling and response processing
🏥 **Health Monitoring**: Comprehensive health checks and system monitoring
🐳 **Docker Ready**: Complete containerization with production configuration

## 🚀 Quick Start

### Laravel Integration (Recommended)

1. **One-command startup**:
   ```bash
   ./start-integrated.sh
   ```

2. **Open your browser** and go to:
   ```
   http://localhost:8080/chatbot
   ```

3. **Start chatting** with the AI! The system will:
   - ✅ Automatically pull the Gemma 2B model
   - 🔄 Show real-time connection status
   - 💬 Provide a modern chat interface

### Original FastAPI Frontend

1. **Start the services**:
   ```bash
   docker-compose up
   ```

2. **Open your browser** and go to:
   ```
   http://localhost:8000
   ```

3. **Ensure model availability**:
   ```bash
   docker exec -it ollama ollama pull gemma2:2b
   docker exec -it ollama ollama list
   ```

4. **Start chatting**! Type your message and press Enter or click the 📤 button.

## 🌐 Service URLs

| Service | URL | Description |
|---------|-----|-------------|
| **Laravel Frontend** | http://localhost:8080/chatbot | Modern chat interface |
| **Original Interface** | http://localhost:8000 | Original FastAPI frontend |
| **FastAPI API** | http://localhost:8000/docs | API documentation |
| **Health Check** | http://localhost:8080/chatbot/health | System status |

## How it Works

### Backend (FastAPI)
- **`/`** - Serves the HTML frontend
- **`/status`** - Returns model availability status
- **`/generate`** - Processes chat messages and returns AI responses (direct API)
- **`/chat`** - New LangChain-powered endpoint with enhanced prompt processing
- **`/health`** - Health check endpoint for Laravel integration
- **`/history`** - Chat history management
- **`/clear`** - Clear chat session
- **`/static`** - Serves static files (HTML, CSS, JS)

### Frontend (HTML + JavaScript)
- **Model Status Checking**: Automatically checks if Ollama is ready
- **Disabled State**: Input is disabled until model is ready
- **Loading Indicators**: Shows spinners during processing
- **Error Handling**: Displays user-friendly error messages
- **Auto-scroll**: Chat area automatically scrolls to latest messages

## API Endpoints

### Check Model Status
```http
GET /status
```
Response:
```json
{
  "status": "ready|loading|error",
  "model": "gemma2:2b",
  "message": "Optional status message"
}
```

### Generate Response (Direct API)
```http
POST /generate
Content-Type: application/json

{
  "prompt": "Your message here"
}
```
Response:
```json
{
  "response": "AI generated response"
}
```

### Chat with LangChain 
```http
POST /chat
Content-Type: application/json

{
  "message": "Your message here",
  "use_langchain": true
}
```
Response:
```json
{
  "response": "AI generated response",
  "model": "gemma2:2b",
  "method": "langchain"
}
```

### Health Check (Laravel Integration)
```http
GET /health
```
Response:
```json
{
  "status": "online",
  "ollama": "online|offline",
  "model": "available|unavailable",
  "timestamp": "2024-01-01T00:00:00.000Z",
  "version": "1.0.0"
}
```

## 🏗️ Laravel Integration

The project now includes a complete Laravel frontend integration that provides:

### Architecture
```
User → Laravel Frontend → FastAPI Backend → Ollama → Gemma 2B Model
```

### Key Components

**Laravel Frontend (`gamma-laravel-frontend/`)**
- Modern responsive UI with Tailwind CSS
- Real-time chat interface with typing indicators
- Health monitoring and status displays
- Session management and CSRF protection

**Enhanced FastAPI Backend**
- New `/health` endpoint for Laravel integration
- Chat history management with `/history` and `/clear` endpoints
- Improved CORS support for cross-origin requests
- Enhanced error handling and logging

**Docker Integration**
- Complete containerization with docker-compose
- Production-ready Nginx reverse proxy configuration
- Automated startup and health checking
- Scalable multi-service architecture

### Quick Laravel Setup

1. **Full Integration**:
   ```bash
   ./start-integrated.sh
   ```

2. **Development Mode** (Laravel only):
   ```bash
   cd gamma-laravel-frontend
   composer install
   php artisan serve --port=8080
   ```

3. **Access the application**:
   - Laravel frontend: http://localhost:8080/chatbot
   - Health status: http://localhost:8080/chatbot/health

### Production Deployment

The Laravel integration includes production-ready features:
- Nginx reverse proxy with rate limiting
- Security headers and CORS configuration
- Health monitoring and logging
- Horizontal scaling support
- Container orchestration

For detailed Laravel integration documentation, see [LARAVEL_INTEGRATION.md](LARAVEL_INTEGRATION.md).

## 🔄 Migration from Original

Existing users can:
1. Continue using the original FastAPI interface at http://localhost:8000
2. Try the new Laravel interface at http://localhost:8080/chatbot  
3. Use both interfaces simultaneously - they share the same backend

The FastAPI backend remains unchanged and fully compatible.

## Development

The frontend is a single HTML file with embedded CSS and JavaScript for simplicity. All the interactive features are handled client-side:

- **Real-time status updates** every 5 seconds
- **Input validation** and state management
- **Responsive design** with modern CSS gradients
- **Smooth animations** and transitions

## Troubleshooting

- **"Loading model..." persists**: Check if Ollama service is running
- **"No model found"**: Ensure Gemma 2B model is pulled in Ollama
- **Connection errors**: Verify docker-compose networking
- **LangChain errors**: Check that langchain dependencies are installed
- **Laravel connection issues**: Check FASTAPI_URL in .env file
- **Health check failures**: Verify all services are running and accessible

## Model Information

**Gemma 2B** is a lightweight language model from Google that provides:
- **Smaller size**: Significantly smaller than Llama 2, saving disk space and memory
- **Faster inference**: Quicker response times due to smaller model size
- **Good performance**: Maintains good quality for most conversational tasks
- **Lower resource requirements**: Better suited for systems with limited resources

## 🎯 What's New in Laravel Integration

✅ **Complete Laravel frontend** with modern UI
✅ **Production-ready Docker setup** with all services
✅ **Health monitoring** and status indicators
✅ **Chat history management** with persistent storage
✅ **Enhanced security** with CSRF protection and validation
✅ **Scalable architecture** ready for production deployment
✅ **Comprehensive documentation** and easy setup

Enjoy chatting with your AI model! 🤖