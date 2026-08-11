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

            @forelse($organizations as $member)

                <div
                    class="bg-white rounded-3xl shadow-lg p-8 text-center hover:-translate-y-2 hover:shadow-2xl transition duration-300"
                    data-aos="zoom-in">

                    {{-- Foto --}}
                    @if($member->photo)

                        <img
                            src="{{ asset('storage/' . $member->photo) }}"
                            alt="{{ $member->name }}"
                            class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-blue-100">

                    @else

                        <div class="w-32 h-32 rounded-full bg-slate-200 flex items-center justify-center mx-auto">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-14 h-14 text-slate-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                            </svg>

                        </div>

                    @endif

                    {{-- Nama --}}
                    <h3 class="text-2xl font-bold mt-6 text-slate-800">
                        {{ $member->name }}
                    </h3>

                    {{-- Jabatan --}}
                    <p class="text-blue-600 font-medium mt-2">
                        {{ $member->position }}
                    </p>

                </div>

            @empty

                <div class="col-span-4 text-center py-16">

                    <h3 class="text-2xl font-semibold text-slate-500">
                        Belum ada data pengurus.
                    </h3>

                </div>

            @endforelse

        </div>

    </div>

</section>