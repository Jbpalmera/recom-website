<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | aDICT Course Recommender System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @include('partials.favicon')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* Remove overflow: hidden to allow scrolling */
            overflow-x: hidden;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            /* Allow content to extend beyond viewport */
            overflow: visible;
        }

        .gradient-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .card-shadow {
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .form-input {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid #e5e7eb;
            background: #fafafa;
        }

        .form-input:focus {
            border-color: #667eea;
            box-shadow: 
                0 0 0 4px rgba(102, 126, 234, 0.1),
                0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
            background: white;
            outline: none;
        }

        .form-input:hover {
            border-color: #9ca3af;
        }

        .checkbox-item {
            transition: all 0.2s ease;
            border: 1px solid #e5e7eb;
        }

        .checkbox-item:hover {
            background-color: #f8fafc;
            border-color: #667eea;
            transform: translateY(-1px);
        }

        .login-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .floating-icon {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            transition: color 0.3s ease;
        }

        .form-input:focus + .input-icon {
            color: #667eea;
        }

        .form-input.has-icon {
            padding-left: 45px;
        }

        .loading-spinner {
            display: none;
        }

        .form-loading .loading-spinner {
            display: inline-block;
        }

        .form-loading .btn-text {
            display: none;
        }

        .pulse-dot {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        /* New responsive styles */
        .login-container {
            width: 100%;
            max-width: 28rem;
            padding: 2rem 1rem;
            margin: 0 auto;
        }

        @media (max-height: 700px) {
            .gradient-bg {
                min-height: auto;
                padding: 2rem 0;
            }
            
            .login-container {
                padding: 1rem;
            }
        }

        @media (max-width: 640px) {
            .gradient-bg::before {
                background-size: 50px 50px;
            }
        }
    </style>
</head>
<body class="gradient-bg">
    <!-- Main container with proper scrolling -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-8 w-full">
        <!-- Animated Background Elements -->
        <div class="fixed top-10 left-10 w-20 h-20 bg-white/10 rounded-full pulse-dot"></div>
        <div class="fixed bottom-20 right-20 w-16 h-16 bg-white/5 rounded-full pulse-dot" style="animation-delay: 1s;"></div>
        <div class="fixed top-1/3 right-1/4 w-12 h-12 bg-white/8 rounded-full pulse-dot" style="animation-delay: 0.5s;"></div>

        <div class="login-container z-10">
            <!-- Header Card -->
            <div class="bg-white/20 backdrop-blur-lg rounded-2xl p-6 mb-6 text-center text-white">
                <h1 class="text-2xl font-bold mb-2"> DICT Course Recommender System</h1>
                <p class="text-white/80">Department of Information and Communications Technology</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white rounded-3xl card-shadow p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-red-100 to-orange-100 rounded-full mb-4 floating-icon">
                        <i class="fas fa-shield-alt text-2xl text-red-600"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Admin Access</h1>
                    <p class="text-gray-500">Secure administrative login</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border-l-4 border-red-500">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                            <span class="text-red-800 font-medium">{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <!-- Success Message -->
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border-l-4 border-green-500">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span class="text-green-800 font-medium">{{ session('status') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form id="loginForm" method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="form-input w-full p-4 rounded-xl has-icon" 
                            placeholder="Enter admin email"
                            required 
                            autofocus>
                    </div>

                    <!-- Password Field -->
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password" type="password" name="password" 
                            class="form-input w-full p-4 rounded-xl has-icon pr-12" 
                            placeholder="Enter admin password"
                            required>
                        <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-gray-500 hover:text-gray-700 transition-colors"
                            id="togglePassword">
                        </i>
                    </div>

                    <!-- Remember Me + Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="inline-flex items-center checkbox-item p-3 rounded-xl cursor-pointer transition-all">
                            <input type="checkbox" name="remember" class="form-checkbox rounded text-indigo-600">
                            <span class="ml-3 text-gray-700 font-medium">Remember Me</span>
                        </label>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium transition-colors">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="loginButton"
                        class="w-full login-btn text-white py-4 rounded-xl font-semibold relative">
                        <span class="btn-text flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In to Admin Panel
                        </span>
                        <span class="loading-spinner">
                            <i class="fas fa-spinner fa-spin mr-2"></i>Signing in...
                        </span>
                    </button>
                </form>

                <!-- Security Notice -->
                <div class="mt-6 p-4 rounded-lg bg-blue-50 border-l-4 border-blue-500">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-500 mt-0.5 mr-2"></i>
                        <p class="text-sm text-blue-800">For security reasons, please log out after completing your administrative tasks.</p>
                    </div>
                </div>
            </div>

            <!-- Security Footer -->
            <div class="text-center mt-6 text-white/80 pb-4">
                <div class="flex items-center justify-center space-x-4 text-xs">
                    <span class="flex items-center">
                        <i class="fas fa-shield-alt mr-1"></i> Admin Access
                    </span>
                    <span>•</span>
                    <span class="flex items-center">
                        <i class="fas fa-lock mr-1"></i> Encrypted
                    </span>
                    <span>•</span>
                    <span class="flex items-center">
                        <i class="fas fa-user-check mr-1"></i> Verified
                    </span>
                </div>
                <p class="text-xs mt-2 opacity-75">Powered by DICT - Department of Information and Communications Technology</p>
            </div>
        </div>
    </div>

    <script>
        // Password Toggle
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });

        // Form Loading State
        const loginForm = document.getElementById("loginForm");
        const loginButton = document.getElementById("loginButton");

        loginForm.addEventListener("submit", function() {
            loginButton.classList.add("form-loading");
            loginButton.disabled = true;
        });

        // Auto-remove loading state if form submission fails
        setTimeout(() => {
            loginButton.classList.remove("form-loading");
            loginButton.disabled = false;
        }, 5000);

        // Input focus effects
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('input-focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('input-focused');
            });
        });

        // Ensure page is scrollable on small screens
        function checkViewportHeight() {
            const viewportHeight = window.innerHeight;
            const contentHeight = document.querySelector('.login-container').scrollHeight;
            
            if (contentHeight > viewportHeight) {
                document.body.style.overflowY = 'auto';
            } else {
                document.body.style.overflowY = 'hidden';
            }
        }

        // Check on load and resize
        window.addEventListener('load', checkViewportHeight);
        window.addEventListener('resize', checkViewportHeight);
    </script>
</body>
</html>