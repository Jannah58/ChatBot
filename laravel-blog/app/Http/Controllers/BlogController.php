<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = collect([
            (object) [
                'id' => 1,
                'title' => 'Welcome to Laravel Chatbot',
                'slug' => 'welcome-to-laravel-chatbot',
                'excerpt' => 'This is a simple Laravel application with an integrated AI chatbot.',
                'content' => 'This blog demonstrates how to build a Laravel application with an AI chatbot integration. You can chat with the AI using the chat interface on this site.',
                'published_at' => now()->subDays(1),
                'author' => 'Laravel Team'
            ],
            (object) [
                'id' => 2,
                'title' => 'How to Use the Chatbot',
                'slug' => 'how-to-use-chatbot',
                'excerpt' => 'Learn how to interact with our AI-powered chatbot.',
                'content' => 'Our chatbot is powered by Ollama and can help answer questions, provide information, and have conversations. Simply type your message and press enter to get started.',
                'published_at' => now()->subDays(2),
                'author' => 'AI Team'
            ],
            (object) [
                'id' => 3,
                'title' => 'Docker Setup Guide',
                'slug' => 'docker-setup-guide',
                'excerpt' => 'Complete guide to setting up this application with Docker.',
                'content' => 'This application is fully containerized using Docker. It includes Laravel, Ollama AI service, and a Python FastAPI chatbot service all running in separate containers.',
                'published_at' => now()->subDays(3),
                'author' => 'DevOps Team'
            ]
        ]);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $posts = collect([
            (object) [
                'id' => 1,
                'title' => 'Welcome to Laravel Chatbot',
                'slug' => 'welcome-to-laravel-chatbot',
                'excerpt' => 'This is a simple Laravel application with an integrated AI chatbot.',
                'content' => 'This blog demonstrates how to build a Laravel application with an AI chatbot integration. You can chat with the AI using the chat interface on this site.',
                'published_at' => now()->subDays(1),
                'author' => 'Laravel Team'
            ],
            (object) [
                'id' => 2,
                'title' => 'How to Use the Chatbot',
                'slug' => 'how-to-use-chatbot',
                'excerpt' => 'Learn how to interact with our AI-powered chatbot.',
                'content' => 'Our chatbot is powered by Ollama and can help answer questions, provide information, and have conversations. Simply type your message and press enter to get started.',
                'published_at' => now()->subDays(2),
                'author' => 'AI Team'
            ],
            (object) [
                'id' => 3,
                'title' => 'Docker Setup Guide',
                'slug' => 'docker-setup-guide',
                'excerpt' => 'Complete guide to setting up this application with Docker.',
                'content' => 'This application is fully containerized using Docker. It includes Laravel, Ollama AI service, and a Python FastAPI chatbot service all running in separate containers.',
                'published_at' => now()->subDays(3),
                'author' => 'DevOps Team'
            ]
        ]);

        $post = $posts->firstWhere('slug', $slug);
        
        if (!$post) {
            abort(404);
        }

        return view('blog.show', compact('post'));
    }

    public function about()
    {
        return view('blog.about');
    }
}