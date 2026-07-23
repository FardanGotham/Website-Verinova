@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">
        Tambah Prestasi
    </h1>

    <form
        action="{{ route('achievements.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @include('admin.achievements.form')

    </form>

</div>

@endsection