@csrf

<div class="space-y-8" x-data="{
    photoPreview: '{{ isset($student) && $student->photo ? asset('storage/'.$student->photo) : '' }}',
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

    <!-- Section 1: Informasi Akademik & Identitas -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200">
        <div class="flex items-center gap-3 pb-6 mb-6 border-b border-slate-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-950/50 text-blue-600 dark:text-blue-400 flex items-center justify-center shrink-0">
                <x-icon name="user" class="w-5 h-5" />
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Identitas & Akademik</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Informasi pokok siswa di kelas XII PPLG 2</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Nama Lengkap --}}
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Nama Lengkap <span class="text-rose-500">*</span>
                </label>
                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $student->nama ?? '') }}"
                    placeholder="Contoh: Muhammad Rizky Pratama"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-rose-500 @enderror"
                    required>
                @error('nama')
                    <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nomor Absen --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Nomor Absen <span class="text-rose-500">*</span>
                </label>
                <input
                    type="number"
                    name="absen"
                    value="{{ old('absen', $student->absen ?? '') }}"
                    placeholder="Contoh: 18"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('absen') border-rose-500 @enderror"
                    required>
                @error('absen')
                    <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kelas --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Kelas <span class="text-rose-500">*</span>
                </label>
                <input
                    type="text"
                    name="kelas"
                    value="{{ old('kelas', $student->kelas ?? 'XII PPLG 2') }}"
                    placeholder="XII PPLG 2"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kelas') border-rose-500 @enderror"
                    required>
                @error('kelas')
                    <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Jenis Kelamin
                </label>
                <select
                    name="gender"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" @selected(old('gender', $student->gender ?? '') == 'Laki-laki')>Laki-laki</option>
                    <option value="Perempuan" @selected(old('gender', $student->gender ?? '') == 'Perempuan')>Perempuan</option>
                </select>
            </div>

            {{-- Jabatan --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Jabatan di Kelas
                </label>
                <select
                    name="jabatan"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach(['Anggota', 'Ketua Kelas', 'Wakil Ketua', 'Sekretaris', 'Bendahara', 'Koordinator Kebersihan', 'Koordinator Keamanan'] as $jabatanOpt)
                        <option value="{{ $jabatanOpt }}" @selected(old('jabatan', $student->jabatan ?? '') == $jabatanOpt)>
                            {{ $jabatanOpt }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Section 2: Foto Profil Siswa -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200">
        <div class="flex items-center gap-3 pb-6 mb-6 border-b border-slate-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-xl bg-purple-50 dark:bg-purple-950/50 text-purple-600 dark:text-purple-400 flex items-center justify-center shrink-0">
                <x-icon name="image" class="w-5 h-5" />
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Foto Profil Siswa</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Format yang didukung: JPG, PNG, JPEG (Maks. 2MB)</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
            <!-- Preview Box -->
            <div class="w-32 h-32 rounded-2xl bg-slate-100 dark:bg-slate-800 border-2 border-dashed border-slate-300 dark:border-slate-700 overflow-hidden flex items-center justify-center shrink-0 relative group">
                <template x-if="photoPreview">
                    <img :src="photoPreview" alt="Preview Foto" class="w-full h-full object-cover">
                </template>
                <template x-if="!photoPreview">
                    <div class="text-center p-3 text-slate-400">
                        <x-icon name="user" class="w-10 h-10 mx-auto opacity-40" />
                        <span class="text-[11px] mt-1 block">Pratinjau Foto</span>
                    </div>
                </template>
            </div>

            <!-- Upload Controls -->
            <div class="flex-1 w-full">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Pilih File Foto
                </label>
                <input
                    type="file"
                    name="photo"
                    accept="image/*"
                    @change="previewImage"
                    class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 dark:file:bg-slate-800 dark:file:text-blue-400 hover:file:bg-blue-100 dark:hover:file:bg-slate-700 cursor-pointer">
                <p class="text-xs text-slate-400 mt-2">
                    Disarankan rasio 1:1 (persegi) dengan pencahayaan yang jelas untuk hasil terbaik.
                </p>
                @error('photo')
                    <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Section 3: Kontak & Alamat -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200">
        <div class="flex items-center gap-3 pb-6 mb-6 border-b border-slate-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-xl bg-cyan-50 dark:bg-cyan-950/50 text-cyan-600 dark:text-cyan-400 flex items-center justify-center shrink-0">
                <x-icon name="phone" class="w-5 h-5" />
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Kontak & Alamat</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Informasi komunikasi dan domisili siswa</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Email --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Alamat Email
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="mail" class="w-4 h-4" />
                    </div>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $student->email ?? '') }}"
                        placeholder="siswa@verinova.sch.id"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- Nomor HP / WhatsApp --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Nomor WhatsApp / HP
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="phone" class="w-4 h-4" />
                    </div>
                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $student->phone ?? '') }}"
                        placeholder="081234567890"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- Alamat Lengkap --}}
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Alamat Tempat Tinggal
                </label>
                <div class="relative">
                    <textarea
                        name="address"
                        rows="3"
                        placeholder="Tuliskan nama jalan, RT/RW, desa/kelurahan, dan kecamatan..."
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 leading-relaxed">{{ old('address', $student->address ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 4: Biodata Tambahan -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200">
        <div class="flex items-center gap-3 pb-6 mb-6 border-b border-slate-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-950/50 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0">
                <x-icon name="sparkles" class="w-5 h-5" />
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Minat, Cita-cita & Motto</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Deskripsi kepribadian dan tujuan siswa</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Hobi --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Hobi / Kegemaran
                </label>
                <input
                    type="text"
                    name="hobi"
                    value="{{ old('hobi', $student->hobi ?? '') }}"
                    placeholder="Contoh: Coding, Desain Grafis, Game Dev"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Cita-cita --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Cita-cita / Impian Karir
                </label>
                <input
                    type="text"
                    name="cita_cita"
                    value="{{ old('cita_cita', $student->cita_cita ?? '') }}"
                    placeholder="Contoh: Full Stack Engineer, IT Consultant"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Quote / Motto --}}
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Quote / Motto Hidup
                </label>
                <textarea
                    name="quote"
                    rows="2"
                    placeholder="Kata-kata motivasi atau prinsip hidup siswa..."
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 leading-relaxed">{{ old('quote', $student->quote ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Section 5: Media Sosial & Portofolio -->
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200">
        <div class="flex items-center gap-3 pb-6 mb-6 border-b border-slate-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                <x-icon name="globe" class="w-5 h-5" />
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Media Sosial & Portofolio</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Tautan profil digital dan karya siswa</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Instagram --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Instagram URL
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="instagram" class="w-4 h-4" />
                    </div>
                    <input
                        type="url"
                        name="instagram"
                        value="{{ old('instagram', $student->instagram ?? '') }}"
                        placeholder="https://instagram.com/username"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- GitHub --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    GitHub URL
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="github" class="w-4 h-4" />
                    </div>
                    <input
                        type="url"
                        name="github"
                        value="{{ old('github', $student->github ?? '') }}"
                        placeholder="https://github.com/username"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- LinkedIn --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    LinkedIn URL
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="linkedin" class="w-4 h-4" />
                    </div>
                    <input
                        type="url"
                        name="linkedin"
                        value="{{ old('linkedin', $student->linkedin ?? '') }}"
                        placeholder="https://linkedin.com/in/username"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- TikTok --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    TikTok URL
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="tiktok" class="w-4 h-4" />
                    </div>
                    <input
                        type="url"
                        name="tiktok"
                        value="{{ old('tiktok', $student->tiktok ?? '') }}"
                        placeholder="https://tiktok.com/@username"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            {{-- Website / Portfolio --}}
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                    Website / Portofolio Pribadi URL
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <x-icon name="globe" class="w-4 h-4" />
                    </div>
                    <input
                        type="url"
                        name="website"
                        value="{{ old('website', $student->website ?? '') }}"
                        placeholder="https://portofolio-kamu.com"
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Form Submit Actions -->
    <div class="flex items-center justify-end gap-3 pt-4">
        <x-button :href="route('admin.students.index')" variant="secondary">
            Batal
        </x-button>

        <x-button type="submit" variant="primary" icon="save">
            Simpan Data Siswa
        </x-button>
    </div>

</div>
