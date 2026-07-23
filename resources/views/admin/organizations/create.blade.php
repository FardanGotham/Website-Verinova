@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">

Tambah Pengurus

</h1>

<form action="{{ route('organizations.store') }}"
      method="POST"
      class="bg-white rounded-2xl shadow p-8 space-y-6">

@csrf

<div>

<label>Nama</label>

<input
type="text"
name="name"
class="w-full border rounded-xl p-3">

</div>

<div>

<label>Jabatan</label>

<input
type="text"
name="position"
class="w-full border rounded-xl p-3">

</div>

<div>

<label>Deskripsi</label>

<textarea
name="description"
class="w-full border rounded-xl p-3"></textarea>

</div>

<div>

<label>Urutan</label>

<input
type="number"
name="order"
value="1"
class="w-full border rounded-xl p-3">

</div>

<button
class="bg-blue-600 text-white px-6 py-3 rounded-xl">

Simpan

</button>

</form>

@endsection