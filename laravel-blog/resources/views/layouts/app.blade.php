<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'AI-Powered Blog with Integrated Chatbot')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AI Blog') - Laravel Blog with Chatbot</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --text-dark: #2d3748;
            --text-light: #4a5568;
            --bg-light: #f7fafc;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 80px 0;
        }

        .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .footer {
            background: var(--text-dark);
            color: white;
            padding: 40px 0;
            margin-top: 60px;
        }

        /* Chatbot Styles */
        .chatbot-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .chatbot-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(0,0,0,0.2);
        }

        .chatbot-widget {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            height: 500px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.15);
            z-index: 999;
            display: none;
            flex-direction: column;
            overflow: hidden;
        }

        .chatbot-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chatbot-messages {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .message {
            max-width: 80%;
            padding: 10px 15px;
            border-radius: 18px;
            word-wrap: break-word;
        }

        .message.user {
            background: var(--primary-color);
            color: white;
            align-self: flex-end;
            margin-left: auto;
        }

        .message.bot {
            background: var(--bg-light);
            color: var(--text-dark);
            align-self: flex-start;
        }

        .chatbot-input {
            padding: 15px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            gap: 10px;
        }

        .chatbot-input input {
            flex: 1;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 10px 15px;
            outline: none;
        }

        .chatbot-input button {
            background: var(--primary-color);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .status-indicator {
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .status-ready { background: #48bb78; color: white; }
        .status-loading { background: #ed8936; color: white; }
        .status-error { background: #f56565; color: white; }

        @media (max-width: 768px) {
            .chatbot-widget {
                width: calc(100vw - 40px);
                right: 20px;
                left: 20px;
                height: 400px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('blog.index') }}">
                <i class="fas fa-robot me-2"></i>AI Blog
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-robot me-2"></i>AI-Powered Blog</h5>
                    <p>A modern blog platform with integrated AI chatbot assistance.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>&copy; {{ date('Y') }} AI Blog. Built with Laravel & Docker.</p>
                    <div class="mt-2">
                        <span class="badge bg-success me-2">Laravel</span>
                        <span class="badge bg-info me-2">Docker</span>
                        <span class="badge bg-warning">AI-Powered</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Chatbot Toggle Button -->
    <button class="chatbot-toggle" id="chatbotToggle">
        <i class="fas fa-comments"></i>
    </button>

    <!-- Chatbot Widget -->
    <div class="chatbot-widget" id="chatbotWidget">
        <div class="chatbot-header">
            <div>
                <strong>AI Assistant</strong>
                <div class="status-indicator" id="chatbotStatus">
                    <i class="fas fa-circle-notch fa-spin"></i> Connecting...
                </div>
            </div>
            <button class="btn btn-sm text-white" id="closeChatbot">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="chatbot-messages" id="chatbotMessages">
            <div class="message bot">
                👋 Hello! I'm your AI assistant. I can help you understand our blog content or answer any questions you have. What would you like to know?
            </div>
        </div>
        
        <div class="chatbot-input">
            <input type="text" id="chatbotInput" placeholder="Type your message..." disabled>
            <button id="sendMessage" disabled>
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chatbot Script -->
    <script>
        const chatbotToggle = document.getElementById('chatbotToggle');
        const chatbotWidget = document.getElementById('chatbotWidget');
        const closeChatbot = document.getElementById('closeChatbot');
        const chatbotInput = document.getElementById('chatbotInput');
        const sendMessage = document.getElementById('sendMessage');
        const chatbotMessages = document.getElementById('chatbotMessages');
        const chatbotStatus = document.getElementById('chatbotStatus');

        let isOpen = false;

        // Toggle chatbot visibility
        chatbotToggle.addEventListener('click', () => {
            isOpen = !isOpen;
            chatbotWidget.style.display = isOpen ? 'flex' : 'none';
            if (isOpen) {
                checkChatbotStatus();
            }
        });

        closeChatbot.addEventListener('click', () => {
            isOpen = false;
            chatbotWidget.style.display = 'none';
        });

        // Check chatbot status
        async function checkChatbotStatus() {
            try {
                const response = await fetch('/chatbot/status');
                const data = await response.json();
                
                updateStatus(data.status, data.message);
                
                if (data.status === 'ready') {
                    chatbotInput.disabled = false;
                    sendMessage.disabled = false;
                } else {
                    chatbotInput.disabled = true;
                    sendMessage.disabled = true;
                }
            } catch (error) {
                updateStatus('error', 'Connection failed');
            }
        }

        function updateStatus(status, message) {
            const statusElement = chatbotStatus;
            statusElement.className = 'status-indicator status-' + status;
            
            switch (status) {
                case 'ready':
                    statusElement.innerHTML = '<i class="fas fa-check-circle"></i> Ready';
                    break;
                case 'loading':
                    statusElement.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Loading...';
                    break;
                case 'error':
                    statusElement.innerHTML = '<i class="fas fa-exclamation-circle"></i> Error';
                    break;
                default:
                    statusElement.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Connecting...';
            }
        }

        // Send message
        async function sendChatMessage() {
            const message = chatbotInput.value.trim();
            if (!message) return;

            // Add user message
            addMessage(message, 'user');
            chatbotInput.value = '';

            // Show loading
            const loadingMessage = addMessage('<i class="fas fa-circle-notch fa-spin"></i> Thinking...', 'bot');

            try {
                const response = await fetch('/chatbot/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({ message })
                });

                const data = await response.json();
                
                // Remove loading message
                loadingMessage.remove();

                if (data.response) {
                    addMessage(data.response, 'bot');
                } else if (data.error) {
                    addMessage('Sorry, ' + data.error, 'bot');
                }
            } catch (error) {
                loadingMessage.remove();
                addMessage('Sorry, I encountered an error. Please try again.', 'bot');
            }
        }

        function addMessage(text, type) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${type}`;
            messageDiv.innerHTML = text;
            chatbotMessages.appendChild(messageDiv);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            return messageDiv;
        }

        // Event listeners
        sendMessage.addEventListener('click', sendChatMessage);
        chatbotInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendChatMessage();
            }
        });

        // Check status periodically
        setInterval(checkChatbotStatus, 10000);
    </script>

    @yield('scripts')
</body>
</html>