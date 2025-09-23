@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col space-y-6">

        <!-- Banner Carousel -->
        <div class="relative w-full max-w-7xl mx-auto rounded-2xl overflow-hidden shadow-lg">
            @php
                $banners = $banners ?? [
                    ['image' => asset('images/banner1.png'), 'cta' => 'Join Now', 'link' => '#'],
                    ['image' => asset('images/banner2.png'), 'cta' => 'Register Today', 'link' => '#'],
                    ['image' => asset('images/banner3.jpg'), 'cta' => 'Learn More', 'link' => '#'],
                ];
            @endphp

            <div id="carousel" class="relative w-full h-64 sm:h-80 md:h-96">
                @foreach ($banners as $index => $banner)
                    <div
                        class="carousel-slide absolute inset-0 transition-opacity duration-700 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                        <img src="{{ $banner['image'] }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                            <a href="{{ $banner['link'] }}"
                                class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition-all duration-300 transform hover:scale-105">
                                {{ $banner['cta'] }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Prev / Next Buttons -->
            <button id="prevBtn"
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-80 rounded-full p-3 shadow">
                &#10094;
            </button>
            <button id="nextBtn"
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-80 rounded-full p-3 shadow">
                &#10095;
            </button>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">
            @foreach ($events as $event)
                @php
                    $endDate = \Carbon\Carbon::parse($event->end_date);
                    $isUpcoming = $endDate->isFuture();
                    $bannerUrl = $event->banner_image ?? 'https://via.placeholder.com/400x150';
                @endphp

                <div
                    class="event-card relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-2 overflow-hidden">
                    <!-- Card Banner -->
                    <div class="relative">
                        <img src="{{ $bannerUrl }}" alt="{{ $event->course_title }}" class="w-full h-40 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                            <a href="#"
                                class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold px-5 py-2 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transition transform hover:scale-105">
                                Join Now
                            </a>
                        </div>
                    </div>

                    <!-- Badge -->
                    <span
                        class="absolute top-4 left-4 px-3 py-1 text-xs font-bold rounded-full {{ $isUpcoming ? 'bg-green-500 text-white' : 'bg-gray-400 text-white' }}">
                        {{ $isUpcoming ? 'Upcoming' : 'Past' }}
                    </span>

                    <!-- Event Details -->
                    <div class="p-5 space-y-2">
                        <h3 class="text-lg font-bold text-gray-800">{{ $event->course_title }}</h3>
                        <p class="text-gray-600 text-sm"><span class="font-semibold">Platform:</span>
                            {{ $event->platform_used }}</p>
                        <p class="text-gray-600 text-sm"><span class="font-semibold">End Date:</span>
                            {{ $endDate->format('M d, Y') }}</p>
                        <p class="text-gray-600 text-sm"><span class="font-semibold">Resource Person:</span>
                            {{ $event->resource_person }}</p>
                        <button type="button"
                            class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold px-5 py-2 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transition transform hover:scale-105 w-full">
                            More Info
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Carousel
        const slides = document.querySelectorAll('.carousel-slide');
        let currentIndex = 0;

        document.getElementById('nextBtn').addEventListener('click', () => {
            slides[currentIndex].classList.replace('opacity-100', 'opacity-0');
            currentIndex = (currentIndex + 1) % slides.length;
            slides[currentIndex].classList.replace('opacity-0', 'opacity-100');
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            slides[currentIndex].classList.replace('opacity-100', 'opacity-0');
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            slides[currentIndex].classList.replace('opacity-0', 'opacity-100');
        });

        setInterval(() => {
            slides[currentIndex].classList.replace('opacity-100', 'opacity-0');
            currentIndex = (currentIndex + 1) % slides.length;
            slides[currentIndex].classList.replace('opacity-0', 'opacity-100');
        }, 5000);

        // Search Filter
        function filterEvents() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const events = document.querySelectorAll('.event-card');
            events.forEach(event => {
                const title = event.querySelector('h3').textContent.toLowerCase();
                event.style.display = title.includes(input) ? 'block' : 'none';
            });
        }
    </script>
@endsection
