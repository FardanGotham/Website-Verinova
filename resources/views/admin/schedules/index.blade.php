@extends('layouts.admin')

@section('title', 'Jadwal Pelajaran')
@section('page-title', 'Jadwal Pelajaran')

@section('content')
<div class="space-y-6" x-data="{ selectedDay: 'Semua' }">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Jadwal Pembelajaran Kelas
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Atur jadwal mata pelajaran, alokasi jam, dan guru pengampu kelas XII PPLG 2.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button :href="route('schedules.create')" icon="plus">
                Tambah Jadwal
            </x-button>
        </div>
    </div>

    <!-- Filter Day Pills -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-3 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-wrap items-center gap-2">
        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 px-3">Filter Hari:</span>
        @foreach(['Semua', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $day)
            <button
                @click="selectedDay = '{{ $day }}'"
                type="button"
                :class="selectedDay === '{{ $day }}' ? 'bg-blue-600 text-white shadow-sm shadow-blue-600/30' : 'bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700'"
                class="px-3.5 py-1.5 rounded-xl text-xs font-medium transition-all duration-150">
                {{ $day }}
            </button>
        @endforeach
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 text-xs uppercase font-semibold border-b border-slate-200/80 dark:border-slate-800">
                    <tr>
                        <th class="py-3.5 px-6">Hari</th>
                        <th class="py-3.5 px-6">Waktu Pembelajaran</th>
                        <th class="py-3.5 px-6">Mata Pelajaran</th>
                        <th class="py-3.5 px-6">Guru Pengampu</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-slate-700 dark:text-slate-300">
                    @forelse($schedules as $schedule)
                        <tr
                            x-show="selectedDay === 'Semua' || selectedDay === '{{ $schedule->day }}'"
                            class="hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors">
                            <!-- Hari -->
                            <td class="py-4 px-6 font-semibold">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    @switch($schedule->day)
                                        @case('Senin') bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/50 dark:border-blue-800/50 @break
                                        @case('Selasa') bg-cyan-50 dark:bg-cyan-950/50 text-cyan-700 dark:text-cyan-300 border border-cyan-200/50 dark:border-cyan-800/50 @break
                                        @case('Rabu') bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-300 border border-emerald-200/50 dark:border-emerald-800/50 @break
                                        @case('Kamis') bg-amber-50 dark:bg-amber-950/50 text-amber-700 dark:text-amber-300 border border-amber-200/50 dark:border-amber-800/50 @break
                                        @case('Jumat') bg-purple-50 dark:bg-purple-950/50 text-purple-700 dark:text-purple-300 border border-purple-200/50 dark:border-purple-800/50 @break
                                        @default bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300
                                    @endswitch">
                                    {{ $schedule->day }}
                                </span>
                            </td>

                            <!-- Waktu -->
                            <td class="py-4 px-6 font-mono text-xs">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300">
                                    <x-icon name="clock" class="w-3.5 h-3.5 text-slate-400" />
                                    <span>{{ $schedule->start_time }} &ndash; {{ $schedule->end_time }}</span>
                                </span>
                            </td>

                            <!-- Mata Pelajaran -->
                            <td class="py-4 px-6 font-bold text-slate-900 dark:text-white">
                                {{ $schedule->subject }}
                            </td>

                            <!-- Guru -->
                            <td class="py-4 px-6 text-slate-600 dark:text-slate-300">
                                <div class="flex items-center gap-2">
                                    <x-icon name="user" class="w-4 h-4 text-slate-400" />
                                    <span>{{ $schedule->teacher }}</span>
                                </div>
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-6 text-right">
                                <div class="inline-flex items-center gap-1 justify-end">
                                    <a href="{{ route('schedules.edit', $schedule->id) }}"
                                       class="p-2 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                       title="Edit Jadwal">
                                        <x-icon name="pencil" class="w-4 h-4" />
                                    </a>

                                    <form
                                        action="{{ route('schedules.destroy', $schedule->id) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                            title="Hapus Jadwal">
                                            <x-icon name="trash-2" class="w-4 h-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center">
                                <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto flex items-center justify-center mb-3">
                                    <x-icon name="calendar-days" class="w-8 h-8" />
                                </div>
                                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">
                                    Belum Ada Jadwal Pelajaran
                                </h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-sm mx-auto">
                                    Tambahkan jadwal mata pelajaran mingguan untuk kelas XII PPLG 2.
                                </p>
                                <div class="mt-4">
                                    <x-button :href="route('schedules.create')" icon="plus" size="sm">
                                        Tambah Jadwal Baru
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
