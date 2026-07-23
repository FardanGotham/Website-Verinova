@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-3xl font-bold">
        Galeri Kelas
    </h1>

    <a href="{{ route('galleries.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">
        + Upload Foto
    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-xl mb-6">

    {{ session('success') }}

</div>

@endif

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

@forelse($galleries as $gallery)

<div class="bg-white rounded-3xl shadow-lg overflow-hidden">

    <img
        src="{{ asset('storage/'.$gallery->image) }}"
        class="w-full h-60 object-cover">

    <div class="p-5">

        <span class="text-xs bg-blue-100 text-blue-600 px-3 py-1 rounded-full">
            {{ $gallery->category }}
        </span>

        <h2 class="text-xl font-bold mt-4">
            {{ $gallery->title }}
        </h2>

        <p class="text-gray-600 mt-2">
            {{ $gallery->description }}
        </p>

        <div class="flex gap-4 mt-5">

            <a href="{{ route('galleries.edit',$gallery->id) }}"
               class="text-blue-600 hover:underline">
                Edit
            </a>

            <form
                action="{{ route('galleries.destroy',$gallery->id) }}"
                method="POST">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Yakin ingin menghapus foto ini?')"
                    class="text-red-600 hover:underline">

                    Hapus

                </button>

            </form>

        </div>

    </div>

</div>

@empty

<div class="col-span-3 text-center py-20">

    <h2 class="text-2xl font-bold text-gray-500">

        Belum ada foto.

    </h2>

</div>

@endforelse

</div>

@endsection