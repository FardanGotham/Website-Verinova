@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
Tambah Jadwal
</h1>

<form
action="{{ route('schedules.store') }}"
method="POST"
class="bg-white rounded-2xl shadow p-8 space-y-5">

@csrf

<div>

<label>Hari</label>

<select
name="day"
class="w-full border rounded-xl p-3">

<option>Senin</option>
<option>Selasa</option>
<option>Rabu</option>
<option>Kamis</option>
<option>Jumat</option>

</select>

</div>

<div>

<label>Jam Mulai</label>

<input
type="time"
name="start_time"
class="w-full border rounded-xl p-3">

</div>

<div>

<label>Jam Selesai</label>

<input
type="time"
name="end_time"
class="w-full border rounded-xl p-3">

</div>

<div>

<label>Mata Pelajaran</label>

<input
type="text"
name="subject"
class="w-full border rounded-xl p-3">

</div>

<div>

<label>Guru</label>

<input
type="text"
name="teacher"
class="w-full border rounded-xl p-3">

</div>

<button
class="bg-blue-600 text-white px-6 py-3 rounded-xl">

Simpan

</button>

</form>

@endsection