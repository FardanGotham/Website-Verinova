@extends('layouts.admin')

@section('title', 'Tambah Siswa Baru')
@section('page-title', 'Tambah Siswa')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Back Button & Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.students.index') }}"
           class="p-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition"
           title="Kembali ke Daftar Siswa">
            <x-icon name="arrow-left" class="w-5 h-5" />
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Tambah Siswa Baru
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                Masukkan identitas lengkap siswa baru kelas XII PPLG 2.
            </p>
        </div>
    </div>

    <!-- Form -->
    <form
        action="{{ route('admin.students.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @include('admin.students.form')

    </form>

</div>
@endsection
