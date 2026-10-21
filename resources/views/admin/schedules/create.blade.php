@extends('layouts.admin')

@section('title', 'Tambah Jadwal Pelajaran')
@section('page-title', 'Tambah Jadwal')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex items-center gap-4">
        <a href="{{ route('schedules.index') }}"
           class="p-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition"
           title="Kembali ke Daftar Jadwal">
            <x-icon name="arrow-left" class="w-5 h-5" />
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Tambah Jadwal Pelajaran
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                Masukkan mata pelajaran, guru, dan alokasi jam pembelajaran.
            </p>
        </div>
    </div>

    @if ($errors->any())
        <x-alert type="error" title="Terjadi Kesalahan Validasi">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-5">
            <!-- Hari -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Hari Pelaksanaan <span class="text-rose-500">*</span>
                </label>
                <select
                    name="day"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">Pilih Hari</option>
                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $day)
                        <option value="{{ $day }}" @selected(old('day') == $day)>{{ $day }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Jam Mulai & Selesai -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Jam Mulai <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <x-icon name="clock" class="w-4 h-4" />
                        </div>
                        <input
                            type="time"
                            name="start_time"
                            value="{{ old('start_time') }}"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Jam Selesai <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <x-icon name="clock" class="w-4 h-4" />
                        </div>
                        <input
                            type="time"
                            name="end_time"
                            value="{{ old('end_time') }}"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                </div>
            </div>

            <!-- Mata Pelajaran -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Mata Pelajaran <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="book-open" class="w-4 h-4" />
                    </div>
                    <input
                        type="text"
                        name="subject"
                        value="{{ old('subject') }}"
                        placeholder="Contoh: Pemrograman Web & Perangkat Bergerak"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>

            <!-- Guru Pengampu -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Nama Guru Pengampu <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="user" class="w-4 h-4" />
                    </div>
                    <input
                        type="text"
                        name="teacher"
                        value="{{ old('teacher') }}"
                        placeholder="Contoh: Bapak Triyono, S.Kom."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <x-button :href="route('schedules.index')" variant="secondary">
                    Batal
                </x-button>

                <x-button type="submit" variant="primary" icon="save">
                    Simpan Jadwal
                </x-button>
            </div>
        </div>
    </form>

</div>
@endsection
