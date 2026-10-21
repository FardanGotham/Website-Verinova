<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Login Administrator') — Verinova XII PPLG 2</title>

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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body
    x-data="{
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
        }
    }"
    class="min-h-full bg-slate-100/70 dark:bg-slate-950 text-slate-800 dark:text-slate-100 font-sans antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8 selection:bg-blue-600 selection:text-white transition-colors duration-200 relative overflow-hidden">

    <!-- Decorative Soft Glow Elements -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-500/10 dark:bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-cyan-500/10 dark:bg-cyan-600/15 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Theme Toggle at Top Right -->
    <div class="absolute top-5 right-5 z-20">
        <button
            @click="toggleTheme()"
            type="button"
            class="w-10 h-10 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-sm text-slate-600 dark:text-slate-300 flex items-center justify-center transition hover:bg-slate-50 dark:hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
            :title="isDark ? 'Ganti ke Light Mode' : 'Ganti ke Dark Mode'"
            aria-label="Toggle tema tampilan">
            <template x-if="isDark">
                <x-icon name="sun" class="w-5 h-5 text-amber-400" />
            </template>
            <template x-if="!isDark">
                <x-icon name="moon" class="w-5 h-5 text-slate-600" />
            </template>
        </button>
    </div>

    <!-- Main Container -->
    <div class="sm:mx-auto sm:w-full sm:max-w-md relative z-10 px-4">
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="inline-flex flex-col items-center group">
                <div class="w-16 h-16 rounded-2xl overflow-hidden bg-slate-900 ring-4 ring-blue-500/20 shadow-lg p-1.5 mb-3 group-hover:scale-105 transition-transform duration-200">
                    <img
                        src="{{ asset('images/verinova.jpg') }}"
                        alt="Logo Verinova"
                        class="w-full h-full object-cover rounded-xl">
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                    VERINOVA
                </h1>
                <p class="text-xs font-medium text-slate-500 dark:text-slate-400 mt-1">
                    Portal Administrasi &bull; XII PPLG 2 SMK Negeri 2 Purbalingga
                </p>
            </a>
        </div>

        <!-- Card Container -->
        <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-xl shadow-slate-200/50 dark:shadow-black/40 transition-colors duration-200">
            {{ $slot }}
        </div>

        <!-- Bottom Footer Info -->
        <div class="mt-8 text-center text-xs text-slate-400 dark:text-slate-500">
            <p>&copy; {{ date('Y') }} Verinova &mdash; Seluruh Hak Cipta Dilindungi.</p>
            <a href="{{ url('/') }}" class="inline-flex items-center gap-1.5 text-blue-600 dark:text-blue-400 hover:underline mt-2 font-medium">
                <x-icon name="arrow-left" class="w-3.5 h-3.5" />
                <span>Kembali ke Website Publik</span>
            </a>
        </div>
    </div>
</body>
</html>
