#!/bin/bash

# Docker Artisan Helper Script
# Usage: ./docker-artisan.sh <artisan-command>

if [ $# -eq 0 ]; then
    echo "Usage: $0 <artisan-command>"
    echo "Examples:"
    echo "  $0 migrate"
    echo "  $0 make:controller UserController"
    echo "  $0 queue:work"
    echo "  $0 tinker"
    exit 1
fi

# Check if containers are running
if ! docker-compose ps | grep -q "laravel-app.*Up"; then
    echo "❌ Laravel app container is not running."
    echo "Please start the containers first: docker-compose up -d"
    exit 1
fi

echo "🎨 Running: php artisan $*"
docker-compose exec app php artisan "$@"