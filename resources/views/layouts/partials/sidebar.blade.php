<!-- Mobile Backdrop -->
<div
    x-show="sidebarOpen"
    @click="sidebarOpen = false"
    x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-40 lg:hidden"
    style="display: none;">
</div>

<!-- Sidebar Container -->
<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 border-r border-slate-800 text-slate-300 flex flex-col transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 shrink-0">

    <!-- Brand Header -->
    <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3.5 group">
            <div class="w-10 h-10 rounded-xl overflow-hidden bg-slate-800 ring-2 ring-blue-500/20 flex items-center justify-center p-1 shrink-0">
                <img
                    src="{{ asset('images/verinova.jpg') }}"
                    alt="Logo Verinova"
                    class="w-full h-full object-cover rounded-lg">
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <span class="font-bold text-white tracking-wide text-base group-hover:text-blue-400 transition">VERINOVA</span>
                    <span class="text-[10px] font-semibold uppercase px-1.5 py-0.5 rounded bg-blue-500/10 text-blue-400 border border-blue-500/20">Admin</span>
                </div>
                <p class="text-xs text-slate-400 font-medium">XII PPLG 2 — SMKN 2 PBG</p>
            </div>
        </a>

        <!-- Mobile Close Button -->
        <button
            @click="sidebarOpen = false"
            class="lg:hidden p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 transition"
            aria-label="Tutup navigasi">
            <x-icon name="x" class="w-5 h-5" />
        </button>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 px-4 py-5 space-y-1.5 overflow-y-auto">
        <div class="px-3 pb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
            Menu Utama
        </div>

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
           class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
            <x-icon name="layout-dashboard" class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
            <span>Dashboard</span>
        </a>

        {{-- Data Siswa --}}
        <a href="{{ route('admin.students.index') }}"
           class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.students.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
            <x-icon name="users" class="w-5 h-5 {{ request()->routeIs('admin.students.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
            <span>Data Siswa</span>
        </a>

        {{-- Struktur Organisasi --}}
        <a href="{{ route('organizations.index') }}"
           class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('organizations.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
            <x-icon name="network" class="w-5 h-5 {{ request()->routeIs('organizations.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
            <span>Struktur Organisasi</span>
        </a>

        {{-- Jadwal Pelajaran --}}
        <a href="{{ route('schedules.index') }}"
           class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('schedules.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
            <x-icon name="calendar-days" class="w-5 h-5 {{ request()->routeIs('schedules.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
            <span>Jadwal Pelajaran</span>
        </a>

        {{-- Jadwal Piket --}}
        <a href="{{ route('duty-schedules.index') }}"
           class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('duty-schedules.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
            <x-icon name="clipboard-check" class="w-5 h-5 {{ request()->routeIs('duty-schedules.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
            <span>Jadwal Piket</span>
        </a>

        <div class="pt-5 px-3 pb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
            Publikasi & Aktivitas
        </div>

        {{-- Galeri --}}
        <a href="{{ route('galleries.index') }}"
           class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('galleries.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
            <x-icon name="images" class="w-5 h-5 {{ request()->routeIs('galleries.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
            <span>Galeri Foto</span>
        </a>

        {{-- Prestasi --}}
        <a href="{{ route('achievements.index') }}"
           class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('achievements.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
            <x-icon name="trophy" class="w-5 h-5 {{ request()->routeIs('achievements.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
            <span>Prestasi Kelas</span>
        </a>

        {{-- Info Kelas --}}
        <a href="{{ route('class-infos.index') }}"
           class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('class-infos.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
            <x-icon name="megaphone" class="w-5 h-5 {{ request()->routeIs('class-infos.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
            <span>Informasi Kelas</span>
        </a>

        @if(auth()->user()->role == 'super_admin')
            <div class="pt-5 px-3 pb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
                Sistem
            </div>

            {{-- Kelola Admin --}}
            <a href="{{ route('admins.index') }}"
               class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('admins.*') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/30' : 'text-slate-300 hover:text-white hover:bg-slate-800/80' }}">
                <x-icon name="shield-check" class="w-5 h-5 {{ request()->routeIs('admins.*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-400' }}" />
                <span>Kelola Admin</span>
            </a>
        @endif

        <div class="pt-5 px-3 pb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400">
            Tautan Cepat
        </div>

        {{-- Lihat Website Publik --}}
        <a href="{{ url('/') }}"
           target="_blank"
           rel="noopener noreferrer"
           class="group flex items-center justify-between px-3.5 py-2 rounded-xl text-xs font-medium text-slate-400 hover:text-white hover:bg-slate-800/60 transition">
            <span class="flex items-center gap-2.5">
                <x-icon name="globe" class="w-4 h-4 text-slate-400 group-hover:text-blue-400" />
                <span>Website Publik</span>
            </span>
            <x-icon name="external-link" class="w-3.5 h-3.5 text-slate-400" />
        </a>
    </nav>

    <!-- Sidebar Footer / User Info -->
    <div class="p-4 border-t border-slate-800 bg-slate-900/50">
        <div class="flex items-center justify-between gap-3 p-2 rounded-xl bg-slate-800/40 border border-slate-800">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center text-white font-bold text-xs shrink-0 shadow-sm">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[11px] text-slate-400 capitalize truncate">
                        {{ str_replace('_', ' ', auth()->user()->role ?? 'Admin') }}
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    title="Keluar dari akun"
                    class="p-2 rounded-lg text-slate-400 hover:text-rose-400 hover:bg-slate-800 transition"
                    aria-label="Logout">
                    <x-icon name="logout" class="w-4 h-4" />
                </button>
            </form>
        </div>
    </div>
</aside>
