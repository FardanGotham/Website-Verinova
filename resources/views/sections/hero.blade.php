<section id="hero"
    class="relative min-h-screen flex items-center overflow-hidden
    bg-gradient-to-br from-blue-700 via-blue-500 to-cyan-400
    dark:from-slate-950 dark:via-slate-900 dark:to-slate-800">

    <!-- Background Blur -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-white/20 dark:bg-white/5 rounded-full blur-3xl"></div>

    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-cyan-300/20 dark:bg-cyan-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 py-24 relative z-10">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Kiri -->
            <div data-aos="fade-right">

                <span
                    class="inline-block bg-white/20 backdrop-blur-md px-5 py-2 rounded-full text-sm text-white border border-white/20">

                    XII PPLG 2 | Website Resmi Kelas

                </span>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-white leading-tight mt-6">

                    XII PPLG 2

                </h1>

                <p class="text-2xl lg:text-3xl text-white/90 mt-5">

                    "Tumbuh Bersama Menjadi Luar Biasa"

                </p>

                <p class="text-white/80 mt-8 leading-8 max-w-xl text-lg">

                    Selamat datang di website resmi kelas XII PPLG 2.
                    Temukan informasi lengkap mengenai data siswa,
                    struktur organisasi, galeri kegiatan,
                    jadwal kelas, prestasi, serta berbagai aktivitas
                    yang dilakukan selama satu tahun pembelajaran.

                </p>

                <div class="flex flex-wrap gap-4 mt-10">

                    <a href="#about"
                        class="bg-white text-blue-700 px-8 py-4 rounded-2xl font-semibold shadow-lg hover:-translate-y-1 hover:shadow-2xl transition">

                        Tentang Kelas

                    </a>

                    <a href="{{ route('students.index') }}"
                        class="border-2 border-white text-white px-8 py-4 rounded-2xl hover:bg-white hover:text-blue-700 transition">

                        Data Siswa

                    </a>

                </div>

                <!-- Statistik -->
                <div class="grid grid-cols-3 gap-8 mt-14 text-center">

                    <div>

                        <h2 class="text-4xl font-bold text-white">

                            {{ $studentCount }}

                        </h2>

                        <p class="text-white/80">

                            Total Siswa

                        </p>

                    </div>

                    <div>

                        <h2 class="text-4xl font-bold text-white">

                            {{ $photos }}+

                        </h2>

                        <p class="text-white/80">

                            Foto Galeri

                        </p>

                    </div>

                    <div>

                        <h2 class="text-4xl font-bold text-white">

                            2026

                        </h2>

                        <p class="text-white/80">

                            Angkatan

                        </p>

                    </div>

                </div>

            </div>

            <!-- Kanan -->
            <div class="relative flex justify-center" data-aos="fade-left">

                <div class="relative">

                    <img
                        src="{{ asset('images/kelas.jpeg') }}"
                        alt="Foto Kelas"
                        class="rounded-[35px] shadow-[0_40px_80px_rgba(0,0,0,.25)] hover:scale-105 transition duration-500 w-full max-w-xl">

                    <!-- Badge -->
                    <div
                        class="absolute -bottom-6 -left-6 bg-white dark:bg-slate-900 rounded-2xl shadow-xl px-6 py-4">

                        <h3 class="font-bold text-blue-700 dark:text-cyan-400 text-lg">

                            XII PPLG 2

                        </h3>

                        <p class="text-slate-500 dark:text-slate-400 text-sm">

                            Tumbuh Bersama Menjadi Luar Biasa

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>