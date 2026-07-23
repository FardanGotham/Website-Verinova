<section id="piket" class="py-20 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold text-slate-800">
                Jadwal Piket
            </h2>

            <p class="text-slate-500 mt-3">
                Jadwal piket kebersihan kelas setiap hari.
            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($duties as $duty)

            <div class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                <div class="flex justify-between items-center mb-6">

                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">

                        {{ $duty->day }}

                    </span>

                    <span class="text-3xl">
                        🧹
                    </span>

                </div>

                <ul class="space-y-3">

                    <li>👤 {{ $duty->student1->nama }}</li>
                    <li>👤 {{ $duty->student2->nama }}</li>
                    <li>👤 {{ $duty->student3->nama }}</li>
                    <li>👤 {{ $duty->student4->nama }}</li>
                    <li>👤 {{ $duty->student5->nama }}</li>

                </ul>

            </div>

            @endforeach

        </div>

    </div>

</section>