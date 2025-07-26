FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    build-base \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    oniguruma-dev \
    nginx \
    supervisor

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    exif \
    pcntl \
    gd \
    bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js and npm
RUN apk add --no-cache nodejs npm

# Set working directory
WORKDIR /var/www/html

# Copy composer files first for better caching
COPY composer.json composer.lock ./

# Install PHP dependencies (if composer files exist)
RUN if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader --no-scripts; fi

# Copy package.json files for npm dependencies
COPY package*.json ./

# Install Node.js dependencies (if package.json exists)
RUN if [ -f package.json ]; then npm ci --only=production; fi

# Copy application code
COPY . .

# Copy nginx configuration
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Copy supervisor configuration
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Create Laravel directories if they don't exist
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views \
    && chown -R www-data:www-data storage bootstrap/cache

# Copy environment file
COPY .env.example .env

# Generate application key and run setup if composer.json exists
RUN if [ -f composer.json ]; then \
        php artisan key:generate && \
        php artisan config:cache && \
        php artisan view:cache; \
    fi

# Build assets if package.json exists
RUN if [ -f package.json ]; then npm run build; fi

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]