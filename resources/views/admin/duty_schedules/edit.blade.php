@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">

        Edit Jadwal Piket

    </h1>

    <form
        action="{{ route('duty-schedules.update',$duty_schedule) }}"
        method="POST">

        @method('PUT')

        @include('admin.duty_schedules.form')

    </form>

</div>

@endsection