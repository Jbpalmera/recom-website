<!-- ==========================
     register-step2.blade.php
     ========================== -->
@extends('layouts.app')

@section('content')
<!-- keep the same styles so the look is identical -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    .card-shadow { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); }
    .form-input { transition: all 0.25s ease; border: 2px solid #e5e7eb; }
    .form-input:focus { border-color: #667eea; box-shadow: 0 0 0 6px rgba(102,126,234,0.08); transform: translateY(-1px); outline: none; }
    .progress-bar { background: linear-gradient(90deg, #667eea, #764ba2); }
</style>

<div class="gradient-bg min-h-screen py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-lg mb-4">
                <i class="fas fa-lock text-3xl text-indigo-600"></i>
            </div>
            <h1 class="text-4xl font-bold text-white mb-2">Create Your Account</h1>
            <p class="text-indigo-100 text-lg">Step 2: Account Credentials</p>
        </div>

        <!-- Progress Bar (100%) -->
        <div class="bg-white bg-opacity-20 rounded-full h-2 mb-8">
            <div class="progress-bar h-full rounded-full" style="width: 100%"></div>
        </div>

        <form action="{{ route('register.store') }}" method="POST" class="bg-white rounded-3xl card-shadow p-8 space-y-6">
            @csrf

            <!-- Username -->
            <div>
                <label class="block text-gray-700 font-medium">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-input w-full mt-2 p-3 rounded-xl" required>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-700 font-medium">Password</label>
                <input type="password" name="password" class="form-input w-full mt-2 p-3 rounded-xl" required>
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-gray-700 font-medium">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-input w-full mt-2 p-3 rounded-xl" required>
            </div>

            <div class="flex justify-between mt-4">
                <a href="{{ route('register.step1') }}" class="bg-gray-400 text-white px-6 py-3 rounded-lg hover:bg-gray-500 transition font-semibold">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>

                <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-semibold">
                    Register <i class="fas fa-user-check ml-2"></i>
                </button>
            </div>
        </form>

        <div class="text-center mt-6 text-white">
            <p class="text-sm opacity-75">Powered by DICT - Department of Information and Communications Technology</p>
        </div>
    </div>
</div>
@endsection