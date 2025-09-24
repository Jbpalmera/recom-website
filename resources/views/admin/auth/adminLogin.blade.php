<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold text-center">Admin Login</h1>

        @if ($errors->any())
            <div class="p-2 text-sm text-red-600 bg-red-100 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-3 py-2 border rounded focus:ring focus:ring-indigo-300">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-3 py-2 border rounded focus:ring focus:ring-indigo-300">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm">Remember Me</label>
            </div>

            <button type="submit"
                    class="w-full py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">
                Login
            </button>
        </form>
    </div>

</body>
</html>
