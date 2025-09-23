<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Recommender System</title>

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
    </style>
</head>

<body class="bg-gray-100 text-gray-900 flex min-h-screen">

    <!-- Sidebar -->
    <!-- Sidebar -->
    <aside id="sidebar"
        class="w-64 h-screen sticky top-0 flex flex-col sidebar-transition z-20
    bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-md">

        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-2xl font-bold">Recommender</h2>
            <button id="closeSidebar" class="md:hidden text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-700 transition-all duration-300 group">
                <i class="fas fa-chart-pie mr-3 group-hover:text-gray-200"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('events.index') }}"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-700 transition-all duration-300 group">
                <i class="fas fa-calendar-alt mr-3 group-hover:text-gray-200"></i>
                <span>Events</span>
            </a>

            <a href="#"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-700 transition-all duration-300 group">
                <i class="fas fa-info-circle mr-3 group-hover:text-gray-200"></i>
                <span>About us</span>
            </a>

            <a href="{{ route('profile') }}"
                class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-700 transition-all duration-300 group">
                <i class="fas fa-user mr-3 group-hover:text-gray-200"></i>
                <span>Profile</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center w-full text-left px-4 py-3 rounded-xl hover:bg-red-600 transition-all duration-300 group text-red-200 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t text-center text-xs text-white">
            <p>Powered by DICT</p>
            <p>Digital Skills Development</p>
        </div>
    </aside>


    <!-- Sidebar Overlay (for mobile) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-10 hidden"></div>

    <!-- Main Content -->
    <div id="mainContent" class="flex-1 flex flex-col sidebar-transition">
        <!-- Top Navbar -->
        <!-- Top Navbar -->
        <header
            class="sticky top-0 z-30 bg-gradient-to-r from-indigo-600 to-purple-600 shadow p-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <!-- Sidebar toggle -->
                <button id="toggleSidebar" class="text-white focus:outline-none md:hidden">
                    <div class="hamburger w-6 h-5 flex flex-col justify-between">
                        <span class="hamburger-line block w-full h-0.5 bg-white"></span>
                        <span class="hamburger-line block w-full h-0.5 bg-white"></span>
                        <span class="hamburger-line block w-full h-0.5 bg-white"></span>
                    </div>
                </button>

                <!-- Dashboard title -->
                <h1 class="text-white font-bold text-xl">Dashboard</h1>
            </div>

            <!-- Search bar -->
            <div class="flex-1 max-w-md mx-6">
                <input type="text" id="searchInput" placeholder="🔍 Search events..."
                    class="w-full px-4 py-2 rounded-2xl shadow-md focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 transition"
                    onkeyup="filterEvents()">
            </div>

            <!-- User info -->
            <div class="flex items-center space-x-4">
                <span class="text-white">Welcome, {{ auth()->user()->first_name ?? 'User' }}</span>
                <div class="w-8 h-8 bg-white text-indigo-700 rounded-full flex items-center justify-center font-bold">
                    {{ substr(auth()->user()->first_name ?? 'U', 0, 1) }}
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
            const toggleSidebar = document.getElementById('toggleSidebar');
            const closeSidebar = document.getElementById('closeSidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const hamburger = document.querySelector('.hamburger');

            // Check if sidebar state is stored in localStorage
            const isSidebarHidden = localStorage.getItem('sidebarHidden') === 'true';

            // Apply initial state
            if (isSidebarHidden) {
                sidebar.classList.add('sidebar-hidden');
                mainContent.classList.add('main-expanded');
                hamburger.classList.add('hamburger-active');
            }

            // Toggle sidebar function
            function toggleSidebarState() {
                sidebar.classList.toggle('sidebar-hidden');
                mainContent.classList.toggle('main-expanded');
                hamburger.classList.toggle('hamburger-active');

                // Store state in localStorage
                localStorage.setItem('sidebarHidden', sidebar.classList.contains('sidebar-hidden'));
            }

            // Toggle sidebar on button click
            toggleSidebar.addEventListener('click', function() {
                toggleSidebarState();

                // Show overlay on mobile when sidebar is open
                if (window.innerWidth < 768 && !sidebar.classList.contains('sidebar-hidden')) {
                    sidebarOverlay.classList.remove('hidden');
                } else {
                    sidebarOverlay.classList.add('hidden');
                }
            });

            // Close sidebar on close button click
            closeSidebar.addEventListener('click', function() {
                sidebar.classList.add('sidebar-hidden');
                mainContent.classList.add('main-expanded');
                hamburger.classList.add('hamburger-active');
                sidebarOverlay.classList.add('hidden');
                localStorage.setItem('sidebarHidden', true);
            });

            // Close sidebar when clicking on overlay (mobile)
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.add('sidebar-hidden');
                mainContent.classList.add('main-expanded');
                hamburger.classList.add('hamburger-active');
                sidebarOverlay.classList.add('hidden');
                localStorage.setItem('sidebarHidden', true);
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    // On desktop, always show sidebar unless explicitly hidden
                    sidebarOverlay.classList.add('hidden');
                } else {
                    // On mobile, hide sidebar by default
                    if (!sidebar.classList.contains('sidebar-hidden')) {
                        sidebarOverlay.classList.remove('hidden');
                    }
                }
            });

            // Initialize based on screen size
            if (window.innerWidth < 768) {
                sidebar.classList.add('sidebar-hidden');
                mainContent.classList.add('main-expanded');
                hamburger.classList.add('hamburger-active');
                localStorage.setItem('sidebarHidden', true);
            }
        });
    </script>
</body>

</html>
