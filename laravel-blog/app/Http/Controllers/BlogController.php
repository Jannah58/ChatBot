<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class BlogController extends Controller
{
    private $posts = [
        [
            'id' => 1,
            'title' => 'Welcome to My Simple Blog',
            'slug' => 'welcome-to-my-simple-blog',
            'content' => '<p>Welcome to my simple Laravel blog! This is a demonstration of how to create a blog without using SQL databases. Instead, we\'re using simple in-memory data structures.</p><p>This approach is perfect for simple blogs, prototypes, or when you want to avoid database complexity.</p><p>You can easily add more posts by editing the controller file and adding new entries to the posts array.</p>',
            'excerpt' => 'Welcome to my simple Laravel blog! This is a demonstration of how to create a blog without using SQL databases.',
            'published_at' => '2024-01-15 10:00:00',
            'featured_image' => null,
            'meta_description' => 'A simple Laravel blog without SQL database'
        ],
        [
            'id' => 2,
            'title' => 'Why Simple is Better',
            'slug' => 'why-simple-is-better',
            'content' => '<p>Sometimes the simplest solution is the best solution. When building a blog, you don\'t always need a complex database setup.</p><p>Using static data or simple file-based storage can be more than sufficient for many use cases. It\'s faster to set up, easier to maintain, and less prone to errors.</p><p>This blog demonstrates that you can create a fully functional blog with just a few lines of code and some static content.</p>',
            'excerpt' => 'Sometimes the simplest solution is the best solution. When building a blog, you don\'t always need a complex database setup.',
            'published_at' => '2024-01-16 14:30:00',
            'featured_image' => null,
            'meta_description' => 'Exploring why simple solutions are often better than complex ones'
        ],
        [
            'id' => 3,
            'title' => 'Getting Started with Laravel',
            'slug' => 'getting-started-with-laravel',
            'content' => '<p>Laravel is a powerful PHP framework that makes web development enjoyable and creative. It provides an elegant syntax and robust features out of the box.</p><p>Even without a database, Laravel offers many useful features like routing, views, controllers, and middleware. You can build impressive applications using just these core features.</p><p>This blog is a perfect example of how you can leverage Laravel\'s strengths without overcomplicating your architecture.</p>',
            'excerpt' => 'Laravel is a powerful PHP framework that makes web development enjoyable and creative. It provides an elegant syntax and robust features out of the box.',
            'published_at' => '2024-01-17 09:15:00',
            'featured_image' => null,
            'meta_description' => 'Introduction to Laravel framework and its core features'
        ]
    ];

    private function convertToObject($postArray)
    {
        $post = (object) $postArray;
        $post->published_at = Carbon::parse($postArray['published_at']);
        return $post;
    }

    private function getPostsCollection()
    {
        return collect($this->posts)->map(function ($post) {
            return $this->convertToObject($post);
        });
    }

    private function getPreviousPost($currentPost)
    {
        return $this->getPostsCollection()
            ->where('published_at', '<', $currentPost->published_at)
            ->sortByDesc('published_at')
            ->first();
    }

    private function getNextPost($currentPost)
    {
        return $this->getPostsCollection()
            ->where('published_at', '>', $currentPost->published_at)
            ->sortBy('published_at')
            ->first();
    }

    private function getRelatedPosts($currentPost, $limit = 3)
    {
        return $this->getPostsCollection()
            ->where('id', '!=', $currentPost->id)
            ->sortByDesc('published_at')
            ->take($limit);
    }

    public function index()
    {
        $posts = $this->getPostsCollection()->sortByDesc('published_at');
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = $this->getPostsCollection()->firstWhere('slug', $slug);
        
        if (!$post) {
            abort(404);
        }

        $previousPost = $this->getPreviousPost($post);
        $nextPost = $this->getNextPost($post);
        $relatedPosts = $this->getRelatedPosts($post);

        return view('blog.show', compact('post', 'previousPost', 'nextPost', 'relatedPosts'));
    }

    public function about()
    {
        return view('blog.about');
    }
}