@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Data Siswa
            </h1>

            <p class="text-slate-500">
                Kelola data siswa kelas
            </p>
        </div>

        <a href="{{ route('admin.students.create') }}"
            class="bg-blue-600 text-white px-5 py-3 rounded-xl">

            + Tambah Siswa

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-600 text-white">

                <tr>

                    <th class="p-4">Foto</th>
                    <th>Absen</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($students as $student)

                <tr class="border-b">

                    <td class="p-4">

                        @if($student->photo)

                            <img src="{{ asset('storage/'.$student->photo) }}"
                                 class="w-12 h-12 rounded-full object-cover">

                        @endif

                    </td>

                    <td>{{ $student->absen }}</td>

                    <td>{{ $student->nama }}</td>

                    <td>{{ $student->kelas }}</td>

                    <td>

                        <a href="{{ route('admin.students.edit',$student) }}"
                           class="text-blue-600">

                            Edit

                        </a>

                        <form
                            action="{{ route('admin.students.destroy',$student) }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin?')"
                                class="text-red-600">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection