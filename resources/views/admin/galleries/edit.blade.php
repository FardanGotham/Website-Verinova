@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')
@section('page-title', 'Edit Foto Kegiatan')

@section('content')
<div class="max-w-2xl mx-auto space-y-6" x-data="{
    imagePreview: '{{ asset('storage/'.$gallery->image) }}',
    previewFile(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.imagePreview = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
}">

    <!-- Header Section -->
    <div class="flex items-center gap-4">
        <a href="{{ route('galleries.index') }}"
           class="p-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition"
           title="Kembali ke Galeri">
            <x-icon name="arrow-left" class="w-5 h-5" />
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Edit Foto: {{ $gallery->title }}
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                Perbarui keterangan atau ganti file foto dokumentasi ini.
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

    <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-5">
            <!-- Judul Foto -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Judul Dokumentasi <span class="text-rose-500">*</span>
                </label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $gallery->title) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Kategori Kegiatan <span class="text-rose-500">*</span>
                </label>
                <select
                    name="category"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    @foreach(['Moment', 'PKL', 'Hari Guru', 'Class Meeting', 'Lomba', 'Kelulusan', 'Acara Sekolah', 'Lainnya'] as $cat)
                        <option value="{{ $cat }}" @selected(old('category', $gallery->category) == $cat)>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Deskripsi Singkat (Opsional)
                </label>
                <textarea
                    name="description"
                    rows="3"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 leading-relaxed">{{ old('description', $gallery->description) }}</textarea>
            </div>

            <!-- Preview & Ganti Foto -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Foto Dokumentasi (Kosongkan bila tidak ingin mengganti)
                </label>

                <div class="space-y-4">
                    <div class="relative w-full aspect-video rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800">
                        <img :src="imagePreview" alt="Pratinjau Foto" class="w-full h-full object-cover">
                    </div>

                    <input
                        type="file"
                        name="image"
                        accept="image/*"
                        @change="previewFile"
                        class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 dark:file:bg-slate-800 dark:file:text-blue-400 hover:file:bg-blue-100 dark:hover:file:bg-slate-700 cursor-pointer">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <x-button :href="route('galleries.index')" variant="secondary">
                    Batal
                </x-button>

                <x-button type="submit" variant="primary" icon="save">
                    Perbarui Foto
                </x-button>
            </div>
        </div>
    </form>

</div>
@endsection
