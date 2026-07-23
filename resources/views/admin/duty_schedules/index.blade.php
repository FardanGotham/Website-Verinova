@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold">

                Jadwal Piket

            </h1>

            <p class="text-slate-500">

                Kelola jadwal piket kelas

            </p>

        </div>

        <a
            href="{{ route('duty-schedules.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">

            + Tambah

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

                    <th class="p-4">Hari</th>

                    <th>Siswa</th>

                    <th class="text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($duties as $duty)

                <tr class="border-b">

                    <td class="p-4 font-semibold">

                        {{ $duty->day }}

                    </td>

                    <td>

                        {{ $duty->student1->nama }}<br>
                        {{ $duty->student2->nama }}<br>
                        {{ $duty->student3->nama }}<br>
                        {{ $duty->student4->nama }}<br>
                        {{ $duty->student5->nama }}

                    </td>

                    <td class="text-center">

                        <a
                            href="{{ route('duty-schedules.edit',$duty) }}"
                            class="bg-yellow-400 text-white px-3 py-2 rounded-lg">

                            Edit

                        </a>

                        <form
                            action="{{ route('duty-schedules.destroy',$duty) }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus?')"
                                class="bg-red-500 text-white px-3 py-2 rounded-lg">

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