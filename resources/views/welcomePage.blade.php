@extends('layouts.app')
 @include('components.toast')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICT Dashboard - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }
        .feature-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .feature-card:hover {
            transform: translateY(-8px);
            border-color: #667eea;
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15);
        }
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        .floating-elements div {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        .floating-elements div:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        .floating-elements div:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }
        .floating-elements div:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .stats-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }
        .welcome-text {
            background: linear-gradient(135deg, #111111 50%, #764ba2 100%);
            font-size: 4rem;
            margin-bottom: 1rem;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen relative">
    <!-- Floating Background Elements -->
    <div class="floating-elements">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="relative z-10 min-h-screen py-8 px-4">
        <!-- Header Section -->
        <div class="text-center mb-12 mt-24">

            <div class="inline-flex items-center justify-center w-24 h-24 bg-white rounded-full shadow-lg mb-6 pulse-animation">
                <i class="fas fa-graduation-cap text-4xl text-indigo-600"></i>
            </div>
            <h1 class="text-5xl font-extrabold welcome-text mb-4">
                Welcome, {{ auth()->user()->first_name ?? 'User' }}! 🎉
            </h1>
            <p class="text-white text-xl max-w-2xl mx-auto leading-relaxed">
                You have successfully joined the DICT Course Recommendation System. Let's help you discover the perfect training programs to advance your career!
            </p>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto">
            <!-- Welcome Stats Cards -->
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="stats-card rounded-2xl p-6 text-center card-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">15,000+</h3>
                    <p class="text-gray-600">Active Learners</p>
                </div>
                <div class="stats-card rounded-2xl p-6 text-center card-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-book text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">200+</h3>
                    <p class="text-gray-600">Available Courses</p>
                </div>
                <div class="stats-card rounded-2xl p-6 text-center card-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">50+</h3>
                    <p class="text-gray-600">Certifications</p>
                </div>
            </div>

            <!-- Main Action Card -->
            <div class="bg-white rounded-3xl card-shadow p-8 mb-8">
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mb-4">
                        <i class="fas fa-magic text-white text-2xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Get Your Personalized Course Recommendations</h2>
                    <p class="text-gray-600 text-lg max-w-3xl mx-auto mb-6">
                        Take our comprehensive survey to help our AI-powered system understand your learning goals, preferences, and interests. We'll recommend the most suitable DICT training programs tailored specifically for you.
                    </p>
                </div>

                <!-- Survey CTA -->
                <div class="flex justify-center mb-8">
                    <a href="{{ url('/survey') }}" 
                       class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xl rounded-2xl shadow-lg hover:from-indigo-700 hover:to-purple-700 hover:shadow-xl transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        <i class="fas fa-clipboard-list mr-3 text-xl"></i>
                        Start Survey Now
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                        <div class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full animate-bounce">
                            New!
                        </div>
                    </a>
                </div>

                <!-- Survey Benefits -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="text-center p-4 bg-blue-50 rounded-xl">
                        <i class="fas fa-clock text-blue-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 mb-1">5 Minutes</h4>
                        <p class="text-sm text-gray-600">Quick & Easy</p>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-xl">
                        <i class="fas fa-target text-green-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 mb-1">Personalized</h4>
                        <p class="text-sm text-gray-600">Tailored Results</p>
                    </div>
                    <div class="text-center p-4 bg-purple-50 rounded-xl">
                        <i class="fas fa-brain text-purple-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 mb-1">AI-Powered</h4>
                        <p class="text-sm text-gray-600">Smart Matching</p>
                    </div>
                    <div class="text-center p-4 bg-orange-50 rounded-xl">
                        <i class="fas fa-gift text-orange-600 text-2xl mb-2"></i>
                        <h4 class="font-semibold text-gray-800 mb-1">Free Access</h4>
                        <p class="text-sm text-gray-600">No Cost</p>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl card-shadow p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Quick Actions</h2>
                <div class="grid md:grid-cols-4 gap-4">
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition-all duration-300 group">
                        <i class="fas fa-user-cog mr-3 text-xl group-hover:scale-110 transition-transform"></i>
                        <span class="font-semibold">Profile Settings</span>
                    </a>
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-green-50 hover:text-green-600 transition-all duration-300 group">
                        <i class="fas fa-bookmark mr-3 text-xl group-hover:scale-110 transition-transform"></i>
                        <span class="font-semibold">Saved Courses</span>
                    </a>
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-purple-50 hover:text-purple-600 transition-all duration-300 group">
                        <i class="fas fa-history mr-3 text-xl group-hover:scale-110 transition-transform"></i>
                        <span class="font-semibold">Learning History</span>
                    </a>
                    <a href="#" class="flex items-center p-4 bg-gray-50 rounded-xl hover:bg-orange-50 hover:text-orange-600 transition-all duration-300 group">
                        <i class="fas fa-question-circle mr-3 text-xl group-hover:scale-110 transition-transform"></i>
                        <span class="font-semibold">Help & Support</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-12 text-white">
            <div class="flex justify-center items-center mb-4">
                <i class="fas fa-shield-alt mr-2"></i>
                <span class="text-sm opacity-75">Powered by DICT - Department of Information and Communications Technology</span>
            </div>
            <p class="text-xs opacity-60">Empowering Filipinos through Digital Skills Development</p>
        </div>
    </div>

    <script>
        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all feature cards
            document.querySelectorAll('.feature-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });

            // Add click effect to survey button
            const surveyBtn = document.querySelector('a[href*="survey"]');
            if (surveyBtn) {
                surveyBtn.addEventListener('click', function(e) {
                    // Add ripple effect
                    const ripple = document.createElement('div');
                    ripple.className = 'absolute inset-0 bg-white opacity-25 rounded-2xl animate-ping';
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        if (ripple.parentNode) {
                            ripple.parentNode.removeChild(ripple);
                        }
                    }, 600);
                });
            }
        });
    </script>
</body>
</html>