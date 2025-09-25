@extends('layouts.dashboard')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">
        @if (session('error'))
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-lg shadow-sm flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-lg shadow-sm flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-white">
                <div class="flex items-center justify-center mb-4">
                    <div class="bg-white/20 p-3 rounded-full mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold">Course Registration</h2>
                </div>
                <p class="text-center text-blue-100 text-lg">
                    Complete the form below to register for your selected course
                </p>
            </div>

            <!-- Course Info -->
            <div class="p-6 bg-indigo-50 border-b border-indigo-100">
                <div class="flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                    <p class="text-indigo-800 font-semibold text-lg">Course: {{ $courseTitle }}</p>
                </div>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 flex items-center">
                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Personal Information
                    </h3>
                    <p class="text-gray-600 text-sm">Please provide your complete name as it should appear on your certificate.</p>
                </div>

                <form action="{{ route('participants.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <!-- Hidden fields for course info -->
                    <input type="hidden" name="category_id" value="{{ $category_id ?? request()->query('category_id') }}">
                    <input type="hidden" name="level" value="{{ $level ?? request()->query('level') }}">
                    <input type="hidden" name="course_title" value="{{ $courseTitle ?? request()->query('course_title') }}">

                    <!-- Name Section -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        @foreach (['first_name', 'middle_initial', 'last_name', 'name_extension'] as $field)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 capitalize flex items-center">
                                    @if($field === 'first_name')
                                        <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    @endif
                                    {{ str_replace('_', ' ', $field) }}
                                    @if($field !== 'middle_initial' && $field !== 'name_extension')
                                        <span class="text-red-500 ml-1">*</span>
                                    @endif
                                </label>
                                @if ($field === 'name_extension')
                                    <select name="name_extension" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 py-2.5 px-3 border">
                                        <option value="">Select</option>
                                        @foreach (['Jr.', 'Sr.', 'III', 'IV'] as $ext)
                                            <option value="{{ $ext }}" {{ old('name_extension', $user->name_extension ?? '') === $ext ? 'selected' : '' }}>{{ $ext }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="{{ $field === 'email' ? 'email' : 'text' }}" name="{{ $field }}"
                                        value="{{ old($field, $user->{$field} ?? '') }}"
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 py-2.5 px-3 border"
                                        {{ $field === 'first_name' || $field === 'last_name' ? 'required' : '' }}>
                                @endif
                                @error($field)
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        @endforeach
                    </div>

                    <!-- Contact Section -->
                    <div class="pt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Contact Information
                        </h3>
                        <p class="text-gray-600 text-sm mb-6">We'll use this to contact you about course updates and materials.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                    <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Email Address
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 py-2.5 px-3 border"
                                    required>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                    <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    Mobile Number
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="tel" name="mobile_no" value="{{ old('mobile_no') }}"
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 py-2.5 px-3 border"
                                    required>
                                @error('mobile_no')
                                    <p class="text-red-500 text-xs mt-1 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-8 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">
                                <span class="text-red-500">*</span> indicates required field
                            </p>
                            <button type="submit"
                                class="py-3 px-8 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold rounded-lg shadow-md hover:from-blue-700 hover:to-indigo-800 transition-all duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Complete Registration
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Additional Info -->
        <div class="mt-6 text-center text-sm text-gray-500">
            <p>Your information will be securely stored and used only for course administration and certificate generation.</p>
        </div>
    </div>
@endsection