#!/bin/bash

echo "🚀 Setting up Simple Laravel Blog (No SQL)"

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "❌ PHP is not installed. Please install PHP 8.1+ first."
    echo ""
    echo "For Ubuntu/Debian:"
    echo "  sudo apt update"
    echo "  sudo apt install php8.1 php8.1-cli php8.1-common php8.1-mbstring php8.1-xml php8.1-curl php8.1-zip"
    echo ""
    echo "For macOS (with Homebrew):"
    echo "  brew install php"
    echo ""
    echo "For Windows:"
    echo "  Download from https://windows.php.net/download/"
    echo ""
    exit 1
fi

echo "✅ PHP found: $(php --version | head -n 1)"

# Check if Composer is installed
if ! command -v composer &> /dev/null; then
    echo "❌ Composer is not installed. Please install Composer first."
    echo ""
    echo "Install Composer:"
    echo "  curl -sS https://getcomposer.org/installer | php"
    echo "  sudo mv composer.phar /usr/local/bin/composer"
    echo ""
    exit 1
fi

echo "✅ Composer found: $(composer --version | head -n 1)"

# Install dependencies
echo "📦 Installing PHP dependencies..."
composer install

# Check if Node.js is installed for frontend assets
if command -v npm &> /dev/null; then
    echo "📦 Installing Node.js dependencies..."
    npm install
    echo "🔨 Building frontend assets..."
    npm run build
else
    echo "⚠️  Node.js not found. Skipping frontend asset compilation."
    echo "   The blog will still work, but you may need to compile assets manually."
fi

# Copy environment file
if [ ! -f .env ]; then
    echo "📝 Creating .env file..."
    cp .env.example .env
    echo "✅ .env file created"
else
    echo "✅ .env file already exists"
fi

# Generate application key
echo "🔑 Generating application key..."
php artisan key:generate

echo ""
echo "🎉 Setup complete!"
echo ""
echo "To start the development server:"
echo "  php artisan serve"
echo ""
echo "Then visit: http://localhost:8000"
echo ""
echo "To add new blog posts, edit: app/Http/Controllers/BlogController.php"