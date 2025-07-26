#!/bin/bash

# Laravel Blog with AI Chatbot - Setup Script
# This script automates the initial setup process

set -e

echo "🚀 Laravel Blog with AI Chatbot - Setup Script"
echo "=============================================="
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Function to print colored output
print_status() {
    echo -e "${BLUE}[INFO]${NC} $1"
}

print_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Check if Docker is installed
check_docker() {
    print_status "Checking Docker installation..."
    if ! command -v docker &> /dev/null; then
        print_error "Docker is not installed. Please install Docker first."
        exit 1
    fi
    
    if ! command -v docker-compose &> /dev/null; then
        print_error "Docker Compose is not installed. Please install Docker Compose first."
        exit 1
    fi
    
    print_success "Docker and Docker Compose are installed"
}

# Check system requirements
check_requirements() {
    print_status "Checking system requirements..."
    
    # Check available memory
    if command -v free &> /dev/null; then
        TOTAL_MEM=$(free -g | awk '/^Mem:/{print $2}')
        if [ "$TOTAL_MEM" -lt 8 ]; then
            print_warning "System has less than 8GB RAM. AI model performance may be affected."
        else
            print_success "Memory requirement met (${TOTAL_MEM}GB available)"
        fi
    fi
    
    # Check disk space
    AVAILABLE_SPACE=$(df . | tail -1 | awk '{print $4}')
    REQUIRED_SPACE=5000000 # 5GB in KB
    
    if [ "$AVAILABLE_SPACE" -lt "$REQUIRED_SPACE" ]; then
        print_warning "Less than 5GB disk space available. This may not be enough for AI models."
    else
        print_success "Disk space requirement met"
    fi
}

# Setup environment files
setup_environment() {
    print_status "Setting up environment files..."
    
    if [ ! -f "laravel-blog/.env" ]; then
        cp laravel-blog/.env.example laravel-blog/.env
        print_success "Environment file created"
    else
        print_warning "Environment file already exists"
    fi
}

# Start services
start_services() {
    print_status "Starting Docker services..."
    docker-compose up -d
    
    print_status "Waiting for services to initialize..."
    sleep 30
    
    # Check if services are running
    if docker-compose ps | grep -q "Up"; then
        print_success "Services started successfully"
    else
        print_error "Some services failed to start. Check logs with: docker-compose logs"
        exit 1
    fi
}

# Initialize database
setup_database() {
    print_status "Setting up database..."
    
    # Wait for MySQL to be ready
    print_status "Waiting for MySQL to be ready..."
    until docker exec laravel-blog-mysql mysqladmin ping -h "localhost" --silent; do
        echo -n "."
        sleep 2
    done
    echo ""
    
    # Run migrations and seeders
    print_status "Running database migrations..."
    docker exec laravel-blog-app php artisan migrate --force
    
    print_status "Seeding database with sample data..."
    docker exec laravel-blog-app php artisan db:seed --force
    
    print_success "Database setup completed"
}

# Setup AI model
setup_ai_model() {
    print_status "Setting up AI model..."
    
    # Wait for Ollama to be ready
    print_status "Waiting for Ollama service..."
    until docker exec laravel-blog-ollama ollama list &> /dev/null; do
        echo -n "."
        sleep 5
    done
    echo ""
    
    # Check if model exists
    if docker exec laravel-blog-ollama ollama list | grep -q "gemma2:2b"; then
        print_success "Gemma 2B model is already available"
    else
        print_status "Downloading Gemma 2B model (this may take several minutes)..."
        docker exec laravel-blog-ollama ollama pull gemma2:2b
        print_success "AI model downloaded successfully"
    fi
}

# Generate application key
generate_app_key() {
    print_status "Generating Laravel application key..."
    docker exec laravel-blog-app php artisan key:generate --force
    print_success "Application key generated"
}

# Optimize application
optimize_application() {
    print_status "Optimizing Laravel application..."
    docker exec laravel-blog-app php artisan config:cache
    docker exec laravel-blog-app php artisan view:cache
    print_success "Application optimized"
}

# Verify setup
verify_setup() {
    print_status "Verifying setup..."
    
    # Check web application
    if curl -s http://localhost > /dev/null; then
        print_success "✅ Web application is accessible at http://localhost"
    else
        print_error "❌ Web application is not accessible"
    fi
    
    # Check chatbot API
    if curl -s http://localhost:8000/status > /dev/null; then
        print_success "✅ Chatbot API is accessible at http://localhost:8000"
    else
        print_error "❌ Chatbot API is not accessible"
    fi
    
    # Check database
    if docker exec laravel-blog-mysql mysql -u laravel -plaravel_password laravel_blog -e "SELECT 1;" > /dev/null 2>&1; then
        print_success "✅ Database is accessible"
    else
        print_error "❌ Database is not accessible"
    fi
}

# Display final information
show_final_info() {
    echo ""
    echo "🎉 Setup completed successfully!"
    echo "================================"
    echo ""
    echo "📋 Service URLs:"
    echo "  🌐 Blog Application:    http://localhost"
    echo "  🤖 Chatbot API:         http://localhost:8000"
    echo "  🗄️  PHPMyAdmin:          http://localhost:8080"
    echo "  📧 Mailpit:             http://localhost:8025"
    echo ""
    echo "📋 Database Credentials:"
    echo "  Host: mysql (container) / localhost:3306 (host)"
    echo "  Database: laravel_blog"
    echo "  Username: laravel"
    echo "  Password: laravel_password"
    echo ""
    echo "🔧 Useful Commands:"
    echo "  View logs:              docker-compose logs -f"
    echo "  Access Laravel:         docker exec -it laravel-blog-app bash"
    echo "  Access chatbot:         docker exec -it laravel-blog-chatbot bash"
    echo "  Stop services:          docker-compose down"
    echo "  Restart services:       docker-compose restart"
    echo ""
    echo "❓ Troubleshooting:"
    echo "  If chatbot shows 'Loading...', wait a few minutes for the AI model to load"
    echo "  If issues persist, check logs: docker-compose logs [service-name]"
    echo ""
    echo "Happy blogging with AI! 🚀"
}

# Main execution
main() {
    echo "Starting setup process..."
    echo ""
    
    check_docker
    check_requirements
    setup_environment
    start_services
    generate_app_key
    setup_database
    setup_ai_model
    optimize_application
    verify_setup
    show_final_info
}

# Handle script interruption
trap 'print_error "Setup interrupted. You may need to run: docker-compose down"; exit 1' INT

# Run main function
main