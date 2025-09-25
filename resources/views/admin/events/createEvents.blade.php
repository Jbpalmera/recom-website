@extends('layouts.adminNav')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
            Create New Course
        </h1>
        <p class="text-gray-600">Fill in the details below to create a new learning event</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg mb-6 shadow-sm animate-fade-in">
            <div class="flex items-center">
                <div class="bg-green-100 p-2 rounded-full mr-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Form Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6 text-white">
            <div class="flex items-center space-x-3">
                <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Event Information</h2>
                    <p class="text-indigo-100 text-sm">Provide all necessary details for the new event</p>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <form action="{{ route('admin.storeEvents') }}" method="POST" class="p-6 space-y-6" id="eventForm">
            @csrf

            <!-- Course Title -->
            <div class="form-group">
                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Course Title
                </label>
                <input type="text" name="course_title" value="{{ old('course_title') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                       placeholder="Enter course title">
                @error('course_title') 
                    <div class="flex items-center mt-1 text-red-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Course Description -->
            <div class="form-group">
                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                    Course Description
                </label>
                <textarea name="course_description" rows="4" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                          placeholder="Describe the course content and objectives">{{ old('course_description') }}</textarea>
                <div class="text-xs text-gray-500 mt-1">Briefly describe what participants will learn</div>
                @error('course_description') 
                    <div class="flex items-center mt-1 text-red-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Platform Used -->
            <div class="form-group">
                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Platform Used
                </label>
                <select name="platform_used" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                    <option value="">Select Platform</option>
                    <option value="Zoom" {{ old('platform_used') == 'Zoom' ? 'selected' : '' }}>Zoom</option>
                    <option value="Google Meet" {{ old('platform_used') == 'Google Meet' ? 'selected' : '' }}>Google Meet</option>
                    <option value="Microsoft Teams" {{ old('platform_used') == 'Microsoft Teams' ? 'selected' : '' }}>Microsoft Teams</option>
                    <option value="Webex" {{ old('platform_used') == 'Webex' ? 'selected' : '' }}>Webex</option>
                    <option value="Other" {{ old('platform_used') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('platform_used') 
                    <div class="flex items-center mt-1 text-red-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Category and Level -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Category
                    </label>
                    <select name="category_id" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') 
                        <div class="flex items-center mt-1 text-red-600 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Difficulty Level
                    </label>
                    <select name="level" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        <option value="">Select Level</option>
                        <option value="Beginner" {{ old('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                        <option value="Intermediate" {{ old('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="Advanced" {{ old('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                    </select>
                    @error('level') 
                        <div class="flex items-center mt-1 text-red-600 text-sm">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Date and Time Section -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Schedule Information
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Start Date -->
                    <div class="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Start Date</label>
                        <input type="date" name="start_date" value="{{ old('start_date') }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        @error('start_date') 
                            <div class="flex items-center mt-1 text-red-600 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- End Date -->
                    <div class="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">End Date</label>
                        <input type="date" name="end_date" value="{{ old('end_date') }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        @error('end_date') 
                            <div class="flex items-center mt-1 text-red-600 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Start Time -->
                    <div class="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Start Time</label>
                        <input type="time" name="start_time" value="{{ old('start_time') }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        @error('start_time') 
                            <div class="flex items-center mt-1 text-red-600 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- End Time -->
                    <div class="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">End Time</label>
                        <input type="time" name="end_time" value="{{ old('end_time') }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        @error('end_time') 
                            <div class="flex items-center mt-1 text-red-600 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Resource Person -->
            <div class="form-group">
                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Resource Person
                </label>
                <input type="text" name="resource_person" value="{{ old('resource_person') }}" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                       placeholder="Enter instructor's name">
                @error('resource_person') 
                    <div class="flex items-center mt-1 text-red-600 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <button type="submit" 
                        class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-3 px-8 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition duration-300 transform hover:scale-105 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Create Event
                </button>
                <button type="button" 
                        class="bg-gray-100 text-gray-700 font-semibold py-3 px-8 rounded-lg hover:bg-gray-200 transition duration-300 flex items-center justify-center"
                        onclick="resetForm()">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Form
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Form validation and enhancement
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('eventForm');
        const inputs = form.querySelectorAll('input, select, textarea');
        
        // Add real-time validation
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                clearError(this);
            });
        });
        
        // Date validation
        const startDate = document.querySelector('input[name="start_date"]');
        const endDate = document.querySelector('input[name="end_date"]');
        
        if (startDate && endDate) {
            startDate.addEventListener('change', function() {
                if (endDate.value && new Date(this.value) > new Date(endDate.value)) {
                    endDate.value = '';
                    showCustomError(endDate, 'End date must be after start date');
                }
            });
            
            endDate.addEventListener('change', function() {
                if (startDate.value && new Date(this.value) < new Date(startDate.value)) {
                    showCustomError(this, 'End date must be after start date');
                } else {
                    clearError(this);
                }
            });
        }
        
        // Time validation
        const startTime = document.querySelector('input[name="start_time"]');
        const endTime = document.querySelector('input[name="end_time"]');
        
        if (startTime && endTime && startDate && endDate) {
            endTime.addEventListener('change', function() {
                if (startTime.value && startDate.value === endDate.value) {
                    if (this.value <= startTime.value) {
                        showCustomError(this, 'End time must be after start time for same-day events');
                    } else {
                        clearError(this);
                    }
                }
            });
        }
    });
    
    function validateField(field) {
        if (!field.value.trim()) {
            showCustomError(field, 'This field is required');
            return false;
        }
        return true;
    }
    
    function showCustomError(field, message) {
        // Remove existing error
        clearError(field);
        
        // Add error styling
        field.classList.add('border-red-500');
        
        // Create error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'flex items-center mt-1 text-red-600 text-sm';
        errorDiv.innerHTML = `
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            ${message}
        `;
        
        field.parentNode.appendChild(errorDiv);
    }
    
    function clearError(field) {
        field.classList.remove('border-red-500');
        const errorDiv = field.parentNode.querySelector('.flex.items-center.mt-1.text-red-600');
        if (errorDiv) {
            errorDiv.remove();
        }
    }
    
    function resetForm() {
        if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
            document.getElementById('eventForm').reset();
            // Clear all custom errors
            const errors = document.querySelectorAll('.flex.items-center.mt-1.text-red-600');
            errors.forEach(error => error.remove());
            
            const errorFields = document.querySelectorAll('.border-red-500');
            errorFields.forEach(field => field.classList.remove('border-red-500'));
        }
    }
</script>

<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .form-group {
        transition: all 0.3s ease;
    }
    
    input:focus, select:focus, textarea:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
</style>
@endsection