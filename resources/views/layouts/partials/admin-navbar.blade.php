<header class="h-20 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200/80 dark:border-slate-800 sticky top-0 z-30 px-4 sm:px-6 lg:px-8 transition-colors duration-200">
    <div class="h-full flex items-center justify-between gap-4">

        <!-- Left: Mobile Menu Toggle & Page Context -->
        <div class="flex items-center gap-3 sm:gap-4 min-w-0">
            <!-- Mobile Menu Button -->
            <button
                @click="sidebarOpen = true"
                type="button"
                class="lg:hidden p-2 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition focus:outline-none focus:ring-2 focus:ring-blue-500"
                aria-label="Buka navigasi samping">
                <x-icon name="menu" class="w-5 h-5" />
            </button>

            <!-- Page Title / Breadcrumb -->
            <div class="min-w-0">
                <div class="flex items-center gap-2 text-xs font-medium text-slate-400 dark:text-slate-500 mb-0.5">
                    <span>Admin</span>
                    <span>/</span>
                    <span class="text-blue-600 dark:text-blue-400 font-semibold truncate">
                        @if(request()->routeIs('dashboard'))
                            Dashboard
                        @elseif(request()->routeIs('admin.students.*'))
                            Siswa
                        @elseif(request()->routeIs('organizations.*'))
                            Organisasi
                        @elseif(request()->routeIs('schedules.*'))
                            Jadwal
                        @elseif(request()->routeIs('duty-schedules.*'))
                            Piket
                        @elseif(request()->routeIs('galleries.*'))
                            Galeri
                        @elseif(request()->routeIs('achievements.*'))
                            Prestasi
                        @elseif(request()->routeIs('class-infos.*'))
                            Info Kelas
                        @elseif(request()->routeIs('admins.*'))
                            Kelola Admin
                        @else
                            Halaman
                        @endif
                    </span>
                </div>
                <h1 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white truncate">
                    @yield('page-title', 'Dashboard Admin')
                </h1>
            </div>
        </div>

        <!-- Right: Actions & Profile -->
        <div class="flex items-center gap-2 sm:gap-3">

            <!-- Theme Toggle Button -->
            <button
                @click="toggleTheme()"
                type="button"
                class="w-10 h-10 rounded-xl bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700/80 text-slate-600 dark:text-slate-300 flex items-center justify-center transition focus:outline-none focus:ring-2 focus:ring-blue-500"
                :title="isDark ? 'Ganti ke Light Mode' : 'Ganti ke Dark Mode'"
                aria-label="Toggle tema tampilan">
                <template x-if="isDark">
                    <x-icon name="sun" class="w-5 h-5 text-amber-400" />
                </template>
                <template x-if="!isDark">
                    <x-icon name="moon" class="w-5 h-5 text-slate-600" />
                </template>
            </button>

            <!-- User Dropdown Menu -->
            <div x-data="{ open: false }" @click.outside="open = false" class="relative">
                <button
                    @click="open = !open"
                    type="button"
                    class="flex items-center gap-3 p-1.5 sm:px-3 sm:py-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition focus:outline-none focus:ring-2 focus:ring-blue-500"
                    aria-expanded="false"
                    :aria-expanded="open.toString()">

                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-600 to-cyan-500 text-white font-bold text-sm flex items-center justify-center shadow-sm shrink-0">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="hidden sm:block text-left">
                        <div class="text-sm font-semibold text-slate-800 dark:text-white leading-tight truncate max-w-[120px]">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="text-[11px] font-medium text-slate-400 dark:text-slate-400 capitalize">
                            {{ str_replace('_', ' ', auth()->user()->role ?? 'Admin') }}
                        </div>
                    </div>

                    <x-icon name="chevron-down" class="w-4 h-4 text-slate-400 hidden sm:block transition-transform duration-200" ::class="open ? 'rotate-180' : ''" />
                </button>

                <!-- Dropdown Menu Box -->
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-60 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 shadow-xl py-2 z-50"
                    style="display: none;">

                    <div class="px-4 py-3 border-b border-slate-100 dark:border-slate-800">
                        <p class="text-xs text-slate-400 font-medium">Masuk sebagai</p>
                        <p class="text-sm font-semibold text-slate-900 dark:text-white truncate mt-0.5">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 truncate font-mono mt-0.5">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                    <div class="py-1">
                        <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-2.5 px-4 py-2 text-xs font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800/80 transition">
                            <x-icon name="external-link" class="w-4 h-4 text-slate-400" />
                            <span>Lihat Website Kelas</span>
                        </a>

                        @if(auth()->user()->role == 'super_admin')
                            <a href="{{ route('admins.index') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800/80 transition">
                                <x-icon name="shield-check" class="w-4 h-4 text-slate-400" />
                                <span>Kelola Admin</span>
                            </a>
                        @endif
                    </div>

                    <div class="pt-1 border-t border-slate-100 dark:border-slate-800">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="w-full flex items-center gap-2.5 px-4 py-2 text-xs font-medium text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-950/30 transition text-left">
                                <x-icon name="logout" class="w-4 h-4" />
                                <span>Keluar Sistem</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</header>
