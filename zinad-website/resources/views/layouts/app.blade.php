<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Zinad - Cybersecurity Awareness & Services')</title>
    <meta name="description" content="@yield('description', 'Zinad provides comprehensive cybersecurity awareness training and professional security services to protect your business from digital threats.')">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0f1419 0%, #1a2a3a 50%, #2d3748 100%);
        }
        .cyber-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }
        .hover-glow:hover {
            box-shadow: 0 0 25px rgba(59, 130, 246, 0.5);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        .text-gradient {
            background: linear-gradient(135deg, #3b82f6, #06b6d4, #10b981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .floating-chat-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.4);
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .chat-modal {
            display: none;
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 350px;
            height: 500px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            z-index: 1001;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Header -->
    <header class="gradient-bg shadow-2xl border-b border-blue-500/20">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold text-gradient">Zinad</span>
                </div>
                
                <!-- Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="hover:text-blue-400 transition duration-300 {{ request()->routeIs('home') ? 'text-blue-400' : '' }}">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="{{ route('services') }}" class="hover:text-blue-400 transition duration-300 {{ request()->routeIs('services') ? 'text-blue-400' : '' }}">
                        <i class="fas fa-shield-alt mr-2"></i>Services
                    </a>
                    <a href="{{ route('blog') }}" class="hover:text-blue-400 transition duration-300 {{ request()->routeIs('blog*') ? 'text-blue-400' : '' }}">
                        <i class="fas fa-blog mr-2"></i>Blog
                    </a>
                    <a href="{{ route('about') }}" class="hover:text-blue-400 transition duration-300 {{ request()->routeIs('about') ? 'text-blue-400' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i>About
                    </a>
                    <a href="{{ route('contact') }}" class="hover:text-blue-400 transition duration-300 {{ request()->routeIs('contact') ? 'text-blue-400' : '' }}">
                        <i class="fas fa-envelope mr-2"></i>Contact
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-white hover:text-blue-400">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-4">
                <a href="{{ route('home') }}" class="block hover:text-blue-400 transition duration-300">
                    <i class="fas fa-home mr-2"></i>Home
                </a>
                <a href="{{ route('services') }}" class="block hover:text-blue-400 transition duration-300">
                    <i class="fas fa-shield-alt mr-2"></i>Services
                </a>
                <a href="{{ route('blog') }}" class="block hover:text-blue-400 transition duration-300">
                    <i class="fas fa-blog mr-2"></i>Blog
                </a>
                <a href="{{ route('about') }}" class="block hover:text-blue-400 transition duration-300">
                    <i class="fas fa-info-circle mr-2"></i>About
                </a>
                <a href="{{ route('contact') }}" class="block hover:text-blue-400 transition duration-300">
                    <i class="fas fa-envelope mr-2"></i>Contact
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="gradient-bg border-t border-blue-500/20 mt-16">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <span class="text-xl font-bold text-gradient">Zinad</span>
                    </div>
                    <p class="text-gray-300">
                        Protecting businesses from cyber threats through comprehensive security awareness training and professional services.
                    </p>
                </div>
                
                <!-- Services -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-blue-400">Services</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Security Awareness Training</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Vulnerability Assessment</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Penetration Testing</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Security Consulting</a></li>
                    </ul>
                </div>
                
                <!-- Resources -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-blue-400">Resources</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><a href="{{ route('blog') }}" class="hover:text-blue-400 transition duration-300">Security Blog</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Best Practices</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Security Tips</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Threat Intelligence</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-blue-400">Contact</h3>
                    <div class="space-y-2 text-gray-300">
                        <p><i class="fas fa-envelope mr-2 text-blue-400"></i>info@zinad.com</p>
                        <p><i class="fas fa-phone mr-2 text-blue-400"></i>+1 (555) 123-4567</p>
                        <p><i class="fas fa-map-marker-alt mr-2 text-blue-400"></i>New York, NY</p>
                    </div>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition duration-300">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition duration-300">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-blue-400 transition duration-300">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Zinad. All rights reserved. | Securing your digital future.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Chatbot Button -->
    <button id="chatbot-btn" class="floating-chat-btn w-16 h-16 rounded-full text-white flex items-center justify-center hover-glow">
        <i class="fas fa-comments text-xl"></i>
    </button>

    <!-- Chatbot Modal -->
    <div id="chatbot-modal" class="chat-modal">
        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 p-4 rounded-t-16">
            <div class="flex items-center justify-between">
                <h3 class="text-white font-semibold">Zinad Security Assistant</h3>
                <button id="close-chat" class="text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="flex-1 p-4">
            <iframe 
                id="chatbot-iframe"
                src="http://localhost:8000" 
                class="w-full h-full border-0 rounded-b-16"
                style="height: 400px;">
            </iframe>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Chatbot functionality
        const chatbotBtn = document.getElementById('chatbot-btn');
        const chatbotModal = document.getElementById('chatbot-modal');
        const closeChatBtn = document.getElementById('close-chat');

        chatbotBtn.addEventListener('click', function() {
            chatbotModal.style.display = 'block';
        });

        closeChatBtn.addEventListener('click', function() {
            chatbotModal.style.display = 'none';
        });

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            if (!chatbotModal.contains(event.target) && !chatbotBtn.contains(event.target)) {
                chatbotModal.style.display = 'none';
            }
        });
    </script>
</body>
</html>