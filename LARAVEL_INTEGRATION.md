# 🚀 Laravel Integration with Gamma Chatbot

This document explains how Laravel has been integrated with the existing FastAPI-based Gamma Chatbot to provide a modern, scalable web frontend.

## 📋 Overview

The integration provides:
- **Laravel Frontend**: Modern PHP web application with beautiful UI
- **FastAPI Backend**: Existing Python API with Ollama integration
- **Seamless Communication**: Laravel consumes FastAPI endpoints
- **Production Ready**: Docker containers with Nginx reverse proxy

## 🏗️ Architecture

```
User → Laravel Frontend → FastAPI Backend → Ollama → Gemma 2B Model
     ↓                 ↓                ↓
   HTTP/Web          HTTP API         AI Model
```

### Components

1. **Laravel Frontend** (`gamma-laravel-frontend/`)
   - Modern responsive UI with Tailwind CSS
   - Real-time chat interface
   - Health monitoring
   - Session management

2. **FastAPI Backend** (`Gamma_Chatbot/`)
   - RESTful API endpoints
   - LangChain integration
   - Chat history management
   - Health checks

3. **Ollama Service**
   - AI model hosting
   - Gemma 2B model execution
   - Model management

## 🚀 Quick Start

### Option 1: One-Command Startup
```bash
./start-integrated.sh
```

### Option 2: Manual Docker Compose
```bash
# Start all services
docker-compose -f docker-compose.integration.yml up -d

# Pull AI model (first time only)
docker exec gamma_ollama ollama pull gemma2:2b

# View logs
docker-compose -f docker-compose.integration.yml logs -f
```

### Option 3: Development Mode (Laravel only)
```bash
# Navigate to Laravel directory
cd gamma-laravel-frontend

# Install dependencies
composer install

# Set up environment
cp .env.example .env
php artisan key:generate

# Start Laravel development server
php artisan serve --host=0.0.0.0 --port=8080
```

## 🌐 Service URLs

| Service | URL | Description |
|---------|-----|-------------|
| **Laravel Frontend** | http://localhost:8080 | Main application |
| **Chatbot Interface** | http://localhost:8080/chatbot | Chat interface |
| **FastAPI Backend** | http://localhost:8000 | API backend |
| **FastAPI Docs** | http://localhost:8000/docs | API documentation |
| **Ollama API** | http://localhost:11434 | AI model API |

## 🏥 Health Checks

| Endpoint | Service | Purpose |
|----------|---------|---------|
| `/chatbot/health` | Laravel → FastAPI | Check backend connectivity |
| `/health` | FastAPI | Check API and Ollama status |
| `/status` | FastAPI | Check model availability |

## 🛠️ Development

### Laravel Structure
```
gamma-laravel-frontend/
├── app/Http/Controllers/
│   └── ChatbotController.php     # Main chatbot logic
├── resources/views/chatbot/
│   └── index.blade.php          # Chat interface
├── routes/web.php               # Web routes
├── .env                         # Environment config
└── Dockerfile                   # Container config
```

### Key Laravel Components

#### ChatbotController.php
Handles communication between Laravel and FastAPI:
- `index()` - Display chat interface
- `chat()` - Send messages to AI
- `history()` - Retrieve chat history  
- `clear()` - Clear conversation
- `healthCheck()` - Monitor backend status

#### Chatbot Interface (index.blade.php)
Features:
- Real-time messaging
- Typing indicators
- Message history
- Health status monitoring
- Responsive design
- Keyboard shortcuts

### FastAPI Enhancements

New endpoints added for Laravel integration:

```python
@app.get("/health")
def health_check():
    """Health check for Laravel integration"""

@app.get("/history") 
def get_chat_history():
    """Get chat history"""

@app.post("/clear")
def clear_chat_history():
    """Clear chat history"""
```

## 🔧 Configuration

### Environment Variables

#### Laravel (.env)
```bash
APP_NAME=Laravel
APP_URL=http://localhost:8080
FASTAPI_URL=http://localhost:8000
APP_ENV=local
APP_DEBUG=true
```

#### Docker Compose
```yaml
environment:
  - FASTAPI_URL=http://fastapi:8000
  - OLLAMA_HOST=http://ollama:11434
```

### Network Configuration
Services communicate through Docker network:
- Laravel ↔ FastAPI: HTTP on port 8000
- FastAPI ↔ Ollama: HTTP on port 11434
- External access: Laravel on 8080, FastAPI on 8000

## 🔒 Security Features

1. **CSRF Protection**: Laravel CSRF tokens for forms
2. **Input Validation**: Message length and content validation
3. **Rate Limiting**: Nginx rate limiting for API calls
4. **CORS**: Proper CORS headers for cross-origin requests
5. **Security Headers**: XSS, frame options, content type protection

## 🚦 Monitoring & Logging

### Docker Logs
```bash
# All services
docker-compose -f docker-compose.integration.yml logs -f

# Specific service
docker logs gamma_laravel -f
docker logs gamma_fastapi -f  
docker logs gamma_ollama -f
```

### Health Monitoring
- **Laravel**: Built-in health checks
- **FastAPI**: `/health` endpoint with Ollama status
- **Ollama**: Model availability checking

## 🛡️ Production Deployment

### With Nginx Reverse Proxy
```bash
# Enable nginx service in docker-compose
# Uncomment nginx section in docker-compose.integration.yml

docker-compose -f docker-compose.integration.yml up -d
```

### Environment Setup
1. Update `.env` files for production
2. Set `APP_ENV=production` 
3. Configure proper domain names
4. Set up SSL certificates
5. Configure database (currently using SQLite)

### Scaling
- Multiple Laravel instances behind load balancer
- FastAPI horizontal scaling
- Shared session storage (Redis/Database)
- Ollama clustering for high availability

## 🔄 API Integration Details

### Laravel → FastAPI Communication

```php
// Example: Send chat message
$response = Http::timeout(30)->post($this->fastApiUrl . '/chat', [
    'message' => $request->input('message'),
]);

if ($response->successful()) {
    $data = $response->json();
    return response()->json([
        'success' => true,
        'response' => $data['response'],
        'timestamp' => now()->toISOString(),
    ]);
}
```

### Frontend JavaScript API Calls

```javascript
// Send message to Laravel backend
const response = await fetch('/chatbot/chat', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
    },
    body: JSON.stringify({ message: message })
});
```

## 🐛 Troubleshooting

### Common Issues

1. **Laravel can't connect to FastAPI**
   - Check FASTAPI_URL in .env
   - Verify FastAPI is running on port 8000
   - Check Docker network connectivity

2. **FastAPI can't connect to Ollama**
   - Wait for Ollama to fully start
   - Check if Gemma model is pulled
   - Verify OLLAMA_HOST setting

3. **Frontend shows connection errors**
   - Check browser console for JavaScript errors
   - Verify CSRF token is present
   - Check Laravel logs for backend errors

### Debug Commands

```bash
# Check service health
curl http://localhost:8080/chatbot/health
curl http://localhost:8000/health
curl http://localhost:11434/api/tags

# View container status
docker ps
docker stats

# Check network connectivity
docker network ls
docker network inspect $(docker-compose -f docker-compose.integration.yml ps -q | head -1 | xargs docker inspect -f '{{range .NetworkSettings.Networks}}{{.NetworkID}}{{end}}')
```

## 📈 Performance Optimization

### Laravel Optimizations
```bash
# Production optimizations
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev
```

### FastAPI Optimizations
- Use async/await for I/O operations
- Implement connection pooling
- Add response caching
- Use background tasks for heavy operations

### Ollama Optimizations
- Allocate sufficient GPU memory
- Use model quantization
- Implement model warm-up
- Monitor resource usage

## 🔮 Future Enhancements

1. **Database Integration**
   - MySQL/PostgreSQL for production
   - User authentication and sessions
   - Persistent chat history

2. **Real-time Features**
   - WebSocket integration
   - Live typing indicators
   - Push notifications

3. **Advanced AI Features**
   - Multiple model support
   - Conversation context
   - Custom prompts and personas

4. **Monitoring & Analytics**
   - Usage analytics
   - Performance metrics
   - Error tracking

## 📞 Support

For issues or questions:
1. Check the troubleshooting section
2. Review Docker and Laravel logs
3. Verify service health endpoints
4. Check network connectivity between services

## 🎯 Integration Summary

✅ **Completed:**
- Laravel frontend with modern UI
- FastAPI backend integration
- Docker containerization
- Health monitoring
- Chat history management
- Production-ready configuration

🚀 **Ready to use:**
- Start with `./start-integrated.sh`
- Access chatbot at http://localhost:8080/chatbot
- Monitor health at various endpoints
- Scale as needed for production

The integration provides a robust, scalable, and maintainable architecture for the Gamma Chatbot with Laravel providing an excellent frontend experience while leveraging the existing FastAPI backend and Ollama AI capabilities.