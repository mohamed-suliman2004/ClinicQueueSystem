{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email | ClinicFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'sans': ['Inter', 'system-ui', 'sans-serif'] },
                    colors: { 'clinic': { 500: '#3b82f6', 600: '#2563eb' } },
                }
            }
        }
    </script>
    <style>
        body { background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 100%); }
        .glass-card { background: rgba(255, 255, 255, 0.94); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.5); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); }
    </style>
</head>
<body class="font-sans antialiased min-h-screen flex items-center justify-center p-5">

    <div class="max-w-md w-full">
        <div class="glass-card rounded-3xl overflow-hidden shadow-2xl">
            <div class="px-8 py-12 text-center">
                <div class="bg-indigo-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-5">
                    <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Verify your email</h2>
                <p class="text-gray-500 text-sm mt-2">We've sent a verification link to your email address.</p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mt-4 bg-green-50 text-green-700 px-4 py-2 rounded-xl text-sm">
                        ✓ New verification link has been sent!
                    </div>
                @endif

                <div class="mt-6 space-y-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="w-full bg-clinic-600 hover:bg-clinic-700 text-white font-medium py-3 rounded-xl transition shadow-md">
                            Resend verification email
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-gray-500 hover:text-gray-700 text-sm py-2 transition">
                            ← Log out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
