<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') — Verinova XII PPLG 2</title>

    <!-- Theme Initialization Script (Anti-FOUC) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body
    x-data="{
        sidebarOpen: false,
        isDark: document.documentElement.classList.contains('dark'),
        toggleTheme() {
            if (this.isDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                this.isDark = false;
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                this.isDark = true;
            }
            window.dispatchEvent(new CustomEvent('theme-changed', { detail: { dark: this.isDark } }));
        }
    }"
    class="min-h-full bg-slate-100/70 dark:bg-slate-950 text-slate-800 dark:text-slate-100 antialiased font-sans selection:bg-blue-600 selection:text-white transition-colors duration-200">

    <x-toast />

    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        @include('layouts.partials.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0 transition-all duration-300">
            <!-- Header Navbar -->
            @include('layouts.partials.admin-navbar')

            <!-- Main Content Container -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto">
                @yield('content')
            </main>

            <!-- Admin Footer -->
            <footer class="border-t border-slate-200/80 dark:border-slate-800/80 py-4 px-6 sm:px-8 text-center text-xs text-slate-500 dark:text-slate-400">
                &copy; {{ date('Y') }} <span class="font-semibold text-slate-700 dark:text-slate-200">Verinova</span> — XII PPLG 2 SMK Negeri 2 Purbalingga. Hak Cipta Dilindungi.
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
