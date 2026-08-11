<section id="achievement" class="py-24 bg-white
           dark:bg-slate-950" data-aos="fade-up">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <h2 class="text-5xl font-bold !text-slate-800 dark:!text-white">
                Prestasi Kelas
            </h2>

            <p class="text-slate-500 mt-3">
                Prestasi yang telah diraih oleh kelas XII PPLG 2
            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($achievements as $achievement)

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition">

                    @if($achievement->photo)

                        <img
                            src="{{ asset('storage/'.$achievement->photo) }}"
                            class="w-full h-60 object-cover">

                    @else

                        <div class="h-60 bg-gradient-to-r from-blue-600 to-cyan-500 flex items-center justify-center text-6xl text-white">

                            🏆

                        </div>

                    @endif

                    <div class="p-6">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                            {{ $achievement->level }}

                        </span>

                        <span class="float-right text-slate-500">

                            {{ $achievement->year }}

                        </span>

                        <h3 class="text-2xl font-bold mt-5">

                            {{ $achievement->title }}

                        </h3>

                        <p class="text-slate-500 mt-4 line-clamp-3">

                            {{ $achievement->description }}

                        </p>

                    </div>

                </div>

            @empty

                <div class="col-span-3 text-center py-12">

                    <h3 class="text-slate-500 text-xl">

                        Belum ada prestasi.

                    </h3>

                </div>

            @endforelse

        </div>

    </div>

</section>