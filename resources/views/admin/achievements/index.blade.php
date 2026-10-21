@extends('layouts.admin')

@section('title', 'Prestasi Kelas')
@section('page-title', 'Prestasi Kelas')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Daftar Prestasi & Kejuaraan
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Catatan prestasi akademik, non-akademik, dan penghargaan siswa kelas XII PPLG 2.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button :href="route('achievements.create')" icon="plus">
                Tambah Prestasi
            </x-button>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 text-xs uppercase font-semibold border-b border-slate-200/80 dark:border-slate-800">
                    <tr>
                        <th class="py-3.5 px-6 w-20">Foto</th>
                        <th class="py-3.5 px-6">Judul Prestasi</th>
                        <th class="py-3.5 px-6">Tingkat</th>
                        <th class="py-3.5 px-6">Tahun</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-slate-700 dark:text-slate-300">
                    @forelse($achievements as $achievement)
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors">
                            <!-- Foto / Icon Placeholder -->
                            <td class="py-4 px-6">
                                @if($achievement->photo)
                                    <img
                                        src="{{ asset('storage/'.$achievement->photo) }}"
                                        alt="{{ $achievement->title }}"
                                        class="w-12 h-12 rounded-xl object-cover ring-1 ring-slate-200 dark:ring-slate-700">
                                @else
                                    <div class="w-12 h-12 rounded-xl bg-amber-50 dark:bg-amber-950/50 text-amber-600 dark:text-amber-400 flex items-center justify-center border border-amber-200/50 dark:border-amber-800/50">
                                        <x-icon name="trophy" class="w-6 h-6" />
                                    </div>
                                @endif
                            </td>

                            <!-- Judul & Deskripsi -->
                            <td class="py-4 px-6">
                                <h3 class="font-bold text-slate-900 dark:text-white">
                                    {{ $achievement->title }}
                                </h3>
                                @if($achievement->description)
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 line-clamp-1 max-w-md">
                                        {{ $achievement->description }}
                                    </p>
                                @endif
                            </td>

                            <!-- Tingkat -->
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    @if(str_contains(strtolower($achievement->level), 'nasional'))
                                        bg-rose-50 dark:bg-rose-950/50 text-rose-700 dark:text-rose-300 border border-rose-200/50 dark:border-rose-800/50
                                    @elseif(str_contains(strtolower($achievement->level), 'provinsi'))
                                        bg-amber-50 dark:bg-amber-950/50 text-amber-700 dark:text-amber-300 border border-amber-200/50 dark:border-amber-800/50
                                    @elseif(str_contains(strtolower($achievement->level), 'kabupaten'))
                                        bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/50 dark:border-blue-800/50
                                    @else
                                        bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300
                                    @endif">
                                    {{ $achievement->level }}
                                </span>
                            </td>

                            <!-- Tahun -->
                            <td class="py-4 px-6 font-mono text-xs">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold">
                                    {{ $achievement->year }}
                                </span>
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-6 text-right">
                                <div class="inline-flex items-center gap-1 justify-end">
                                    <a href="{{ route('achievements.edit', $achievement) }}"
                                       class="p-2 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                       title="Edit Prestasi">
                                        <x-icon name="pencil" class="w-4 h-4" />
                                    </a>

                                    <form
                                        action="{{ route('achievements.destroy', $achievement) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data prestasi {{ $achievement->title }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                            title="Hapus Prestasi">
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
                                    <x-icon name="trophy" class="w-8 h-8" />
                                </div>
                                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">
                                    Belum Ada Prestasi Terdata
                                </h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-sm mx-auto">
                                    Tambahkan pencapaian membanggakan siswa kelas XII PPLG 2 untuk ditampilkan pada portofolio kelas.
                                </p>
                                <div class="mt-4">
                                    <x-button :href="route('achievements.create')" icon="plus" size="sm">
                                        Tambah Prestasi Baru
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
