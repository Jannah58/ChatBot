# Laravel Blog with AI Chatbot

A modern, AI-powered blog platform built with Laravel, Docker, and FastAPI. This project demonstrates the integration of a traditional web application with cutting-edge AI technology, featuring an intelligent chatbot powered by the Gemma 2B model.

![Blog Screenshot](https://via.placeholder.com/800x400/667eea/ffffff?text=AI-Powered+Blog+Platform)

## 🚀 Features

### 🤖 **AI-Powered Chatbot**
- **Gemma 2B Model**: Lightweight yet powerful language model
- **LangChain Integration**: Enhanced prompt processing and response handling
- **Real-time Communication**: Instant responses with loading indicators
- **Context-Aware**: Can discuss blog content and provide explanations

### 📝 **Modern Blog Platform**
- **Responsive Design**: Beautiful UI that works on all devices
- **Article Management**: Full CRUD operations for blog posts
- **SEO Optimized**: Meta descriptions, slugs, and proper HTML structure
- **Pagination**: Efficient content browsing

### 🐳 **Containerized Architecture**
- **Docker Compose**: Complete multi-service setup
- **Microservices**: Separate containers for each component
- **Scalable**: Easy to scale individual services
- **Development Ready**: Consistent environment across all platforms

## 🏗️ Project Structure

```
📦 laravel-blog-with-chatbot/
├── 📂 laravel-blog/              # Laravel application
│   ├── 📂 app/
│   │   ├── 📂 Http/Controllers/
│   │   │   ├── BlogController.php
│   │   │   └── ChatbotController.php
│   │   └── 📂 Models/
│   │       └── Post.php
│   ├── 📂 database/
│   │   ├── 📂 migrations/
│   │   │   └── create_posts_table.php
│   │   └── 📂 seeders/
│   │       └── PostSeeder.php
│   ├── 📂 resources/views/
│   │   ├── 📂 layouts/
│   │   │   └── app.blade.php
│   │   └── 📂 blog/
│   │       ├── index.blade.php
│   │       ├── show.blade.php
│   │       └── about.blade.php
│   ├── 📂 routes/
│   │   ├── web.php
│   │   ├── api.php
│   │   └── console.php
│   ├── 📂 docker/
│   │   ├── nginx.conf
│   │   └── supervisord.conf
│   ├── Dockerfile
│   ├── composer.json
│   ├── package.json
│   └── .env.example
├── 📂 chatbot/                   # FastAPI chatbot service
│   ├── 📂 static/
│   │   └── index.html
│   ├── main.py
│   ├── requirements.txt
│   └── Dockerfile
├── 📂 ollama/                    # AI model service
│   └── Dockerfile
├── docker-compose.yml            # Main orchestration file
└── README.md                     # This file
```

## 🛠️ Technology Stack

### **Frontend & Backend**
- **Laravel 10**: Modern PHP framework with elegant syntax
- **Bootstrap 5**: Responsive CSS framework
- **MySQL 8.0**: Robust relational database
- **Nginx**: High-performance web server
- **PHP 8.2**: Latest stable PHP version

### **AI & Chatbot**
- **FastAPI**: High-performance Python web framework
- **Ollama**: Local AI model runner
- **Gemma 2B**: Google's lightweight language model
- **LangChain**: AI application development framework

### **DevOps & Infrastructure**
- **Docker**: Containerization platform
- **Docker Compose**: Multi-container orchestration
- **Redis**: In-memory data structure store
- **PHPMyAdmin**: Database management interface
- **Mailpit**: Email testing tool

## 🚀 Quick Start

### Prerequisites

- **Docker** (version 20.10+)
- **Docker Compose** (version 2.0+)
- **Git**
- At least **8GB RAM** (for AI model)

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd laravel-blog-with-chatbot
   ```

2. **Start All Services**
   ```bash
   docker-compose up -d
   ```

3. **Wait for Services to Initialize**
   - The first startup may take 5-10 minutes
   - AI model download happens automatically

4. **Initialize the Database**
   ```bash
   # Access Laravel container
   docker exec -it laravel-blog-app bash
   
   # Run migrations and seeders
   php artisan migrate --seed
   ```

5. **Verify AI Model is Ready**
   ```bash
   # Check if Gemma 2B model is loaded
   docker exec -it laravel-blog-ollama ollama list
   
   # If not loaded, pull the model
   docker exec -it laravel-blog-ollama ollama pull gemma2:2b
   ```

6. **Access the Application**
   - **Blog**: http://localhost
   - **PHPMyAdmin**: http://localhost:8080
   - **Mailpit**: http://localhost:8025
   - **Chatbot API**: http://localhost:8000

## 📋 Service Details

### 🌐 Web Application (Port 80)
- **Laravel blog** with integrated chatbot UI
- **Features**: Article browsing, responsive design, AI assistant
- **Container**: `laravel-blog-app`

### 🤖 AI Chatbot (Port 8000)
- **FastAPI service** handling chat requests
- **Endpoints**: `/status`, `/chat`, `/generate`
- **Container**: `laravel-blog-chatbot`

### 🧠 AI Model Service (Port 11434)
- **Ollama** running Gemma 2B model
- **Model**: Google Gemma 2B (lightweight, efficient)
- **Container**: `laravel-blog-ollama`

### 🗄️ Database (Port 3306)
- **MySQL 8.0** with blog data
- **Credentials**: `laravel` / `laravel_password`
- **Container**: `laravel-blog-mysql`

### 🔧 Additional Services
- **PHPMyAdmin** (Port 8080): Database management
- **Redis** (Port 6379): Caching and sessions
- **Mailpit** (Port 1025/8025): Email testing

## 💻 Development Workflow

### 🔄 Starting Development

```bash
# Start all services
docker-compose up -d

# View logs
docker-compose logs -f

# Stop services
docker-compose down
```

### 🛠️ Laravel Development

```bash
# Access Laravel container
docker exec -it laravel-blog-app bash

# Common Laravel commands
php artisan migrate
php artisan db:seed
php artisan route:list
php artisan tinker
```

### 🤖 Chatbot Development

```bash
# Access chatbot container
docker exec -it laravel-blog-chatbot bash

# Check API status
curl http://localhost:8000/status

# Test chat endpoint
curl -X POST http://localhost:8000/chat \
  -H "Content-Type: application/json" \
  -d '{"message": "Hello!"}'
```

### 🧠 AI Model Management

```bash
# List available models
docker exec -it laravel-blog-ollama ollama list

# Pull new model
docker exec -it laravel-blog-ollama ollama pull llama2

# Run model interactively
docker exec -it laravel-blog-ollama ollama run gemma2:2b
```

## 🔧 Configuration

### Environment Variables

Key configuration options in `laravel-blog/.env`:

```env
# Application
APP_NAME="Laravel Blog with AI Chatbot"
APP_URL=http://localhost

# Database
DB_HOST=mysql
DB_DATABASE=laravel_blog
DB_USERNAME=laravel
DB_PASSWORD=laravel_password

# Chatbot Integration
CHATBOT_API_URL=http://chatbot:8000
OLLAMA_HOST=http://ollama:11434
```

### Docker Compose Configuration

Customize services in `docker-compose.yml`:

```yaml
# Change ports
ports:
  - "8080:80"  # Web app on port 8080

# Adjust memory limits
deploy:
  resources:
    limits:
      memory: 4G
```

## 🎯 Usage Examples

### 💬 Using the Chatbot

1. **Open the blog** at http://localhost
2. **Click the chat icon** in the bottom-right corner
3. **Wait for "Ready" status** (green indicator)
4. **Start chatting!** Ask about articles or general topics

Example conversations:
- "Explain the article about AI and Machine Learning"
- "What technologies are used in this blog?"
- "How does Laravel work with Docker?"

### 📝 Managing Blog Content

```php
// Add new blog post
use App\Models\Post;

Post::create([
    'title' => 'New Article Title',
    'content' => '<p>Article content with HTML</p>',
    'excerpt' => 'Brief description',
    'is_published' => true,
    'published_at' => now(),
]);
```

### 🔌 API Integration

```javascript
// Check chatbot status
fetch('/chatbot/status')
  .then(response => response.json())
  .then(data => console.log(data.status));

// Send chat message
fetch('/chatbot/chat', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ message: 'Hello!' })
})
.then(response => response.json())
.then(data => console.log(data.response));
```

## 🚨 Troubleshooting

### Common Issues and Solutions

#### 🔴 "Connection refused" errors
```bash
# Check if all containers are running
docker-compose ps

# Restart services
docker-compose restart
```

#### 🟡 Chatbot shows "Loading..." indefinitely
```bash
# Check if Ollama is ready
docker exec -it laravel-blog-ollama ollama list

# Pull the model if missing
docker exec -it laravel-blog-ollama ollama pull gemma2:2b

# Check chatbot logs
docker-compose logs laravel-blog-chatbot
```

#### 🟠 Database connection errors
```bash
# Check MySQL container
docker-compose logs laravel-blog-mysql

# Verify database credentials in .env file
# Run migrations
docker exec -it laravel-blog-app php artisan migrate
```

#### 🔵 Web page not loading
```bash
# Check Laravel container logs
docker-compose logs laravel-blog-app

# Verify file permissions
docker exec -it laravel-blog-app chown -R www-data:www-data storage bootstrap/cache
```

### Performance Optimization

```bash
# Clear Laravel caches
docker exec -it laravel-blog-app php artisan cache:clear
docker exec -it laravel-blog-app php artisan config:clear
docker exec -it laravel-blog-app php artisan view:clear

# Optimize for production
docker exec -it laravel-blog-app php artisan config:cache
docker exec -it laravel-blog-app php artisan view:cache
```

## 📊 Monitoring & Logs

### Viewing Logs

```bash
# All services
docker-compose logs -f

# Specific service
docker-compose logs -f laravel-blog-app
docker-compose logs -f laravel-blog-chatbot
docker-compose logs -f laravel-blog-ollama

# Laravel application logs
docker exec -it laravel-blog-app tail -f storage/logs/laravel.log
```

### Health Checks

```bash
# Web application
curl http://localhost/

# Chatbot API
curl http://localhost:8000/status

# Database connection
docker exec -it laravel-blog-mysql mysql -u laravel -p laravel_blog
```

## 🚀 Deployment

### Production Considerations

1. **Environment Variables**
   - Set `APP_ENV=production`
   - Use strong database passwords
   - Configure proper APP_KEY

2. **Security**
   - Enable HTTPS
   - Use Docker secrets for sensitive data
   - Implement proper firewall rules

3. **Performance**
   - Use Redis for caching
   - Enable Laravel optimizations
   - Configure proper PHP-FPM settings

### Docker Production Setup

```yaml
# docker-compose.prod.yml
version: '3.8'
services:
  laravel:
    environment:
      - APP_ENV=production
      - APP_DEBUG=false
    deploy:
      replicas: 2
```

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. **Fork the repository**
2. **Create a feature branch**: `git checkout -b feature/amazing-feature`
3. **Commit changes**: `git commit -m 'Add amazing feature'`
4. **Push to branch**: `git push origin feature/amazing-feature`
5. **Open a Pull Request**

### Development Setup

```bash
# Clone your fork
git clone https://github.com/yourusername/laravel-blog-with-chatbot.git

# Create development branch
git checkout -b develop

# Make changes and test
docker-compose up -d
# ... make your changes ...

# Submit PR
git add .
git commit -m "Description of changes"
git push origin develop
```

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Laravel Community** for the excellent framework
- **FastAPI** for the high-performance API framework
- **Ollama** for making AI models accessible
- **Google** for the Gemma model
- **Docker** for containerization technology

## 📞 Support

If you encounter any issues or have questions:

1. **Check the troubleshooting section** above
2. **Review the logs** using the monitoring commands
3. **Open an issue** on GitHub with:
   - Description of the problem
   - Steps to reproduce
   - Error logs
   - System information

---

**Happy Coding! 🚀**

Built with ❤️ using Laravel, Docker, and AI