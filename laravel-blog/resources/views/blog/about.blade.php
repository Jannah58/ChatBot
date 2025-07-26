@extends('layouts.app')

@section('title', 'About')
@section('meta_description', 'Learn about our AI-powered blog platform, the technology stack we use, and how our integrated chatbot enhances your reading experience.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">About Our Platform</h1>
                <p class="lead mb-4">
                    We're revolutionizing the blogging experience by combining high-quality content with cutting-edge AI technology.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-laptop-code" style="font-size: 200px; opacity: 0.3;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Mission Section -->
            <section class="mb-5">
                <h2 class="mb-4">Our Mission</h2>
                <p class="lead">
                    To create an innovative blogging platform that enhances the reading and learning experience through AI-powered assistance, making complex topics more accessible and engaging for everyone.
                </p>
            </section>

            <!-- Technology Stack -->
            <section class="mb-5">
                <h2 class="mb-4">Technology Stack</h2>
                <p>
                    Our platform is built using modern, scalable technologies to ensure optimal performance, security, and maintainability:
                </p>

                <div class="row mt-4">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fab fa-laravel text-danger me-2"></i>Laravel Framework
                                </h5>
                                <p class="card-text">
                                    Robust PHP framework providing elegant syntax, powerful features, and excellent security for our web application backend.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fab fa-docker text-primary me-2"></i>Docker Containers
                                </h5>
                                <p class="card-text">
                                    Containerized architecture ensuring consistent deployment, easy scaling, and isolated service management.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fab fa-python text-warning me-2"></i>FastAPI + Python
                                </h5>
                                <p class="card-text">
                                    High-performance API framework powering our AI chatbot service with excellent async support and automatic documentation.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-robot text-success me-2"></i>Ollama + Gemma 2B
                                </h5>
                                <p class="card-text">
                                    Lightweight AI model service providing intelligent responses and content assistance through advanced language processing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features -->
            <section class="mb-5">
                <h2 class="mb-4">Key Features</h2>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-comments text-primary me-2"></i>
                                    Intelligent AI Chatbot
                                </h5>
                                <p class="card-text">
                                    Our integrated AI assistant can help explain complex concepts, answer questions about articles, 
                                    and provide additional insights to enhance your understanding of the content.
                                </p>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-mobile-alt text-success me-2"></i>
                                    Responsive Design
                                </h5>
                                <p class="card-text">
                                    Fully responsive interface that provides an optimal reading experience across all devices, 
                                    from desktop computers to mobile phones.
                                </p>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-tachometer-alt text-warning me-2"></i>
                                    High Performance
                                </h5>
                                <p class="card-text">
                                    Optimized for speed with efficient caching, containerized services, and modern web technologies 
                                    ensuring fast page loads and smooth interactions.
                                </p>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-shield-alt text-info me-2"></i>
                                    Secure & Reliable
                                </h5>
                                <p class="card-text">
                                    Built with security best practices, including proper data validation, CSRF protection, 
                                    and secure communication between services.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Architecture -->
            <section class="mb-5">
                <h2 class="mb-4">System Architecture</h2>
                <p>
                    Our platform follows a microservices architecture with the following components:
                </p>

                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3 mb-3">
                                <div class="p-3 border rounded">
                                    <i class="fas fa-globe text-primary mb-2" style="font-size: 2rem;"></i>
                                    <h6>Web Frontend</h6>
                                    <small class="text-muted">Laravel + Bootstrap</small>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="p-3 border rounded">
                                    <i class="fas fa-database text-success mb-2" style="font-size: 2rem;"></i>
                                    <h6>Database</h6>
                                    <small class="text-muted">MySQL 8.0</small>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="p-3 border rounded">
                                    <i class="fas fa-cog text-warning mb-2" style="font-size: 2rem;"></i>
                                    <h6>AI Service</h6>
                                    <small class="text-muted">FastAPI + LangChain</small>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="p-3 border rounded">
                                    <i class="fas fa-brain text-info mb-2" style="font-size: 2rem;"></i>
                                    <h6>AI Model</h6>
                                    <small class="text-muted">Ollama + Gemma 2B</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact -->
            <section class="mb-5">
                <h2 class="mb-4">Get in Touch</h2>
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <h5 class="card-title">Have Questions or Feedback?</h5>
                        <p class="card-text">
                            We'd love to hear from you! Try our AI assistant for instant help, or reach out to us directly.
                        </p>
                        <button class="btn btn-primary me-3" onclick="document.getElementById('chatbotToggle').click()">
                            <i class="fas fa-comments me-2"></i>Chat with AI
                        </button>
                        <a href="mailto:hello@ai-blog.com" class="btn btn-outline-primary">
                            <i class="fas fa-envelope me-2"></i>Email Us
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 100px;">
                <!-- Quick Stats -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-chart-bar me-2"></i>Platform Stats
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $totalPosts = \App\Models\Post::published()->count();
                        @endphp
                        <div class="d-flex justify-content-between mb-2">
                            <span>Published Articles:</span>
                            <strong>{{ $totalPosts }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Services Running:</span>
                            <strong>5</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>AI Model:</span>
                            <strong>Gemma 2B</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Response Time:</span>
                            <strong>&lt; 2s</strong>
                        </div>
                    </div>
                </div>

                <!-- Tech Stack -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-code me-2"></i>Technologies Used
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-danger me-1">Laravel</span>
                            <span class="badge bg-primary me-1">Docker</span>
                        </div>
                        <div class="mb-2">
                            <span class="badge bg-warning me-1">FastAPI</span>
                            <span class="badge bg-success me-1">MySQL</span>
                        </div>
                        <div class="mb-2">
                            <span class="badge bg-info me-1">Bootstrap</span>
                            <span class="badge bg-secondary me-1">Nginx</span>
                        </div>
                        <div class="mb-2">
                            <span class="badge bg-dark me-1">LangChain</span>
                            <span class="badge bg-purple me-1" style="background-color: #6f42c1;">Ollama</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection