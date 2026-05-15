<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | ClinicFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'sans': ['Inter', 'system-ui', 'sans-serif'] },
                    colors: {
                        'clinic': { 50: '#eff6ff', 100: '#dbeafe', 200: '#bfdbfe', 300: '#93c5fd', 400: '#60a5fa', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8', 800: '#1e40af', 900: '#1e3a8a' },
                    },
                    animation: { 'fade-in-up': 'fadeInUp 0.6s ease-out forwards' },
                    keyframes: {
                        fadeInUp: { '0%': { opacity: '0', transform: 'translateY(20px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #d9eafb 0%, #f0f9ff 50%, #e6f7f0 100%);
            background-attachment: fixed;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }
        .input-modern:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
            outline: none;
        }
        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -12px rgba(59,130,246,0.4);
        }
    </style>
</head>
<body class="font-sans antialiased min-h-screen flex items-center justify-center p-5">

    <div class="max-w-md w-full animate-[fadeInUp_0.6s_ease-out]">
        <div class="glass-card rounded-3xl overflow-hidden shadow-2xl">
            <div class="px-8 pt-10 pb-8">

                <!-- Header -->
                <div class="flex justify-between items-start mb-2">
                    <div class="bg-gradient-to-br from-clinic-600 to-clinic-800 w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-clinic-700">Secure Login</div>
                </div>

                <h2 class="text-3xl font-bold text-gray-800 mt-4">Welcome back</h2>
                <p class="text-gray-500 text-sm mt-1">Sign in to your dashboard</p>

                <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
                    @csrf

                    <!-- Session Status -->
                    @if(session('status'))
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-2 rounded-xl text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Email -->
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="input-modern w-full pl-10 pr-4 py-3 rounded-xl bg-white/80 border border-gray-200 focus:border-clinic-400 transition"
                                placeholder="Email address">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="input-modern w-full pl-10 pr-4 py-3 rounded-xl bg-white/80 border border-gray-200 focus:border-clinic-400 transition"
                                placeholder="Password">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-clinic-600 shadow-sm focus:ring-clinic-500">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-clinic-600 hover:underline font-medium">Forgot password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn-glow w-full bg-gradient-to-r from-clinic-600 to-clinic-700 hover:from-clinic-700 hover:to-clinic-800 text-white font-semibold py-3 rounded-xl transition-all duration-200 flex items-center justify-center gap-2 shadow-md mt-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Sign in to Dashboard
                    </button>

                    <div class="text-center mt-4">
                        <a href="{{ route('register') }}" class="text-sm text-clinic-600 hover:text-clinic-800 font-medium transition">
                            Don't have an account? <span class="font-bold">Create one →</span>
                        </a>
                    </div>
                </form>

                <div class="relative flex py-4 items-center mt-2">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-4 text-xs text-gray-400">ClinicFlow CMS</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>
                <p class="text-center text-xs text-gray-400">Secure • HIPAA Compliant • 24/7 Support</p>
            </div>
        </div>
    </div>
</body>
</html>
