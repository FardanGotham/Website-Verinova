@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto">

<h1 class="text-3xl font-bold mb-8">

Edit Info Kelas

</h1>

<form
action="{{ route('class-infos.update',$classInfo) }}"
method="POST"
enctype="multipart/form-data">

@method('PUT')

@include('admin.class_infos.form')

</form>

</div>

@endsection