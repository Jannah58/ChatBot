@extends('layouts.app')

@section('title', 'Zinad - Cybersecurity Awareness & Services')
@section('description', 'Leading cybersecurity company providing comprehensive security awareness training and professional services to protect your business from digital threats.')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg py-20">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                Secure Your <span class="text-gradient">Digital Future</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8">
                Comprehensive cybersecurity awareness training and professional services to protect your business from evolving digital threats.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services') }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-8 py-4 rounded-lg font-semibold transition duration-300 hover-glow">
                    <i class="fas fa-shield-alt mr-2"></i>Our Services
                </a>
                <a href="{{ route('contact') }}" class="border-2 border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white px-8 py-4 rounded-lg font-semibold transition duration-300">
                    <i class="fas fa-envelope mr-2"></i>Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-16 bg-gray-800">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div class="space-y-2">
                <div class="text-4xl font-bold text-gradient">95%</div>
                <p class="text-gray-300">Data Breaches Prevented</p>
            </div>
            <div class="space-y-2">
                <div class="text-4xl font-bold text-gradient">500+</div>
                <p class="text-gray-300">Companies Protected</p>
            </div>
            <div class="space-y-2">
                <div class="text-4xl font-bold text-gradient">24/7</div>
                <p class="text-gray-300">Security Monitoring</p>
            </div>
            <div class="space-y-2">
                <div class="text-4xl font-bold text-gradient">10+</div>
                <p class="text-gray-300">Years of Experience</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Our <span class="text-gradient">Security Services</span></h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Comprehensive cybersecurity solutions tailored to protect your business from modern threats.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Security Awareness Training -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-blue-400">Security Awareness Training</h3>
                <p class="text-gray-300 mb-6">
                    Comprehensive training programs to educate your team about cybersecurity best practices and threat recognition.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Phishing Simulation</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Social Engineering Defense</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Password Security</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Mobile Device Security</li>
                </ul>
            </div>
            
            <!-- Vulnerability Assessment -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-search text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-purple-400">Vulnerability Assessment</h3>
                <p class="text-gray-300 mb-6">
                    Identify and evaluate security weaknesses in your systems before malicious actors can exploit them.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Network Scanning</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Web Application Testing</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Configuration Review</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Risk Prioritization</li>
                </ul>
            </div>
            
            <!-- Penetration Testing -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-user-ninja text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-red-400">Penetration Testing</h3>
                <p class="text-gray-300 mb-6">
                    Simulate real-world attacks to test your defenses and identify critical security gaps.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>External Testing</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Internal Testing</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Wireless Testing</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Social Engineering</li>
                </ul>
            </div>
            
            <!-- Security Consulting -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-green-400">Security Consulting</h3>
                <p class="text-gray-300 mb-6">
                    Expert guidance to develop and implement comprehensive cybersecurity strategies for your organization.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Risk Assessment</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Policy Development</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Compliance Support</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Incident Response</li>
                </ul>
            </div>
            
            <!-- Threat Intelligence -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-yellow-400">Threat Intelligence</h3>
                <p class="text-gray-300 mb-6">
                    Stay ahead of emerging threats with real-time intelligence and proactive security monitoring.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Threat Monitoring</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>IOC Analysis</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Dark Web Monitoring</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Alert Management</li>
                </ul>
            </div>
            
            <!-- Security Architecture -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-sitemap text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-indigo-400">Security Architecture</h3>
                <p class="text-gray-300 mb-6">
                    Design and implement robust security architectures that protect your critical assets and data.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Architecture Review</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Zero Trust Design</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Network Segmentation</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Access Control</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-gray-800">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Why Choose <span class="text-gradient">Zinad</span>?</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                We combine cutting-edge technology with human expertise to deliver unparalleled cybersecurity solutions.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center space-y-4">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto">
                    <i class="fas fa-award text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-blue-400">Certified Experts</h3>
                <p class="text-gray-300">Our team holds industry-leading certifications including CISSP, CEH, and OSCP.</p>
            </div>
            
            <div class="text-center space-y-4">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto">
                    <i class="fas fa-clock text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-purple-400">24/7 Support</h3>
                <p class="text-gray-300">Round-the-clock security monitoring and incident response capabilities.</p>
            </div>
            
            <div class="text-center space-y-4">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto">
                    <i class="fas fa-handshake text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-green-400">Trusted Partner</h3>
                <p class="text-gray-300">Over 500 satisfied clients trust us to protect their digital assets.</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blog Posts -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Latest <span class="text-gradient">Security Insights</span></h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Stay informed with the latest cybersecurity trends, threats, and best practices.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Blog Post 1 -->
            <article class="bg-gray-800 rounded-xl overflow-hidden hover-glow transition duration-300">
                <div class="h-48 bg-gradient-to-r from-blue-500 to-cyan-500 flex items-center justify-center">
                    <i class="fas fa-shield-virus text-white text-6xl"></i>
                </div>
                <div class="p-6">
                    <div class="text-sm text-blue-400 mb-2">January 15, 2024</div>
                    <h3 class="text-xl font-semibold mb-3">
                        <a href="{{ route('blog.show', 'protecting-against-ransomware') }}" class="hover:text-blue-400 transition duration-300">
                            Protecting Your Business Against Ransomware Attacks
                        </a>
                    </h3>
                    <p class="text-gray-300 mb-4">
                        Learn essential strategies to prevent ransomware attacks and protect your critical business data from cybercriminals.
                    </p>
                    <a href="{{ route('blog.show', 'protecting-against-ransomware') }}" class="text-blue-400 hover:text-blue-300 font-semibold">
                        Read More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </article>
            
            <!-- Blog Post 2 -->
            <article class="bg-gray-800 rounded-xl overflow-hidden hover-glow transition duration-300">
                <div class="h-48 bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center">
                    <i class="fas fa-user-secret text-white text-6xl"></i>
                </div>
                <div class="p-6">
                    <div class="text-sm text-purple-400 mb-2">January 10, 2024</div>
                    <h3 class="text-xl font-semibold mb-3">
                        <a href="{{ route('blog.show', 'social-engineering-awareness') }}" class="hover:text-purple-400 transition duration-300">
                            Social Engineering: The Human Side of Cyber Attacks
                        </a>
                    </h3>
                    <p class="text-gray-300 mb-4">
                        Discover how cybercriminals exploit human psychology and learn how to train your team to recognize these threats.
                    </p>
                    <a href="{{ route('blog.show', 'social-engineering-awareness') }}" class="text-purple-400 hover:text-purple-300 font-semibold">
                        Read More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </article>
            
            <!-- Blog Post 3 -->
            <article class="bg-gray-800 rounded-xl overflow-hidden hover-glow transition duration-300">
                <div class="h-48 bg-gradient-to-r from-green-500 to-teal-500 flex items-center justify-center">
                    <i class="fas fa-lock text-white text-6xl"></i>
                </div>
                <div class="p-6">
                    <div class="text-sm text-green-400 mb-2">January 5, 2024</div>
                    <h3 class="text-xl font-semibold mb-3">
                        <a href="{{ route('blog.show', 'zero-trust-security') }}" class="hover:text-green-400 transition duration-300">
                            Implementing Zero Trust Security Architecture
                        </a>
                    </h3>
                    <p class="text-gray-300 mb-4">
                        Explore the principles of Zero Trust security and how to implement this modern approach in your organization.
                    </p>
                    <a href="{{ route('blog.show', 'zero-trust-security') }}" class="text-green-400 hover:text-green-300 font-semibold">
                        Read More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </article>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('blog') }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-8 py-4 rounded-lg font-semibold transition duration-300 hover-glow">
                <i class="fas fa-blog mr-2"></i>View All Posts
            </a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-cyan-600">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Secure Your Business?</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Don't wait for a security breach to happen. Contact us today for a free security assessment and learn how we can protect your organization.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-lg font-semibold transition duration-300">
                <i class="fas fa-phone mr-2"></i>Contact Us Today
            </a>
            <a href="{{ route('services') }}" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg font-semibold transition duration-300">
                <i class="fas fa-info-circle mr-2"></i>Learn More
            </a>
        </div>
    </div>
</section>
@endsection