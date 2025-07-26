@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'Welcome to our AI-powered blog featuring the latest articles on technology, AI, and web development with integrated chatbot assistance.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Welcome to the Future of Blogging
                </h1>
                <p class="lead mb-4">
                    Discover engaging articles enhanced by AI technology. Our integrated chatbot is here to help you understand content, answer questions, and provide additional insights.
                </p>
                <div class="d-flex gap-3">
                    <a href="#posts" class="btn btn-primary btn-lg">
                        <i class="fas fa-book-open me-2"></i>Read Articles
                    </a>
                    <button class="btn btn-outline-light btn-lg" onclick="document.getElementById('chatbotToggle').click()">
                        <i class="fas fa-robot me-2"></i>Try AI Assistant
                    </button>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="position-relative">
                    <i class="fas fa-robot" style="font-size: 200px; opacity: 0.2;"></i>
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <div class="bg-white p-4 rounded-3 shadow">
                            <i class="fas fa-brain text-primary" style="font-size: 60px;"></i>
                            <h5 class="mt-3 text-dark">AI-Powered</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-robot text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">AI Assistant</h5>
                        <p class="card-text">Get instant help understanding articles, explanations of complex topics, and answers to your questions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-mobile-alt text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Responsive Design</h5>
                        <p class="card-text">Enjoy a seamless reading experience across all devices with our modern, mobile-friendly interface.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <i class="fas fa-rocket text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Modern Tech Stack</h5>
                        <p class="card-text">Built with Laravel, Docker, and FastAPI for optimal performance, scalability, and maintainability.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="py-5" id="posts">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Latest Articles</h2>
                <p class="lead text-muted">Explore our collection of articles on technology, AI, and web development</p>
            </div>
        </div>

        @if($posts->count() > 0)
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-6 col-xl-4 mb-4">
                    <article class="card h-100">
                        @if($post->featured_image)
                            <img src="{{ $post->featured_image }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-gradient text-white p-5 text-center" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); height: 200px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-file-alt" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $post->published_at->format('M d, Y') }}
                                </small>
                            </div>
                            
                            <h5 class="card-title">
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                </a>
                            </h5>
                            
                            <p class="card-text text-muted">{{ $post->excerpt }}</p>
                            
                            <div class="mt-auto">
                                <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <div class="py-5">
                        <i class="fas fa-newspaper text-muted mb-3" style="font-size: 4rem;"></i>
                        <h3 class="text-muted">No posts yet</h3>
                        <p class="text-muted">Check back soon for exciting content!</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-gradient text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
    <div class="container text-center">
        <h3 class="mb-3">Ready to Experience AI-Enhanced Reading?</h3>
        <p class="lead mb-4">Try our AI assistant to get instant help with any questions or topics</p>
        <button class="btn btn-light btn-lg" onclick="document.getElementById('chatbotToggle').click()">
            <i class="fas fa-comments me-2"></i>Start Chatting
        </button>
    </div>
</section>
@endsection