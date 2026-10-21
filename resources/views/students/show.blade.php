@extends('layouts.app')

@section('content')

{{-- =========================
     HEADER
========================= --}}
<div
    class="h-72
           bg-gradient-to-r
           from-blue-700
           via-cyan-500
           to-blue-400">
</div>


<div
    class="max-w-5xl
           mx-auto
           px-6
           pb-16">

    {{-- =========================
         PROFILE
    ========================= --}}
    <div class="-mt-28">

        <div
            class="bg-white
                   dark:bg-slate-900
                   rounded-3xl
                   shadow-xl
                   dark:shadow-black/30
                   overflow-hidden
                   border
                   border-transparent
                   dark:border-slate-800">

            <div class="text-center p-10">

                {{-- FOTO --}}
                @if($student->photo)

                    <img
                        src="{{ asset('storage/'.$student->photo) }}"
                        alt="{{ $student->nama }}"
                        class="w-44 h-44
                               rounded-full
                               border-8
                               border-white
                               dark:border-slate-900
                               object-cover
                               mx-auto
                               shadow-lg">

                @else

                    <div class="w-44 h-44 rounded-full bg-gradient-to-tr from-blue-600 to-cyan-500 border-8 border-white dark:border-slate-900 flex items-center justify-center text-4xl font-extrabold text-white mx-auto shadow-lg">{{ strtoupper(substr($student->nama, 0, 2)) }}</div>

                @endif


                {{-- NAMA --}}
                <h1
                    class="text-4xl
                           font-bold
                           mt-6
                           text-slate-900
                           dark:text-white">

                    {{ $student->nama }}

                </h1>


                {{-- KELAS --}}
                <p
                    class="mt-2
                           text-lg
                           text-slate-500
                           dark:text-slate-300">

                    {{ $student->kelas }}

                    <span class="mx-2 text-blue-500 dark:text-cyan-400">
                        •
                    </span>

                    Absen {{ $student->absen }}

                </p>

            </div>

        </div>

    </div>


    {{-- =========================
         BIODATA
    ========================= --}}
    <div
        class="grid
               lg:grid-cols-2
               gap-8
               mt-10">


        {{-- BIODATA --}}
        <div
            class="bg-white
                   dark:bg-slate-900
                   rounded-3xl
                   shadow-lg
                   dark:shadow-black/30
                   p-8
                   border
                   border-transparent
                   dark:border-slate-800
                   hover:-translate-y-1
                   transition-all duration-300">

            <h2
                class="text-2xl
                       font-bold
                       mb-6
                       text-slate-900
                       dark:text-white">

                <i
                    class="fa-solid fa-id-card
                           text-blue-600
                           dark:text-cyan-400
                           mr-2">
                </i>

                Biodata

            </h2>


            <div
                class="space-y-4
                       text-slate-600
                       dark:text-slate-300">

                <p>

                    <strong
                        class="text-slate-900
                               dark:text-white">

                        Jenis Kelamin :

                    </strong>

                    {{ $student->gender ?: '-' }}

                </p>


                <p>

                    <strong
                        class="text-slate-900
                               dark:text-white">

                        Email :

                    </strong>

                    {{ $student->email ?: '-' }}

                </p>


                <p>

                    <strong
                        class="text-slate-900
                               dark:text-white">

                        No HP :

                    </strong>

                    {{ $student->phone ?: '-' }}

                </p>


                <p>

                    <strong
                        class="text-slate-900
                               dark:text-white">

                        Alamat :

                    </strong>

                    {{ $student->address ?: '-' }}

                </p>

            </div>

        </div>


        {{-- TENTANG SAYA --}}
        <div
            class="bg-white
                   dark:bg-slate-900
                   rounded-3xl
                   shadow-lg
                   dark:shadow-black/30
                   p-8
                   border
                   border-transparent
                   dark:border-slate-800
                   hover:-translate-y-1
                   transition-all duration-300">

            <h2
                class="text-2xl
                       font-bold
                       mb-6
                       text-slate-900
                       dark:text-white">

                <i
                    class="fa-solid fa-user
                           text-blue-600
                           dark:text-cyan-400
                           mr-2">
                </i>

                Tentang Saya

            </h2>


            <div
                class="space-y-4
                       text-slate-600
                       dark:text-slate-300">

                <p>

                    <strong
                        class="text-slate-900
                               dark:text-white">

                        Hobi :

                    </strong>

                    {{ $student->hobi ?: '-' }}

                </p>


                <p>

                    <strong
                        class="text-slate-900
                               dark:text-white">

                        Cita-cita :

                    </strong>

                    {{ $student->cita_cita ?: '-' }}

                </p>


                <div>

                    <p>

                        <strong
                            class="text-slate-900
                                   dark:text-white">

                            Quote :

                        </strong>

                    </p>


                    <blockquote
                        class="italic
                               text-slate-500
                               dark:text-slate-300
                               border-l-4
                               border-blue-500
                               dark:border-cyan-400
                               pl-4
                               mt-2">

                        {{ $student->quote ?: '-' }}

                    </blockquote>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
         SOSMED
    ========================= --}}
    <div
        class="bg-white
               dark:bg-slate-900
               rounded-3xl
               shadow-lg
               dark:shadow-black/30
               p-8
               mt-8
               border
               border-transparent
               dark:border-slate-800
               hover:-translate-y-1
               transition-all duration-300">

        <h2
            class="text-2xl
                   font-bold
                   mb-8
                   text-slate-900
                   dark:text-white">

            <i
                class="fa-solid fa-globe
                       text-blue-600
                       dark:text-cyan-400
                       mr-2">
            </i>

            Media Sosial

        </h2>


        <div
            class="flex
                   flex-wrap
                   gap-6
                   text-4xl">


            {{-- INSTAGRAM --}}
            @if($student->instagram)

                <a
                    href="{{ $student->instagram }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-pink-600
                           hover:scale-125
                           hover:-translate-y-1
                           transition-all duration-300">

                    <i class="fa-brands fa-instagram"></i>

                </a>

            @endif


            {{-- GITHUB --}}
            @if($student->github)

                <a
                    href="{{ $student->github }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-slate-800
                           dark:text-white
                           hover:scale-125
                           hover:-translate-y-1
                           transition-all duration-300">

                    <i class="fa-brands fa-github"></i>

                </a>

            @endif


            {{-- LINKEDIN --}}
            @if($student->linkedin)

                <a
                    href="{{ $student->linkedin }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-blue-700
                           dark:text-blue-400
                           hover:scale-125
                           hover:-translate-y-1
                           transition-all duration-300">

                    <i class="fa-brands fa-linkedin"></i>

                </a>

            @endif


            {{-- TIKTOK --}}
            @if($student->tiktok)

                <a
                    href="{{ $student->tiktok }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-black
                           dark:text-white
                           hover:scale-125
                           hover:-translate-y-1
                           transition-all duration-300">

                    <i class="fa-brands fa-tiktok"></i>

                </a>

            @endif


            {{-- WEBSITE --}}
            @if($student->website)

                <a
                    href="{{ $student->website }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-green-600
                           dark:text-green-400
                           hover:scale-125
                           hover:-translate-y-1
                           transition-all duration-300">

                    <i class="fa-solid fa-globe"></i>

                </a>

            @endif


            {{-- JIKA TIDAK ADA SOSMED --}}
            @if(
                !$student->instagram &&
                !$student->github &&
                !$student->linkedin &&
                !$student->tiktok &&
                !$student->website
            )

                <p
                    class="text-sm
                           text-slate-500
                           dark:text-slate-400">

                    Belum ada media sosial yang ditambahkan.

                </p>

            @endif

        </div>

    </div>

</div>

@endsection