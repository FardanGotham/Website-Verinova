@extends('layouts.admin')

@section('title', 'Jadwal Piket Kelas')
@section('page-title', 'Jadwal Piket')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Jadwal Piket Kebersihan
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Kelola regu kerja piket harian siswa kelas XII PPLG 2.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button :href="route('duty-schedules.create')" icon="plus">
                Tambah Jadwal Piket
            </x-button>
        </div>
    </div>

    <!-- Duty Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($duties as $duty)
            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm p-6 hover:shadow-md transition-all duration-200 flex flex-col justify-between">
                <div>
                    <!-- Header Card: Hari & Action Menu -->
                    <div class="flex items-center justify-between pb-4 mb-4 border-b border-slate-100 dark:border-slate-800">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-xl bg-blue-50 dark:bg-blue-950/50 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold text-xs shrink-0">
                                <x-icon name="clipboard-check" class="w-5 h-5" />
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                                Hari {{ $duty->day }}
                            </h3>
                        </div>

                        <div class="inline-flex items-center gap-1">
                            <a href="{{ route('duty-schedules.edit', $duty) }}"
                               class="p-1.5 rounded-lg text-slate-400 hover:text-amber-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                               title="Edit Regu Piket">
                                <x-icon name="pencil" class="w-4 h-4" />
                            </a>

                            <form
                                action="{{ route('duty-schedules.destroy', $duty) }}"
                                method="POST"
                                class="inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal piket hari {{ $duty->day }}?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                    title="Hapus Jadwal Piket">
                                    <x-icon name="trash-2" class="w-4 h-4" />
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Petugas Piket (5 Siswa) -->
                    <div class="space-y-2.5">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Anggota Regu Piket:</p>

                        @foreach([$duty->student1, $duty->student2, $duty->student3, $duty->student4, $duty->student5] as $index => $student)
                            @if($student)
                                <div class="flex items-center justify-between p-2 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-800">
                                    <div class="flex items-center gap-2.5 min-w-0">
                                        <span class="w-5 h-5 rounded-full bg-blue-100 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 font-mono text-[10px] font-bold flex items-center justify-center shrink-0">
                                            {{ $index + 1 }}
                                        </span>
                                        <span class="text-xs font-semibold text-slate-800 dark:text-slate-200 truncate">
                                            {{ $student->nama }}
                                        </span>
                                    </div>
                                    <span class="text-[11px] font-mono text-slate-400 shrink-0">
                                        Absen {{ $student->absen }}
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="mt-5 pt-3 border-t border-slate-100 dark:border-slate-800 text-[11px] text-slate-400 text-right">
                    Total 5 Petugas
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800">
                <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto flex items-center justify-center mb-3">
                    <x-icon name="clipboard-check" class="w-8 h-8" />
                </div>
                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">
                    Belum Ada Jadwal Piket
                </h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-sm mx-auto">
                    Susun daftar regu piket harian untuk menjaga kebersihan dan kenyamanan ruang kelas.
                </p>
                <div class="mt-4">
                    <x-button :href="route('duty-schedules.create')" icon="plus" size="sm">
                        Buat Jadwal Piket
                    </x-button>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection
