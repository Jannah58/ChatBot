@extends('layouts.app')

@section('title', 'Security Blog - Zinad')
@section('description', 'Stay informed with the latest cybersecurity insights, threat analysis, and best practices from Zinad security experts.')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold mb-6">Security <span class="text-gradient">Insights</span></h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">
            Stay ahead of cyber threats with expert insights, threat analysis, and security best practices from our team of cybersecurity professionals.
        </p>
    </div>
</section>

<!-- Blog Posts -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="space-y-12">
                    @php
                        $blogPosts = [
                            [
                                'slug' => 'protecting-against-ransomware',
                                'title' => 'Protecting Your Business Against Ransomware Attacks',
                                'excerpt' => 'Learn essential strategies to prevent ransomware attacks and protect your critical business data from cybercriminals.',
                                'date' => 'January 15, 2024',
                                'author' => 'Zinad Security Team',
                                'category' => 'Threat Prevention',
                                'color' => 'from-blue-500 to-cyan-500',
                                'icon' => 'fas fa-shield-virus',
                                'readTime' => '12 min read'
                            ],
                            [
                                'slug' => 'social-engineering-awareness',
                                'title' => 'Social Engineering: The Human Side of Cyber Attacks',
                                'excerpt' => 'Discover how cybercriminals exploit human psychology and learn how to train your team to recognize these threats.',
                                'date' => 'January 10, 2024',
                                'author' => 'Dr. Sarah Mitchell',
                                'category' => 'Security Awareness',
                                'color' => 'from-purple-500 to-pink-500',
                                'icon' => 'fas fa-user-secret',
                                'readTime' => '15 min read'
                            ],
                            [
                                'slug' => 'zero-trust-security',
                                'title' => 'Implementing Zero Trust Security Architecture',
                                'excerpt' => 'Explore the principles of Zero Trust security and how to implement this modern approach in your organization.',
                                'date' => 'January 5, 2024',
                                'author' => 'Michael Chen',
                                'category' => 'Security Architecture',
                                'color' => 'from-green-500 to-teal-500',
                                'icon' => 'fas fa-lock',
                                'readTime' => '18 min read'
                            ]
                        ];
                    @endphp

                    @foreach($blogPosts as $post)
                    <article class="bg-gray-800 rounded-xl overflow-hidden hover-glow transition duration-300">
                        <div class="md:flex">
                            <!-- Featured Image -->
                            <div class="md:w-1/3">
                                <div class="h-64 md:h-full bg-gradient-to-r {{ $post['color'] }} flex items-center justify-center">
                                    <i class="{{ $post['icon'] }} text-white text-6xl"></i>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="md:w-2/3 p-8">
                                <div class="flex items-center gap-4 mb-4">
                                    <span class="bg-gradient-to-r {{ $post['color'] }} text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $post['category'] }}
                                    </span>
                                    <span class="text-gray-400 text-sm">{{ $post['readTime'] }}</span>
                                </div>
                                
                                <h2 class="text-2xl font-bold mb-3">
                                    <a href="{{ route('blog.show', $post['slug']) }}" class="hover:text-blue-400 transition duration-300">
                                        {{ $post['title'] }}
                                    </a>
                                </h2>
                                
                                <p class="text-gray-300 mb-4 line-clamp-3">
                                    {{ $post['excerpt'] }}
                                </p>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">{{ $post['author'] }}</p>
                                            <p class="text-gray-400 text-sm">{{ $post['date'] }}</p>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('blog.show', $post['slug']) }}" class="text-blue-400 hover:text-blue-300 font-semibold transition duration-300">
                                        Read More <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <nav class="flex space-x-2">
                        <button class="px-4 py-2 bg-gray-700 text-gray-400 rounded-lg cursor-not-allowed">
                            <i class="fas fa-chevron-left mr-1"></i> Previous
                        </button>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">1</button>
                        <button class="px-4 py-2 bg-gray-700 text-gray-300 hover:bg-gray-600 rounded-lg transition duration-300">2</button>
                        <button class="px-4 py-2 bg-gray-700 text-gray-300 hover:bg-gray-600 rounded-lg transition duration-300">3</button>
                        <button class="px-4 py-2 bg-gray-700 text-gray-300 hover:bg-gray-600 rounded-lg transition duration-300">
                            Next <i class="fas fa-chevron-right ml-1"></i>
                        </button>
                    </nav>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Search -->
                <div class="bg-gray-800 p-6 rounded-xl">
                    <h3 class="text-xl font-semibold mb-4 text-blue-400">Search Posts</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search security topics..." class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg pl-12 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="bg-gray-800 p-6 rounded-xl">
                    <h3 class="text-xl font-semibold mb-4 text-blue-400">Categories</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition duration-300">
                                <span>Threat Prevention</span>
                                <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs">5</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition duration-300">
                                <span>Security Awareness</span>
                                <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs">8</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition duration-300">
                                <span>Security Architecture</span>
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition duration-300">
                                <span>Incident Response</span>
                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs">4</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-300 hover:text-blue-400 transition duration-300">
                                <span>Compliance</span>
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">6</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Popular Tags -->
                <div class="bg-gray-800 p-6 rounded-xl">
                    <h3 class="text-xl font-semibold mb-4 text-blue-400">Popular Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm hover:bg-blue-500 hover:text-white transition duration-300 cursor-pointer">#ransomware</span>
                        <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm hover:bg-blue-500 hover:text-white transition duration-300 cursor-pointer">#phishing</span>
                        <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm hover:bg-blue-500 hover:text-white transition duration-300 cursor-pointer">#zerotrust</span>
                        <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm hover:bg-blue-500 hover:text-white transition duration-300 cursor-pointer">#cybersecurity</span>
                        <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm hover:bg-blue-500 hover:text-white transition duration-300 cursor-pointer">#training</span>
                        <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm hover:bg-blue-500 hover:text-white transition duration-300 cursor-pointer">#compliance</span>
                        <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm hover:bg-blue-500 hover:text-white transition duration-300 cursor-pointer">#pentesting</span>
                        <span class="bg-gray-700 text-gray-300 px-3 py-1 rounded-full text-sm hover:bg-blue-500 hover:text-white transition duration-300 cursor-pointer">#awareness</span>
                    </div>
                </div>
                
                <!-- Recent Posts -->
                <div class="bg-gray-800 p-6 rounded-xl">
                    <h3 class="text-xl font-semibold mb-4 text-blue-400">Recent Posts</h3>
                    <div class="space-y-4">
                        @foreach(array_slice($blogPosts, 0, 3) as $post)
                        <div class="flex space-x-3">
                            <div class="w-16 h-16 bg-gradient-to-r {{ $post['color'] }} rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="{{ $post['icon'] }} text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-sm mb-1">
                                    <a href="{{ route('blog.show', $post['slug']) }}" class="hover:text-blue-400 transition duration-300">
                                        {{ Str::limit($post['title'], 50) }}
                                    </a>
                                </h4>
                                <p class="text-gray-400 text-xs">{{ $post['date'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Newsletter Signup -->
                <div class="bg-gradient-to-r from-blue-600 to-cyan-600 p-6 rounded-xl text-center">
                    <h3 class="text-xl font-semibold mb-2">Stay Secure</h3>
                    <p class="text-blue-100 text-sm mb-4">Get weekly security insights delivered to your inbox.</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Your email address" class="w-full px-4 py-2 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                        <button type="submit" class="w-full bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection