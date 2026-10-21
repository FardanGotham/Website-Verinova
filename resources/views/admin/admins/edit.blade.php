@extends('layouts.admin')

@section('title', 'Edit Administrator — ' . $admin->name)
@section('page-title', 'Edit Administrator')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admins.index') }}"
           class="p-2.5 rounded-xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition"
           title="Kembali ke Daftar Admin">
            <x-icon name="arrow-left" class="w-5 h-5" />
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Edit Administrator: {{ $admin->name }}
            </h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                Perbarui nama, email, role, atau kata sandi administrator.
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

    <form action="{{ route('admins.update', $admin) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-5">
            <!-- Nama -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Nama Lengkap <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="user" class="w-4 h-4" />
                    </div>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $admin->name) }}"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Alamat Email <span class="text-rose-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="mail" class="w-4 h-4" />
                    </div>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $admin->email) }}"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>

            <!-- Password Baru (Opsional) -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Kata Sandi Baru (Kosongkan jika tidak ingin mengubah)
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="lock" class="w-4 h-4" />
                    </div>
                    <input
                        type="password"
                        name="password"
                        placeholder="Minimal 8 karakter baru..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Role -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Tingkat Hak Akses / Role <span class="text-rose-500">*</span>
                </label>
                <select
                    name="role"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="admin" @selected(old('role', $admin->role) == 'admin')>Admin Biasa (Kelola Konten & Data)</option>
                    <option value="super_admin" @selected(old('role', $admin->role) == 'super_admin')>Super Admin (Akses Penuh termasuk Pengguna)</option>
                </select>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                <x-button :href="route('admins.index')" variant="secondary">
                    Batal
                </x-button>

                <x-button type="submit" variant="primary" icon="save">
                    Perbarui Akun Admin
                </x-button>
            </div>
        </div>
    </form>

</div>
@endsection
