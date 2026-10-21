@extends('layouts.admin')

@section('title', 'Buat Informasi Kelas')
@section('page-title', 'Buat Info Baru')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex items-center gap-4">
        <a href="{{ route('class-infos.index') }}"
           class="p-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition"
           title="Kembali ke Daftar Info">
            <x-icon name="arrow-left" class="w-5 h-5" />
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Buat Informasi / Tugas Baru
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                Publikasikan instruksi tugas atau pengumuman penting bagi siswa kelas XII PPLG 2.
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

    <form action="{{ route('class-infos.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.class_infos.form')
    </form>

</div>
@endsection
