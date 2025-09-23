<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommender System</title>
    @vite('resources/css/app.css')

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Gradient background for consistency */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="gradient-bg font-sans antialiased min-h-screen flex flex-col">

  <!-- Header -->
<header class="fixed top-0 left-0 w-full backdrop-blur bg-white/70 shadow z-10">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Logo + Title -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto mr-3">
            <span class="font-bold text-xl text-gray-800">Recommender System</span>
        </div>

        <!-- Right-side navigation -->
        <nav class="space-x-4 flex items-center">
            @auth
                <!-- Show logout if logged in -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            @else
                <!-- Show login/register if not logged in -->
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 font-medium">
                    <i class="fas fa-sign-in-alt mr-1"></i> Login
                </a>
                <a href="{{ route('register.step1') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    <i class="fas fa-user-plus mr-1"></i> Register
                </a>
            @endauth
        </nav>
    </div>
</header>


    <!-- Main content area -->
    <main class="flex-grow pt-20">
        <div class="max-w-5xl mx-auto px-4">
            @yield('content')
        </div>
    </main>

   

</body>
</html>
