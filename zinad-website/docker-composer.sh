#!/bin/bash

# Docker Composer Helper Script
# Usage: ./docker-composer.sh <composer-command>

if [ $# -eq 0 ]; then
    echo "Usage: $0 <composer-command>"
    echo "Examples:"
    echo "  $0 install"
    echo "  $0 require laravel/telescope"
    echo "  $0 update"
    echo "  $0 dump-autoload"
    exit 1
fi

# Check if containers are running
if ! docker-compose ps | grep -q "laravel-app.*Up"; then
    echo "❌ Laravel app container is not running."
    echo "Please start the containers first: docker-compose up -d"
    exit 1
fi

echo "📦 Running: composer $*"
docker-compose exec app composer "$@"