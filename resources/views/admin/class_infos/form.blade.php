@csrf

<div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Judul Informasi -->
        <div class="md:col-span-2">
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Judul Informasi / Pengumuman <span class="text-rose-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <x-icon name="megaphone" class="w-4 h-4" />
                </div>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $classInfo->title ?? '') }}"
                    placeholder="Contoh: Pengumpulan Proyek Akhir Praktik Web Fullstack"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            @error('title')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Kategori -->
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Kategori <span class="text-rose-500">*</span>
            </label>
            <select
                name="category"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                @foreach(['Tugas', 'Pengumuman', 'Ulangan', 'Agenda', 'Event'] as $categoryOpt)
                    <option value="{{ $categoryOpt }}" @selected(old('category', $classInfo->category ?? '') == $categoryOpt)>
                        {{ $categoryOpt }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Guru / Pembuat Pengumuman -->
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Guru / Pembuat Pengumuman (Opsional)
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <x-icon name="user" class="w-4 h-4" />
                </div>
                <input
                    type="text"
                    name="teacher"
                    value="{{ old('teacher', $classInfo->teacher ?? '') }}"
                    placeholder="Contoh: Ibu Rina, S.Kom."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            @error('teacher')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Batas Waktu / Deadline -->
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Batas Waktu / Deadline (Opsional)
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <x-icon name="calendar-days" class="w-4 h-4" />
                </div>
                <input
                    type="date"
                    name="deadline"
                    value="{{ old('deadline', $classInfo->deadline ?? '') }}"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            @error('deadline')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tingkat Prioritas -->
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Tingkat Prioritas <span class="text-rose-500">*</span>
            </label>
            <select
                name="priority"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                @foreach(['Normal', 'Penting', 'Mendesak'] as $prio)
                    <option value="{{ $prio }}" @selected(old('priority', $classInfo->priority ?? 'Normal') == $prio)>
                        {{ $prio }}
                    </option>
                @endforeach
            </select>
            @error('priority')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Status Informasi <span class="text-rose-500">*</span>
            </label>
            <select
                name="status"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="Aktif" @selected(old('status', $classInfo->status ?? 'Aktif') == 'Aktif')>Aktif (Tampil di Website)</option>
                <option value="Selesai" @selected(old('status', $classInfo->status ?? '') == 'Selesai')>Selesai (Arsip)</option>
            </select>
            @error('status')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Lampiran Berkas File -->
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Lampiran Berkas (Opsional &bull; Maks. 5MB)
            </label>
            <input
                type="file"
                name="attachment"
                class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 dark:file:bg-slate-800 dark:file:text-blue-400 hover:file:bg-blue-100 dark:hover:file:bg-slate-700 cursor-pointer">
            @if(isset($classInfo) && $classInfo->attachment)
                <p class="text-xs text-blue-600 dark:text-blue-400 mt-1.5">
                    Berkas saat ini: <a href="{{ asset('storage/'.$classInfo->attachment) }}" target="_blank" class="underline">Lihat Lampiran</a>
                </p>
            @endif
            @error('attachment')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi Informasi -->
        <div class="md:col-span-2">
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Uraian & Rincian Informasi <span class="text-rose-500">*</span>
            </label>
            <textarea
                name="description"
                rows="5"
                placeholder="Tuliskan petunjuk tugas, instruksi guru, atau rincian kegiatan secara lengkap..."
                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 leading-relaxed"
                required>{{ old('description', $classInfo->description ?? '') }}</textarea>
            @error('description')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100 dark:border-slate-800">
        <x-button :href="route('class-infos.index')" variant="secondary">
            Batal
        </x-button>

        <x-button type="submit" variant="primary" icon="save">
            Simpan Informasi
        </x-button>
    </div>

</div>
