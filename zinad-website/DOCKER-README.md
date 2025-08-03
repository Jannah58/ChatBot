# Laravel Docker Setup

This repository contains a complete Docker setup for your Laravel application with MySQL, Redis, and phpMyAdmin.

## 🚀 Quick Start

### Prerequisites
- Docker (version 20.10 or higher)
- Docker Compose (version 2.0 or higher)

### Setup

1. **Run the setup script:**
   ```bash
   ./docker-setup.sh
   ```
   This will create the necessary directories, generate an application key, and prepare your environment.

2. **Start the containers:**
   ```bash
   docker-compose up -d
   ```

3. **Run database migrations:**
   ```bash
   ./docker-artisan.sh migrate
   ```

4. **Build frontend assets:**
   ```bash
   ./docker-npm.sh install
   ./docker-npm.sh run build
   ```

## 📋 Services

| Service | URL | Purpose |
|---------|-----|---------|
| Laravel App | http://localhost:8000 | Main application |
| phpMyAdmin | http://localhost:8080 | Database management |
| MySQL | localhost:3306 | Database server |
| Redis | localhost:6379 | Cache & sessions |

## 🛠️ Helper Scripts

### `./docker-setup.sh`
Initial setup script that prepares your environment:
- Creates required directories
- Sets proper permissions
- Generates `.env` file from template
- Generates application key

### `./docker-artisan.sh <command>`
Run Laravel Artisan commands:
```bash
./docker-artisan.sh migrate
./docker-artisan.sh make:controller UserController
./docker-artisan.sh queue:work
./docker-artisan.sh tinker
```

### `./docker-composer.sh <command>`
Run Composer commands:
```bash
./docker-composer.sh install
./docker-composer.sh require laravel/telescope
./docker-composer.sh update
```

### `./docker-npm.sh <command>`
Run NPM commands for frontend assets:
```bash
./docker-npm.sh install
./docker-npm.sh run dev
./docker-npm.sh run build
./docker-npm.sh run watch
```

## 🔧 Configuration

### Environment Variables
The setup uses `.env.docker` as a template. Key configurations:

- **Database**: MySQL with persistent storage
- **Cache**: Redis for sessions and caching
- **Queue**: Redis-based queue system
- **Debug**: Disabled for production-like environment

### Database Connection
```
Host: db (internal) or localhost:3306 (external)
Database: laravel
Username: laravel
Password: laravel_password
```

### phpMyAdmin Access
- URL: http://localhost:8080
- Server: db
- Username: laravel or root
- Password: laravel_password or root_password

## 🐳 Docker Commands

### Basic Operations
```bash
# Start all services
docker-compose up -d

# Stop all services
docker-compose down

# View logs
docker-compose logs -f

# View logs for specific service
docker-compose logs -f app

# Restart a service
docker-compose restart app

# Rebuild containers
docker-compose up -d --build
```

### Container Access
```bash
# Access Laravel app container
docker-compose exec app sh

# Access MySQL container
docker-compose exec db mysql -u laravel -p

# Access Redis container
docker-compose exec redis redis-cli
```

## 📊 Development Workflow

### 1. Daily Development
```bash
# Start containers
docker-compose up -d

# Install new dependencies
./docker-composer.sh install

# Run migrations
./docker-artisan.sh migrate

# Build assets
./docker-npm.sh run dev
```

### 2. Asset Development
For frontend development with hot reloading:
```bash
# Start Vite development server
./docker-npm.sh run dev

# Or run in watch mode
./docker-npm.sh run watch
```

### 3. Database Operations
```bash
# Fresh migration
./docker-artisan.sh migrate:fresh

# Seed database
./docker-artisan.sh db:seed

# Create migration
./docker-artisan.sh make:migration create_users_table
```

### 4. Queue Management
```bash
# Process queue jobs
./docker-artisan.sh queue:work

# List failed jobs
./docker-artisan.sh queue:failed

# Restart queue workers
./docker-artisan.sh queue:restart
```

## 🔍 Troubleshooting

### Permission Issues
```bash
# Fix storage permissions
sudo chown -R $USER:$USER storage bootstrap/cache
chmod -R 755 storage bootstrap/cache
```

### Container Issues
```bash
# Rebuild containers from scratch
docker-compose down -v
docker-compose up -d --build

# Remove all containers and volumes
docker-compose down -v --remove-orphans
docker system prune -f
```

### Database Connection Issues
1. Ensure containers are running: `docker-compose ps`
2. Check database logs: `docker-compose logs db`
3. Verify environment variables in `.env`

### Asset Building Issues
```bash
# Clear npm cache
./docker-npm.sh cache clean --force

# Reinstall dependencies
rm -rf node_modules package-lock.json
./docker-npm.sh install
```

## 📁 File Structure

```
├── Dockerfile                 # Main application container
├── docker-compose.yml         # Service orchestration
├── .dockerignore             # Docker build exclusions
├── .env.docker               # Environment template
├── docker/                   # Docker configuration
│   ├── nginx.conf            # Nginx web server config
│   ├── supervisord.conf      # Process manager config
│   ├── php.ini               # PHP configuration
│   └── mysql/
│       └── init.sql          # Database initialization
├── docker-setup.sh           # Initial setup script
├── docker-artisan.sh         # Artisan command helper
├── docker-composer.sh        # Composer command helper
└── docker-npm.sh             # NPM command helper
```

## 🚀 Production Deployment

For production deployment:

1. Update `.env` with production values
2. Set `APP_ENV=production` and `APP_DEBUG=false`
3. Use proper database credentials
4. Configure SSL/TLS termination at load balancer level
5. Set up proper backup strategies for database volumes

## 📝 Notes

- The setup uses multi-stage Docker builds for optimized images
- Assets are built during the Docker build process
- Redis is configured for both caching and sessions
- MySQL data persists in Docker volumes
- Nginx serves static files directly for better performance

## 🆘 Support

If you encounter issues:
1. Check container logs: `docker-compose logs`
2. Verify all containers are running: `docker-compose ps`
3. Ensure ports 8000, 3306, 6379, and 8080 are available
4. Review the `.env` file configuration