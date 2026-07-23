<section id="schedule" class="py-24 bg-slate-100">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">
            <h2 class="text-5xl font-bold text-slate-800">
                Jadwal Pelajaran
            </h2>

            <p class="text-slate-500 mt-3">
                Jadwal Kelas XII PPLG 2
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($schedules as $day => $items)

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                    <div class="bg-gradient-to-r from-blue-600 to-cyan-500 px-6 py-5">

                        <h3 class="text-2xl font-bold text-white">
                            {{ $day }}
                        </h3>

                    </div>

                    <div class="p-6">

                        @foreach($items as $schedule)

                            <div class="border-l-4 border-blue-500 pl-4 py-3 mb-4">

                                <p class="font-semibold text-lg text-slate-800">
                                    {{ $schedule->subject }}
                                </p>

                                <p class="text-slate-600 mt-1">
                                    👨‍🏫 {{ $schedule->teacher }}
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
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

                <div class="col-span-3 text-center py-16">

                    <h3 class="text-xl text-slate-500">
                        Jadwal belum tersedia.
                    </h3>

                </div>

            @endforelse

        </div>

    </div>

</section>