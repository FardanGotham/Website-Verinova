@extends('layouts.app')

@section('content')

<section class="bg-slate-50 py-20">

<div class="max-w-6xl mx-auto px-6">

<h1 class="text-5xl font-bold text-center mb-16">
    Profil Kelas
</h1>

<div class="grid lg:grid-cols-2 gap-16 items-center">

<div>

@if($profile && $profile->logo)

<img src="{{ asset('storage/'.$profile->logo) }}"
     class="w-72 mx-auto rounded-3xl shadow-lg">

@else

<img src="{{ asset('images/verinova.jpg') }}"
     class="w-72 mx-auto rounded-3xl shadow-lg">

@endif

</div>

<div>

<h2 class="text-4xl font-bold text-slate-800">
    {{ $profile->class_name }}
</h2>

<p class="text-blue-600 text-xl mt-3">
    {{ $profile->slogan }}
</p>

<p class="mt-8 text-gray-600 leading-8">
    {{ $profile->history }}
</p>

</div>

</div>

</div>

</section>

<section class="py-20 bg-white">

<div class="max-w-6xl mx-auto px-6">

<div class="grid md:grid-cols-2 gap-8">

<div class="bg-slate-50 rounded-3xl p-8 shadow">

<h3 class="text-2xl font-bold mb-5 text-blue-600">
Visi
</h3>

<p class="leading-8 text-gray-700">
{{ $profile->vision }}
</p>

</div>

<div class="bg-slate-50 rounded-3xl p-8 shadow">

<h3 class="text-2xl font-bold mb-5 text-blue-600">
Misi
</h3>

<p class="leading-8 text-gray-700">
{{ $profile->mission }}
</p>

</div>

<div class="bg-slate-50 rounded-3xl p-8 shadow">

<h3 class="text-2xl font-bold mb-5 text-blue-600">
Motto
</h3>

<p class="leading-8 text-gray-700">
{{ $profile->motto }}
</p>

</div>

<div class="bg-slate-50 rounded-3xl p-8 shadow">

<h3 class="text-2xl font-bold mb-5 text-blue-600">
Filosofi Logo
</h3>

<p class="leading-8 text-gray-700">
{{ $profile->logo_philosophy }}
</p>

</div>

</div>

</div>

</section>

@endsection