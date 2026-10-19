<section id="organization" class="py-24 bg-white
           dark:bg-slate-950" data-aos="fade-up">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Judul --}}
        <div class="text-center mb-16" data-aos="fade-up">

            <h2 class="text-5xl font-bold text-slate-800 dark:!text-white">
                Struktur Organisasi
            </h2>

            <p class="text-slate-500 mt-4">
                Pengurus Kelas XII PPLG 2
            </p>

        </div>

        {{-- Card Organisasi --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

    @forelse($organizations as $organization)

        <div
            class="group bg-white dark:bg-slate-900
                   border border-slate-200 dark:border-slate-800
                   rounded-3xl overflow-hidden
                   shadow-lg dark:shadow-black/20
                   hover:-translate-y-2 hover:shadow-2xl
                   transition-all duration-300">

            {{-- Header Card --}}
            <div class="h-24 bg-gradient-to-r from-blue-600 to-cyan-500
                        relative">

                {{-- Efek cahaya --}}
                <div
                    class="absolute -top-10 -right-10
                           w-24 h-24 bg-white/20
                           rounded-full blur-2xl">
                </div>

            </div>


            {{-- Isi --}}
            <div class="relative text-center px-6 pb-7">

                {{-- Foto --}}
                <div class="-mt-12 mb-5">

                    @if($organization->photo)

                        <img
                            src="{{ asset('storage/'.$organization->photo) }}"
                            alt="{{ $organization->name }}"
                            class="w-24 h-24 mx-auto
                                   rounded-full
                                   object-cover
                                   border-4
                                   border-white
                                   dark:border-slate-900
                                   shadow-lg
                                   group-hover:scale-105
                                   transition duration-300">

                    @else

                        <div
                            class="w-24 h-24 mx-auto
                                   rounded-full
                                   bg-slate-100
                                   dark:bg-slate-800
                                   border-4
                                   border-white
                                   dark:border-slate-900
                                   flex items-center justify-center
                                   shadow-lg">

                            <i class="fa-solid fa-user
                                      text-3xl
                                      text-slate-400
                                      dark:text-slate-500">
                            </i>

                        </div>

                    @endif

                </div>


                {{-- Nama --}}
                <h3
                    class="text-xl font-bold
                           text-slate-800
                           dark:text-white
                           group-hover:text-blue-600
                           dark:group-hover:text-cyan-400
                           transition">

                    {{ $organization->name }}

                </h3>


                {{-- Jabatan --}}
                <p
                    class="mt-2
                           text-blue-600
                           dark:text-cyan-400
                           font-semibold">

                    {{ $organization->position }}

                </p>

            </div>

        </div>

    @empty

        <div class="col-span-full text-center py-16">

            <div class="text-6xl mb-4">
                👥
            </div>

            <h3
                class="text-2xl font-bold
                       text-slate-800
                       dark:text-white">

                Belum Ada Pengurus

            </h3>

            <p
                class="mt-2
                       text-slate-600
                       dark:text-slate-400">

                Data struktur organisasi belum tersedia.

            </p>

        </div>

    @endforelse

</div>

    </div>

</section>