<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ClinicFlow Admin') | Clinic Management System</title>

    <link  href="{{ asset('AdminJs/css/app.css') }}" rel="stylesheet"></link>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 (Free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        secondary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        accent: {
                            50: '#fefce8',
                            100: '#fef9c3',
                            200: '#fef08a',
                            300: '#fde047',
                            400: '#facc15',
                            500: '#eab308',
                            600: '#ca8a04',
                            700: '#a16207',
                            800: '#854d0e',
                            900: '#713f12',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                        'slide-in': 'slideIn 0.3s ease-out',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                    }
                }
            }
        }
    </script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #f0f2f5 100%);
            overflow-x: hidden;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Sidebar transition */
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Card hover effect */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.1);
        }

        /* Glass morphism */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Active nav item */
        .nav-active {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white !important;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .nav-active i {
            color: white !important;
        }

        /* Loading spinner */
        .loading-spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3b82f6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-transition fixed lg:relative z-30 w-72 h-full bg-white shadow-2xl lg:translate-x-0 -translate-x-full">
            <div class="flex flex-col h-full">
                <!-- Sidebar Header -->
                <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-800 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-stethoscope text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">ClinicFlow</h1>
                            <p class="text-xs text-gray-500">Admin Dashboard</p>
                        </div>
                    </div>
                    <button id="closeSidebar" class="lg:hidden text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Sidebar Navigation -->
                <nav class="flex-1 overflow-y-auto py-6 px-4">
                    <div class="space-y-6">
                        <!-- Dashboard Section -->
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">
                                <i class="fas fa-chart-line mr-2"></i> Main
                            </p>
                            <div class="space-y-1">
                                <a href="{{ route('admin.index') }}" class="nav-item flex items-center space-x-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 transition-all duration-200 {{ request()->routeIs('admin.index') ? 'nav-active' : '' }}">
                                    <i class="fas fa-tachometer-alt w-5 text-lg"></i>
                                    <span class="font-medium">Dashboard</span>
                                    @if(request()->routeIs('admin.index'))
                                        <i class="fas fa-chevron-right ml-auto text-xs"></i>
                                    @endif
                                </a>
                            </div>
                        </div>

                        <!-- Department Section -->
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">
                                <i class="fas fa-building mr-2"></i> Departments
                            </p>
                            <div class="space-y-1">
                                <a href="{{ route('admin.departments.create') }}" class="nav-item flex items-center space-x-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 transition-all duration-200 {{ request()->routeIs('admin.departments.create') ? 'nav-active' : '' }}">
                                    <i class="fas fa-plus-circle w-5"></i>
                                    <span class="font-medium">Create Department</span>
                                </a>
                                <a href="{{ route('admin.departments.manage') }}" class="nav-item flex items-center space-x-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 transition-all duration-200 {{ request()->routeIs('admin.departments.manage') ? 'nav-active' : '' }}">
                                    <i class="fas fa-list-ul w-5"></i>
                                    <span class="font-medium">Manage Departments</span>
                                    @if(request()->routeIs('admin.departments.manage'))
                                        <i class="fas fa-chevron-right ml-auto text-xs"></i>
                                    @endif
                                </a>
                            </div>
                        </div>

                        <!-- Doctor Section -->
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">
                                <i class="fas fa-user-md mr-2"></i> Doctors
                            </p>
                            <div class="space-y-1">
                                <a href="{{ route('admin.doctors.create') }}" class="nav-item flex items-center space-x-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 transition-all duration-200 {{ request()->routeIs('admin.doctors.create') ? 'nav-active' : '' }}">
                                    <i class="fas fa-user-plus w-5"></i>
                                    <span class="font-medium">Add Doctor</span>
                                </a>
                                <a href="{{ route('admin.doctors.manage') }}" class="nav-item flex items-center space-x-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 transition-all duration-200 {{ request()->routeIs('admin.doctors.manage') ? 'nav-active' : '' }}">
                                    <i class="fas fa-users w-5"></i>
                                    <span class="font-medium">Manage Doctors</span>
                                    @if(request()->routeIs('admin.doctors.manage'))
                                        <i class="fas fa-chevron-right ml-auto text-xs"></i>
                                    @endif
                                </a>
                            </div>
                        </div>

                        <!-- Users Section -->
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">
                                <i class="fas fa-users mr-2"></i> Users
                            </p>
                            <div class="space-y-1">
                                <a href="{{ route('admin.users.manage') }}" class="nav-item flex items-center space-x-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 transition-all duration-200 {{ request()->routeIs('admin.users.manage') ? 'nav-active' : '' }}">
                                    <i class="fas fa-user-cog w-5"></i>
                                    <span class="font-medium">Manage Users</span>
                                    @if(request()->routeIs('admin.users.manage'))
                                        <i class="fas fa-chevron-right ml-auto text-xs"></i>
                                    @endif
                                </a>
                            </div>
                        </div>

                        <!-- Appointments Section (Optional) -->
                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 px-3">
                                <i class="fas fa-calendar-alt mr-2"></i> Appointments
                            </p>
                            <div class="space-y-1">
                                <a href="#" class="nav-item flex items-center space-x-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 transition-all duration-200">
                                    <i class="fas fa-calendar-check w-5"></i>
                                    <span class="font-medium">Today's Schedule</span>
                                </a>
                                <a href="#" class="nav-item flex items-center space-x-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-gray-50 transition-all duration-200">
                                    <i class="fas fa-chart-bar w-5"></i>
                                    <span class="font-medium">Reports</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Sidebar Footer / User Info -->
                <div class="p-4 border-t border-gray-100">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-circle text-primary-600 text-xl"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-700 truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden hidden transition-opacity"></div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation Bar -->
            <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-200 sticky top-0 z-10">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <button id="toggleSidebar" class="lg:hidden text-gray-600 hover:text-primary-600 transition">
                                <i class="fas fa-bars text-2xl"></i>
                            </button>
                            <div class="hidden lg:block">
                                <h2 class="text-lg font-semibold text-gray-700">@yield('page-title', 'Dashboard')</h2>
                                <p class="text-sm text-gray-400">Welcome back, {{ Auth::user()->name }}!</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                          

                            <!-- Notifications -->
                            <button class="relative text-gray-600 hover:text-primary-600 transition">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-[10px] text-white flex items-center justify-center">3</span>
                            </button>

                            <!-- User Dropdown -->
                            <div class="relative group">
                                <button class="flex items-center space-x-2 focus:outline-none">
                                    <div class="w-9 h-9 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full flex items-center justify-center text-white font-semibold shadow-md">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <i class="fas fa-chevron-down text-gray-400 text-xs transition-transform group-hover:rotate-180"></i>
                                </button>
                                <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-20">
                                    <div class="p-2">
                                        <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition">
                                            <i class="fas fa-user w-4"></i>
                                            <span>My Profile</span>
                                        </a>
                                        <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-50 transition">
                                            <i class="fas fa-cog w-4"></i>
                                            <span>Settings</span>
                                        </a>
                                        <div class="border-t border-gray-100 my-1"></div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="w-full flex items-center space-x-3 px-3 py-2 rounded-lg text-red-600 hover:bg-red-50 transition">
                                                <i class="fas fa-sign-out-alt w-4"></i>
                                                <span>Logout</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm animate-fade-in">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3 text-lg"></i>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-sm animate-fade-in">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3 text-lg"></i>
                            <p>{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg shadow-sm animate-fade-in">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-triangle text-yellow-500 mr-3 text-lg mt-0.5"></i>
                            <div>
                                <p class="font-semibold">Please fix the following errors:</p>
                                <ul class="list-disc list-inside text-sm mt-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('admin-content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-4 px-6">
                <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
                    <p>&copy; {{ date('Y') }} ClinicFlow. All rights reserved.</p>
                    <div class="flex space-x-4 mt-2 md:mt-0">
                        <a href="#" class="hover:text-primary-600 transition">Privacy Policy</a>
                        <a href="#" class="hover:text-primary-600 transition">Terms of Service</a>
                        <a href="#" class="hover:text-primary-600 transition">Support</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JavaScript for sidebar toggle -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('toggleSidebar');
        const closeBtn = document.getElementById('closeSidebar');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);

        // Close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebar.classList.contains('translate-x-0')) {
                closeSidebar();
            }
        });

        // Active nav item indicator
        document.querySelectorAll('.nav-item').forEach(item => {
            if (item.classList.contains('nav-active')) {
                item.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    </script>

    @stack('scripts')
    <script src="{{ asset('AdminJs/js/app.js') }}"></script>
	<script src="{{ asset('AdminJs/js/live-search.js') }}"></script>
</body>
</html>
