<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()
                    ->orderBy('published_at', 'desc')
                    ->paginate(10);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                   ->published()
                   ->firstOrFail();

        return view('blog.show', compact('post'));
    }

    public function about()
    {
        return view('blog.about');
    }
}