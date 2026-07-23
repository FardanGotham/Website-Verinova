@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-xl shadow p-6">

        <h1 class="text-2xl font-bold mb-6">
            Tambah Admin
        </h1>
@if ($errors->any())
    <div class="mb-6 rounded-xl bg-red-100 border border-red-300 p-4">
        <ul class="list-disc list-inside text-red-700">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('admins.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label>Nama</label>
                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg p-3"
                    required>
            </div>

            <div class="mb-4">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-lg p-3"
                    required>
            </div>

            <div class="mb-4">
                <label>Password</label>
               <input
    type="password"
    name="password"
    class="w-full border rounded-lg p-3 @error('password') border-red-500 @enderror"
    required>

@error('password')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror
            </div>

            <div class="mb-4">
                <label>Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full border rounded-lg p-3"
                    required>
            </div>

            <div class="mb-6">
                <label>Role</label>

                <select
                    name="role"
                    class="w-full border rounded-lg p-3">

                    <option value="admin">Admin</option>
                    <option value="super_admin">Super Admin</option>

                </select>

            </div>

            <div class="flex gap-3">

                <a
                    href="{{ route('admins.index') }}"
                    class="px-5 py-3 rounded-lg bg-gray-200">

                    Batal

                </a>

                <button
                    class="px-5 py-3 rounded-lg bg-blue-600 text-white">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection