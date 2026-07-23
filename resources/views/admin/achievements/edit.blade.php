@extends('layouts.admin')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">
        Edit Prestasi
    </h1>

    <form
        action="{{ route('achievements.update',$achievement) }}"
        method="POST"
        enctype="multipart/form-data">

        @method('PUT')

        @include('admin.achievements.form')

    </form>

</div>

@endsection