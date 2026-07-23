@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Edit Pengurus
</h1>

<form action="{{ route('organizations.update', $organization->id) }}"
      method="POST"
      class="bg-white rounded-2xl shadow p-8 space-y-6">

    @csrf
    @method('PUT')

    <div>
        <label class="block mb-2 font-medium">Nama</label>
        <input type="text"
               name="name"
               value="{{ old('name', $organization->name) }}"
               class="w-full border rounded-xl p-3">
    </div>

    <div>
        <label class="block mb-2 font-medium">Jabatan</label>
        <input type="text"
               name="position"
               value="{{ old('position', $organization->position) }}"
               class="w-full border rounded-xl p-3">
    </div>

    <div>
        <label class="block mb-2 font-medium">Deskripsi</label>
        <textarea
            name="description"
            class="w-full border rounded-xl p-3"
            rows="4">{{ old('description', $organization->description) }}</textarea>
    </div>

    <div>
        <label class="block mb-2 font-medium">Urutan</label>
        <input type="number"
               name="order"
               value="{{ old('order', $organization->order) }}"
               class="w-full border rounded-xl p-3">
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition">
        Update Data
    </button>

</form>

@endsection