@extends('layouts.app')

@section('content')

<section class="bg-slate-100 min-h-screen pb-20">

    {{-- Header --}}
    <div class="h-72 bg-gradient-to-r from-blue-700 via-cyan-500 to-blue-400"></div>

    <div class="max-w-5xl mx-auto px-6">

        {{-- Profile --}}
        <div class="-mt-28">

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="text-center p-10">

                    @if($student->photo)

                        <img
                            src="{{ asset('storage/'.$student->photo) }}"
                            class="w-44 h-44 rounded-full border-8 border-white object-cover mx-auto shadow-lg">

                    @else

                        <div class="w-44 h-44 rounded-full bg-slate-200 border-8 border-white flex items-center justify-center text-6xl mx-auto">

                            👤

                        </div>

                    @endif

                    <h1 class="text-4xl font-bold mt-6">

                        {{ $student->nama }}

                    </h1>

                    <p class="text-slate-500 mt-2">

                        {{ $student->kelas }}

                        •

                        Absen {{ $student->absen }}

                    </p>

                </div>

            </div>

        </div>

        {{-- Biodata --}}
        <div class="grid lg:grid-cols-2 gap-8 mt-10">

            <div class="bg-white rounded-3xl shadow p-8">

                <h2 class="text-2xl font-bold mb-6">

                     Biodata

                </h2>

                <div class="space-y-4">

                    <p><strong>Jenis Kelamin :</strong> {{ $student->gender ?: '-' }}</p>

                    <p><strong>Email :</strong> {{ $student->email ?: '-' }}</p>

                    <p><strong>No HP :</strong> {{ $student->phone ?: '-' }}</p>

                    <p><strong>Alamat :</strong> {{ $student->address ?: '-' }}</p>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow p-8">

                <h2 class="text-2xl font-bold mb-6">

                     Tentang Saya

                </h2>

                <div class="space-y-4">

                    <p>

                        <strong>Hobi :</strong>

                        {{ $student->hobi ?: '-' }}

                    </p>

                    <p>

                        <strong>Cita-cita :</strong>

                        {{ $student->cita_cita ?: '-' }}

                    </p>

                    <p>

                        <strong>Quote :</strong>

                    </p>

                    <blockquote class="italic text-slate-500 border-l-4 border-blue-500 pl-4">

                        {{ $student->quote ?: '-' }}

                    </blockquote>

                </div>

            </div>

        </div>

        {{-- Sosmed --}}
        <div class="bg-white rounded-3xl shadow p-8 mt-8">

            <h2 class="text-2xl font-bold mb-8">

                🌐 Media Sosial

            </h2>

            <div class="flex flex-wrap gap-6 text-4xl">

                @if($student->instagram)
                    <a href="{{ $student->instagram }}" target="_blank" class="text-pink-600 hover:scale-125 transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                @endif

                @if($student->github)
                    <a href="{{ $student->github }}" target="_blank" class="text-gray-800 hover:scale-125 transition">
                        <i class="fa-brands fa-github"></i>
                    </a>
                @endif

                @if($student->linkedin)
                    <a href="{{ $student->linkedin }}" target="_blank" class="text-blue-700 hover:scale-125 transition">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                @endif

                @if($student->tiktok)
                    <a href="{{ $student->tiktok }}" target="_blank" class="text-black hover:scale-125 transition">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                @endif

                @if($student->website)
                    <a href="{{ $student->website }}" target="_blank" class="text-green-600 hover:scale-125 transition">
                        <i class="fa-solid fa-globe"></i>
                    </a>
                @endif

            </div>

        </div>

    </div>

</section>

@endsection