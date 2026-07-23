@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Edit Foto
</h1>

<form
action="{{ route('galleries.update',$gallery->id) }}"
method="POST"
enctype="multipart/form-data"
class="bg-white rounded-2xl shadow p-8 space-y-5">

@csrf
@method('PUT')

<div>

<label>Judul</label>

<input
type="text"
name="title"
value="{{ old('title', $gallery->title) }}"
class="w-full border rounded-xl p-3">

</div>

<div>

<label>Kategori</label>

<select
name="category"
class="w-full border rounded-xl p-3">

@foreach(['Study Tour','PKL','Hari Guru','Class Meeting','Lomba','Kelulusan'] as $category)

<option value="{{ $category }}"
{{ old('category', $gallery->category) == $category ? 'selected' : '' }}>

{{ $category }}

</option>

@endforeach

</select>

</div>

<div>

<label>Deskripsi</label>

<textarea
name="description"
class="w-full border rounded-xl p-3">{{ old('description', $gallery->description) }}</textarea>

</div>

<div>

<label>Foto Saat Ini</label>

<img
src="{{ asset('storage/'.$gallery->image) }}"
class="w-48 rounded-xl mt-2">

</div>

<div>

<label>Ganti Foto (Opsional)</label>

<input
type="file"
name="image"
class="w-full border rounded-xl p-3">

</div>

<button
class="bg-blue-600 text-white px-6 py-3 rounded-xl">

Update

</button>

</form>

@endsection