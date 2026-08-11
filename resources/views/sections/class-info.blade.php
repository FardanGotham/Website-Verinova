<section id="info-kelas" class="py-24 bg-white
           dark:bg-slate-950" data-aos="fade-up">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <h2 class="text-5xl font-bold text-slate-800 dark:!text-white">
                 Info Kelas
            </h2>

            <p class="text-slate-500 mt-4">
                Tugas, Pengumuman, Agenda, dan Informasi Terbaru
            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($classInfos as $info)

            <div class="bg-white rounded-3xl shadow-lg p-6 hover:-translate-y-2 hover:shadow-xl transition">

                <div class="flex justify-between items-center">

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                        {{ $info->category }}

                    </span>

                    <span class="text-sm text-slate-500">

                        {{ $info->deadline }}

                    </span>

                </div>

                <h3 class="text-2xl font-bold mt-5">

                    {{ $info->title }}

                </h3>

                <p class="text-slate-500 mt-3">

                    {{ Str::limit($info->description,100) }}

                </p>

                <div class="mt-6 flex justify-between">

                    <span>

                        👨‍🏫 {{ $info->teacher }}
                    </span>

                    <span class="text-red-500 font-semibold">

                        {{ $info->priority }}

                    </span>

                </div>

            </div>

            @empty

            <div class="col-span-3 text-center py-12 text-slate-500">

                Belum ada informasi kelas.

            </div>

            @endforelse

        </div>

    </div>

</section>