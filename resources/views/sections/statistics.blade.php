<section class="py-24 bg-white
           dark:bg-slate-950""
    data-aos="fade-up">

<div class="max-w-7xl mx-auto px-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

    {{-- Total Siswa --}}
    <div
        class="bg-white dark:bg-slate-900
               border border-slate-200 dark:border-slate-800
               rounded-3xl p-8 text-center
               shadow-lg dark:shadow-black/20
               hover:-translate-y-2 hover:shadow-xl
               transition duration-300">

        <h2 class="text-5xl font-extrabold
                   text-blue-600 dark:text-blue-400">
            {{ $studentCount }}
        </h2>

        <p class="mt-3 text-slate-600 dark:text-slate-300">
            Total Siswa
        </p>

    </div>


    {{-- Foto Galeri --}}
    <div
        class="bg-white dark:bg-slate-900
               border border-slate-200 dark:border-slate-800
               rounded-3xl p-8 text-center
               shadow-lg dark:shadow-black/20
               hover:-translate-y-2 hover:shadow-xl
               transition duration-300">

        <h2 class="text-5xl font-extrabold
                   text-cyan-600 dark:text-cyan-400">
            {{ $photos }}
        </h2>

        <p class="mt-3 text-slate-600 dark:text-slate-300">
            Foto Galeri
        </p>

    </div>


    {{-- Pengurus --}}
    <div
        class="bg-white dark:bg-slate-900
               border border-slate-200 dark:border-slate-800
               rounded-3xl p-8 text-center
               shadow-lg dark:shadow-black/20
               hover:-translate-y-2 hover:shadow-xl
               transition duration-300">

        <h2 class="text-5xl font-extrabold
                   text-indigo-600 dark:text-indigo-400">
            {{ $organizationsCount }}
        </h2>

        <p class="mt-3 text-slate-600 dark:text-slate-300">
            Pengurus
        </p>

    </div>


    {{-- Angkatan --}}
    <div
        class="bg-white dark:bg-slate-900
               border border-slate-200 dark:border-slate-800
               rounded-3xl p-8 text-center
               shadow-lg dark:shadow-black/20
               hover:-translate-y-2 hover:shadow-xl
               transition duration-300">

        <h2 class="text-5xl font-extrabold
                   text-emerald-600 dark:text-emerald-400">
            2026
        </h2>

        <p class="mt-3 text-slate-600 dark:text-slate-300">
            Angkatan
        </p>

    </div>

</div>

</div>

</section>