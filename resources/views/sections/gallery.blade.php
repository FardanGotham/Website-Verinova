<section id="gallery" class="py-24 bg-slate-100">

<div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-16">

        <h2 class="text-5xl font-bold !text-slate-800 dark:!text-white">
    Galeri Kegiatan
</h2>

        <p class="text-slate-500 mt-4">

            Dokumentasi kegiatan kelas

        </p>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($galleries as $gallery)

        <div
class="overflow-hidden rounded-3xl shadow-lg"
data-aos="zoom-in">

            <img
                src="{{ asset('storage/'.$gallery->image) }}"
                class="h-72 w-full object-cover hover:scale-110 transition duration-500">

        </div>

        @endforeach

    </div>

</div>

</section>