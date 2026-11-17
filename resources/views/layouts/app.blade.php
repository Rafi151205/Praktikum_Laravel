<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Surat')</title>
    
    <!-- Memanggil Vite untuk Tailwind CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex flex-col font-sans text-slate-800 antialiased">

    <!-- Header / Navbar Modern -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            
            <!-- Logo / Brand -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold shadow-md shadow-blue-500/20">
                    📦
                </div>
                <div>
                    <span class="font-extrabold text-slate-900 tracking-tight text-lg">SI-Surat</span>
                    <span class="hidden sm:block text-xs text-slate-400 font-medium">Manajemen Arsip Digital</span>
                </div>
            </div>

            <!-- Navigasi Menu -->
            <nav class="hidden md:flex items-center gap-1 font-medium text-sm text-slate-600">
                <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg transition hover:bg-slate-100 hover:text-blue-600 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('surat-masuk.index') }}" class="px-3 py-2 rounded-lg transition hover:bg-slate-100 hover:text-blue-600 {{ request()->routeIs('surat-masuk*') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                    Surat Masuk
                </a>
                <a href="{{ route('surat-keluar.index') }}" class="px-3 py-2 rounded-lg transition hover:bg-slate-100 hover:text-blue-600 {{ request()->routeIs('surat-keluar*') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                    Surat Keluar
                </a>
            </nav>

            <!-- Informasi User & Tombol Keluar -->
            <div class="flex items-center gap-4">
                @auth
                    <div class="hidden lg:flex flex-col text-right">
                        <span class="text-xs font-semibold text-slate-800">{{ auth()->user()->name }}</span>
                        <span class="text-[10px] text-slate-400">Online</span>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 px-3.5 py-2 text-xs font-semibold text-rose-600 bg-rose-50 hover:bg-rose-100 rounded-xl transition duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Keluar</span>
                        </button>
                    </form>
                @endauth
            </div>

        </div>
    </header>

    <!-- Konten Utama (Main) -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Modern -->
    <footer class="bg-white border-t border-slate-200 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <p>&copy; 2026 Sistem Informasi Pengelolaan Surat. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 text-emerald-600 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Vite & Tailwind Active
                </span>
            </div>
        </div>
    </footer>

</body>
</html>