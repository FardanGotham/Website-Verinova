@extends('layouts.admin')

@section('title', 'Detail Siswa — ' . $student->nama)
@section('page-title', 'Detail Siswa')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Action Toolbar & Back Button -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.students.index') }}"
               class="p-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition"
               title="Kembali ke Daftar Siswa">
                <x-icon name="arrow-left" class="w-5 h-5" />
            </a>
            <div>
                <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                    Detail Profil Siswa
                </h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">
                    Informasi lengkap biodata dan kontak siswa di sistem.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2.5">
            <x-button :href="route('admin.students.edit', $student)" variant="secondary" icon="pencil">
                Edit Profil
            </x-button>

            <form
                action="{{ route('admin.students.destroy', $student) }}"
                method="POST"
                class="inline"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa {{ $student->nama }}? Tindakan ini tidak dapat dibatalkan.')">
                @csrf
                @method('DELETE')
                <x-button type="submit" variant="danger" icon="trash-2">
                    Hapus
                </x-button>
            </form>
        </div>
    </div>

    <!-- Student Hero Profile Card -->
    <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200">
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
            <!-- Student Photo / Avatar -->
            <div class="relative shrink-0">
                @if($student->photo)
                    <img
                        src="{{ asset('storage/'.$student->photo) }}"
                        alt="{{ $student->nama }}"
                        class="w-28 h-28 sm:w-32 sm:h-32 rounded-2xl object-cover ring-4 ring-slate-100 dark:ring-slate-800 shadow-md">
                @else
                    <div class="w-28 h-28 sm:w-32 sm:h-32 rounded-2xl bg-gradient-to-tr from-blue-600 to-cyan-500 text-white font-extrabold text-3xl flex items-center justify-center shadow-md">
                        {{ strtoupper(substr($student->nama, 0, 2)) }}
                    </div>
                @endif
                <span class="absolute -bottom-2 -right-2 px-2.5 py-1 rounded-lg bg-blue-600 text-white text-[11px] font-mono font-bold shadow">
                    Absen {{ $student->absen }}
                </span>
            </div>

            <!-- Student Main Identity -->
            <div class="flex-1 text-center sm:text-left min-w-0">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 mb-2">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/50 dark:border-blue-800/50">
                        {{ $student->kelas }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ ($student->jabatan && $student->jabatan != 'Anggota') ? 'bg-amber-50 dark:bg-amber-950/50 text-amber-700 dark:text-amber-300 border border-amber-200/50 dark:border-amber-800/50' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300' }}">
                        {{ $student->jabatan ?? 'Anggota' }}
                    </span>
                    @if($student->gender)
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400">
                            {{ $student->gender }}
                        </span>
                    @endif
                </div>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    {{ $student->nama }}
                </h1>

                @if($student->quote)
                    <blockquote class="mt-3 text-xs sm:text-sm text-slate-500 dark:text-slate-400 italic bg-slate-50 dark:bg-slate-800/50 p-3 rounded-xl border-l-2 border-blue-500">
                        &ldquo;{{ $student->quote }}&rdquo;
                    </blockquote>
                @endif
            </div>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Card: Kontak & Domisili -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400 flex items-center gap-2">
                <x-icon name="phone" class="w-4 h-4 text-blue-500" />
                <span>Kontak & Domisili</span>
            </h3>

            <div class="space-y-3 pt-2 text-sm">
                <div>
                    <span class="text-xs text-slate-400 block">Email:</span>
                    @if($student->email)
                        <a href="mailto:{{ $student->email }}" class="font-medium text-blue-600 dark:text-blue-400 hover:underline">
                            {{ $student->email }}
                        </a>
                    @else
                        <span class="text-slate-400 text-xs italic">Tidak ada email</span>
                    @endif
                </div>

                <div>
                    <span class="text-xs text-slate-400 block">Nomor Telepon / WA:</span>
                    @if($student->phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $student->phone) }}" target="_blank" class="font-medium text-slate-800 dark:text-slate-200 hover:text-emerald-600 font-mono">
                            {{ $student->phone }}
                        </a>
                    @else
                        <span class="text-slate-400 text-xs italic">Tidak ada kontak telepon</span>
                    @endif
                </div>

                <div>
                    <span class="text-xs text-slate-400 block">Alamat Tempat Tinggal:</span>
                    <p class="font-medium text-slate-700 dark:text-slate-300 leading-relaxed text-xs sm:text-sm mt-0.5">
                        {{ $student->address ?? 'Alamat belum diisi.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Card: Minat & Aspirasi -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400 flex items-center gap-2">
                <x-icon name="sparkles" class="w-4 h-4 text-amber-500" />
                <span>Minat & Cita-Cita</span>
            </h3>

            <div class="space-y-3 pt-2 text-sm">
                <div>
                    <span class="text-xs text-slate-400 block">Hobi / Kegemaran:</span>
                    <p class="font-medium text-slate-800 dark:text-slate-200 mt-0.5">
                        {{ $student->hobi ?? 'Belum ditentukan' }}
                    </p>
                </div>

                <div>
                    <span class="text-xs text-slate-400 block">Cita-Cita / Tujuan Karir:</span>
                    <p class="font-medium text-slate-800 dark:text-slate-200 mt-0.5">
                        {{ $student->cita_cita ?? 'Belum ditentukan' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Card: Jejak Digital & Media Sosial -->
        <div class="md:col-span-2 bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-4">
            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400 flex items-center gap-2">
                <x-icon name="globe" class="w-4 h-4 text-emerald-500" />
                <span>Profil Digital & Media Sosial</span>
            </h3>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 pt-2">
                {{-- Instagram --}}
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/60 dark:border-slate-700/60">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1.5 mb-1">
                        <x-icon name="instagram" class="w-3.5 h-3.5 text-pink-500" />
                        <span>Instagram</span>
                    </span>
                    @if($student->instagram)
                        <a href="{{ $student->instagram }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline truncate block">
                            Buka Profil
                        </a>
                    @else
                        <span class="text-xs text-slate-400 italic">Belum ada</span>
                    @endif
                </div>

                {{-- GitHub --}}
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/60 dark:border-slate-700/60">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1.5 mb-1">
                        <x-icon name="github" class="w-3.5 h-3.5 text-slate-700 dark:text-slate-300" />
                        <span>GitHub</span>
                    </span>
                    @if($student->github)
                        <a href="{{ $student->github }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline truncate block">
                            Buka Repositori
                        </a>
                    @else
                        <span class="text-xs text-slate-400 italic">Belum ada</span>
                    @endif
                </div>

                {{-- LinkedIn --}}
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/60 dark:border-slate-700/60">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1.5 mb-1">
                        <x-icon name="linkedin" class="w-3.5 h-3.5 text-blue-600" />
                        <span>LinkedIn</span>
                    </span>
                    @if($student->linkedin)
                        <a href="{{ $student->linkedin }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline truncate block">
                            Buka Profil
                        </a>
                    @else
                        <span class="text-xs text-slate-400 italic">Belum ada</span>
                    @endif
                </div>

                {{-- TikTok --}}
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/60 dark:border-slate-700/60">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1.5 mb-1">
                        <x-icon name="tiktok" class="w-3.5 h-3.5 text-slate-700 dark:text-slate-300" />
                        <span>TikTok</span>
                    </span>
                    @if($student->tiktok)
                        <a href="{{ $student->tiktok }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline truncate block">
                            Buka Akun
                        </a>
                    @else
                        <span class="text-xs text-slate-400 italic">Belum ada</span>
                    @endif
                </div>

                {{-- Website --}}
                <div class="p-3 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200/60 dark:border-slate-700/60">
                    <span class="text-[11px] text-slate-400 flex items-center gap-1.5 mb-1">
                        <x-icon name="globe" class="w-3.5 h-3.5 text-emerald-500" />
                        <span>Portofolio</span>
                    </span>
                    @if($student->website)
                        <a href="{{ $student->website }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:underline truncate block">
                            Kunjungi Web
                        </a>
                    @else
                        <span class="text-xs text-slate-400 italic">Belum ada</span>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
