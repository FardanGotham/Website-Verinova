<div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200 flex flex-col justify-between">
    <div>
        <div class="flex items-center justify-between mb-5">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/50 text-blue-600 dark:text-blue-400 flex items-center justify-center">
                    <x-icon name="users" class="w-4 h-4" />
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Siswa Terbaru</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Pendaftaran terakhir</p>
                </div>
            </div>

            <a href="{{ route('admin.students.index') }}"
               class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition inline-flex items-center gap-1">
                <span>Semua</span>
                <x-icon name="chevron-right" class="w-3.5 h-3.5" />
            </a>
        </div>

        <div class="space-y-3">
            @forelse($latestStudents as $student)
                <div class="flex items-center justify-between p-2.5 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition group">
                    <div class="flex items-center gap-3 min-w-0">
                        @if($student->photo)
                            <img
                                src="{{ asset('storage/'.$student->photo) }}"
                                alt="{{ $student->nama }}"
                                class="w-10 h-10 rounded-xl object-cover ring-1 ring-slate-200 dark:ring-slate-700 shrink-0">
                        @else
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-cyan-500 text-white font-bold text-xs flex items-center justify-center shrink-0 shadow-sm">
                                {{ strtoupper(substr($student->nama, 0, 2)) }}
                            </div>
                        @endif

                        <div class="min-w-0">
                            <h4 class="text-sm font-semibold text-slate-800 dark:text-slate-200 truncate group-hover:text-blue-600 dark:group-hover:text-blue-400 transition">
                                {{ $student->nama }}
                            </h4>
                            <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                                <span class="font-mono">Absen {{ $student->absen }}</span>
                                <span>&bull;</span>
                                <span>{{ $student->kelas }}</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin.students.show', $student) }}"
                       class="p-2 text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-slate-700 rounded-lg transition"
                       title="Lihat Detail Siswa">
                        <x-icon name="eye" class="w-4 h-4" />
                    </a>
                </div>
            @empty
                <div class="py-10 text-center">
                    <div class="w-12 h-12 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto flex items-center justify-center mb-2">
                        <x-icon name="users" class="w-6 h-6" />
                    </div>
                    <p class="text-xs text-slate-500">Belum ada data siswa terdaftar.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="pt-4 mt-2 border-t border-slate-100 dark:border-slate-800 text-right">
        <a href="{{ route('admin.students.create') }}"
           class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline">
            <x-icon name="plus" class="w-3.5 h-3.5" />
            <span>Tambah Siswa Baru</span>
        </a>
    </div>
</div>
