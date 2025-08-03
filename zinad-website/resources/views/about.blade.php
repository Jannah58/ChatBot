@extends('layouts.app')

@section('title', 'About Us - Zinad')
@section('description', 'Learn about Zinad team of cybersecurity experts, our mission to protect businesses from cyber threats, and our commitment to security excellence.')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold mb-6">About <span class="text-gradient">Zinad</span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            We are a team of passionate cybersecurity experts dedicated to protecting businesses from evolving digital threats through comprehensive security solutions and education.
        </p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold mb-6">Our <span class="text-gradient">Mission</span></h2>
                <p class="text-gray-300 text-lg mb-6">
                    To empower organizations with the knowledge, tools, and strategies needed to defend against cyber threats 
                    and maintain business continuity in an increasingly connected world.
                </p>
                <p class="text-gray-300 mb-8">
                    We believe that cybersecurity is not just about technology—it's about people, processes, and partnerships. 
                    Our approach combines cutting-edge security solutions with human-centered awareness training to create 
                    comprehensive defense strategies.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-400">500+</div>
                        <div class="text-gray-300">Companies Protected</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-400">10+</div>
                        <div class="text-gray-300">Years Experience</div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-800 p-8 rounded-xl">
                <div class="h-80 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shield-alt text-white text-8xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-20 bg-gray-800">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Our <span class="text-gradient">Values</span></h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                The principles that guide our approach to cybersecurity and client relationships.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-check text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-400">Integrity</h3>
                <p class="text-gray-300">
                    We maintain the highest ethical standards in all our security practices and client relationships.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-purple-400">Innovation</h3>
                <p class="text-gray-300">
                    We continuously evolve our approaches to stay ahead of emerging threats and technologies.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-green-400">Collaboration</h3>
                <p class="text-gray-300">
                    We work closely with our clients as partners to build comprehensive security strategies.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-red-400">Excellence</h3>
                <p class="text-gray-300">
                    We strive for excellence in every project, delivering results that exceed expectations.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Our <span class="text-gradient">Team</span></h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Meet the cybersecurity experts dedicated to protecting your organization.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-800 p-6 rounded-xl text-center hover-glow transition duration-300">
                <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Sarah Mitchell</h3>
                <p class="text-blue-400 mb-3">Chief Security Officer</p>
                <p class="text-gray-300 mb-4">
                    15+ years experience in cybersecurity with expertise in threat intelligence and incident response. CISSP, CISM certified.
                </p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-blue-400 hover:text-blue-300"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-blue-400 hover:text-blue-300"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="bg-gray-800 p-6 rounded-xl text-center hover-glow transition duration-300">
                <div class="w-24 h-24 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Michael Chen</h3>
                <p class="text-purple-400 mb-3">Lead Security Architect</p>
                <p class="text-gray-300 mb-4">
                    Expert in zero trust architecture and cloud security. 12+ years experience in designing secure infrastructures. SABSA, TOGAF certified.
                </p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-purple-400 hover:text-purple-300"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-purple-400 hover:text-purple-300"><i class="fab fa-github"></i></a>
                </div>
            </div>
            
            <div class="bg-gray-800 p-6 rounded-xl text-center hover-glow transition duration-300">
                <div class="w-24 h-24 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Alex Rodriguez</h3>
                <p class="text-green-400 mb-3">Penetration Testing Lead</p>
                <p class="text-gray-300 mb-4">
                    Ethical hacker with 10+ years in penetration testing and vulnerability research. OSCP, CEH, GPEN certified.
                </p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-green-400 hover:text-green-300"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-green-400 hover:text-green-300"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="bg-gray-800 p-6 rounded-xl text-center hover-glow transition duration-300">
                <div class="w-24 h-24 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Emma Thompson</h3>
                <p class="text-red-400 mb-3">Security Awareness Manager</p>
                <p class="text-gray-300 mb-4">
                    Specialist in human-centered security education and behavioral change. 8+ years experience in corporate training and awareness programs.
                </p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-red-400 hover:text-red-300"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-red-400 hover:text-red-300"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="bg-gray-800 p-6 rounded-xl text-center hover-glow transition duration-300">
                <div class="w-24 h-24 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">David Park</h3>
                <p class="text-yellow-400 mb-3">Compliance Director</p>
                <p class="text-gray-300 mb-4">
                    Expert in regulatory compliance and risk management. 14+ years experience with ISO 27001, SOC 2, and GDPR implementations.
                </p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-yellow-400 hover:text-yellow-300"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-yellow-400 hover:text-yellow-300"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
            <div class="bg-gray-800 p-6 rounded-xl text-center hover-glow transition duration-300">
                <div class="w-24 h-24 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Lisa Wang</h3>
                <p class="text-indigo-400 mb-3">Incident Response Specialist</p>
                <p class="text-gray-300 mb-4">
                    Digital forensics expert with 9+ years in incident response and malware analysis. GCIH, GNFA, GREM certified.
                </p>
                <div class="flex justify-center space-x-3">
                    <a href="#" class="text-indigo-400 hover:text-indigo-300"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-indigo-400 hover:text-indigo-300"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certifications -->
<section class="py-20 bg-gray-800">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Our <span class="text-gradient">Certifications</span></h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Industry-leading certifications that validate our expertise and commitment to excellence.
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <p class="text-sm font-semibold">CISSP</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <p class="text-sm font-semibold">CISM</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <p class="text-sm font-semibold">CEH</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <p class="text-sm font-semibold">OSCP</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <p class="text-sm font-semibold">SABSA</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <p class="text-sm font-semibold">GPEN</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-20">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Work With Us?</h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Let's discuss how our team can help protect your organization from cyber threats.
        </p>
        <a href="{{ route('contact') }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-8 py-4 rounded-lg font-semibold transition duration-300 hover-glow">
            <i class="fas fa-envelope mr-2"></i>Get in Touch
        </a>
    </div>
</section>
@endsection