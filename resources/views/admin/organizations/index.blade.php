@extends('layouts.admin')

@section('title', 'Struktur Organisasi')
@section('page-title', 'Struktur Organisasi')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Struktur Organisasi Kelas
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Kelola susunan kepengurusan kelas XII PPLG 2 beserta urutan hierarkinya.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button :href="route('organizations.create')" icon="plus">
                Tambah Pengurus
            </x-button>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 text-xs uppercase font-semibold border-b border-slate-200/80 dark:border-slate-800">
                    <tr>
                        <th class="py-3.5 px-4 text-center w-20">Urutan</th>
                        <th class="py-3.5 px-6">Nama Pengurus</th>
                        <th class="py-3.5 px-6">Jabatan</th>
                        <th class="py-3.5 px-6">Deskripsi Tugas</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-slate-700 dark:text-slate-300">
                    @forelse($organizations as $item)
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors">
                            <!-- Order Badge -->
                            <td class="py-4 px-4 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-950/40 font-mono font-bold text-xs text-blue-700 dark:text-blue-300 border border-blue-200/50 dark:border-blue-800/50">
                                    {{ $item->order }}
                                </span>
                            </td>

                            <!-- Nama -->
                            <td class="py-4 px-6 font-semibold text-slate-900 dark:text-white">
                                {{ $item->name }}
                            </td>

                            <!-- Jabatan -->
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700">
                                    {{ $item->position }}
                                </span>
                            </td>

                            <!-- Deskripsi -->
                            <td class="py-4 px-6 text-xs text-slate-500 dark:text-slate-400 max-w-xs truncate">
                                {{ $item->description ?? '-' }}
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-6 text-right">
                                <div class="inline-flex items-center gap-1 justify-end">
                                    <a href="{{ route('organizations.edit', $item->id) }}"
                                       class="p-2 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                       title="Edit Pengurus">
                                        <x-icon name="pencil" class="w-4 h-4" />
                                    </a>

                                    <form
                                        action="{{ route('organizations.destroy', $item->id) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kepengurusan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                            title="Hapus Pengurus">
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
                                    <x-icon name="network" class="w-8 h-8" />
                                </div>
                                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">
                                    Belum Ada Data Pengurus
                                </h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-sm mx-auto">
                                    Tambahkan susunan pengurus kelas XII PPLG 2 untuk ditampilkan pada bagan organisasi.
                                </p>
                                <div class="mt-4">
                                    <x-button :href="route('organizations.create')" icon="plus" size="sm">
                                        Tambah Pengurus Baru
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
