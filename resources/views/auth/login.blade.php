<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">

        <!-- Header -->
        <div class="text-center mb-6">

            <h1 class="text-3xl font-bold text-blue-600">
                Clinic Queue System
            </h1>

            <p class="text-gray-500 mt-2">
                Sign in to your account
            </p>

        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- Email -->
            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full mt-1 border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                >

                @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Password -->
            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full mt-1 border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                >

                @error('password')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">

                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">

                    <span class="text-sm text-gray-600">
                        Remember me
                    </span>
                </label>

                @if (Route::has('password.request'))

                    <a href="{{ route('password.request') }}"
                       class="text-sm text-blue-600 hover:text-blue-800">

                        Forgot Password?

                    </a>

                @endif

            </div>

            <!-- Login Button -->
            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition"
            >
                Login
            </button>

            <!-- Register Link -->
            <div class="text-center mt-4">

                <a href="{{ route('register') }}"
                   class="text-blue-600 hover:text-blue-800 text-sm font-medium">

                    Don't have an account? Register

                </a>

            </div>

        </form>

    </div>

</body>
</html>
