<section class="py-24 bg-slate-100">

<div class="max-w-7xl mx-auto px-6">

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">

        <div
class="bg-white rounded-3xl shadow-lg p-10 text-center"
data-aos="zoom-in">

            <h2 class="text-5xl font-bold text-blue-600">
                {{ $studentCount }}
            </h2>

            <p class="mt-3 text-slate-600">
                Total Siswa
            </p>

        </div>

        <div
class="bg-white rounded-3xl shadow-lg p-10 text-center"
data-aos="zoom-in">

            <h2 class="text-5xl font-bold text-cyan-600">
                {{ $photos }}
            </h2>

            <p class="mt-3 text-slate-600">
                Foto Galeri
            </p>

        </div>

        <div
class="bg-white rounded-3xl shadow-lg p-10 text-center"
data-aos="zoom-in">

            <h2 class="text-5xl font-bold text-indigo-600">
                {{ $organizations->count() }}
            </h2>

            <p class="mt-3 text-slate-600">
                Pengurus
            </p>

        </div>

            <div
class="bg-white rounded-3xl shadow-lg p-10 text-center"
data-aos="zoom-in">

            <h2 class="text-5xl font-bold text-emerald-600">
                2026
            </h2>

            <p class="mt-3 text-slate-600">
                Angkatan
            </p>

        </div>

    </div>

</div>

</section>