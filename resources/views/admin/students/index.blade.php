@extends('layouts.admin')

@section('title', 'Data Siswa')
@section('page-title', 'Data Siswa')

@section('content')
<div class="space-y-6" x-data="{ searchQuery: '' }">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Direktori Siswa
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Kelola profil, biodata, dan kontak seluruh siswa kelas XII PPLG 2.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button :href="route('admin.students.create')" icon="plus">
                Tambah Siswa
            </x-button>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-4 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3">
        <div class="relative w-full sm:w-80">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <x-icon name="search" class="w-4 h-4" />
            </div>
            <input
                x-model="searchQuery"
                type="text"
                placeholder="Cari nama, absen, jabatan..."
                class="w-full pl-10 pr-4 py-2 text-sm bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
            <span class="font-medium">Total:</span>
            <span class="px-2.5 py-1 rounded-lg bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 font-bold font-mono">
                {{ count($students) }} Siswa
            </span>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 text-xs uppercase font-semibold border-b border-slate-200/80 dark:border-slate-800">
                    <tr>
                        <th class="py-3.5 px-4 text-center w-16">Absen</th>
                        <th class="py-3.5 px-4">Siswa</th>
                        <th class="py-3.5 px-4">Kelas</th>
                        <th class="py-3.5 px-4">Jabatan</th>
                        <th class="py-3.5 px-4">Kontak</th>
                        <th class="py-3.5 px-4 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-slate-700 dark:text-slate-300">
                    @forelse($students as $student)
                        <tr
                            x-show="!searchQuery || '{{ strtolower($student->nama . ' ' . $student->absen . ' ' . ($student->jabatan ?? '') . ' ' . ($student->kelas ?? '')) }}'.includes(searchQuery.toLowerCase())"
                            class="hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors">

                            <!-- Absen -->
                            <td class="py-3.5 px-4 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 dark:bg-slate-800 font-mono font-bold text-xs text-slate-700 dark:text-slate-300">
                                    {{ sprintf('%02d', $student->absen) }}
                                </span>
                            </td>

                            <!-- Foto & Nama -->
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
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

                                    <div>
                                        <a href="{{ route('admin.students.show', $student) }}" class="font-semibold text-slate-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition">
                                            {{ $student->nama }}
                                        </a>
                                        <p class="text-xs text-slate-400">
                                            {{ $student->gender ?? 'Laki-laki' }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <!-- Kelas -->
                            <td class="py-3.5 px-4">
                                <span class="text-xs font-medium text-slate-600 dark:text-slate-300">
                                    {{ $student->kelas }}
                                </span>
                            </td>

                            <!-- Jabatan -->
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ ($student->jabatan && $student->jabatan != 'Anggota') ? 'bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/50 dark:border-blue-800/50' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400' }}">
                                    {{ $student->jabatan ?? 'Anggota' }}
                                </span>
                            </td>

                            <!-- Kontak / Email -->
                            <td class="py-3.5 px-4 text-xs text-slate-500 dark:text-slate-400">
                                <div class="space-y-0.5">
                                    @if($student->email)
                                        <div class="flex items-center gap-1.5 truncate max-w-[160px]">
                                            <x-icon name="mail" class="w-3.5 h-3.5 text-slate-400 shrink-0" />
                                            <span class="truncate">{{ $student->email }}</span>
                                        </div>
                                    @endif
                                    @if($student->phone)
                                        <div class="flex items-center gap-1.5 font-mono">
                                            <x-icon name="phone" class="w-3.5 h-3.5 text-slate-400 shrink-0" />
                                            <span>{{ $student->phone }}</span>
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <!-- Aksi -->
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-1 justify-end">
                                    <a href="{{ route('admin.students.show', $student) }}"
                                       class="p-2 rounded-lg text-slate-500 hover:text-blue-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                       title="Lihat Detail">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </a>

                                    <a href="{{ route('admin.students.edit', $student) }}"
                                       class="p-2 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                       title="Edit Data">
                                        <x-icon name="pencil" class="w-4 h-4" />
                                    </a>

                                    <form
                                        action="{{ route('admin.students.destroy', $student) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa {{ $student->nama }}? Tindakan ini tidak dapat dibatalkan.')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                            title="Hapus Siswa">
                                            <x-icon name="trash-2" class="w-4 h-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-16 text-center">
                                <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto flex items-center justify-center mb-3">
                                    <x-icon name="users" class="w-8 h-8" />
                                </div>
                                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">
                                    Belum Ada Data Siswa
                                </h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-sm mx-auto">
                                    Mulai tambahkan data siswa kelas XII PPLG 2 untuk ditampilkan pada sistem.
                                </p>
                                <div class="mt-4">
                                    <x-button :href="route('admin.students.create')" icon="plus" size="sm">
                                        Tambah Siswa Sekarang
                                    </x-button>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
