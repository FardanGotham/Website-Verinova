@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-10">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-3xl font-bold text-slate-800 mb-2">
            Edit Siswa
        </h1>

        <p class="text-slate-500 mb-8">
            Perbarui data siswa.
        </p>

        <form method="POST"
              action="{{ route('students.update', $student->id) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Foto --}}
            <div class="mb-6 text-center">

                @if($student->photo)

                    <img
                        src="{{ asset('storage/'.$student->photo) }}"
                        class="w-36 h-36 rounded-full object-cover mx-auto shadow mb-4">

                @else

                    <div class="w-36 h-36 rounded-full bg-slate-200 flex items-center justify-center mx-auto text-5xl mb-4">

                        👤

                    </div>

                @endif

                <input
                    type="file"
                    name="photo"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- Nama --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama',$student->nama) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- Absen --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Absen
                </label>

                <input
                    type="number"
                    name="absen"
                    value="{{ old('absen',$student->absen) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- Kelas --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Kelas
                </label>

                <input
                    type="text"
                    name="kelas"
                    value="{{ old('kelas',$student->kelas) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- Gender --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Jenis Kelamin
                </label>

                <select
                    name="gender"
                    class="w-full border rounded-xl p-3">

                    <option value="">Pilih</option>

                    <option value="Laki-laki"
                        {{ $student->gender == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="Perempuan"
                        {{ $student->gender == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>

            </div>

            {{-- Email --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email',$student->email) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- No HP --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    No HP
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone',$student->phone) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- Alamat --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Alamat
                </label>

                <textarea
                    name="address"
                    rows="3"
                    class="w-full border rounded-xl p-3">{{ old('address',$student->address) }}</textarea>

            </div>

            {{-- Hobi --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Hobi
                </label>

                <input
                    type="text"
                    name="hobi"
                    value="{{ old('hobi',$student->hobi) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- Cita-cita --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Cita-cita
                </label>

                <input
                    type="text"
                    name="cita_cita"
                    value="{{ old('cita_cita',$student->cita_cita) }}"
                    class="w-full border rounded-xl p-3">

            </div>

            {{-- Moto Hidup --}}
            <div class="mb-8">

                <label class="block mb-2 font-medium">
                    Moto Hidup
                </label>

                <textarea
                    name="quote"
                    rows="4"
                    class="w-full border rounded-xl p-3">{{ old('quote',$student->quote) }}</textarea>

            </div>

            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                    Update

                </button>

                <a
                    href="{{ route('students.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection