@extends('layouts.admin')

@section('title', 'Informasi & Tugas Kelas')
@section('page-title', 'Informasi Kelas')

@section('content')
<div class="space-y-6" x-data="{ selectedCategory: 'Semua' }">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Pusat Informasi & Pengumuman
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Kelola pengumuman, tugas mata pelajaran, ulangan, dan agenda kelas XII PPLG 2.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button :href="route('class-infos.create')" icon="plus">
                Tambah Info Baru
            </x-button>
        </div>
    </div>

    <!-- Category Filter Bar -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-3 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-wrap items-center gap-2">
        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 px-3">Kategori:</span>
        @php
            $infoCategories = ['Semua', 'Tugas', 'Pengumuman', 'Ulangan', 'Agenda', 'Event'];
        @endphp
        @foreach($infoCategories as $cat)
            <button
                @click="selectedCategory = '{{ $cat }}'"
                type="button"
                :class="selectedCategory === '{{ $cat }}' ? 'bg-blue-600 text-white shadow-sm shadow-blue-600/30' : 'bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700'"
                class="px-3.5 py-1.5 rounded-xl text-xs font-medium transition-all duration-150">
                {{ $cat }}
            </button>
        @endforeach
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 text-xs uppercase font-semibold border-b border-slate-200/80 dark:border-slate-800">
                    <tr>
                        <th class="py-3.5 px-6">Kategori</th>
                        <th class="py-3.5 px-6">Judul Informasi</th>
                        <th class="py-3.5 px-6">Guru / Pembuat</th>
                        <th class="py-3.5 px-6">Batas Waktu</th>
                        <th class="py-3.5 px-6">Prioritas</th>
                        <th class="py-3.5 px-6">Status</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-slate-700 dark:text-slate-300">
                    @forelse($infos as $info)
                        <tr
                            x-show="selectedCategory === 'Semua' || selectedCategory === '{{ $info->category }}'"
                            class="hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors">
                            <!-- Kategori -->
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                    @switch($info->category)
                                        @case('Tugas') bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/50 dark:border-blue-800/50 @break
                                        @case('Pengumuman') bg-purple-50 dark:bg-purple-950/50 text-purple-700 dark:text-purple-300 border border-purple-200/50 dark:border-purple-800/50 @break
                                        @case('Ulangan') bg-rose-50 dark:bg-rose-950/50 text-rose-700 dark:text-rose-300 border border-rose-200/50 dark:border-rose-800/50 @break
                                        @case('Agenda') bg-amber-50 dark:bg-amber-950/50 text-amber-700 dark:text-amber-300 border border-amber-200/50 dark:border-amber-800/50 @break
                                        @case('Event') bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-300 border border-emerald-200/50 dark:border-emerald-800/50 @break
                                        @default bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300
                                    @endswitch">
                                    {{ $info->category }}
                                </span>
                            </td>

                            <!-- Judul & Deskripsi -->
                            <td class="py-4 px-6">
                                <h3 class="font-bold text-slate-900 dark:text-white">
                                    {{ $info->title }}
                                </h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 line-clamp-1 max-w-sm">
                                    {{ $info->description }}
                                </p>
                            </td>

                            <!-- Guru -->
                            <td class="py-4 px-6 text-xs text-slate-600 dark:text-slate-300">
                                {{ $info->teacher ?? '-' }}
                            </td>

                            <!-- Deadline -->
                            <td class="py-4 px-6 font-mono text-xs">
                                @if($info->deadline)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300">
                                        <x-icon name="clock" class="w-3.5 h-3.5 text-slate-400" />
                                        <span>{{ \Carbon\Carbon::parse($info->deadline)->format('d M Y') }}</span>
                                    </span>
                                @else
                                    <span class="text-slate-400 text-xs italic">Tidak ada batas</span>
                                @endif
                            </td>

                            <!-- Prioritas -->
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($info->priority == 'Mendesak')
                                        bg-rose-50 dark:bg-rose-950/50 text-rose-700 dark:text-rose-300 border border-rose-200/50 dark:border-rose-800/50
                                    @elseif($info->priority == 'Penting')
                                        bg-amber-50 dark:bg-amber-950/50 text-amber-700 dark:text-amber-300 border border-amber-200/50 dark:border-amber-800/50
                                    @else
                                        bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400
                                    @endif">
                                    {{ $info->priority }}
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $info->status == 'Aktif' ? 'bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-300 border border-emerald-200/50 dark:border-emerald-800/50' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $info->status == 'Aktif' ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                    <span>{{ $info->status }}</span>
                                </span>
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-6 text-right">
                                <div class="inline-flex items-center gap-1 justify-end">
                                    <a href="{{ route('class-infos.edit', $info) }}"
                                       class="p-2 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                       title="Edit Info">
                                        <x-icon name="pencil" class="w-4 h-4" />
                                    </a>

                                    <form
                                        action="{{ route('class-infos.destroy', $info) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi {{ $info->title }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                            title="Hapus Info">
                                            <x-icon name="trash-2" class="w-4 h-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-16 text-center">
                                <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto flex items-center justify-center mb-3">
                                    <x-icon name="megaphone" class="w-8 h-8" />
                                </div>
                                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">
                                    Belum Ada Informasi Kelas
                                </h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-sm mx-auto">
                                    Publikasikan tugas sekolah, pengumuman, atau jadwal agenda untuk siswa kelas XII PPLG 2.
                                </p>
                                <div class="mt-4">
                                    <x-button :href="route('class-infos.create')" icon="plus" size="sm">
                                        Tambah Info Baru
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
