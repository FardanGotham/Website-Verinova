@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-8">

<div>

<h1 class="text-3xl font-bold">

📢 Info Kelas

</h1>

<p class="text-slate-500 mt-2">

Kelola tugas, pengumuman, agenda dan event kelas.

</p>

</div>

<a
href="{{ route('class-infos.create') }}"
class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">

+ Tambah Info

</a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 rounded-xl p-4 mb-6">

{{ session('success') }}

</div>

@endif

<div class="bg-white rounded-2xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-blue-600 text-white">

<tr>

<th class="p-4">Kategori</th>

<th>Judul</th>

<th>Guru</th>

<th>Deadline</th>

<th>Prioritas</th>

<th>Status</th>

<th class="text-center">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($infos as $info)

<tr class="border-b">

<td class="p-4">

{{ $info->category }}

</td>

<td>

{{ $info->title }}

</td>

<td>

{{ $info->teacher }}

</td>

<td>

{{ $info->deadline }}

</td>

<td>

{{ $info->priority }}

</td>

<td>

{{ $info->status }}

</td>

<td class="text-center">

<a
href="{{ route('class-infos.edit',$info) }}"
class="bg-yellow-500 text-white px-3 py-2 rounded-lg">

Edit

</a>

<form
action="{{ route('class-infos.destroy',$info) }}"
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

<td colspan="7" class="text-center py-8">

Belum ada info kelas.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection