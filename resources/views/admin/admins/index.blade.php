@extends('layouts.admin')

@section('title', 'Kelola Admin')
@section('page-title', 'Kelola Administrator')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">
                Daftar Administrator
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Kelola hak akses dan akun pengguna yang memiliki wewenang mengelola sistem Verinova.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <x-button :href="route('admins.create')" icon="plus">
                Tambah Admin
            </x-button>
        </div>
    </div>

    @if(session('error'))
        <x-alert type="error">
            {{ session('error') }}
        </x-alert>
    @endif

    <!-- Table Container -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 text-xs uppercase font-semibold border-b border-slate-200/80 dark:border-slate-800">
                    <tr>
                        <th class="py-3.5 px-6">Pengguna</th>
                        <th class="py-3.5 px-6">Email Akun</th>
                        <th class="py-3.5 px-6">Peran / Role</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/80 text-slate-700 dark:text-slate-300">
                    @forelse($admins as $admin)
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors">
                            <!-- Pengguna -->
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-cyan-500 text-white font-bold text-sm flex items-center justify-center shrink-0 shadow-sm">
                                        {{ strtoupper(substr($admin->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="font-semibold text-slate-900 dark:text-white">
                                                {{ $admin->name }}
                                            </span>
                                            @if(auth()->id() == $admin->id)
                                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-blue-100 dark:bg-blue-950/60 text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
                                                    Anda
                                                </span>
                                            @endif
                                        </div>
                                        <span class="text-xs text-slate-400">Terdaftar pada {{ $admin->created_at ? $admin->created_at->format('d M Y') : '-' }}</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Email -->
                            <td class="py-4 px-6 font-mono text-xs text-slate-600 dark:text-slate-300">
                                {{ $admin->email }}
                            </td>

                            <!-- Role -->
                            <td class="py-4 px-6">
                                @if($admin->role == 'super_admin')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-50 dark:bg-rose-950/50 text-rose-700 dark:text-rose-300 border border-rose-200/60 dark:border-rose-800/60">
                                        <x-icon name="shield-check" class="w-3.5 h-3.5 text-rose-500" />
                                        <span>Super Admin</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 dark:bg-blue-950/50 text-blue-700 dark:text-blue-300 border border-blue-200/60 dark:border-blue-800/60">
                                        <x-icon name="shield" class="w-3.5 h-3.5 text-blue-500" />
                                        <span>Admin Biasa</span>
                                    </span>
                                @endif
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-6 text-right">
                                <div class="inline-flex items-center gap-1 justify-end">
                                    <a href="{{ route('admins.edit', $admin) }}"
                                       class="p-2 rounded-lg text-slate-500 hover:text-amber-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                       title="Edit Admin">
                                        <x-icon name="pencil" class="w-4 h-4" />
                                    </a>

                                    @if(auth()->id() != $admin->id)
                                        <form
                                            action="{{ route('admins.destroy', $admin) }}"
                                            method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun admin {{ $admin->name }}? Tindakan ini tidak dapat dibatalkan.')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition"
                                                title="Hapus Admin">
                                                <x-icon name="trash-2" class="w-4 h-4" />
                                            </button>
                                        </form>
                                    @else
                                        <span class="p-2 text-slate-300 dark:text-slate-700 cursor-not-allowed" title="Akun Anda sendiri tidak dapat dihapus">
                                            <x-icon name="trash-2" class="w-4 h-4 opacity-40" />
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-16 text-center">
                                <div class="w-16 h-16 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto flex items-center justify-center mb-3">
                                    <x-icon name="shield-check" class="w-8 h-8" />
                                </div>
                                <h3 class="text-base font-semibold text-slate-800 dark:text-slate-200">
                                    Belum Ada Administrator
                                </h3>
                                <div class="mt-4">
                                    <x-button :href="route('admins.create')" icon="plus" size="sm">
                                        Tambah Admin
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
