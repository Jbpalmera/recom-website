@extends('layouts.dashboard')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-4">
            About This System
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            A smart, personalized learning platform powered by advanced recommendation technology
        </p>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-12">
        <!-- Hero Section with Image -->
        <div class="relative h-64 bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative z-10 text-center text-white p-6">
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 inline-block">
                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold">Intelligent Learning Platform</h2>
                    <p class="text-indigo-100">Powered by DICT Standards</p>
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="p-8 md:p-12">
            <!-- Introduction -->
            <div class="mb-10">
                <div class="flex items-start space-x-4">
                    <div class="bg-indigo-100 p-3 rounded-2xl mt-1">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">Welcome to Our Recommender System</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Welcome to the <span class="font-semibold text-indigo-600">Intelligent Course Recommender System</span> — a cutting-edge platform designed to suggest the most relevant courses for our users based on their unique interests, learning preferences, and career goals.
                        </p>
                    </div>
                </div>
            </div>

            <!-- DICT Regulation -->
            <div class="mb-10">
                <div class="flex items-start space-x-4">
                    <div class="bg-blue-100 p-3 rounded-2xl mt-1">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">DICT-Regulated Platform</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            This system is developed and regulated by the <span class="font-semibold text-blue-600">Department of Information and Communications Technology (DICT)</span>, ensuring full compliance with government standards for digital learning platforms and data privacy regulations.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Technology -->
            <div class="mb-10">
                <div class="flex items-start space-x-4">
                    <div class="bg-purple-100 p-3 rounded-2xl mt-1">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">Advanced Recommendation Engine</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Our recommendation engine is powered by a sophisticated <span class="font-semibold text-purple-600">Content-Based Filtering Model</span>, which analyzes course content, user behavior patterns, and learning preferences to deliver highly personalized suggestions that maximize educational outcomes.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Mission -->
            <div class="mb-10">
                <div class="flex items-start space-x-4">
                    <div class="bg-green-100 p-3 rounded-2xl mt-1">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9m0 9c-5 0-9-4-9-9s4-9 9-9"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">Our Mission</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            We're committed to making learning more intuitive, efficient, and accessible for everyone. Through this innovative platform, users can discover courses perfectly tailored to their interests, track their progress in real-time, and enhance their digital skills for the future.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="mt-12 p-8 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl shadow-inner">
                <h2 class="text-2xl font-bold text-indigo-700 mb-6 text-center">Key System Features</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center mb-3">
                            <div class="bg-indigo-100 p-2 rounded-lg mr-4">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Smart Recommendations</h3>
                        </div>
                        <p class="text-gray-600">Personalized course suggestions based on content analysis and user preferences.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Secure & Compliant</h3>
                        </div>
                        <p class="text-gray-600">Full compliance with DICT digital learning standards and data protection regulations.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center mb-3">
                            <div class="bg-purple-100 p-2 rounded-lg mr-4">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Progress Tracking</h3>
                        </div>
                        <p class="text-gray-600">Monitor your learning journey with detailed progress analytics and achievement tracking.</p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center mb-3">
                            <div class="bg-green-100 p-2 rounded-lg mr-4">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Community Learning</h3>
                        </div>
                        <p class="text-gray-600">Connect with fellow learners, share insights, and participate in collaborative projects.</p>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="bg-white p-4 rounded-xl shadow-sm">
                    <div class="text-2xl font-bold text-indigo-600 mb-1" id="coursesCount">0</div>
                    <div class="text-sm text-gray-600">Available Courses</div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm">
                    <div class="text-2xl font-bold text-blue-600 mb-1" id="usersCount">0</div>
                    <div class="text-sm text-gray-600">Active Learners</div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm">
                    <div class="text-2xl font-bold text-purple-600 mb-1" id="successRate">0%</div>
                    <div class="text-sm text-gray-600">Success Rate</div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm">
                    <div class="text-2xl font-bold text-green-600 mb-1" id="satisfactionRate">0%</div>
                    <div class="text-sm text-gray-600">User Satisfaction</div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-12 text-center">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl p-8 text-white">
                    <h3 class="text-2xl font-bold mb-4">Ready to Start Your Learning Journey?</h3>
                    <p class="mb-6 text-indigo-100 max-w-2xl mx-auto">Join thousands of learners who are already enhancing their skills with our personalized course recommendations.</p>
                    <a href="{{ route('dashboard') }}" class="bg-white text-indigo-600 font-semibold py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-300 inline-block">
                        Explore Courses
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Animated counter for statistics
    document.addEventListener('DOMContentLoaded', function() {
        // Animate counting numbers
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16); // 60fps
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start);
                }
            }, 16);
        }

        // Animate percentage counters
        function animatePercentage(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target + '%';
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start) + '%';
                }
            }, 16);
        }

        // Start animations when element is in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(document.getElementById('coursesCount'), 150);
                    animateCounter(document.getElementById('usersCount'), 5240);
                    animatePercentage(document.getElementById('successRate'), 92);
                    animatePercentage(document.getElementById('satisfactionRate'), 96);
                    observer.unobserve(entry.target);
                }
            });
        });

        observer.observe(document.getElementById('coursesCount').closest('.grid'));
    });
</script>

<style>
    /* Smooth scrolling for the entire page */
    html {
        scroll-behavior: smooth;
    }
    
    /* Custom styling for better visual appeal */
    .bg-gradient-to-r.from-indigo-600.to-purple-600 {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    }
    
    /* Hover effects for feature cards */
    .feature-card {
        transition: all 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection