<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gamma AI Chatbot</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .chat-container {
            height: calc(100vh - 200px);
        }
        .message-fade-in {
            animation: fadeInUp 0.3s ease-out;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .typing-indicator {
            animation: pulse 1.5s infinite;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen gradient-bg">
        <!-- Header -->
        <div class="bg-white shadow-lg">
            <div class="max-w-4xl mx-auto px-4 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-robot text-white text-lg"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Gamma AI Assistant</h1>
                            <p class="text-sm text-gray-600">Powered by Ollama & Gemma 2B</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div id="status-indicator" class="w-3 h-3 bg-gray-400 rounded-full"></div>
                        <span id="status-text" class="text-sm text-gray-600">Connecting...</span>
                        <button id="clear-chat" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                            <i class="fas fa-trash mr-2"></i>Clear Chat
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Container -->
        <div class="max-w-4xl mx-auto px-4 py-6">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <!-- Chat Messages -->
                <div id="chat-messages" class="chat-container overflow-y-auto p-6 space-y-4">
                    <!-- Welcome Message -->
                    <div class="flex items-start space-x-3 message-fade-in">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-robot text-white text-sm"></i>
                        </div>
                        <div class="bg-gray-100 rounded-lg px-4 py-3 max-w-xs lg:max-w-md">
                            <p class="text-gray-800">Hello! I'm Gamma, your AI assistant. How can I help you today?</p>
                            <span class="text-xs text-gray-500 mt-1 block">{{ now()->format('H:i') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Typing Indicator -->
                <div id="typing-indicator" class="px-6 pb-4 hidden">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-robot text-white text-sm"></i>
                        </div>
                        <div class="bg-gray-100 rounded-lg px-4 py-3">
                            <div class="typing-indicator flex space-x-1">
                                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message Input -->
                <div class="border-t bg-gray-50 p-4">
                    <form id="chat-form" class="flex space-x-3">
                        <input 
                            type="text" 
                            id="message-input" 
                            placeholder="Type your message here..." 
                            class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            maxlength="1000"
                            autocomplete="off"
                        >
                        <button 
                            type="submit" 
                            id="send-button"
                            class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-200 font-medium disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-xs text-gray-500">
                            <span id="char-count">0</span>/1000 characters
                        </span>
                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                            <span>Press Enter to send</span>
                            <span>•</span>
                            <span>Shift+Enter for new line</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center py-6">
            <p class="text-white text-sm opacity-75">
                Powered by Laravel + FastAPI + Ollama
            </p>
        </div>
    </div>

    <script>
        // CSRF Token setup
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // DOM Elements
        const chatMessages = document.getElementById('chat-messages');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');
        const chatForm = document.getElementById('chat-form');
        const typingIndicator = document.getElementById('typing-indicator');
        const statusIndicator = document.getElementById('status-indicator');
        const statusText = document.getElementById('status-text');
        const clearChatButton = document.getElementById('clear-chat');
        const charCount = document.getElementById('char-count');

        // State
        let isWaitingForResponse = false;

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            checkHealth();
            messageInput.focus();
        });

        // Character counter
        messageInput.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // Health check
        async function checkHealth() {
            try {
                const response = await fetch('/chatbot/health');
                const data = await response.json();
                
                if (data.fastapi_status === 'online') {
                    statusIndicator.className = 'w-3 h-3 bg-green-400 rounded-full';
                    statusText.textContent = 'Connected';
                } else {
                    statusIndicator.className = 'w-3 h-3 bg-red-400 rounded-full';
                    statusText.textContent = 'Offline';
                }
            } catch (error) {
                statusIndicator.className = 'w-3 h-3 bg-red-400 rounded-full';
                statusText.textContent = 'Error';
            }
        }

        // Send message
        chatForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const message = messageInput.value.trim();
            if (!message || isWaitingForResponse) return;

            // Add user message to chat
            addMessage(message, 'user');
            messageInput.value = '';
            charCount.textContent = '0';
            
            // Show typing indicator
            showTypingIndicator();
            isWaitingForResponse = true;
            updateSendButton();

            try {
                const response = await fetch('/chatbot/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ message: message })
                });

                const data = await response.json();
                
                if (data.success) {
                    addMessage(data.response, 'bot');
                } else {
                    addMessage('Sorry, I encountered an error: ' + data.error, 'bot', true);
                }
            } catch (error) {
                addMessage('Sorry, I am currently unavailable. Please try again later.', 'bot', true);
            } finally {
                hideTypingIndicator();
                isWaitingForResponse = false;
                updateSendButton();
                messageInput.focus();
            }
        });

        // Clear chat
        clearChatButton.addEventListener('click', async function() {
            if (confirm('Are you sure you want to clear the chat history?')) {
                try {
                    await fetch('/chatbot/clear', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    
                    // Clear messages except welcome
                    const messages = chatMessages.querySelectorAll('.message-fade-in');
                    messages.forEach((msg, index) => {
                        if (index > 0) msg.remove(); // Keep welcome message
                    });
                } catch (error) {
                    console.error('Failed to clear chat:', error);
                }
            }
        });

        // Add message to chat
        function addMessage(text, sender, isError = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex items-start space-x-3 message-fade-in';
            
            const time = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            
            if (sender === 'user') {
                messageDiv.innerHTML = `
                    <div class="flex items-start space-x-3 flex-row-reverse w-full">
                        <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg px-4 py-3 max-w-xs lg:max-w-md">
                            <p>${escapeHtml(text)}</p>
                            <span class="text-xs opacity-75 mt-1 block">${time}</span>
                        </div>
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-robot text-white text-sm"></i>
                    </div>
                    <div class="bg-${isError ? 'red-100' : 'gray-100'} rounded-lg px-4 py-3 max-w-xs lg:max-w-md">
                        <p class="text-${isError ? 'red-800' : 'gray-800'}">${escapeHtml(text)}</p>
                        <span class="text-xs text-${isError ? 'red-500' : 'gray-500'} mt-1 block">${time}</span>
                    </div>
                `;
            }
            
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        // Show/hide typing indicator
        function showTypingIndicator() {
            typingIndicator.classList.remove('hidden');
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function hideTypingIndicator() {
            typingIndicator.classList.add('hidden');
        }

        // Update send button state
        function updateSendButton() {
            sendButton.disabled = isWaitingForResponse;
            if (isWaitingForResponse) {
                sendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            } else {
                sendButton.innerHTML = '<i class="fas fa-paper-plane"></i>';
            }
        }

        // Escape HTML
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Handle Enter key
        messageInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatForm.dispatchEvent(new Event('submit'));
            }
        });

        // Periodic health check
        setInterval(checkHealth, 30000); // Check every 30 seconds
    </script>
</body>
</html>