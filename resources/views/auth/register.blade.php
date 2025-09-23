@extends('layouts.app')

@section('content')
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .card-shadow {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    .form-input {
        transition: all 0.3s ease;
        border: 2px solid #e5e7eb;
    }
    .form-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        transform: translateY(-1px);
    }
    .btn-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: all 0.3s ease;
    }
    .btn-gradient:hover {
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
    }
    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        25% { transform: translateY(-10px) rotate(1deg); }
        50% { transform: translateY(-5px) rotate(-1deg); }
        75% { transform: translateY(-15px) rotate(1deg); }
    }
    .pulse-animation {
        animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    .slide-in {
        animation: slideIn 0.8s ease-out;
    }
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .input-group {
        position: relative;
    }
    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        transition: color 0.3s ease;
    }
    .form-input:focus + .input-icon,
    .form-input:focus ~ .input-icon {
        color: #667eea;
    }
    .form-input.with-icon {
        padding-left: 2.75rem;
    }
</style>

<div class="gradient-bg min-h-screen py-8 px-4 flex items-center justify-center">
    <div class="w-full max-w-6xl flex flex-col lg:flex-row items-center justify-center gap-8">
        
        <!-- Left Illustration Panel -->
        <div class="hidden lg:flex lg:w-1/2 flex-col items-center justify-center text-center">
            <!-- Floating Icons -->
            <div class="relative">
                <div class="floating-animation">
                    <div class="w-32 h-32 bg-white bg-opacity-20 rounded-3xl flex items-center justify-center mb-8">
                        <i class="fas fa-user-plus text-5xl text-white"></i>
                    </div>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute -top-4 -right-4 w-8 h-8 bg-yellow-300 rounded-full pulse-animation opacity-70"></div>
                <div class="absolute -bottom-2 -left-6 w-6 h-6 bg-pink-300 rounded-full floating-animation opacity-60" style="animation-delay: -2s;"></div>
                <div class="absolute top-1/2 -right-8 w-4 h-4 bg-green-300 rounded-full pulse-animation opacity-80" style="animation-delay: -1s;"></div>
            </div>

            <h1 class="text-5xl font-bold text-white mb-6 slide-in">Welcome to DICT!</h1>
            <p class="text-xl text-indigo-100 mb-8 max-w-md slide-in" style="animation-delay: 0.2s;">
                Join thousands of learners advancing their careers through our comprehensive training programs.
            </p>
            
            <!-- Feature List -->
            <div class="space-y-4 slide-in" style="animation-delay: 0.4s;">
                <div class="flex items-center text-white bg-white bg-opacity-10 rounded-xl p-4 backdrop-blur-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <span class="text-lg">Personalized Course Recommendations</span>
                </div>
                <div class="flex items-center text-white bg-white bg-opacity-10 rounded-xl p-4 backdrop-blur-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-certificate text-white text-sm"></i>
                    </div>
                    <span class="text-lg">Professional Certifications</span>
                </div>
                <div class="flex items-center text-white bg-white bg-opacity-10 rounded-xl p-4 backdrop-blur-sm">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-users text-white text-sm"></i>
                    </div>
                    <span class="text-lg">Expert-Led Training</span>
                </div>
            </div>
        </div>

        <!-- Right Form Panel -->
        <div class="w-full lg:w-1/2 max-w-md">
            <div class="bg-white rounded-3xl card-shadow p-8 slide-in" style="animation-delay: 0.6s;">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-lg mb-4">
                        <i class="fas fa-user-plus text-2xl text-white"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h2>
                    <p class="text-gray-600">Join our learning community today</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Full Name Field -->
                    <div class="input-group">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-indigo-600"></i>Full Name *
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="name" 
                                   class="form-input with-icon w-full rounded-xl p-3 focus:outline-none" 
                                   placeholder="Enter your full name" 
                                   value="{{ old('name') }}"
                                   required>
                            <i class="fas fa-user input-icon"></i>
                        </div>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="input-group">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-envelope mr-2 text-indigo-600"></i>Email Address *
                        </label>
                        <div class="relative">
                            <input type="email" 
                                   name="email" 
                                   class="form-input with-icon w-full rounded-xl p-3 focus:outline-none" 
                                   placeholder="your@email.com"
                                   value="{{ old('email') }}"
                                   required>
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="input-group">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-lock mr-2 text-indigo-600"></i>Password *
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   name="password" 
                                   class="form-input with-icon w-full rounded-xl p-3 focus:outline-none" 
                                   placeholder="Create a strong password"
                                   required>
                            <i class="fas fa-lock input-icon"></i>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="input-group">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-lock mr-2 text-indigo-600"></i>Confirm Password *
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   name="password_confirmation" 
                                   class="form-input with-icon w-full rounded-xl p-3 focus:outline-none" 
                                   placeholder="Confirm your password"
                                   required>
                            <i class="fas fa-lock input-icon"></i>
                        </div>
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="terms" 
                               name="terms" 
                               class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" 
                               required>
                        <label for="terms" class="ml-2 text-sm text-gray-600">
                            I agree to the 
                            <a href="#" class="text-indigo-600 hover:underline font-medium">Terms & Conditions</a> 
                            and 
                            <a href="#" class="text-indigo-600 hover:underline font-medium">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" 
                            class="btn-gradient w-full text-white py-3 px-6 rounded-xl font-bold text-lg shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>Create Account
                    </button>
                </form>

                <!-- Login Link -->
                <div class="text-center mt-6 pt-6 border-t border-gray-200">
                    <p class="text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" 
                           class="text-indigo-600 hover:text-indigo-700 font-semibold hover:underline transition-colors">
                            Sign in here
                        </a>
                    </p>
                </div>

                <!-- Social Login Options (Optional) -->
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="fab fa-google text-red-500 mr-2"></i>
                            Google
                        </button>
                        <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="fab fa-facebook text-blue-600 mr-2"></i>
                            Facebook
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome if not already included -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
@endsection