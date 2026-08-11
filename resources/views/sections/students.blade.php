<section class="py-24 bg-white
           dark:bg-slate-950""
    data-aos="fade-up">

<div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-14">

        <h2 class="text-5xl font-bold !text-slate-800 dark:!text-white">

            Data Siswa

        </h2>

        <p class="text-slate-600 dark:text-slate-300 mt-3">

            Kenali siswa-siswi kelas kami.

        </p>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach($students as $student)

    <div
        class="bg-white dark:bg-slate-900
               rounded-3xl
               shadow-lg dark:shadow-black/30
               overflow-hidden
               border border-transparent
               dark:border-slate-800
               hover:-translate-y-2
               transition-all duration-300">

        {{-- Header Card --}}
        <div
            class="bg-gradient-to-r
                   from-blue-600
                   to-cyan-500
                   h-20">
        </div>


        {{-- Content --}}
        <div class="-mt-12 text-center p-6">

            {{-- FOTO --}}
            @if($student->photo)

                <img
                    src="{{ asset('storage/'.$student->photo) }}"
                    alt="{{ $student->nama }}"
                    class="w-24 h-24
                           rounded-full
                           border-4
                           border-white
                           dark:border-slate-900
                           object-cover
                           mx-auto
                           shadow-md">

            @else

                <div
                    class="w-24 h-24
                           rounded-full
                           bg-slate-200
                           dark:bg-slate-700
                           mx-auto
                           flex items-center
                           justify-center
                           border-4
                           border-white
                           dark:border-slate-900">

                    <i
                        class="fa-solid fa-user
                               text-slate-400
                               dark:text-slate-300
                               text-2xl">
                    </i>

                </div>

            @endif


            {{-- NAMA --}}
            <h3
                class="text-lg
                       font-bold
                       text-slate-900
                       dark:text-white
                       mt-3">

                {{ $student->nama }}

            </h3>


            {{-- ABSEN --}}
            <p
                class="text-sm
                       text-slate-500
                       dark:text-slate-300
                       mt-1">

                Absen {{ $student->absen }}

            </p>


            {{-- KELAS --}}
            <p
                class="text-sm
                       font-medium
                       text-blue-600
                       dark:text-cyan-400
                       mt-1">

                {{ $student->kelas }}

            </p>


            {{-- BUTTON --}}
            <a
                href="{{ route('students.show',$student->id) }}"
                class="inline-flex
                       items-center
                       gap-2
                       mt-5
                       bg-blue-600
                       hover:bg-blue-700
                       dark:bg-cyan-500
                       dark:hover:bg-cyan-400
                       dark:text-slate-950
                       text-white
                       font-medium
                       px-5
                       py-4
                       rounded-xl
                       transition-all duration-300
                       hover:scale-105
                       shadow-sm">

               

                Lihat Profil

            </a>

        </div>

    </div>

@endforeach

</div>


{{-- LIHAT SEMUA --}}
<div class="text-center mt-12">

    <a
        href="{{ route('students.index') }}"
        class="inline-flex
               items-center
               gap-2
               bg-slate-900
               hover:bg-slate-800
               dark:bg-slate-100
               dark:hover:bg-white
               text-white
               dark:text-slate-900
               px-8
               py-6
               rounded-xl
               font-semibold
               transition-all duration-300
               hover:-translate-y-1
               shadow-md">

       

        Lihat Semua Siswa

    </a>

</div>
</div>

</section>