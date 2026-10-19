<section id="schedule"
    class="py-24 bg-white dark:bg-slate-950"
    data-aos="fade-up">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center mb-14">

            <h2 class="text-5xl font-bold
                       text-slate-800 dark:text-white">
                Jadwal Pelajaran
            </h2>

            <p class="text-slate-600 dark:text-slate-300 mt-3">
                Jadwal Kelas XII PPLG 2
            </p>

        </div>


        {{-- Jadwal --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($schedules as $day => $items)

                {{-- Card Hari --}}
                <div
                    class="bg-white dark:bg-slate-900
                           border border-slate-200 dark:border-slate-800
                           rounded-3xl
                           shadow-lg dark:shadow-black/30
                           overflow-hidden
                           hover:-translate-y-1
                           hover:shadow-xl
                           transition-all duration-300">

                    {{-- Header Hari --}}
                    <div
                        class="bg-gradient-to-r
                               from-blue-600 to-cyan-500
                               px-6 py-5">

                        <h3 class="text-2xl font-bold text-white">
                            {{ $day }}
                        </h3>

                    </div>


                    {{-- Isi --}}
                    <div class="p-6">

                        @foreach($items as $schedule)

                            <div
                                class="border-l-4 border-blue-500
                                       pl-4 py-3 mb-4
                                       rounded-r-xl
                                       hover:bg-slate-50
                                       dark:hover:bg-slate-800/60
                                       transition duration-300">

                                {{-- Mata Pelajaran --}}
                                <p
                                    class="font-semibold text-lg
                                           text-slate-800 dark:text-white">

                                    {{ $schedule->subject }}

                                </p>


                                {{-- Guru --}}
                                <p
                                    class="text-slate-600
                                           dark:text-slate-300
                                           mt-1">

                                    👨‍🏫 {{ $schedule->teacher }}

                                </p>


                                {{-- Jam --}}
                                <p
                                    class="text-sm
                                           text-slate-500
                                           dark:text-slate-400
                                           mt-1">

                                    🕒

                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}

                                    -

                                    {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}

                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>

            @empty

                {{-- Jika belum ada jadwal --}}
                <div class="col-span-3 text-center py-16">

                    <h3
                        class="text-xl
                               text-slate-600
                               dark:text-slate-300">

                        Jadwal belum tersedia.

                    </h3>

                </div>

            @endforelse

        </div>

    </div>

</section>