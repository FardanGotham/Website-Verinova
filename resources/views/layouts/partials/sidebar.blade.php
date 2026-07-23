<aside class="w-72 bg-slate-900 text-white min-h-screen flex flex-col">

    {{-- Logo --}}
    <div class="p-6 border-b border-slate-800">

        <div class="flex items-center gap-4">

<div class="w-14 h-14 bg-black rounded-xl p-2">

    <img
        src="{{ asset('images/verinova.jpg') }}"
        class="w-full h-full object-contain">

</div>

<div>

<h1 class="font-bold text-xl">

XII PPLG 2

</h1>

<p class="text-xs text-slate-400">

Website Kelas

</p>

</div>

</div>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 p-4 space-y-2">

    <p class="text-xs uppercase tracking-widest

text-slate-500

px-4

mt-8">

MENU

</p>
        <a href="{{ route('dashboard') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl transition

{{ request()->routeIs('dashboard')
? 'bg-blue-600 text-white shadow-lg'
: 'hover:bg-slate-800
hover:translate-x-1
duration-300 text-slate-300' }}">

🏠

<span>Dashboard</span>

</a>

       <a href="{{ route('admin.students.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl transition
{{ request()->routeIs('admin.students.*')
    ? 'bg-blue-600 text-white shadow-lg'
    : 'hover:bg-slate-800 hover:translate-x-1 duration-300 text-slate-300' }}">

    👨‍🎓
    <span>Data Siswa</span>

</a>

        <a href="{{ route('organizations.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl transition

{{ request()->routeIs('organizations.*')
? 'bg-blue-600 text-white shadow-lg'
: 'hover:bg-slate-800
hover:translate-x-1
duration-300 text-slate-300' }}">

            👔
            <span>Struktur Organisasi</span>

        </a>

        <a href="{{ route('schedules.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition

{{ request()->routeIs('schedules.*')
? 'bg-blue-600 text-white shadow-lg'
: 'hover:bg-slate-800
hover:translate-x-1
duration-300 text-slate-300' }}">

            📅
            <span>Jadwal</span>

        </a>

        <a href="{{ route('galleries.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition

{{ request()->routeIs('galleries.*')
? 'bg-blue-600 text-white shadow-lg'
: 'hover:bg-slate-800
hover:translate-x-1
duration-300 text-slate-300' }}">

            📸
            <span>Galeri</span>

        </a>
        <a href="{{ route('achievements.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl transition
{{ request()->routeIs('achievements.*')
? 'bg-blue-600 text-white shadow-lg'
: 'hover:bg-slate-800 hover:translate-x-1 duration-300 text-slate-300' }}">

🏆

<span>Prestasi</span>

</a>
<a href="{{ route('class-infos.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl transition

{{ request()->routeIs('class-infos.*')
? 'bg-blue-600 text-white shadow-lg'
: 'hover:bg-slate-800 hover:translate-x-1 duration-300 text-slate-300' }}">

📢<span>Info Kelas</span>
</a>

<a href="{{ route('duty-schedules.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl transition
{{ request()->routeIs('duty-schedules.*')
? 'bg-blue-600 text-white shadow-lg'
: 'hover:bg-slate-800 hover:translate-x-1 duration-300 text-slate-300' }}">

🧹

<span>Jadwal Piket</span>

</a>
@if(auth()->user()->role == 'super_admin')
<a href="{{ route('admins.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl transition
{{ request()->routeIs('admins.*')
? 'bg-blue-600 text-white shadow-lg'
: 'hover:bg-slate-800 hover:translate-x-1 duration-300 text-slate-300' }}">
👤
<span>Kelola Admin</span>
</a>
@endif
        {{-- Menu yang akan kita buat nanti --}}
        <div class="pt-4 border-t border-slate-800 mt-4">

            <p class="px-4 text-xs uppercase text-slate-500 mb-2">
                Segera Hadir
            </p>
            <div class="px-4 py-2 text-slate-500">📂 Download</div>
            <div class="px-4 py-2 text-slate-500">📖 Buku Kenangan</div>

        </div>

    </nav>

    {{-- Logout --}}
    <div class="p-4 border-t border-slate-800">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                class="w-full bg-red-500 hover:bg-red-600 rounded-xl py-3 transition">

                🚪 Logout

            </button>

        </form>

    </div>

</aside>