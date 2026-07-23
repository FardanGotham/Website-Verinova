@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Jadwal Pelajaran</h1>

    <a href="{{ route('schedules.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">
        + Tambah Jadwal
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
    <th class="p-4">Hari</th>
    <th>Jam</th>
    <th>Mata Pelajaran</th>
    <th>Guru</th>
    <th>Aksi</th>
</tr>

</thead>

<tbody>

@forelse($schedules as $schedule)

<tr class="border-b hover:bg-gray-50">

<td class="p-4">{{ $schedule->day }}</td>

<td>
{{ $schedule->start_time }} - {{ $schedule->end_time }}
</td>

<td>{{ $schedule->subject }}</td>

<td>{{ $schedule->teacher }}</td>

<td class="space-x-2">

<a href="{{ route('schedules.edit',$schedule->id) }}"
class="text-blue-600">
Edit
</a>

<form action="{{ route('schedules.destroy',$schedule->id) }}"
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

@empty

<tr>

<td colspan="5"
class="text-center p-8">

Belum ada jadwal.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection