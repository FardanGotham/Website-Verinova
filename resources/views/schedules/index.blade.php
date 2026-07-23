@extends('layouts.app')

@section('content')

<section class="py-20 bg-slate-100 min-h-screen">

<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-14">

<h1 class="text-5xl font-bold">

Jadwal Pelajaran

</h1>

<p class="text-slate-500 mt-3">

Jadwal Belajar XII PPLG 2

</p>

</div>

@foreach($days as $day)

<div class="bg-white rounded-3xl shadow-lg p-8 mb-8">

<h2 class="text-3xl font-bold text-blue-600 mb-6">

{{ $day }}

</h2>

<div class="space-y-4">

@forelse($schedules->where('day',$day) as $schedule)

<div class="flex justify-between border-b pb-3">

<div>

<h3 class="font-bold">

{{ $schedule->subject }}

</h3>

<p class="text-slate-500">

{{ $schedule->teacher }}

</p>

</div>

<div class="font-semibold">

{{ $schedule->time }}

</div>

</div>

@empty

<p class="text-slate-400">

Belum ada jadwal.

</p>

@endforelse

</div>

</div>

@endforeach

</div>

</section>

@endsection