#!/bin/bash

# Gamma Chatbot - Laravel + FastAPI Integration Startup Script
# This script sets up and runs the complete integrated system

set -e  # Exit on any error

echo "🚀 Starting Gamma Chatbot - Laravel + FastAPI Integration"
echo "=================================================="

# Color codes for output
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

# Check if Docker is installed and running
print_status "Checking Docker installation..."
if ! command -v docker &> /dev/null; then
    print_error "Docker is not installed. Please install Docker first."
    exit 1
fi

if ! docker info &> /dev/null; then
    print_error "Docker is not running. Please start Docker first."
    exit 1
fi

print_success "Docker is installed and running"

# Check if Docker Compose is available
print_status "Checking Docker Compose..."
if ! command -v docker-compose &> /dev/null && ! docker compose version &> /dev/null; then
    print_error "Docker Compose is not available. Please install Docker Compose."
    exit 1
fi

print_success "Docker Compose is available"

# Function to wait for service
wait_for_service() {
    local service_name=$1
    local url=$2
    local max_attempts=60
    local attempt=1

    print_status "Waiting for $service_name to be ready..."
    
    while [ $attempt -le $max_attempts ]; do
        if curl -f -s "$url" > /dev/null 2>&1; then
            print_success "$service_name is ready!"
            return 0
        fi
        
        echo -ne "\r  Attempt $attempt/$max_attempts..."
        sleep 5
        ((attempt++))
    done
    
    print_error "$service_name failed to start within expected time"
    return 1
}

# Clean up function
cleanup() {
    print_warning "Cleaning up..."
    docker-compose -f docker-compose.integration.yml down --remove-orphans
}

# Set up signal handlers
trap cleanup EXIT

# Step 1: Build and start services
print_status "Building and starting services..."
if command -v docker-compose &> /dev/null; then
    docker-compose -f docker-compose.integration.yml down --remove-orphans
    docker-compose -f docker-compose.integration.yml build --no-cache
    docker-compose -f docker-compose.integration.yml up -d
else
    docker compose -f docker-compose.integration.yml down --remove-orphans
    docker compose -f docker-compose.integration.yml build --no-cache
    docker compose -f docker-compose.integration.yml up -d
fi

# Step 2: Wait for Ollama to be ready
wait_for_service "Ollama" "http://localhost:11434/api/tags"

# Step 3: Pull the Gemma model
print_status "Checking and pulling Gemma 2B model..."
if ! docker exec gamma_ollama ollama list | grep -q gemma2:2b; then
    print_status "Pulling Gemma 2B model (this may take a while)..."
    docker exec gamma_ollama ollama pull gemma2:2b
    print_success "Gemma 2B model pulled successfully"
else
    print_success "Gemma 2B model already available"
fi

# Step 4: Wait for FastAPI to be ready
wait_for_service "FastAPI Backend" "http://localhost:8000/health"

# Step 5: Wait for Laravel to be ready
wait_for_service "Laravel Frontend" "http://localhost:8080"

# Step 6: Wait for Nginx (if enabled)
# wait_for_service "Nginx Proxy" "http://localhost:80/nginx-health"

# Step 7: Display status and URLs
echo ""
echo "🎉 Integration Setup Complete!"
echo "================================"
echo ""
echo "🌐 Service URLs:"
echo "  • Laravel Frontend:    http://localhost:8080"
echo "  • Chatbot Interface:   http://localhost:8080/chatbot"
echo "  • FastAPI Backend:     http://localhost:8000"
echo "  • FastAPI Docs:        http://localhost:8000/docs"
echo "  • Ollama API:          http://localhost:11434"
echo ""
echo "🏥 Health Check URLs:"
echo "  • Laravel Health:      http://localhost:8080/chatbot/health"
echo "  • FastAPI Health:      http://localhost:8000/health"
echo "  • Ollama Status:       http://localhost:8000/status"
echo ""
echo "📊 Monitoring:"
echo "  • Docker Logs:         docker-compose -f docker-compose.integration.yml logs -f"
echo "  • Laravel Logs:        docker logs gamma_laravel -f"
echo "  • FastAPI Logs:        docker logs gamma_fastapi -f"
echo "  • Ollama Logs:         docker logs gamma_ollama -f"
echo ""
echo "🛑 To stop all services:"
echo "  docker-compose -f docker-compose.integration.yml down"
echo ""

# Step 8: Run health checks
print_status "Running final health checks..."

check_service() {
    local name=$1
    local url=$2
    
    if curl -f -s "$url" > /dev/null 2>&1; then
        print_success "$name: ✅ Healthy"
    else
        print_error "$name: ❌ Unhealthy"
    fi
}

check_service "Ollama" "http://localhost:11434/api/tags"
check_service "FastAPI" "http://localhost:8000/health"
check_service "Laravel" "http://localhost:8080"

echo ""
print_success "All services are running! You can now access the chatbot at http://localhost:8080/chatbot"

# Keep script running to show logs
print_status "Showing live logs (Ctrl+C to exit)..."
echo ""

if command -v docker-compose &> /dev/null; then
    docker-compose -f docker-compose.integration.yml logs -f
else
    docker compose -f docker-compose.integration.yml logs -f
fi