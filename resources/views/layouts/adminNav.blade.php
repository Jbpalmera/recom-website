<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Recommender System</title>
    @include('partials.favicon')
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .sidebar-transition {
            transition: all 0.3s ease;
        }

        .sidebar-hidden {
            transform: translateX(-100%);
            width: 0;
            overflow: hidden;
        }

        .main-expanded {
            width: 100%;
        }

        .hamburger-line {
            transition: all 0.3s ease;
        }

        .hamburger-active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger-active .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger-active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }

        /* Enhanced styles */
        .nav-item-active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 4px solid white;
        }

        .notification-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #ef4444;
        }

        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .search-suggestions {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 40;
        }

        .search-focused .search-suggestions {
            display: block;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900 flex min-h-screen">

    {{-- Add Alpine.js for toast functionality --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    {{-- Toast container --}}
    <div id="toast-container">
        @if (session('success'))
            <x-toast type="success" message="{{ session('success') }}" />
        @endif

        @if (session('error'))
            <x-toast type="error" message="{{ session('error') }}" />
        @endif

        @if (session('warning'))
            <x-toast type="warning" message="{{ session('warning') }}" />
        @endif

        @if (session('info'))
            <x-toast type="info" message="{{ session('info') }}" />
        @endif
    </div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="w-64 h-screen sticky top-0 flex flex-col sidebar-transition z-20
    bg-gradient-to-br from-indigo-700 to-purple-800 text-white shadow-xl">

        <div class="p-6 border-b border-indigo-500 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                    <div class="w-12 h-12  rounded-lg flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/logo.png') }}" alt="Recommender Logo"
                            class="object-contain w-full h-full">
                    </div>

                </div>
                <h2 class="text-2l font-bold">ADMIN PANEL</h2>
            </div>
            <button id="closeSidebar" class="md:hidden text-white hover:text-gray-200">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <nav class="flex-1 p-4 space-y-1 mt-4">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-600 transition-all duration-300 group relative nav-item-active">
                <i class="fas fa-chart-pie mr-3 group-hover:text-gray-200 text-lg"></i>
                <span class="font-medium">Dashboard</span>
            </a>


            <a href="{{ route('admin.events.createEvents') }}"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-600 transition-all duration-300 group relative">
                <svg class="w-5 h-5 m-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                <span class="font-medium">Create Course</span>
            </a>
            <a href="{{ route('admin.viewEvents') }}"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-600 transition-all duration-300 group relative">
                <svg class="w-5 h-5 m-2 text-white-600 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                <span>View Courses</span>
            </a>

            <a href="{{ route('admin.profile') }}"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-600 transition-all duration-300 group relative">
                <i class="fas fa-user m-2 group-hover:text-gray-200 text-lg"></i>
                <span class="font-medium">Profile</span>
            </a>

            <div class="pt-4 mt-4 border-t border-indigo-500">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full text-left px-4 py-3 rounded-xl hover:bg-red-600 transition-all duration-300 group text-red-200 hover:text-white">
                        <i class="fas fa-sign-out-alt mr-3 text-lg"></i>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-indigo-500 text-center text-xs text-indigo-200">
            <div class="mb-2">
                <i class="fas fa-cogs text-lg mb-1"></i>
            </div>
            <p class="font-medium">Powered by DICT</p>
            <p>Digital Skills Development</p>
        </div>
    </aside>


    <!-- Sidebar Overlay (for mobile) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-10 hidden"></div>

    <!-- Main Content -->
    <div id="mainContent" class="flex-1 flex flex-col sidebar-transition">
        <!-- Top Navbar -->
        <header
            class="sticky top-0 z-30 bg-white shadow-sm p-4 flex justify-between items-center border-b border-gray-200">
            <div class="flex items-center space-x-4">
                <!-- Sidebar toggle -->
                <button id="toggleSidebar" class="text-gray-600 hover:text-indigo-600 focus:outline-none md:hidden">
                    <div class="hamburger w-6 h-5 flex flex-col justify-between">
                        <span class="hamburger-line block w-full h-0.5 bg-gray-600"></span>
                        <span class="hamburger-line block w-full h-0.5 bg-gray-600"></span>
                        <span class="hamburger-line block w-full h-0.5 bg-gray-600"></span>
                    </div>
                </button>

                <!-- Dashboard title -->
                <h1 class="text-gray-800 font-bold text-xl">Dashboard</h1>
            </div>


            <!-- User info and notifications -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <div class="relative">
                    <button id="notificationBtn" class="text-gray-600 hover:text-indigo-600 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="notification-dot"></span>
                    </button>
                    <div id="notificationDropdown"
                        class="dropdown-menu absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-40">
                        <div class="px-4 py-2 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="font-semibold text-gray-800">Notifications</h3>
                            <span class="text-xs text-indigo-600 cursor-pointer">Mark all as read</span>
                        </div>
                        <div class="max-h-64 overflow-y-auto">
                            <div class="px-4 py-3 hover:bg-gray-50 border-b border-gray-100 cursor-pointer">
                                <div class="flex items-start">
                                    <div class="bg-indigo-100 text-indigo-600 rounded-full p-2 mr-3">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">New event recommendation</p>
                                        <p class="text-xs text-gray-500">2 hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 hover:bg-gray-50 border-b border-gray-100 cursor-pointer">
                                <div class="flex items-start">
                                    <div class="bg-green-100 text-green-600 rounded-full p-2 mr-3">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">New user registered</p>
                                        <p class="text-xs text-gray-500">5 hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 hover:bg-gray-50 cursor-pointer">
                                <div class="flex items-start">
                                    <div class="bg-yellow-100 text-yellow-600 rounded-full p-2 mr-3">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">System maintenance scheduled</p>
                                        <p class="text-xs text-gray-500">1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-2 border-t border-gray-100 text-center">
                            <a href="#" class="text-sm text-indigo-600 font-medium">View all notifications</a>
                        </div>
                    </div>
                </div>

                <!-- User dropdown -->
                <div class="relative">
                    <button id="userDropdownBtn" class="flex items-center space-x-2 focus:outline-none">
                        <div class="text-right hidden sm:block">
                            <div class="text-sm font-medium text-gray-800">
                                {{ Auth::guard('admin')->user()->name ?? 'admins' }}
                            </div>
                            {{-- <div class="text-xs text-gray-500">{{ auth()->user()->last_name ?? 'User' }}</div> --}}
                        </div>
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full flex items-center justify-center font-bold shadow-md">
                            {{ substr(Auth::guard('admin')->user()->name ?? 'U', 0, 1) }}
                        </div>
                        <i class="fas fa-chevron-down text-gray-500 text-xs"></i>
                    </button>
                    <div id="userDropdown"
                        class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 py-1 z-40">
                        <a href="{{ route('admin.profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user mr-2 text-gray-500"></i>Your Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-cog mr-2 text-gray-500"></i>Settings
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-question-circle mr-2 text-gray-500"></i>Help & Support
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i>Sign out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6 flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            // Dropdown elements
            const notificationBtn = document.getElementById('notificationBtn');
            const notificationDropdown = document.getElementById('notificationDropdown');
            const userDropdownBtn = document.getElementById('userDropdownBtn');
            const userDropdown = document.getElementById('userDropdown');

            // Initialize based on screen size
            if (window.innerWidth < 768) {
                sidebar.classList.add('sidebar-hidden');
                mainContent.classList.add('main-expanded');
                hamburger.classList.add('hamburger-active');
                localStorage.setItem('sidebarHidden', true);
            }

            // Notification dropdown functionality
            notificationBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                notificationDropdown.classList.toggle('show');
                userDropdown.classList.remove('show');
            });

            // User dropdown functionality
            userDropdownBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('show');
                notificationDropdown.classList.remove('show');
            });


        });

        // Filter events function (placeholder)
    </script>
</body>

</html>
