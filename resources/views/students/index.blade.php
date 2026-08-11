@extends('layouts.app')

@section('content')

<section class="bg-slate-100 dark:bg-slate-950 min-h-screen py-24
           transition-colors duration-300">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center mb-12">

            <h1 class="text-5xl font-bold !text-slate-800 dark:!text-white">
                Data Siswa
            </h1>

            <p class="text-slate-500 dark:text-slate-400 mt-4">
                Daftar Siswa Kelas XII PPLG 2
            </p>

            <div class="mt-4 inline-flex bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 px-5 py-2 rounded-full">

                 Total {{ $students->total() }} Siswa

            </div>

        </div>

        {{-- Search --}}
        <div class="max-w-xl mx-auto mb-12">

            <input
                type="text"
                id="search"
                placeholder="🔍 Cari nama siswa..."
                class="w-full rounded-2xl border border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-white px-5 py-4 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">

        </div>

        {{-- Card --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
@forelse($students as $student)

    <div
    class="student-card
           w-full
           max-w-sm
           mx-auto
           bg-white
           dark:bg-slate-900
           rounded-3xl
           shadow-lg
           overflow-hidden
           hover:-translate-y-2
           hover:shadow-2xl
           transition duration-300">

        {{-- Header Card --}}
        <div class="bg-gradient-to-r from-blue-600 to-cyan-500 h-24"></div>


        <div class="-mt-14 text-center">

            {{-- Foto --}}
            @if($student->photo)

                <img
                    src="{{ asset('storage/'.$student->photo) }}"
                    alt="{{ $student->nama }}"
                    class="w-28 h-28
                           rounded-full
                           border-4 border-white
                           dark:border-slate-900
                           object-cover
                           mx-auto
                           shadow-md">

            @else

                <div
                    class="w-28 h-28
                           rounded-full
                           bg-slate-200
                           dark:bg-slate-700
                           border-4 border-white
                           dark:border-slate-900
                           flex items-center
                           justify-center
                           mx-auto
                           text-4xl">

                    👤

                </div>

            @endif


            {{-- Informasi Siswa --}}
            <div class="p-6">

                {{-- Nama --}}
                <h2
                    class="text-2xl
                           font-bold
                           student-name
                           text-slate-900
                           dark:text-white">

                    {{ $student->nama }}

                </h2>


                {{-- Absen --}}
                <p
                    class="text-slate-500
                           dark:text-slate-400
                           mt-2">

                    Absen {{ $student->absen }}

                </p>


                {{-- Kelas --}}
                <p
                    class="text-blue-600
                           dark:text-cyan-400">

                    {{ $student->kelas }}

                </p>


                {{-- Jabatan + Tombol --}}
                <div class="mt-4 flex flex-col items-center">

                    {{-- Jabatan --}}
                    @if($student->jabatan == 'Ketua Kelas')

                        <span
                            class="inline-flex
                                   items-center
                                   gap-1
                                   px-3 py-1
                                   rounded-full
                                   bg-yellow-100
                                   dark:bg-yellow-500/20
                                   text-yellow-700
                                   dark:text-yellow-300
                                   text-xs
                                   font-medium
                                   whitespace-nowrap">

                            👑 Ketua Kelas

                        </span>

                    @elseif($student->jabatan == 'Wakil Ketua')

                        <span
                            class="inline-flex
                                   items-center
                                   gap-1
                                   px-3 py-1
                                   rounded-full
                                   bg-blue-100
                                   dark:bg-blue-500/20
                                   text-blue-700
                                   dark:text-blue-300
                                   text-xs
                                   font-medium
                                   whitespace-nowrap">

                            ⭐ Wakil Ketua

                        </span>

                    @elseif($student->jabatan == 'Sekretaris')

                        <span
                            class="inline-flex
                                   items-center
                                   gap-1
                                   px-3 py-1
                                   rounded-full
                                   bg-purple-100
                                   dark:bg-purple-500/20
                                   text-purple-700
                                   dark:text-purple-300
                                   text-xs
                                   font-medium
                                   whitespace-nowrap">

                            📝 Sekretaris

                        </span>

                    @elseif($student->jabatan == 'Bendahara')

                        <span
                            class="inline-flex
                                   items-center
                                   gap-1
                                   px-3 py-1
                                   rounded-full
                                   bg-green-100
                                   dark:bg-green-500/20
                                   text-green-700
                                   dark:text-green-300
                                   text-xs
                                   font-medium
                                   whitespace-nowrap">

                            💰 Bendahara

                        </span>

                    @endif


                    {{-- Tombol Profil --}}
                    <a
                        href="{{ route('students.show', $student->id) }}"
                        class="mt-5
                               inline-flex
                               items-center
                               justify-center
                               bg-blue-600
                               hover:bg-blue-700
                               text-white
                               px-6 py-3
                               rounded-xl
                               transition-all
                               hover:-translate-y-1
                               shadow-md
                               hover:shadow-lg
                               whitespace-nowrap">

                        Lihat Profil

                    </a>

                </div>

            </div>

        </div>

    </div>

@empty

    {{-- Jika Tidak Ada Data --}}
    <div class="col-span-full text-center py-20">

        <div class="text-7xl mb-4">
            📚
        </div>

        <h2
            class="text-3xl
                   font-bold
                   text-slate-900
                   dark:text-white">

            Data Tidak Ditemukan

        </h2>

        <p
            class="text-slate-500
                   dark:text-slate-400
                   mt-2">

            Belum ada data siswa.

        </p>

    </div>

@endforelse

    </div>
</div>
        {{-- Pagination --}}
        <div class="mt-12">

            {{ $students->links() }}

        </div>

    </div>

</section>

<script>

const search = document.getElementById('search');

search.addEventListener('keyup', function () {

    let value = this.value.toLowerCase();

    document.querySelectorAll('.student-card').forEach(function(card){

        let nama = card.querySelector('.student-name').innerText.toLowerCase();

        if(nama.includes(value)){

            card.style.display='block';

        }else{

            card.style.display='none';

        }

    });

});

</script>

@endsection