@extends('layouts.dashboard')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-3xl shadow-lg space-y-6">
        <!-- Course Title -->
        <h1 class="text-3xl font-extrabold text-gray-900">{{ $event->course_title }}</h1>
        <!-- Banner Image -->
        <div class="overflow-hidden rounded-xl shadow-md">
            <img src="{{ $event->banner_image ?? 'https://www.dmtict.com.ng/assetss/img/django_img.gif' }}"
                alt="{{ $event->course_title }}" class="w-full h-64 sm:h-80 object-cover">
        </div>
        <!-- Event Info -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-2 text-gray-700">
            <p class="flex items-center gap-2">
                <!-- Platform Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17v-6a2 2 0 012-2h4a2 2 0 012 2v6m-6 4h6m-6 0v-4m0 4H5" />
                </svg>
                <span class="font-semibold">Platform:</span> {{ $event->platform_used }}
            </p>
            <p class="flex items-center gap-2">
                <!-- Resource Person Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A6.978 6.978 0 0112 15a6.978 6.978 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="font-semibold">Resource Person:</span> {{ $event->resource_person }}
            </p>
            <p class="flex items-center gap-2 text-gray-500">
                <!-- Start Date Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="font-semibold">Start Date:</span>
                {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}
            </p>
            <p class="flex items-center gap-2 text-gray-500">
                <!-- Start Time Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-semibold">Start Time:</span>
                {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
            </p>
            <p class="flex items-center gap-2 text-gray-500">
                <!-- End Date Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="font-semibold">End Date:</span> {{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}
            </p>
            <p class="flex items-center gap-2 text-gray-500">
                <!-- End Time Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-semibold">End Time:</span> {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
            </p>
            <p class="flex items-center gap-2 text-blue-600">
                <!-- Category Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <span class="font-semibold">Category:</span> {{ $event->category->category_name ?? 'N/A' }}
            </p>
            <p class="flex items-center gap-2 text-purple-600">
                <!-- Level Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-3 0-5 1.5-5 4s2 4 5 4 5-1.5 5-4-2-4-5-4z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12v8" />
                </svg>
                <span class="font-semibold">Level:</span> {{ ucfirst($event->level) }}
            </p>
        </div>
        <!-- Course Description -->
        <div class="mt-4 text-gray-800 text-lg leading-relaxed font-sans">
            {{ $event->course_description }}
        </div>
        <!-- Action Buttons -->
        <div class="flex items-center mt-6 gap-4">
            <!-- Back Button (left) -->
            <a href="{{ url()->previous() }}"
                class="bg-gray-200 text-gray-800 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-300 transition transform hover:scale-105">
                Back
            </a>
            <!-- Join Button (right, takes remaining space) -->
            <a href="#"
                class="mt-2 w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-2 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transition transform hover:scale-105">
                Join
            </a>
        </div>
    </div>

    <!-- Recommended Courses Section -->
    @if (!empty($recommendations))
        <div class="mt-12 max-w-7xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Recommended Courses</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($recommendations as $rec)
                    <?php $bannerUrl = $rec['banner_image'] ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrv7rfFq6eGZK7CuBE0eAeLQk0EmvZ7D8ctg&s'; ?>
                    <div
                        class="event-card relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2 overflow-hidden">
                        <!-- Card Banner -->
                        <div class="relative">
                            <img src="{{ $bannerUrl }}" alt="{{ $rec['Course Title'] }}"
                                class="w-full h-40 object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                <a href="#"
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold px-5 py-2 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transition transform hover:scale-105">
                                    Join Now
                                </a>
                            </div>
                        </div>
                        <!-- Event Details -->
                        <div class="p-5 space-y-2 flex flex-col">
                            <h3 class="text-lg font-bold text-gray-800">{{ $rec['Course Title'] }}</h3>
                            <p class="flex items-center gap-2 text-gray-600 text-sm">
                                <span class="font-semibold">Platform:</span> {{ $rec['platform_used'] }}
                            </p>
                            <p class="flex items-center gap-2 text-gray-600 text-sm">
                                <span class="font-semibold">Category:</span> {{ $rec['category'] }}
                            </p>
                            <p class="flex items-center gap-2 text-gray-600 text-sm">
                                <span class="font-semibold">Level:</span> {{ ucfirst($rec['level']) }}
                            </p>
                            <!-- More Info Button -->
                            <a href="{{ route('events.showExternal', ['external_id' => $rec['id']]) }}"
                                class="mt-2 w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-2 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transition transform hover:scale-105">
                                More Info
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif


@endsection
