@csrf

<div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-6"
     x-data="{
        photoPreview: '{{ isset($achievement) && $achievement->photo ? asset('storage/'.$achievement->photo) : '' }}',
        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
     }">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Judul Prestasi -->
        <div class="md:col-span-2">
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Judul Prestasi / Kejuaraan <span class="text-rose-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <x-icon name="trophy" class="w-4 h-4" />
                </div>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $achievement->title ?? '') }}"
                    placeholder="Contoh: Juara 1 Lomba Web Design Tingkat Provinsi Jawa Tengah"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            @error('title')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tingkat Kejuaraan -->
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Tingkat Kejuaraan <span class="text-rose-500">*</span>
            </label>
            <input
                type="text"
                name="level"
                value="{{ old('level', $achievement->level ?? '') }}"
                placeholder="Contoh: Sekolah / Kabupaten / Provinsi / Nasional"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('level')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tahun Pencapaian -->
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Tahun Pencapaian <span class="text-rose-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <x-icon name="calendar-days" class="w-4 h-4" />
                </div>
                <input
                    type="number"
                    name="year"
                    value="{{ old('year', $achievement->year ?? date('Y')) }}"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono"
                    required>
            </div>
            @error('year')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Upload Foto Penghargaan / Piala -->
        <div class="md:col-span-2">
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Foto Penghargaan / Piala / Sertifikat (Opsional &bull; Maks. 2MB)
            </label>

            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-5">
                <!-- Preview Box -->
                <div class="w-28 h-28 rounded-2xl bg-slate-100 dark:bg-slate-800 border-2 border-dashed border-slate-300 dark:border-slate-700 overflow-hidden flex items-center justify-center shrink-0">
                    <template x-if="photoPreview">
                        <img :src="photoPreview" alt="Preview Foto" class="w-full h-full object-cover">
                    </template>
                    <template x-if="!photoPreview">
                        <div class="text-center p-2 text-slate-400">
                            <x-icon name="trophy" class="w-8 h-8 mx-auto opacity-40" />
                            <span class="text-[10px] mt-1 block">Pratinjau Foto</span>
                        </div>
                    </template>
                </div>

                <div class="flex-1 w-full">
                    <input
                        type="file"
                        name="photo"
                        accept="image/*"
                        @change="previewImage"
                        class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 dark:file:bg-slate-800 dark:file:text-blue-400 hover:file:bg-blue-100 dark:hover:file:bg-slate-700 cursor-pointer">
                    <p class="text-xs text-slate-400 mt-2">
                        Format yang didukung: JPG, JPEG, PNG. Foto akan ditampilkan pada kartu prestasi publik.
                    </p>
                </div>
            </div>
            @error('photo')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div class="md:col-span-2">
            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                Deskripsi Prestasi (Opsional)
            </label>
            <textarea
                name="description"
                rows="4"
                placeholder="Tuliskan keterangan detail mengenai penyelenggara lomba, peraih prestasi, atau deskripsi karya yang dilombakan..."
                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 leading-relaxed">{{ old('description', $achievement->description ?? '') }}</textarea>
            @error('description')
                <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100 dark:border-slate-800">
        <x-button :href="route('achievements.index')" variant="secondary">
            Batal
        </x-button>

        <x-button type="submit" variant="primary" icon="save">
            Simpan Prestasi
        </x-button>
    </div>

</div>
