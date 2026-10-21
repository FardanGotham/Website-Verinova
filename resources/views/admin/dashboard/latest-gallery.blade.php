<div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200">
    <div class="flex items-center justify-between mb-5">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-purple-50 dark:bg-purple-950/50 text-purple-600 dark:text-purple-400 flex items-center justify-center">
                <x-icon name="images" class="w-4 h-4" />
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Galeri Kegiatan Terbaru</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Dokumentasi momen terbaru kelas</p>
            </div>
        </div>

        <a href="{{ route('galleries.index') }}"
           class="text-xs font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition inline-flex items-center gap-1">
            <span>Buka Galeri</span>
            <x-icon name="arrow-right" class="w-3.5 h-3.5" />
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        @forelse($latestGalleries as $gallery)
            <div class="group relative rounded-xl overflow-hidden aspect-square bg-slate-100 dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700/80 shadow-sm">
                <img
                    src="{{ asset('storage/'.$gallery->image) }}"
                    alt="{{ $gallery->title }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex flex-col justify-end p-2.5">
                    <span class="text-[10px] font-semibold text-cyan-300 uppercase tracking-wider truncate">
                        {{ $gallery->category }}
                    </span>
                    <p class="text-xs font-medium text-white truncate">
                        {{ $gallery->title }}
                    </p>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center">
                <div class="w-12 h-12 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 mx-auto flex items-center justify-center mb-2">
                    <x-icon name="images" class="w-6 h-6" />
                </div>
                <p class="text-xs text-slate-500">Belum ada foto galeri terunggah.</p>
                <a href="{{ route('galleries.create') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600 dark:text-blue-400 mt-2 hover:underline">
                    <x-icon name="plus" class="w-3.5 h-3.5" />
                    <span>Upload Foto Sekarang</span>
                </a>
            </div>
        @endforelse
    </div>
</div>
