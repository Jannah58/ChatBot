# Quick Start Guide

## Option 1: Using Docker (Recommended)

If you have Docker installed, this is the fastest way to get started:

```bash
# Build and start the application
docker-compose up --build

# Visit http://localhost:8000
```

## Option 2: Local PHP Installation

If you prefer to run it locally:

1. **Install PHP 8.1+ and Composer**
2. **Run the setup script:**
   ```bash
   chmod +x setup.sh
   ./setup.sh
   ```
3. **Start the server:**
   ```bash
   php artisan serve
   ```
4. **Visit http://localhost:8000**

## Option 3: Manual Setup

1. **Install dependencies:**
   ```bash
   composer install
   npm install && npm run build
   ```

2. **Configure environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Start the server:**
   ```bash
   php artisan serve
   ```

## Adding New Posts

To add new blog posts, edit `app/Http/Controllers/BlogController.php` and add entries to the `$posts` array:

```php
[
    'id' => 4,
    'title' => 'Your New Post',
    'slug' => 'your-new-post',
    'content' => '<p>Your content here...</p>',
    'excerpt' => 'Brief description',
    'published_at' => '2024-01-18 12:00:00',
    'featured_image' => null,
    'meta_description' => 'SEO description'
]
```

## Features

- ✅ No database required
- ✅ Simple static content management
- ✅ Modern, responsive design
- ✅ Fast performance
- ✅ Easy to customize

That's it! Your blog is ready to use. 🎉