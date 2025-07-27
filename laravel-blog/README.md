# Simple Laravel Blog (No SQL)

A simple Laravel blog that doesn't require a SQL database. All blog posts are stored in memory as static data in the controller.

## Features

- ✅ No database required
- ✅ Simple in-memory data storage
- ✅ Clean, modern UI
- ✅ Responsive design
- ✅ Easy to customize
- ✅ Fast and lightweight

## How to Add New Posts

To add new blog posts, simply edit the `$posts` array in `app/Http/Controllers/BlogController.php`:

```php
private $posts = [
    [
        'id' => 1,
        'title' => 'Your Post Title',
        'slug' => 'your-post-slug',
        'content' => '<p>Your HTML content here...</p>',
        'excerpt' => 'A short excerpt of your post',
        'published_at' => '2024-01-15 10:00:00',
        'featured_image' => null, // or URL to image
        'meta_description' => 'SEO description'
    ],
    // Add more posts here...
];
```

## Installation

1. Clone or download this project
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Copy `.env.example` to `.env` and configure your environment
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Start the development server:
   ```bash
   php artisan serve
   ```

## File Structure

- `app/Http/Controllers/BlogController.php` - Main controller with blog posts data
- `resources/views/blog/` - Blog templates
- `routes/web.php` - Route definitions

## Benefits of This Approach

- **No Database Setup**: No need to configure MySQL, PostgreSQL, or any other database
- **Simple Deployment**: Just upload files and run
- **Easy Maintenance**: All content is in one file
- **Fast Performance**: No database queries
- **Perfect for Static Content**: Ideal for blogs with infrequent updates

## Customization

- Edit the blog posts in `BlogController.php`
- Modify the views in `resources/views/blog/`
- Update the styling in the layout files
- Add new routes in `routes/web.php`

This approach is perfect for simple blogs, portfolios, or any site where you want to avoid database complexity while still leveraging Laravel's powerful features.