@extends('layouts.admin')

@section('title', 'Galeri Foto Kelas')
@section('page-title', 'Galeri Dokumentasi')

@section('content')
<div class="space-y-6" x-data="{ selectedCategory: 'Semua' }">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Dokumentasi Kegiatan & Momen
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Koleksi foto kegiatan, kenangan, dan acara kelas XII PPLG 2.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button :href="route('galleries.create')" icon="upload">
                Upload Foto Baru
            </x-button>
        </div>
    </div>

    <!-- Category Filter Bar -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-3 border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-wrap items-center gap-2">
        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 px-3">Kategori:</span>
        @php
            $categories = ['Semua', 'Moment', 'PKL', 'Hari Guru', 'Class Meeting', 'Lomba', 'Kelulusan', 'Acara Sekolah', 'Lainnya'];
        @endphp
        @foreach($categories as $cat)
            <button
                @click="selectedCategory = '{{ $cat }}'"
                type="button"
                :class="selectedCategory === '{{ $cat }}' ? 'bg-blue-600 text-white shadow-sm shadow-blue-600/30' : 'bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700'"
                class="px-3.5 py-1.5 rounded-xl text-xs font-medium transition-all duration-150">
                {{ $cat }}
            </button>
        @endforeach
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($galleries as $gallery)
            <div
                x-show="selectedCategory === 'Semua' || selectedCategory === '{{ $gallery->category }}'"
                class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition-all duration-200 group">

                <div>
                    <!-- Image with aspect ratio -->
                    <div class="relative aspect-video w-full bg-slate-100 dark:bg-slate-800 overflow-hidden">
                        <img
                            src="{{ asset('storage/'.$gallery->image) }}"
                            alt="{{ $gallery->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">

                        <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-semibold bg-slate-950/70 backdrop-blur-md text-white border border-white/20 shadow">
                            {{ $gallery->category }}
                        </span>
                    </div>

                    <!-- Card Body -->
                    <div class="p-5">
                        <h3 class="text-base font-bold text-slate-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition line-clamp-1">
                            {{ $gallery->title }}
                        </h3>

                        @if($gallery->description)
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">
                                {{ $gallery->description }}
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Card Footer Actions -->
                <div class="px-5 py-3 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between text-xs text-slate-400">
                    <span>{{ $gallery->created_at ? $gallery->created_at->format('d M Y') : '-' }}</span>

                    <div class="inline-flex items-center gap-1">
                        <a href="{{ route('galleries.edit', $gallery->id) }}"
                           class="p-2 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                           title="Edit Foto">
                            <x-icon name="pencil" class="w-4 h-4" />
                        </a>

                        <form
                            action="{{ route('galleries.destroy', $gallery->id) }}"
                            method="POST"
                            class="inline"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto dokumentasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="p-2 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                title="Hapus Foto">
                                <x-icon name="trash-2" class="w-4 h-4" />
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800">
                <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto flex items-center justify-center mb-3">
                    <x-icon name="images" class="w-8 h-8" />
                </div>
                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">
                    Belum Ada Dokumentasi Foto
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-sm mx-auto">
                    Mulai upload foto kegiatan kelas seperti PKL, class meeting, lomba, atau momen berharga lainnya.
                </p>
                <div class="mt-4">
                    <x-button :href="route('galleries.create')" icon="upload" size="sm">
                        Upload Foto Sekarang
                    </x-button>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection
