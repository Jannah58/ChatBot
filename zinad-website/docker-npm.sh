#!/bin/bash

# Docker NPM Helper Script
# Usage: ./docker-npm.sh <npm-command>

if [ $# -eq 0 ]; then
    echo "Usage: $0 <npm-command>"
    echo "Examples:"
    echo "  $0 install"
    echo "  $0 run dev"
    echo "  $0 run build"
    echo "  $0 run watch"
    exit 1
fi

echo "📦 Running: npm $*"
docker run --rm \
    -v "$(pwd):/app" \
    -w /app \
    -u "$(id -u):$(id -g)" \
    node:18-alpine \
    npm "$@"