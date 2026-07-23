@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-10">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-3xl font-bold text-slate-800 mb-2">
            Tambah Siswa
        </h1>

        <p class="text-slate-500 mb-8">
            Lengkapi data siswa dengan benar.
        </p>

        <form method="POST"
              action="{{ route('students.store') }}"
              enctype="multipart/form-data">

            @csrf

            {{-- Nama --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Nama</label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Absen --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Absen</label>

                <input
                    type="number"
                    name="absen"
                    value="{{ old('absen') }}"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Kelas --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Kelas</label>

                <input
                    type="text"
                    name="kelas"
                    value="{{ old('kelas') }}"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Jenis Kelamin --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Jenis Kelamin</label>

                <select
                    name="gender"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">

                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>

                </select>
            </div>

            {{-- Email --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- No HP --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">No HP</label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Alamat --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Alamat</label>

                <textarea
                    name="address"
                    rows="3"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">{{ old('address') }}</textarea>
            </div>

            {{-- Hobi --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Hobi</label>

                <input
                    type="text"
                    name="hobi"
                    value="{{ old('hobi') }}"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Cita-cita --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Cita-cita</label>

                <input
                    type="text"
                    name="cita_cita"
                    value="{{ old('cita_cita') }}"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Moto Hidup --}}
            <div class="mb-5">
                <label class="block mb-2 font-medium">Moto Hidup</label>

                <textarea
                    name="quote"
                    rows="4"
                    class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-blue-500">{{ old('quote') }}</textarea>
            </div>

            {{-- Foto --}}
            <div class="mb-8">
                <label class="block mb-2 font-medium">Foto</label>

                <input
                    type="file"
                    name="photo"
                    class="w-full border rounded-xl p-3">
            </div>

            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition">

                    Simpan

                </button>

                <a href="{{ route('students.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 px-6 py-3 rounded-xl transition">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection