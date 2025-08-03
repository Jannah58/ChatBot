@extends('layouts.app')

@section('title', 'Contact Us - Zinad')
@section('description', 'Get in touch with Zinad cybersecurity experts. Contact us for a free security consultation, training programs, or any security-related inquiries.')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold mb-6">Contact <span class="text-gradient">Us</span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Ready to strengthen your cybersecurity posture? Get in touch with our experts for a free consultation and discover how we can protect your organization.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-gray-800 p-8 rounded-xl">
                <h2 class="text-3xl font-bold mb-6 text-blue-400">Send us a Message</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-semibold mb-2">First Name *</label>
                            <input type="text" id="first_name" name="first_name" required 
                                   class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-semibold mb-2">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" required 
                                   class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-semibold mb-2">Email Address *</label>
                        <input type="email" id="email" name="email" required 
                               class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="company" class="block text-sm font-semibold mb-2">Company</label>
                        <input type="text" id="company" name="company" 
                               class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-semibold mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" 
                               class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="service" class="block text-sm font-semibold mb-2">Service of Interest</label>
                        <select id="service" name="service" 
                                class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select a service</option>
                            <option value="security-training">Security Awareness Training</option>
                            <option value="vulnerability-assessment">Vulnerability Assessment</option>
                            <option value="penetration-testing">Penetration Testing</option>
                            <option value="security-consulting">Security Consulting</option>
                            <option value="incident-response">Incident Response</option>
                            <option value="compliance">Compliance Management</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-semibold mb-2">Message *</label>
                        <textarea id="message" name="message" rows="5" required 
                                  class="w-full bg-gray-700 text-white px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  placeholder="Tell us about your security needs and how we can help..."></textarea>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="privacy" name="privacy" required 
                               class="mt-1 w-4 h-4 text-blue-500 border-gray-600 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="privacy" class="text-sm text-gray-300">
                            I agree to the <a href="#" class="text-blue-400 hover:text-blue-300">Privacy Policy</a> and consent to Zinad contacting me about cybersecurity services.
                        </label>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-8 py-4 rounded-lg font-semibold transition duration-300 hover-glow">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Get in Touch</h2>
                    <p class="text-gray-300 text-lg mb-8">
                        Our cybersecurity experts are here to help. Whether you need immediate incident response, 
                        want to improve your security posture, or have questions about our services, we're ready to assist.
                    </p>
                </div>
                
                <!-- Contact Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-800 p-6 rounded-xl hover-glow transition duration-300">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-blue-400">Phone</h3>
                        <p class="text-gray-300">+1 (555) 123-4567</p>
                        <p class="text-gray-400 text-sm">24/7 Emergency Hotline</p>
                    </div>
                    
                    <div class="bg-gray-800 p-6 rounded-xl hover-glow transition duration-300">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-purple-400">Email</h3>
                        <p class="text-gray-300">info@zinad.com</p>
                        <p class="text-gray-400 text-sm">General Inquiries</p>
                    </div>
                    
                    <div class="bg-gray-800 p-6 rounded-xl hover-glow transition duration-300">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-green-400">Address</h3>
                        <p class="text-gray-300">123 Security Boulevard</p>
                        <p class="text-gray-300">New York, NY 10001</p>
                    </div>
                    
                    <div class="bg-gray-800 p-6 rounded-xl hover-glow transition duration-300">
                        <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 text-red-400">Business Hours</h3>
                        <p class="text-gray-300">Mon - Fri: 9:00 AM - 6:00 PM</p>
                        <p class="text-gray-400 text-sm">Emergency support 24/7</p>
                    </div>
                </div>
                
                <!-- Emergency Contact -->
                <div class="bg-red-900/20 border border-red-500/30 p-6 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-red-400">Security Emergency?</h3>
                    </div>
                    <p class="text-gray-300 mb-4">
                        If you're experiencing an active security incident, contact our emergency response team immediately.
                    </p>
                    <a href="tel:+15551234567" class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 inline-block">
                        <i class="fas fa-phone mr-2"></i>Emergency Hotline
                    </a>
                </div>
                
                <!-- Social Media -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition duration-300">
                            <i class="fab fa-linkedin text-white"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center hover:bg-blue-600 transition duration-300">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-800 rounded-lg flex items-center justify-center hover:bg-blue-900 transition duration-300">
                            <i class="fab fa-facebook text-white"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-600 transition duration-300">
                            <i class="fab fa-github text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-800">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Frequently Asked <span class="text-gradient">Questions</span></h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Quick answers to common questions about our cybersecurity services.
            </p>
        </div>
        
        <div class="max-w-4xl mx-auto space-y-6">
            <div class="bg-gray-900 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-700 transition duration-300">
                    <h3 class="text-lg font-semibold">How quickly can you respond to a security incident?</h3>
                    <i class="fas fa-chevron-down text-blue-400"></i>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-300">
                        Our incident response team is available 24/7 and can typically respond to critical security incidents within 1-2 hours. 
                        We maintain a rapid response capability to minimize damage and begin containment procedures immediately.
                    </p>
                </div>
            </div>
            
            <div class="bg-gray-900 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-700 transition duration-300">
                    <h3 class="text-lg font-semibold">What industries do you serve?</h3>
                    <i class="fas fa-chevron-down text-blue-400"></i>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-300">
                        We serve organizations across all industries, including healthcare, financial services, government, education, 
                        retail, manufacturing, and technology. Our security solutions are customized to meet industry-specific compliance 
                        requirements and threat landscapes.
                    </p>
                </div>
            </div>
            
            <div class="bg-gray-900 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-700 transition duration-300">
                    <h3 class="text-lg font-semibold">Do you offer remote security services?</h3>
                    <i class="fas fa-chevron-down text-blue-400"></i>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-300">
                        Yes, many of our services can be delivered remotely, including security awareness training, vulnerability assessments, 
                        penetration testing, and security consulting. We use secure, encrypted connections to ensure the confidentiality 
                        of your data during remote engagements.
                    </p>
                </div>
            </div>
            
            <div class="bg-gray-900 rounded-xl overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-700 transition duration-300">
                    <h3 class="text-lg font-semibold">How do you ensure the confidentiality of our data?</h3>
                    <i class="fas fa-chevron-down text-blue-400"></i>
                </button>
                <div class="px-6 pb-4">
                    <p class="text-gray-300">
                        We maintain strict confidentiality through comprehensive NDAs, secure data handling procedures, and access controls. 
                        Our team follows industry best practices for data protection, and we can work within your specific compliance 
                        requirements such as HIPAA, SOX, or PCI DSS.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Visit Our <span class="text-gradient">Office</span></h2>
            <p class="text-xl text-gray-300">
                Located in the heart of New York's cybersecurity district.
            </p>
        </div>
        
        <div class="bg-gray-800 p-8 rounded-xl">
            <div class="h-96 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                <div class="text-center text-white">
                    <i class="fas fa-map-marker-alt text-6xl mb-4"></i>
                    <h3 class="text-2xl font-bold mb-2">Zinad Headquarters</h3>
                    <p class="text-xl">123 Security Boulevard, New York, NY 10001</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection