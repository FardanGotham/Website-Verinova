<x-card>

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            📸 Galeri Terbaru
        </h2>

        <a href="{{ route('galleries.index') }}"
           class="text-blue-600 text-sm">

            Lihat Semua →

        </a>

    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

        @forelse($latestGalleries as $gallery)

            <img
                src="{{ asset('storage/'.$gallery->image) }}"
                class="rounded-2xl h-36 w-full object-cover hover:scale-105 transition duration-300">

        @empty

            <p class="text-slate-500 col-span-3">
                Belum ada foto.
            </p>

        @endforelse

    </div>

</x-card>