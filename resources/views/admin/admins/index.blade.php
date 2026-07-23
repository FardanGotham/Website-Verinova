@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Kelola Admin
        </h1>

        <a href="{{ route('admins.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">

            + Tambah Admin

        </a>

    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="p-4 text-left">Nama</th>

                    <th class="p-4 text-left">Email</th>

                    <th class="p-4 text-left">Role</th>

                    <th class="p-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($admins as $admin)

                <tr class="border-t">

                    <td class="p-4">
                        {{ $admin->name }}
                    </td>

                    <td class="p-4">
                        {{ $admin->email }}
                    </td>

                    <td class="p-4">

                        @if($admin->role == 'super_admin')

                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                                Super Admin
                            </span>

                        @else

                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">
                                Admin
                            </span>

                        @endif

                    </td>

                    <td class="p-4 text-center">

    <div class="flex justify-center items-center gap-4">

        <a href="{{ route('admins.edit', $admin) }}"
           class="text-blue-600 hover:text-blue-800 font-medium">

            Edit

        </a>

        @if(auth()->id() != $admin->id)

        <form action="{{ route('admins.destroy', $admin) }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin menghapus admin ini?')">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="text-red-600 hover:text-red-800 font-medium">

                Hapus

            </button>

        </form>

        @endif

    </div>

</td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="p-6 text-center text-slate-500">

                        Belum ada admin.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection