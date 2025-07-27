@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->meta_description ?: $post->excerpt)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Back to Blog -->
            <div class="mb-4">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Blog
                </a>
            </div>

            <!-- Article Header -->
            <article class="card">
                @if($post->featured_image)
                    <img src="{{ $post->featured_image }}" class="card-img-top" alt="{{ $post->title }}" style="height: 300px; object-fit: cover;">
                @else
                    <div class="bg-gradient text-white p-5 text-center" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); height: 300px; display: flex; align-items: center; justify-content: center;">
                        <div>
                            <i class="fas fa-file-alt mb-3" style="font-size: 4rem;"></i>
                            <h2 class="fw-bold">{{ $post->title }}</h2>
                        </div>
                    </div>
                @endif

                <div class="card-body">
                    <!-- Article Meta -->
                    <div class="mb-4 pb-3 border-bottom">
                        <h1 class="card-title mb-3">{{ $post->title }}</h1>
                        <div class="d-flex align-items-center text-muted">
                            <i class="fas fa-calendar me-2"></i>
                            <span class="me-4">{{ $post->published_at->format('F d, Y') }}</span>
                            <i class="fas fa-clock me-2"></i>
                            <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="content">
                        {!! $post->content !!}
                    </div>

                    <!-- AI Assistant Suggestion -->
                    <div class="mt-5 p-4 bg-light rounded">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h5 class="mb-2">
                                    <i class="fas fa-robot text-primary me-2"></i>
                                    Have Questions About This Article?
                                </h5>
                                <p class="text-muted mb-0">
                                    Our AI assistant can help explain concepts, provide additional insights, or answer any questions you have about this content.
                                </p>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <button class="btn btn-primary" onclick="document.getElementById('chatbotToggle').click(); setTimeout(() => document.getElementById('chatbotInput').value = 'Can you help me understand this article about {{ addslashes($post->title) }}?', 500)">
                                    <i class="fas fa-comments me-2"></i>Ask AI
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Navigation -->
            <div class="row mt-5">
                <div class="col-md-6">
                    @if($previousPost)
                        <a href="{{ route('blog.show', $previousPost->slug) }}" class="btn btn-outline-secondary w-100 text-start">
                            <i class="fas fa-chevron-left me-2"></i>
                            <div>
                                <small class="text-muted d-block">Previous Article</small>
                                <span class="fw-semibold">{{ Str::limit($previousPost->title, 40) }}</span>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    @if($nextPost)
                        <a href="{{ route('blog.show', $nextPost->slug) }}" class="btn btn-outline-secondary w-100 text-end">
                            <div>
                                <small class="text-muted d-block">Next Article</small>
                                <span class="fw-semibold">{{ Str::limit($nextPost->title, 40) }}</span>
                            </div>
                            <i class="fas fa-chevron-right ms-2"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 100px;">
                <!-- Related Posts -->
                @if($relatedPosts->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-newspaper me-2"></i>Related Articles
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="mb-3 {{ !$loop->last ? 'pb-3 border-bottom' : '' }}">
                                    <h6>
                                        <a href="{{ route('blog.show', $relatedPost->slug) }}" class="text-decoration-none">
                                            {{ $relatedPost->title }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $relatedPost->published_at->format('M d, Y') }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- AI Helper -->
                <div class="card">
                    <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
                        <h5 class="mb-0">
                            <i class="fas fa-robot me-2"></i>AI Assistant
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text">Need help understanding this article? Our AI assistant is ready to help!</p>
                        <button class="btn btn-primary w-100" onclick="document.getElementById('chatbotToggle').click()">
                            <i class="fas fa-comments me-2"></i>Start Conversation
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.content h2 {
    color: var(--primary-color);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.content h3 {
    color: var(--text-dark);
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
}

.content p {
    margin-bottom: 1rem;
    line-height: 1.7;
}

.content ul, .content ol {
    margin-bottom: 1rem;
    padding-left: 2rem;
}

.content li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.content strong {
    color: var(--primary-color);
}

.content blockquote {
    border-left: 4px solid var(--primary-color);
    padding-left: 1rem;
    margin: 1.5rem 0;
    font-style: italic;
    background: var(--bg-light);
    padding: 1rem;
    border-radius: 0 8px 8px 0;
}
</style>
@endsection