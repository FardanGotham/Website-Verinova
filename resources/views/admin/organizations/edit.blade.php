@extends('layouts.admin')

@section('title', 'Edit Pengurus Kelas — ' . $organization->name)
@section('page-title', 'Edit Pengurus Organisasi')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex items-center gap-4">
        <a href="{{ route('organizations.index') }}"
           class="p-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition"
           title="Kembali ke Daftar Struktur Organisasi">
            <x-icon name="arrow-left" class="w-5 h-5" />
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Edit Pengurus: {{ $organization->name }}
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                Perbarui data pengurus, jabatan, atau nomor urutan tampilan.
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

    <form action="{{ route('organizations.update', $organization->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-5">
            <!-- Nama -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Nama Lengkap <span class="text-rose-500">*</span>
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $organization->name) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Jabatan -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Jabatan Organisasi <span class="text-rose-500">*</span>
                </label>
                <input
                    type="text"
                    name="position"
                    value="{{ old('position', $organization->position) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Urutan -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Urutan Tampilan (Angka) <span class="text-rose-500">*</span>
                </label>
                <input
                    type="number"
                    name="order"
                    value="{{ old('order', $organization->order) }}"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Deskripsi Tugas / Peran (Opsional)
                </label>
                <textarea
                    name="description"
                    rows="3"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 leading-relaxed">{{ old('description', $organization->description) }}</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <x-button :href="route('organizations.index')" variant="secondary">
                    Batal
                </x-button>

                <x-button type="submit" variant="primary" icon="save">
                    Perbarui Pengurus
                </x-button>
            </div>
        </div>
    </form>

</div>
@endsection
