@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold">
                Prestasi Kelas
            </h1>

            <p class="text-slate-500 mt-1">
                Kelola seluruh data prestasi kelas.
            </p>
        </div>

        <a
            href="{{ route('achievements.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">

            + Tambah Prestasi

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-600 text-white">

                <tr>

                    <th class="p-4">Foto</th>
                    <th>Judul</th>
                    <th>Tingkat</th>
                    <th>Tahun</th>
                    <th class="text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($achievements as $achievement)

                <tr class="border-b">

                    <td class="p-4">

                        @if($achievement->photo)

                            <img
                                src="{{ asset('storage/'.$achievement->photo) }}"
                                class="w-16 h-16 rounded-lg object-cover">

                        @else

                            🏆

                        @endif

                    </td>

                    <td>{{ $achievement->title }}</td>

                    <td>{{ $achievement->level }}</td>

                    <td>{{ $achievement->year }}</td>

                    <td class="text-center">

                        <a
                            href="{{ route('achievements.edit',$achievement) }}"
                            class="bg-yellow-500 text-white px-3 py-2 rounded-lg">

                            Edit

                        </a>

                        <form
                            action="{{ route('achievements.destroy',$achievement) }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus?')"
                                class="bg-red-500 text-white px-3 py-2 rounded-lg">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center py-8">

                        Belum ada data prestasi.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection