<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Welcome to Our AI-Powered Blog',
                'content' => '
                    <h2>Welcome to the Future of Blogging</h2>
                    
                    <p>We are excited to introduce you to our revolutionary blog platform that combines traditional blogging with cutting-edge AI technology. Our integrated chatbot, powered by Gemma 2B, is here to enhance your reading experience and answer any questions you might have.</p>
                    
                    <h3>What Makes Us Different?</h3>
                    
                    <ul>
                        <li><strong>AI-Powered Assistance:</strong> Our chatbot can help you understand complex topics, provide additional insights, and answer questions about our blog content.</li>
                        <li><strong>Modern Technology Stack:</strong> Built with Laravel, Docker, and FastAPI for optimal performance and scalability.</li>
                        <li><strong>User-Friendly Design:</strong> Clean, responsive design that works seamlessly across all devices.</li>
                    </ul>
                    
                    <p>Try our chatbot by clicking the chat icon in the bottom right corner. Ask it anything about this post or any other topic you are curious about!</p>
                    
                    <h3>Getting Started</h3>
                    
                    <p>Browse through our articles, engage with our AI assistant, and discover a new way of consuming content. We believe this combination of human creativity and artificial intelligence creates a more engaging and informative experience for our readers.</p>
                ',
                'excerpt' => 'Discover our revolutionary blog platform that combines traditional blogging with cutting-edge AI technology.',
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'meta_description' => 'Welcome to our AI-powered blog platform featuring integrated chatbot assistance and modern web technologies.'
            ],
            [
                'title' => 'Understanding AI and Machine Learning',
                'content' => '
                    <h2>The Fundamentals of Artificial Intelligence</h2>
                    
                    <p>Artificial Intelligence (AI) and Machine Learning (ML) are transforming the way we interact with technology. In this comprehensive guide, we will explore the basics of these revolutionary technologies.</p>
                    
                    <h3>What is Artificial Intelligence?</h3>
                    
                    <p>Artificial Intelligence refers to the simulation of human intelligence in machines that are programmed to think and learn like humans. The term may also be applied to any machine that exhibits traits associated with a human mind such as learning and problem-solving.</p>
                    
                    <h3>Machine Learning Explained</h3>
                    
                    <p>Machine Learning is a subset of AI that provides systems the ability to automatically learn and improve from experience without being explicitly programmed. ML focuses on the development of computer programs that can access data and use it to learn for themselves.</p>
                    
                    <h3>Real-World Applications</h3>
                    
                    <ul>
                        <li><strong>Natural Language Processing:</strong> Like our chatbot that can understand and respond to your questions</li>
                        <li><strong>Image Recognition:</strong> Used in medical diagnosis, autonomous vehicles, and security systems</li>
                        <li><strong>Recommendation Systems:</strong> Powering suggestions on streaming platforms and e-commerce sites</li>
                        <li><strong>Predictive Analytics:</strong> Forecasting weather, stock markets, and customer behavior</li>
                    </ul>
                    
                    <p>Feel free to ask our AI assistant about any of these concepts for more detailed explanations!</p>
                ',
                'excerpt' => 'A comprehensive guide to understanding the fundamentals of Artificial Intelligence and Machine Learning.',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'meta_description' => 'Learn the fundamentals of AI and Machine Learning with practical examples and real-world applications.'
            ],
            [
                'title' => 'Building Modern Web Applications with Laravel and Docker',
                'content' => '
                    <h2>The Power of Containerized Development</h2>
                    
                    <p>Modern web development requires robust, scalable, and maintainable solutions. Laravel combined with Docker provides an excellent foundation for building such applications.</p>
                    
                    <h3>Why Laravel?</h3>
                    
                    <p>Laravel is a web application framework with expressive, elegant syntax. It takes the pain out of development by easing common tasks used in many web projects, such as:</p>
                    
                    <ul>
                        <li>Simple, fast routing engine</li>
                        <li>Powerful dependency injection container</li>
                        <li>Multiple back-ends for session and cache storage</li>
                        <li>Expressive, intuitive database ORM</li>
                        <li>Database agnostic schema migrations</li>
                    </ul>
                    
                    <h3>Docker for Development</h3>
                    
                    <p>Docker allows developers to package applications with all their dependencies into lightweight, portable containers. This ensures consistency across different environments and simplifies deployment.</p>
                    
                    <h3>Benefits of Our Stack</h3>
                    
                    <ul>
                        <li><strong>Consistency:</strong> Same environment across development, testing, and production</li>
                        <li><strong>Scalability:</strong> Easy to scale individual services as needed</li>
                        <li><strong>Maintainability:</strong> Clean separation of concerns and modular architecture</li>
                        <li><strong>Performance:</strong> Optimized containers for fast response times</li>
                    </ul>
                    
                    <p>This very blog is built using these technologies, demonstrating their real-world effectiveness!</p>
                ',
                'excerpt' => 'Explore the benefits of using Laravel and Docker for modern web application development.',
                'is_published' => true,
                'published_at' => now()->subWeek(),
                'meta_description' => 'Learn how Laravel and Docker work together to create modern, scalable web applications.'
            ]
        ];

        foreach ($posts as $postData) {
            $postData['slug'] = Str::slug($postData['title']);
            Post::create($postData);
        }
    }
}