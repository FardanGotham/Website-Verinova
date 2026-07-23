@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-3xl font-bold">
        Struktur Organisasi
    </h1>
    @if(session('success'))
    <div class="bg-green-100 text-green-700 border border-green-300 rounded-xl p-4 mb-6">
        {{ session('success') }}
    </div>
@endif
    <a href="{{ route('organizations.create') }}"
        class="bg-blue-600 text-white px-5 py-3 rounded-xl">
        + Tambah
    </a>

</div>

<div class="bg-white rounded-2xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-blue-600 text-white">

<tr>

<th class="p-4">Urutan</th>
<th>Nama</th>
<th>Jabatan</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

@foreach($organizations as $item)

<tr class="border-b">

<td class="p-4">{{ $item->order }}</td>

<td>{{ $item->name }}</td>

<td>{{ $item->position }}</td>

<td class="space-x-2">

    <a href="{{ route('organizations.edit', $item->id) }}"
       class="text-blue-600 hover:underline">
        Edit
    </a>

    <form action="{{ route('organizations.destroy', $item->id) }}"
          method="POST"
          class="inline"
          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

        @csrf
        @method('DELETE')

        <button class="text-red-600 hover:underline">
            Hapus
        </button>

    </form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection