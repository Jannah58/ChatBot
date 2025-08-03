@extends('layouts.app')

@section('title', 'Cybersecurity Services - Zinad')
@section('description', 'Comprehensive cybersecurity services including security awareness training, vulnerability assessment, penetration testing, and security consulting.')

@section('content')
<!-- Hero Section -->
<section class="gradient-bg py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold mb-6">Our <span class="text-gradient">Security Services</span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Comprehensive cybersecurity solutions designed to protect your organization from evolving threats and ensure business continuity.
        </p>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <!-- Security Awareness Training -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-graduation-cap text-white text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-blue-400">Security Awareness Training</h3>
                <p class="text-gray-300 mb-6">
                    Empower your workforce with comprehensive cybersecurity education programs that build a strong human firewall against social engineering and cyber threats.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="font-semibold mb-3 text-white">Training Modules</h4>
                        <ul class="text-gray-300 space-y-2">
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Phishing Recognition</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Password Security</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Social Engineering Defense</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Mobile Device Security</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3 text-white">Features</h4>
                        <ul class="text-gray-300 space-y-2">
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Interactive Simulations</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Progress Tracking</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Customized Content</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Compliance Reporting</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-gray-700 p-4 rounded-lg mb-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-400">95%</div>
                        <div class="text-sm text-gray-300">Reduction in successful phishing attacks</div>
                    </div>
                </div>
            </div>
            
            <!-- Vulnerability Assessment -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-search text-white text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-purple-400">Vulnerability Assessment</h3>
                <p class="text-gray-300 mb-6">
                    Comprehensive security assessments to identify, classify, and prioritize vulnerabilities in your systems before attackers can exploit them.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="font-semibold mb-3 text-white">Assessment Types</h4>
                        <ul class="text-gray-300 space-y-2">
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Network Scanning</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Web Application Testing</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Database Security Review</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Configuration Analysis</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3 text-white">Deliverables</h4>
                        <ul class="text-gray-300 space-y-2">
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Executive Summary</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Technical Reports</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Risk Prioritization</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Remediation Plan</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-gray-700 p-4 rounded-lg mb-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-purple-400">500+</div>
                        <div class="text-sm text-gray-300">Vulnerabilities identified monthly</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Penetration Testing -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-orange-500 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-user-ninja text-white text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-red-400">Penetration Testing</h3>
                <p class="text-gray-300 mb-6">
                    Ethical hacking services that simulate real-world attacks to test your security defenses and identify critical vulnerabilities.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="font-semibold mb-3 text-white">Testing Types</h4>
                        <ul class="text-gray-300 space-y-2">
                            <li><i class="fas fa-check text-green-400 mr-2"></i>External Testing</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Internal Testing</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Wireless Testing</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Social Engineering</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3 text-white">Methodologies</h4>
                        <ul class="text-gray-300 space-y-2">
                            <li><i class="fas fa-check text-green-400 mr-2"></i>OWASP Testing Guide</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>NIST Framework</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>PTES Standard</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Custom Scenarios</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-gray-700 p-4 rounded-lg mb-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-red-400">24-48h</div>
                        <div class="text-sm text-gray-300">Average time to compromise</div>
                    </div>
                </div>
            </div>
            
            <!-- Security Consulting -->
            <div class="bg-gray-800 p-8 rounded-xl hover-glow transition duration-300">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-teal-500 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-green-400">Security Consulting</h3>
                <p class="text-gray-300 mb-6">
                    Strategic cybersecurity guidance to help you develop, implement, and maintain comprehensive security programs aligned with business objectives.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="font-semibold mb-3 text-white">Consulting Areas</h4>
                        <ul class="text-gray-300 space-y-2">
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Risk Assessment</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Policy Development</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Compliance Support</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>Incident Response</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-3 text-white">Frameworks</h4>
                        <ul class="text-gray-300 space-y-2">
                            <li><i class="fas fa-check text-green-400 mr-2"></i>ISO 27001</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>NIST Cybersecurity</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>SOC 2</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i>GDPR Compliance</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-gray-700 p-4 rounded-lg mb-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-400">99.9%</div>
                        <div class="text-sm text-gray-300">Client satisfaction rate</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services -->
<section class="py-20 bg-gray-800">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Additional <span class="text-gradient">Services</span></h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Comprehensive security solutions to address all aspects of your cybersecurity needs.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Threat Intelligence -->
            <div class="bg-gray-900 p-6 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-yellow-400">Threat Intelligence</h3>
                <p class="text-gray-300 mb-4">
                    Real-time threat monitoring and intelligence to keep you ahead of emerging cyber threats.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>24/7 Monitoring</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>IOC Analysis</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Threat Reports</li>
                </ul>
            </div>
            
            <!-- Security Architecture -->
            <div class="bg-gray-900 p-6 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-sitemap text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-indigo-400">Security Architecture</h3>
                <p class="text-gray-300 mb-4">
                    Design and implement robust security architectures that protect your critical assets.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Zero Trust Design</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Network Segmentation</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Access Control</li>
                </ul>
            </div>
            
            <!-- Incident Response -->
            <div class="bg-gray-900 p-6 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-pink-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-ambulance text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-red-400">Incident Response</h3>
                <p class="text-gray-300 mb-4">
                    Rapid response and recovery services to minimize the impact of security incidents.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>24/7 Response Team</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Forensic Analysis</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Recovery Planning</li>
                </ul>
            </div>
            
            <!-- Compliance Management -->
            <div class="bg-gray-900 p-6 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-teal-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-clipboard-check text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-400">Compliance Management</h3>
                <p class="text-gray-300 mb-4">
                    Ensure your organization meets regulatory requirements and industry standards.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Audit Preparation</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Gap Analysis</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Policy Updates</li>
                </ul>
            </div>
            
            <!-- Cloud Security -->
            <div class="bg-gray-900 p-6 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-cloud-shield text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-cyan-400">Cloud Security</h3>
                <p class="text-gray-300 mb-4">
                    Secure your cloud infrastructure and applications across all major platforms.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>AWS/Azure/GCP</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Configuration Review</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Monitoring Setup</li>
                </ul>
            </div>
            
            <!-- Security Audits -->
            <div class="bg-gray-900 p-6 rounded-xl hover-glow transition duration-300">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-red-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-search-dollar text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-purple-400">Security Audits</h3>
                <p class="text-gray-300 mb-4">
                    Comprehensive security audits to assess your overall security posture.
                </p>
                <ul class="text-gray-300 space-y-2">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Risk Assessment</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Control Testing</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Recommendations</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Service Process -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Our <span class="text-gradient">Process</span></h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                A proven methodology that ensures comprehensive security coverage and measurable results.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-400">Assessment</h3>
                <p class="text-gray-300">
                    Comprehensive evaluation of your current security posture and risk profile.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-purple-400">Planning</h3>
                <p class="text-gray-300">
                    Strategic planning and customized solution design based on your specific needs.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-green-400">Implementation</h3>
                <p class="text-gray-300">
                    Execution of security measures with minimal disruption to business operations.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">4</span>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-red-400">Monitoring</h3>
                <p class="text-gray-300">
                    Continuous monitoring and optimization to maintain peak security effectiveness.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-cyan-600">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Enhance Your Security?</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Get started with a free security consultation and discover how our services can protect your organization.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-lg font-semibold transition duration-300">
                <i class="fas fa-phone mr-2"></i>Free Consultation
            </a>
            <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg font-semibold transition duration-300">
                <i class="fas fa-download mr-2"></i>Download Brochure
            </a>
        </div>
    </div>
</section>
@endsection