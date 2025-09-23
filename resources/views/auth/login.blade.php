<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
 @include('components.toast')
    <!-- Styles + icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .form-input {
            transition: all 0.25s ease;
            border: 2px solid #e5e7eb;
        }

        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 6px rgba(102, 126, 234, 0.08);
            transform: translateY(-1px);
            outline: none;
        }

        .checkbox-item {
            transition: all 0.12s ease;
        }

        .checkbox-item:hover {
            background-color: #f8fafc;
            transform: translateX(2px);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
            /* gray-500 */
        }

        .toggle-password:hover {
            color: #374151;
        }

        /* gray-700 */
    </style>

    <div class="gradient-bg min-h-screen flex flex-col items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-3xl card-shadow p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-indigo-50 rounded-full mb-4">
                    <i class="fas fa-sign-in-alt text-3xl text-indigo-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
                <p class="text-gray-500">Login to your account</p>
            </div>
            
            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-input w-full mt-2 p-3 rounded-xl" required autofocus>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Password</label>
                    <div class="relative mt-2">
                        <input id="password" name="password" class="form-input w-full p-3 rounded-xl pr-12" required>
                        <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-gray-500 hover:text-gray-700"
                            id="togglePassword">
                        </i>
                    </div>
                </div>


                <!-- Remember Me + Forgot password -->
                <div class="flex items-center justify-between text-sm">
                    <label class="inline-flex items-center checkbox-item p-2 border rounded-lg cursor-pointer">
                        <input type="checkbox" name="remember" class="form-checkbox">
                        <span class="ml-2">Remember Me</span>
                    </label>
                    <a href="#" class="text-indigo-600 hover:underline">Forgot password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
                    Login <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </form>

            <!-- Footer -->
            <div class="text-center mt-6">
                <p class="text-gray-600 text-sm">
                    Don’t have an account?
                    <a href="{{ route('register.step1') }}"
                        class="text-indigo-600 font-semibold hover:underline">Register</a>
                </p>
            </div>
        </div>

        <!-- Powered by -->
        <div class="text-center mt-6 text-white">
            <p class="text-sm opacity-75">Powered by DICT - Department of Information and Communications Technology</p>
        </div>
    </div>

    <!-- Show/Hide Password Script -->
    <script>
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    </script>
@endsection
