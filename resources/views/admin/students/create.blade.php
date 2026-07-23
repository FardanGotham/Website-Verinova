@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">
        Tambah Siswa
    </h1>

    <form
        action="{{ route('admin.students.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @include('admin.students.form')

    </form>

</div>

@endsection