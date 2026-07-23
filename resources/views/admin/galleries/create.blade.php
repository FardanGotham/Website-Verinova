@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
Upload Foto
</h1>

<form
action="{{ route('galleries.store') }}"
method="POST"
enctype="multipart/form-data"
class="bg-white rounded-2xl shadow p-8 space-y-5">

@csrf

<div>

<label>Judul</label>

<input
type="text"
name="title"
class="w-full border rounded-xl p-3">

</div>

<div>

<label>Kategori</label>

<select
name="category"
class="w-full border rounded-xl p-3">


<optgroup label="Kategori">
    <option>Moment</option>
    <option>PKL</option>
    <option>Hari Guru</option>
    <option>Class Meeting</option>
    <option>Lomba</option>
    <option>Kelulusan</option>
    <option>Acara Sekolah</option>
    <option>Lainnya</option>

</select>

</div>

<div>

<label>Deskripsi</label>

<textarea
name="description"
class="w-full border rounded-xl p-3"></textarea>

</div>

<div>

<label>Foto</label>

<input
type="file"
name="image"
class="w-full border rounded-xl p-3">

</div>

<button
class="bg-blue-600 text-white px-6 py-3 rounded-xl">

Upload

</button>

</form>

@endsection