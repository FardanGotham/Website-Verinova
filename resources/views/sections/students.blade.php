<section class="py-24 bg-slate-100">

<div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-14">

        <h2 class="text-5xl font-bold">

            Data Siswa

        </h2>

        <p class="text-slate-500 mt-3">

            Kenali siswa-siswi kelas kami.

        </p>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach($students as $student)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:-translate-y-2 transition">

            <div class="bg-gradient-to-r from-blue-600 to-cyan-500 h-20"></div>

            <div class="-mt-12 text-center p-6">

                @if($student->photo)

                    <img
                        src="{{ asset('storage/'.$student->photo) }}"
                        class="w-24 h-24 rounded-full border-4 border-white object-cover mx-auto">

                @else

                    <div class="w-24 h-24 rounded-full bg-slate-200 mx-auto flex items-center justify-center">

                        👤

                    </div>

                @endif

                <h3 class="text-xl font-bold mt-4">

                    {{ $student->nama }}

                </h3>

                <p class="text-slate-500">

                    Absen {{ $student->absen }}

                </p>

                <p class="text-blue-600">

                    {{ $student->kelas }}

                </p>

                <a
                    href="{{ route('students.show',$student->id) }}"
                    class="inline-block mt-5 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl">

                    Lihat Profil

                </a>

            </div>

        </div>

        @endforeach

    </div>

    <div class="text-center mt-14">

        <a
            href="{{ route('students.index') }}"
            class="bg-slate-900 hover:bg-slate-800 text-white px-8 py-4 rounded-xl">

            Lihat Semua Siswa

        </a>

    </div>

</div>

</section>