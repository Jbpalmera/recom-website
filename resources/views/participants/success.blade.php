@extends('layouts.dashboard')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Success Card -->
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Header Section with Gradient -->
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 p-8 text-white">
                <div class="flex flex-col items-center text-center">
                    <div class="bg-white/20 p-4 rounded-full mb-4">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold mb-2">Registration Successful!</h1>
                    <p class="text-green-100 text-lg max-w-2xl">
                        Thank you, <span class="font-semibold">{{ $participant->first_name }}</span>. Your registration has been confirmed and your information is securely saved.
                    </p>
                </div>
            </div>

            <!-- Course Information -->
            <div class="p-6 bg-emerald-50 border-b border-emerald-100">
                <div class="flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                    <p class="text-emerald-800 font-semibold text-lg">
                        Course: <span class="font-bold">{{ $participant->course_title }}</span>
                    </p>
                </div>
            </div>

            <!-- Participant Details -->
            <div class="p-8">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Registration Details
                    </h2>
                </div>

                <div class="bg-gray-50 rounded-xl p-6 mb-8 border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <!-- Name Section -->
                            <div>
                                <p class="text-sm font-medium text-gray-500 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Full Name
                                </p>
                                <p class="font-semibold text-gray-800 mt-1 text-lg">
                                    {{ $participant->first_name }}
                                    {{ $participant->middle_initial ? $participant->middle_initial . '.' : '' }}
                                    {{ $participant->last_name }}
                                    {{ $participant->name_extension ?? '' }}
                                </p>
                            </div>

                            <!-- Contact Information -->
                            <div>
                                <p class="text-sm font-medium text-gray-500 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Email Address
                                </p>
                                <p class="font-semibold text-gray-800 mt-1">{{ $participant->email }}</p>
                            </div>

                            <div>
                                <p class="text-sm font-medium text-gray-500 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    Mobile Number
                                </p>
                                <p class="font-semibold text-gray-800 mt-1">{{ $participant->mobile_no ?? 'Not provided' }}</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- Registration Date -->
                            <div>
                                <p class="text-sm font-medium text-gray-500 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Registration Date
                                </p>
                                <p class="font-semibold text-gray-800 mt-1">{{ $participant->created_at->format('F j, Y g:i A') }}</p>
                            </div>

                            <!-- Category and Level -->
                            @if ($participant->category)
                                <div>
                                    <p class="text-sm font-medium text-gray-500 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        Registered Category
                                    </p>
                                    <p class="font-semibold text-gray-800 mt-1">{{ $participant->category }}</p>
                                </div>
                            @endif

                            @if ($participant->level)
                                <div>
                                    <p class="text-sm font-medium text-gray-500 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3 0-5 1.5-5 4s2 4 5 4 5-1.5 5-4-2-4-5-4z"></path>
                                        </svg>
                                        Registered Level
                                    </p>
                                    <p class="font-semibold text-gray-800 mt-1">{{ ucfirst($participant->level) }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                    <h3 class="text-lg font-semibold text-blue-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        What's Next?
                    </h3>
                    <ul class="text-blue-700 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-1 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            You will receive a confirmation email with course details shortly
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-1 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Course materials and schedule will be sent to your email before the start date
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-1 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Your certificate will be generated upon successful completion of the course
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Recommended Courses Section -->
        <div class="mt-12 max-w-7xl mx-auto">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Continue Your Learning Journey
                </h2>
                <p class="text-gray-600 text-lg">
                    Explore more courses in 
                    <span class="font-semibold text-indigo-600">{{ $participant->category ?? 'your field' }}</span>
                </p>
            </div>

            @if ($recommended->isEmpty())
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <p class="text-gray-600 text-lg">No recommended courses found for this category/level at the moment.</p>
                    <p class="text-gray-500 mt-2">Check back later for new course offerings.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($recommended as $rec)
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-indigo-200 transform hover:-translate-y-1">
                            <!-- Card Banner -->
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $rec['banner_image'] ?? 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80' }}"
                                    alt="{{ $rec['Course Title'] }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                
                                <!-- Badge -->
                                @if (isset($rec['category']) && $rec['category'] === $participant->category)
                                    <span class="absolute top-4 left-4 px-3 py-1 text-xs font-bold rounded-full bg-green-500 text-white shadow-md">
                                        Matched Category
                                    </span>
                                @endif
                                
                                <!-- Category Overlay -->
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                                    <span class="text-white font-semibold text-sm">{{ $rec['category'] }}</span>
                                </div>
                            </div>

                            <!-- Course Details -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $rec['Course Title'] }}</h3>
                                
                                <div class="space-y-3 mb-4">
                                    <!-- Platform -->
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h4a2 2 0 012 2v6m-6 4h6m-6 0v-4m0 4H5" />
                                        </svg>
                                        <span class="text-sm"><span class="font-medium">Platform:</span> {{ $rec['platform_used'] }}</span>
                                    </div>

                                    <!-- Level -->
                                    <div class="flex items-center text-purple-600">
                                        <svg class="w-4 h-4 mr-2 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3 0-5 1.5-5 4s2 4 5 4 5-1.5 5-4-2-4-5-4z" />
                                        </svg>
                                        <span class="text-sm"><span class="font-medium">Level:</span> {{ ucfirst($rec['level']) }}</span>
                                    </div>

                                    <!-- Resource Person -->
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="text-sm"><span class="font-medium">Instructor:</span> {{ $rec['resource_person_name'] }}</span>
                                    </div>
                                </div>

                                <a href="{{ route('events.joinForm', [
                                    'eventId' => $rec['id'],
                                    'category_id' => $rec['category_id'],
                                    'level' => $rec['level'] ?? null,
                                    'course_title' => $rec['Course Title'] ?? null
                                ]) }}" 
                                   class="block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-3 rounded-lg shadow-md hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 flex items-center justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Join This Course
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection