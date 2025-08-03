#!/bin/bash

# Docker Setup Script for Laravel Application
echo "🐳 Setting up Laravel Docker environment..."

# Check if Docker and Docker Compose are installed
if ! command -v docker &> /dev/null; then
    echo "❌ Docker is not installed. Please install Docker first."
    exit 1
fi

if ! command -v docker-compose &> /dev/null; then
    echo "❌ Docker Compose is not installed. Please install Docker Compose first."
    exit 1
fi

# Create .env file from template
if [ ! -f .env ]; then
    echo "📄 Creating .env file from .env.docker template..."
    cp .env.docker .env
    
    # Generate APP_KEY
    echo "🔑 Generating application key..."
    APP_KEY=$(openssl rand -base64 32)
    sed -i "s/YOUR_APP_KEY_HERE/$APP_KEY/" .env
    
    echo "✅ .env file created successfully!"
    echo "⚠️  Please review and update the .env file with your specific settings."
else
    echo "📄 .env file already exists, skipping creation."
fi

# Create required directories
echo "📁 Creating required directories..."
mkdir -p storage/app/public
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Set proper permissions
echo "🔒 Setting directory permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Create public storage link directory if it doesn't exist
if [ ! -L public/storage ]; then
    echo "🔗 Creating storage symlink..."
    mkdir -p public
fi

echo "🚀 Setup completed! You can now run:"
echo "   docker-compose up -d"
echo ""
echo "Your application will be available at:"
echo "   🌐 Laravel App: http://localhost:8000"
echo "   🗄️  phpMyAdmin: http://localhost:8080"
echo ""
echo "To run Laravel commands inside the container:"
echo "   ./docker-artisan.sh <command>"
echo ""
echo "To access the container shell:"
echo "   docker-compose exec app sh"