@extends('layouts.app')

@section('content')
@php
    // Simple markdown-like content loading
    $blogPosts = [
        'protecting-against-ransomware' => [
            'title' => 'Protecting Your Business Against Ransomware Attacks',
            'excerpt' => 'Learn essential strategies to prevent ransomware attacks and protect your critical business data from cybercriminals.',
            'date' => 'January 15, 2024',
            'author' => 'Zinad Security Team',
            'category' => 'Threat Prevention',
            'color' => 'from-blue-500 to-cyan-500',
            'icon' => 'fas fa-shield-virus',
            'readTime' => '12 min read',
            'content' => storage_path('blog-posts/protecting-against-ransomware.md')
        ],
        'social-engineering-awareness' => [
            'title' => 'Social Engineering: The Human Side of Cyber Attacks',
            'excerpt' => 'Discover how cybercriminals exploit human psychology and learn how to train your team to recognize these threats.',
            'date' => 'January 10, 2024',
            'author' => 'Dr. Sarah Mitchell',
            'category' => 'Security Awareness',
            'color' => 'from-purple-500 to-pink-500',
            'icon' => 'fas fa-user-secret',
            'readTime' => '15 min read',
            'content' => storage_path('blog-posts/social-engineering-awareness.md')
        ],
        'zero-trust-security' => [
            'title' => 'Implementing Zero Trust Security Architecture',
            'excerpt' => 'Explore the principles of Zero Trust security and how to implement this modern approach in your organization.',
            'date' => 'January 5, 2024',
            'author' => 'Michael Chen',
            'category' => 'Security Architecture',
            'color' => 'from-green-500 to-teal-500',
            'icon' => 'fas fa-lock',
            'readTime' => '18 min read',
            'content' => storage_path('blog-posts/zero-trust-security.md')
        ]
    ];
    
    $post = $blogPosts[$slug] ?? null;
    $content = '';
    
    if ($post && file_exists($post['content'])) {
        $rawContent = file_get_contents($post['content']);
        // Strip YAML front matter
        $content = preg_replace('/^---.*?---\s*/s', '', $rawContent);
        // Simple markdown to HTML conversion
        $content = preg_replace('/^# (.+)$/m', '<h1 class="text-4xl font-bold mb-6">$1</h1>', $content);
        $content = preg_replace('/^## (.+)$/m', '<h2 class="text-3xl font-bold mb-4 mt-8 text-blue-400">$1</h2>', $content);
        $content = preg_replace('/^### (.+)$/m', '<h3 class="text-2xl font-bold mb-3 mt-6">$1</h3>', $content);
        $content = preg_replace('/^\*\*(.+?)\*\*:/m', '<strong class="text-blue-400">$1</strong>:', $content);
        $content = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $content);
        $content = preg_replace('/^- (.+)$/m', '<li class="mb-2">$1</li>', $content);
        $content = preg_replace('/^(\d+)\. (.+)$/m', '<li class="mb-2">$2</li>', $content);
        $content = preg_replace('/\n\n/', '</p><p class="mb-4">', $content);
        $content = '<p class="mb-4">' . $content . '</p>';
        // Wrap consecutive <li> tags in <ul>
        $content = preg_replace('/(<li[^>]*>.*?<\/li>)(\s*<li[^>]*>.*?<\/li>)*/s', '<ul class="list-disc list-inside mb-6 space-y-2 text-gray-300">$0</ul>', $content);
    }
@endphp

@if(!$post)
    <section class="py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold mb-4">Post Not Found</h1>
            <p class="text-gray-400 mb-8">The blog post you're looking for doesn't exist.</p>
            <a href="{{ route('blog') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                Back to Blog
            </a>
        </div>
    </section>
@else
    @section('title', $post['title'] . ' - Zinad Blog')
    @section('description', $post['excerpt'])

    <!-- Blog Post Header -->
    <section class="gradient-bg py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <div class="flex items-center justify-center gap-4 mb-6">
                    <span class="bg-gradient-to-r {{ $post['color'] }} text-white px-4 py-2 rounded-full text-sm font-semibold">
                        {{ $post['category'] }}
                    </span>
                    <span class="text-gray-300">{{ $post['readTime'] }}</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $post['title'] }}</h1>
                
                <div class="flex items-center justify-center space-x-6 text-gray-300">
                    <div class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-gradient-to-r {{ $post['color'] }} rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <span>{{ $post['author'] }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-calendar text-blue-400"></i>
                        <span>{{ $post['date'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Post Content -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <!-- Featured Image -->
                <div class="h-96 bg-gradient-to-r {{ $post['color'] }} rounded-xl flex items-center justify-center mb-12">
                    <i class="{{ $post['icon'] }} text-white text-8xl"></i>
                </div>
                
                <!-- Article Content -->
                <article class="prose prose-lg prose-invert max-w-none">
                    <div class="text-gray-300 leading-relaxed">
                        {!! $content !!}
                    </div>
                </article>
                
                <!-- Share Buttons -->
                <div class="mt-12 pt-8 border-t border-gray-700">
                    <h3 class="text-xl font-semibold mb-4">Share this post</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                            <i class="fab fa-twitter mr-2"></i>Twitter
                        </a>
                        <a href="#" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition duration-300">
                            <i class="fab fa-linkedin mr-2"></i>LinkedIn
                        </a>
                        <a href="#" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                            <i class="fas fa-link mr-2"></i>Copy Link
                        </a>
                    </div>
                </div>
                
                <!-- Author Bio -->
                <div class="mt-12 bg-gray-800 p-8 rounded-xl">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-r {{ $post['color'] }} rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold mb-2">{{ $post['author'] }}</h4>
                            <p class="text-gray-300 mb-4">
                                Cybersecurity expert with over 10 years of experience in threat prevention and security architecture. 
                                Passionate about educating organizations on cybersecurity best practices.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#" class="text-blue-400 hover:text-blue-300 transition duration-300">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                                <a href="#" class="text-blue-400 hover:text-blue-300 transition duration-300">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <div class="mt-12 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <a href="{{ route('blog') }}" class="text-blue-400 hover:text-blue-300 transition duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Blog
                    </a>
                    
                    <div class="flex space-x-4">
                        @if($slug !== 'zero-trust-security')
                        <a href="{{ route('blog.show', array_keys($blogPosts)[array_search($slug, array_keys($blogPosts)) + 1] ?? 'zero-trust-security') }}" 
                           class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                            Next Post <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Posts -->
    <section class="py-20 bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Related <span class="text-gradient">Posts</span></h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach(array_slice(array_filter($blogPosts, function($key) use ($slug) { return $key !== $slug; }, ARRAY_FILTER_USE_KEY), 0, 3) as $relatedSlug => $relatedPost)
                <article class="bg-gray-900 rounded-xl overflow-hidden hover-glow transition duration-300">
                    <div class="h-48 bg-gradient-to-r {{ $relatedPost['color'] }} flex items-center justify-center">
                        <i class="{{ $relatedPost['icon'] }} text-white text-4xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-400 mb-2">{{ $relatedPost['date'] }}</div>
                        <h3 class="text-xl font-semibold mb-3">
                            <a href="{{ route('blog.show', $relatedSlug) }}" class="hover:text-blue-400 transition duration-300">
                                {{ $relatedPost['title'] }}
                            </a>
                        </h3>
                        <p class="text-gray-300 mb-4">{{ $relatedPost['excerpt'] }}</p>
                        <a href="{{ route('blog.show', $relatedSlug) }}" class="text-blue-400 hover:text-blue-300 font-semibold">
                            Read More <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection