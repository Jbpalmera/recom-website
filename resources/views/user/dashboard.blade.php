{{-- user Dashboard --}}
@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col space-y-8">

        <!-- Banner Carousel -->
        <div class="relative w-full max-w-7xl mx-auto rounded-2xl overflow-hidden shadow-xl">
            @php
                $banners = $banners ?? [
                    ['image' => asset('images/banner1.png'), 'title' => 'Learn from Industry Experts'],
                    ['image' => asset('images/banner2.png'), 'title' => 'Advance Your Career'],
                    ['image' => asset('images/banner3.jpg'), 'title' => 'Join Our Community'],
                ];
            @endphp

            <div id="carousel" class="relative w-full h-64 sm:h-80 md:h-96 overflow-hidden rounded-2xl">
                @foreach ($banners as $index => $banner)
                    <div
                        class="carousel-slide absolute inset-0 transition-opacity duration-700 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                        <img src="{{ $banner['image'] }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent flex items-center">
                            <div class="text-white p-8 max-w-lg">
                                <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ $banner['title'] }}</h2>
                                <p class="text-lg mb-6">Discover new skills, expand your knowledge, and connect with
                                    professionals worldwide.</p>
                                <a href="#courses"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 inline-block">Explore
                                    Courses</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Prev / Next Buttons -->
            <button id="prevBtn"
                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full p-3 shadow-lg transition text-white hover:text-indigo-100">&#10094;</button>
            <button id="nextBtn"
                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full p-3 shadow-lg transition text-white hover:text-indigo-100">&#10095;</button>

            <!-- Indicators -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                @foreach ($banners as $index => $banner)
                    <span
                        class="carousel-indicator w-3 h-3 rounded-full bg-white/50 {{ $index === 0 ? '!bg-white' : '' }} cursor-pointer transition-all duration-300"></span>
                @endforeach
            </div>
        </div>

        <!-- New Stats Container -->
        <div class="max-w-7xl mx-auto w-full">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- User Stats Card -->
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-indigo-100">Your Progress</p>
                            <h3 class="text-2xl font-bold mt-1">5 Courses</h3>
                            <p class="text-indigo-100 text-sm mt-2">2 Completed • 3 In Progress</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-full">
                            <i class="fas fa-trophy text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 bg-white/20 rounded-full h-2">
                        <div class="bg-white rounded-full h-2 w-3/4"></div>
                    </div>
                </div>

                <!-- Upcoming Events Card -->
                <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100">Upcoming Events</p>
                            <h3 class="text-2xl font-bold mt-1">3 Events</h3>
                            <p class="text-blue-100 text-sm mt-2">Next: Web Development Workshop</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-full">
                            <i class="fas fa-calendar-alt text-2xl"></i>
                        </div>
                    </div>
                    <a href="#"
                        class="inline-block mt-4 text-sm bg-white/20 hover:bg-white/30 py-1 px-3 rounded-full transition duration-300">View
                        All</a>
                </div>

                <!-- Achievements Card -->
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100">Your Achievements</p>
                            <h3 class="text-2xl font-bold mt-1">8 Badges</h3>
                            <p class="text-green-100 text-sm mt-2">Latest: Advanced JavaScript</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-full">
                            <i class="fas fa-award text-2xl"></i>
                        </div>
                    </div>
                    <a href="#"
                        class="inline-block mt-4 text-sm bg-white/20 hover:bg-white/30 py-1 px-3 rounded-full transition duration-300">See
                        Details</a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="max-w-7xl mx-auto w-full">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="#"
                        class="flex flex-col items-center justify-center p-4 bg-indigo-50 rounded-xl hover:bg-indigo-100 transition duration-300 group">
                        <div class="bg-indigo-100 p-3 rounded-full mb-2 group-hover:bg-indigo-200 transition duration-300">
                            <i class="fas fa-search text-indigo-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Browse Courses</span>
                    </a>
                    <a href="#"
                        class="flex flex-col items-center justify-center p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition duration-300 group">
                        <div class="bg-blue-100 p-3 rounded-full mb-2 group-hover:bg-blue-200 transition duration-300">
                            <i class="fas fa-calendar-check text-blue-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">My Schedule</span>
                    </a>
                    <a href="#"
                        class="flex flex-col items-center justify-center p-4 bg-green-50 rounded-xl hover:bg-green-100 transition duration-300 group">
                        <div class="bg-green-100 p-3 rounded-full mb-2 group-hover:bg-green-200 transition duration-300">
                            <i class="fas fa-book-open text-green-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Resources</span>
                    </a>
                    <a href="#"
                        class="flex flex-col items-center justify-center p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition duration-300 group">
                        <div class="bg-purple-100 p-3 rounded-full mb-2 group-hover:bg-purple-200 transition duration-300">
                            <i class="fas fa-users text-purple-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Community</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Courses Section -->
        <div class="max-w-7xl mx-auto w-full" id="courses">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Available Courses</h2>
                    <p class="text-gray-600">Enhance your skills with our curated selection</p>
                </div>

                <!-- Search and Filter -->
                <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search courses..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-full sm:w-64">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <select id="categoryFilter"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-full sm:w-auto">
                        <option value="">All Categories</option>
                        <option value="web development">Web Development</option>
                        <option value="data science">Data Science</option>
                        <option value="design">Design</option>
                        <option value="business">Business</option>
                    </select>
                </div>
            </div>

            <div id="eventsContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                    @php
                        $startDate = \Carbon\Carbon::parse($event->start_date);
                        $isUpcoming = $startDate->isFuture();
                        $bannerUrl =
                            $event->banner_image ??
                            'https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';

                        // Determine category color
                        $categoryColors = [
                            'web development' => 'bg-blue-100 text-blue-800',
                            'data science' => 'bg-green-100 text-green-800',
                            'design' => 'bg-purple-100 text-purple-800',
                            'business' => 'bg-orange-100 text-orange-800',
                        ];
                        $categoryName = strtolower($event->category->category_name ?? 'other');
                        $categoryColor = $categoryColors[$categoryName] ?? 'bg-gray-100 text-gray-800';
                    @endphp

                    <div class="event-card relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden"
                        data-title="{{ strtolower($event->course_title) }}" data-category="{{ $categoryName }}"
                        data-person="{{ strtolower($event->resource_person ?? '') }}">

                        <!-- Banner -->
                        <div class="relative">
                            <img src="{{ $bannerUrl }}" alt="{{ $event->course_title }}"
                                class="w-full h-48 object-cover">
                            <div class="absolute top-4 left-4 flex gap-2">
                                <span
                                    class="px-3 py-1 text-xs font-bold rounded-full {{ $isUpcoming ? 'bg-green-500 text-white' : 'bg-gray-400 text-white' }}">
                                    {{ $isUpcoming ? 'Upcoming' : 'Past' }}
                                </span>
                                <span class="px-3 py-1 text-xs font-bold rounded-full {{ $categoryColor }}">
                                    {{ $event->category->category_name ?? 'Other' }}
                                </span>
                            </div>
                        </div>

                        <!-- Event Info -->
                        <div class="p-5 space-y-3 flex flex-col">
                            <h3 class="text-xl font-bold text-gray-800 line-clamp-2">{{ $event->course_title }}</h3>

                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $event->duration ?? '4 weeks' }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fas fa-users"></i>
                                    <span>{{ $event->enrolled_count ?? '125' }} enrolled</span>
                                </div>
                            </div>

                            <p class="text-gray-600 text-sm line-clamp-2">
                                {{ $event->description ?? 'Master the fundamentals and advanced concepts in this comprehensive course.' }}
                            </p>

                            <div class="space-y-2 mt-2">
                                <p class="flex items-center gap-2 text-gray-600 text-sm">
                                    <i class="fas fa-desktop text-gray-400"></i>
                                    <span class="font-semibold">Platform:</span> {{ $event->platform_used }}
                                </p>

                                <p class="flex items-center gap-2 text-gray-600 text-sm">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                    <span class="font-semibold">Starts:</span> {{ $startDate->format('M d, Y') }}
                                </p>

                                <p class="flex items-center gap-2 text-gray-600 text-sm">
                                    <i class="fas fa-user text-gray-400"></i>
                                    <span class="font-semibold">Instructor:</span> {{ $event->resource_person }}
                                </p>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                <span class="text-lg font-bold text-indigo-600">
                                    {{ $event->price ?? 'Free' }}
                                </span>
                                <a href="{{ route('events.joinForm', [
                                    'eventId' => $event->id,
                                    'category_id' => $event->category_id,
                                    'level' => $event->level,
                                    'course_title' => $event->course_title,
                                ]) }}"
                                    class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-2 px-4 rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transition transform hover:scale-105 text-sm">
                                    Join Now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="flex justify-center mt-8">
                <button id="loadMore"
                    class="bg-white border border-indigo-600 text-indigo-600 font-semibold py-2 px-6 rounded-lg hover:bg-indigo-50 transition duration-300">
                    Load More Courses
                </button>
            </div>
        </div>
    </div>
@include('components.footer')

    <!-- Carousel & Search Script -->
    <script>
        // Carousel
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.carousel-indicator');
        let currentSlide = 0;
        let autoSlideInterval;

        function showSlide(index) {
            slides[currentSlide].classList.replace('opacity-100', 'opacity-0');
            indicators[currentSlide].classList.remove('!bg-white');
            currentSlide = index;
            slides[currentSlide].classList.replace('opacity-0', 'opacity-100');
            indicators[currentSlide].classList.add('!bg-white');
        }

        function nextSlide() {
            let nextIndex = (currentSlide + 1) % slides.length;
            showSlide(nextIndex);
        }

        function prevSlide() {
            let prevIndex = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(prevIndex);
        }

        document.getElementById('nextBtn').addEventListener('click', () => {
            nextSlide();
            resetAutoSlide();
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            prevSlide();
            resetAutoSlide();
        });

        // Add click events to indicators
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                showSlide(index);
                resetAutoSlide();
            });
        });

        // Auto slide
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 5000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        startAutoSlide();

        // Search and Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const eventCards = document.querySelectorAll('.event-card');
            const loadMoreBtn = document.getElementById('loadMore');
            let visibleCards = 6; // Initial number of cards to show

            function filterEvents() {
                const searchQuery = searchInput.value.toLowerCase().trim();
                const categoryQuery = categoryFilter.value.toLowerCase().trim();

                let shownCount = 0;

                eventCards.forEach((card) => {
                    const title = card.dataset.title;
                    const category = card.dataset.category;
                    const person = card.dataset.person;

                    const matchesSearch = title.includes(searchQuery) ||
                        category.includes(searchQuery) ||
                        person.includes(searchQuery);

                    const matchesCategory = categoryQuery === '' || category.includes(categoryQuery);

                    if (matchesSearch && matchesCategory && shownCount < visibleCards) {
                        card.style.display = '';
                        shownCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Hide load more button if all cards are visible
                if (shownCount >= eventCards.length) {
                    loadMoreBtn.style.display = 'none';
                } else {
                    loadMoreBtn.style.display = '';
                }
            }


            searchInput.addEventListener('input', filterEvents);
            categoryFilter.addEventListener('change', filterEvents);

            // Load more functionality
            loadMoreBtn.addEventListener('click', function() {
                visibleCards += 3;
                filterEvents();

                // Hide load more button if all cards are visible
                if (visibleCards >= eventCards.length) {
                    loadMoreBtn.style.display = 'none';
                }
            });

            // Initial filter
            filterEvents();
        });
    </script>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .carousel-slide {
            transition: opacity 0.7s ease-in-out;
        }
    </style>
@endsection
