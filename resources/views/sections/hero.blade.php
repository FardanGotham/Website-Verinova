<section
    id="hero"
    class="relative overflow-hidden bg-white dark:bg-slate-950 transition-colors duration-500"
>

    {{-- ========================= --}}
    {{-- BACKGROUND DECORATION --}}
    {{-- ========================= --}}

    <div
        class="absolute -top-32 -left-32
               w-96 h-96
               bg-blue-100/60
               dark:bg-blue-900/20
               rounded-full blur-3xl">
    </div>

    <div
        class="absolute bottom-0 right-0
               w-[500px] h-[500px]
               bg-cyan-100/60
               dark:bg-cyan-900/20
               rounded-full blur-3xl">
    </div>


    {{-- ========================= --}}
    {{-- HERO CONTENT --}}
    {{-- ========================= --}}

    <div class="max-w-7xl mx-auto px-6 py-24 relative z-10">

        <div class="grid lg:grid-cols-2 gap-16 items-center">


            {{-- ========================= --}}
            {{-- KIRI --}}
            {{-- ========================= --}}

            <div data-aos="fade-right">

                {{-- Badge --}}

                <span
                    class="inline-flex items-center gap-2
                           bg-blue-50
                           dark:bg-blue-900/30
                           text-blue-600
                           dark:text-cyan-400
                           px-5 py-2
                           rounded-full
                           text-sm font-medium
                           border border-blue-100
                           dark:border-blue-800
                           hover:-translate-y-1
                           transition duration-300">

                    <span
                        class="w-2 h-2
                               bg-blue-500
                               rounded-full
                               animate-pulse">
                    </span>

                    XII PPLG 2 | Website Resmi Kelas

                </span>


                {{-- ========================= --}}
                {{-- HEADING --}}
                {{-- ========================= --}}
<h1
    class="text-5xl lg:text-7xl
           font-extrabold
           leading-tight
           mt-6">

    <span class="text-slate-900 dark:text-white">
        XII
    </span>

    <span
        class="hero-title-gradient">

        PPLG

    </span>

    <span class="text-slate-900 dark:text-white">
        2
    </span>

</h1>


                {{-- SLOGAN --}}

                <p
                    class="text-2xl lg:text-3xl
                           font-semibold
                           mt-5
                           text-slate-700
                           dark:text-slate-200">

                    Tumbuh Bersama

                    <span
                        class="text-blue-600
                               dark:text-cyan-400">

                        Menjadi Luar Biasa

                    </span>

                </p>


                {{-- DESCRIPTION --}}

                <p
                    class="text-slate-600
                           dark:text-slate-400
                           mt-8
                           leading-8
                           max-w-xl
                           text-lg">

                    Selamat datang di website resmi kelas
                    <span
                        class="font-semibold
                               text-blue-600
                               dark:text-cyan-400">

                        XII PPLG 2

                    </span>.

                    Temukan informasi lengkap mengenai data siswa,
                    struktur organisasi, galeri kegiatan,
                    jadwal kelas, prestasi, serta berbagai aktivitas
                    yang dilakukan selama satu tahun pembelajaran.

                </p>


                {{-- ========================= --}}
                {{-- BUTTON --}}
                {{-- ========================= --}}

                <div class="flex flex-wrap gap-4 mt-10">

                    <a
                        href="#about"
                        class="group
                               bg-blue-600
                               text-white
                               px-8 py-4
                               rounded-2xl
                               font-semibold
                               shadow-lg
                               shadow-blue-500/20
                               hover:bg-blue-700
                               hover:-translate-y-1
                               hover:shadow-xl
                               transition duration-300">

                        Tentang Kelas

                        <span
                            class="inline-block ml-2
                                   group-hover:translate-x-1
                                   transition">

                            →

                        </span>

                    </a>


                    <a
                        href="{{ route('students.index') }}"
                        class="group
                               border-2
                               border-blue-600
                               text-blue-600
                               dark:border-cyan-400
                               dark:text-cyan-400
                               px-8 py-4
                               rounded-2xl
                               font-semibold
                               hover:bg-blue-600
                               hover:text-white
                               dark:hover:bg-cyan-400
                               dark:hover:text-slate-900
                               transition duration-300">

                        Data Siswa

                        <span
                            class="inline-block ml-2
                                   group-hover:translate-x-1
                                   transition">

                            →

                        </span>

                    </a>

                </div>


                {{-- ========================= --}}
                {{-- STATISTIK --}}
                {{-- ========================= --}}

                <div class="grid grid-cols-3 gap-8 mt-14">

                    <div
                        class="group text-center
                               hover:-translate-y-2
                               transition duration-300">

                        <h2
                            class="text-4xl font-bold
                                   text-slate-900
                                   dark:text-white
                                   group-hover:text-blue-600
                                   dark:group-hover:text-cyan-400
                                   transition">

                            {{ $studentCount }}

                        </h2>

                        <p
                            class="text-slate-500
                                   dark:text-slate-400
                                   mt-1">

                            Total Siswa

                        </p>

                    </div>


                    <div
                        class="group text-center
                               hover:-translate-y-2
                               transition duration-300">

                        <h2
                            class="text-4xl font-bold
                                   text-slate-900
                                   dark:text-white
                                   group-hover:text-blue-600
                                   dark:group-hover:text-cyan-400
                                   transition">

                            {{ $photos }}+

                        </h2>

                        <p
                            class="text-slate-500
                                   dark:text-slate-400
                                   mt-1">

                            Foto Galeri

                        </p>

                    </div>


                    <div
                        class="group text-center
                               hover:-translate-y-2
                               transition duration-300">

                        <h2
                            class="text-4xl font-bold
                                   text-slate-900
                                   dark:text-white
                                   group-hover:text-blue-600
                                   dark:group-hover:text-cyan-400
                                   transition">

                            2026

                        </h2>

                        <p
                            class="text-slate-500
                                   dark:text-slate-400
                                   mt-1">

                            Angkatan

                        </p>

                    </div>

                </div>

            </div>


            {{-- ========================= --}}
            {{-- KANAN / SLIDESHOW --}}
            {{-- ========================= --}}

            <div
                class="relative flex justify-center"
                data-aos="fade-left">

                <div
                    class="relative w-full max-w-xl">


                    {{-- SLIDESHOW CONTAINER --}}

                    <div
                        class="hero-slider
                               relative
                               w-full
                               aspect-[4/3]
                               rounded-[35px]
                               overflow-hidden
                               shadow-[0_30px_70px_rgba(0,0,0,.15)]
                               bg-slate-100
                               dark:bg-slate-900">


                        {{-- SLIDES --}}

                        <div class="hero-slides">


                            {{-- FOTO 1 --}}

                            <img
                                src="{{ asset('images/kelas-1.jpg') }}"
                                alt="Foto Kelas XII PPLG 2"
                                class="hero-slide">


                            {{-- FOTO 2 --}}

                            <img
                                src="{{ asset('images/kelas-2.jpg') }}"
                                alt="Kegiatan XII PPLG 2"
                                class="hero-slide">


                            {{-- FOTO 3 --}}

                            <img
                                src="{{ asset('images/kelas-3.jpg') }}"
                                alt="Kegiatan Kelas"
                                class="hero-slide">


                            {{-- FOTO 4 --}}

                            <img
                                src="{{ asset('images/kelas-4.jpg') }}"
                                alt="Kegiatan XII PPLG 2"
                                class="hero-slide">

                            <img
                                src="{{ asset('images/kelas-5.jpg') }}"
                                alt="Kegiatan XII PPLG 2"
                                class="hero-slide">

                        </div>
                        


                        {{-- OVERLAY --}}

                        <div
                            class="absolute inset-0
                                   bg-gradient-to-t
                                   from-black/20
                                   via-transparent
                                   to-transparent
                                   pointer-events-none">
                        </div>


                    </div>


                    {{-- ========================= --}}
                    {{-- BADGE FOTO --}}
                    {{-- ========================= --}}

                    <div
                        class="absolute
                               -bottom-6
                               -left-6
                               bg-white
                               dark:bg-slate-900
                               rounded-2xl
                               shadow-xl
                               px-6 py-4
                               border
                               border-slate-100
                               dark:border-slate-800
                               hover:-translate-y-2
                               transition duration-300">

                        <h3
                            class="font-bold
                                   text-blue-600
                                   dark:text-cyan-400
                                   text-lg">

                            XII PPLG 2

                        </h3>

                        <p
                            class="text-slate-500
                                   dark:text-slate-400
                                   text-sm">

                            Tumbuh Bersama Menjadi Luar Biasa

                        </p>

                    </div>


                </div>

            </div>

        </div>

    </div>


    {{-- ================================================= --}}
    {{-- CSS SLIDESHOW --}}
    {{-- ================================================= --}}

    <style>

        /* =========================
           SLIDESHOW
        ========================= */

        .hero-slider {
            position: relative;
            animation: heroFloat 5s ease-in-out infinite;
        }
        


        .hero-slides {

            display: flex;

            width: 400%;

            height: 100%;

            animation:
                heroAutoSlide
                16s
                infinite
                ease-in-out;

        }


        .hero-slide {

            width: 25%;

            height: 100%;

            object-fit: cover;

            flex-shrink: 0;

        }


        /* =========================
           AUTO SLIDE
        ========================= */

        @keyframes heroAutoSlide {

            0%,
            20% {

                transform: translateX(0);

            }


            25%,
            45% {

                transform: translateX(-25%);

            }


            50%,
            70% {

                transform: translateX(-50%);

            }


            75%,
            95% {

                transform: translateX(-75%);

            }


            100% {

                transform: translateX(0);

            }

        }


        /* =========================
           FLOATING FOTO
        ========================= */

        @keyframes heroFloat {

            0%,
            100% {

                transform: translateY(0);

            }

            50% {

                transform: translateY(-7px);

            }

        }


        /* =========================
           HEADING ANIMATION
        ========================= */

        .hero-word {

            display: inline-block;

            animation:
                heroWordFloat
                3s
                ease-in-out
                infinite;

        }


        @keyframes heroWordFloat {

            0%,
            100% {

                transform: translateY(0);

            }

            50% {

                transform: translateY(-4px);

            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 1024px) {

            .hero-slides {

                animation-duration: 16s;

            }

        }


        @media (max-width: 640px) {

            .hero-slider {

                border-radius: 25px;

            }

        }
.hero-title-gradient {

    display: inline-block;

    background: linear-gradient(
        90deg,
        #2563eb,
        #06b6d4,
        #8b5cf6,
        #2563eb
    );

    background-size: 250% auto;

    -webkit-background-clip: text;
    background-clip: text;

    -webkit-text-fill-color: transparent;

    animation:
        gradientMove 4s linear infinite,
        titleGlow 3s ease-in-out infinite;

}


@keyframes gradientMove {

    0% {
        background-position: 0% center;
    }

    100% {
        background-position: 250% center;
    }

}


@keyframes titleGlow {

    0%,
    100% {

        filter:
            drop-shadow(
                0 0 4px
                rgba(37, 99, 235, .25)
            );

    }

    50% {

        filter:
            drop-shadow(
                0 0 10px
                rgba(34, 211, 238, .65)
            )
            drop-shadow(
                0 0 20px
                rgba(59, 130, 246, .25)
            );

    }

}
    </style>

</section>