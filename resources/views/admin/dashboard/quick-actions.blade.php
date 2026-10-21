<div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200">
    <div class="flex items-center justify-between mb-5">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/50 text-blue-600 dark:text-blue-400 flex items-center justify-center">
                <x-icon name="sparkles" class="w-4 h-4" />
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Aksi Cepat</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Pintasan navigasi untuk input data berkala</p>
            </div>
        </div>
        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Shortcut</span>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        {{-- Tambah Siswa --}}
        <a href="{{ route('admin.students.create') }}"
           class="group p-4 rounded-xl bg-slate-50 hover:bg-blue-50/70 dark:bg-slate-800/50 dark:hover:bg-slate-800 border border-slate-200/60 dark:border-slate-700/60 hover:border-blue-300 dark:hover:border-blue-600 transition-all duration-200 text-left">
            <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform duration-200">
                <x-icon name="users" class="w-5 h-5" />
            </div>
            <h4 class="text-sm font-semibold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">Tambah Siswa</h4>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Registrasi data baru</p>
        </a>

        {{-- Upload Galeri --}}
        <a href="{{ route('galleries.create') }}"
           class="group p-4 rounded-xl bg-slate-50 hover:bg-purple-50/70 dark:bg-slate-800/50 dark:hover:bg-slate-800 border border-slate-200/60 dark:border-slate-700/60 hover:border-purple-300 dark:hover:border-purple-600 transition-all duration-200 text-left">
            <div class="w-10 h-10 rounded-xl bg-purple-100 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform duration-200">
                <x-icon name="images" class="w-5 h-5" />
            </div>
            <h4 class="text-sm font-semibold text-slate-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition">Upload Foto</h4>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Dokumentasi kegiatan</p>
        </a>

        {{-- Tambah Prestasi --}}
        <a href="{{ route('achievements.create') }}"
           class="group p-4 rounded-xl bg-slate-50 hover:bg-amber-50/70 dark:bg-slate-800/50 dark:hover:bg-slate-800 border border-slate-200/60 dark:border-slate-700/60 hover:border-amber-300 dark:hover:border-amber-600 transition-all duration-200 text-left">
            <div class="w-10 h-10 rounded-xl bg-amber-100 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform duration-200">
                <x-icon name="trophy" class="w-5 h-5" />
            </div>
            <h4 class="text-sm font-semibold text-slate-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition">Tambah Prestasi</h4>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Pencapaian siswa</p>
        </a>

        {{-- Buat Info Kelas --}}
        <a href="{{ route('class-infos.create') }}"
           class="group p-4 rounded-xl bg-slate-50 hover:bg-rose-50/70 dark:bg-slate-800/50 dark:hover:bg-slate-800 border border-slate-200/60 dark:border-slate-700/60 hover:border-rose-300 dark:hover:border-rose-600 transition-all duration-200 text-left">
            <div class="w-10 h-10 rounded-xl bg-rose-100 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform duration-200">
                <x-icon name="megaphone" class="w-5 h-5" />
            </div>
            <h4 class="text-sm font-semibold text-slate-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition">Buat Info / Tugas</h4>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Pengumuman kelas</p>
        </a>
    </div>
</div>
