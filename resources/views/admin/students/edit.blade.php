@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">
        Edit Siswa
    </h1>

    <form
        action="{{ route('admin.students.update', $student) }}"
        method="POST"
        enctype="multipart/form-data">

        @method('PUT')

        @include('admin.students.form')

    </form>

</div>

@endsection