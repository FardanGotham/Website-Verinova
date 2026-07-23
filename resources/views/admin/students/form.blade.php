@csrf

<div class="bg-white rounded-2xl shadow-lg p-8">

    <h2 class="text-2xl font-bold mb-8">
        👨‍🎓 Data Siswa
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        {{-- Nama --}}
        <div>
            <label class="block mb-2 font-semibold">Nama Lengkap</label>
            <input
                type="text"
                name="nama"
                value="{{ old('nama', $student->nama ?? '') }}"
                class="w-full border rounded-xl p-3"
                required>
        </div>

        {{-- Absen --}}
        <div>
            <label class="block mb-2 font-semibold">Nomor Absen</label>
            <input
                type="number"
                name="absen"
                value="{{ old('absen', $student->absen ?? '') }}"
                class="w-full border rounded-xl p-3"
                required>
        </div>

        {{-- Kelas --}}
        <div>
            <label class="block mb-2 font-semibold">Kelas</label>
            <input
                type="text"
                name="kelas"
                value="{{ old('kelas', $student->kelas ?? '') }}"
                class="w-full border rounded-xl p-3"
                required>
        </div>

        {{-- Gender --}}
        <div>
            <label class="block mb-2 font-semibold">Jenis Kelamin</label>

            <select
                name="gender"
                class="w-full border rounded-xl p-3">

                <option value="">Pilih</option>

                <option value="Laki-laki"
                    @selected(old('gender',$student->gender ?? '')=='Laki-laki')>
                    Laki-laki
                </option>

                <option value="Perempuan"
                    @selected(old('gender',$student->gender ?? '')=='Perempuan')>
                    Perempuan
                </option>

            </select>

        </div>

        {{-- Email --}}
        <div>
            <label class="block mb-2 font-semibold">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email',$student->email ?? '') }}"
                class="w-full border rounded-xl p-3">
        </div>

        {{-- Nomor HP --}}
        <div>
            <label class="block mb-2 font-semibold">Nomor HP</label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone',$student->phone ?? '') }}"
                class="w-full border rounded-xl p-3">
        </div>

    </div>

    {{-- Alamat --}}
    <div class="mt-6">

        <label class="block mb-2 font-semibold">
            Alamat
        </label>

        <textarea
            name="address"
            rows="3"
            class="w-full border rounded-xl p-3">{{ old('address',$student->address ?? '') }}</textarea>

    </div>

    {{-- Hobi --}}
    <div class="mt-6">

        <label class="block mb-2 font-semibold">
            Hobi
        </label>

        <input
            type="text"
            name="hobi"
            value="{{ old('hobi',$student->hobi ?? '') }}"
            class="w-full border rounded-xl p-3">

    </div>

    {{-- Cita-cita --}}
    <div class="mt-6">

        <label class="block mb-2 font-semibold">
            Cita-cita
        </label>

        <input
            type="text"
            name="cita_cita"
            value="{{ old('cita_cita',$student->cita_cita ?? '') }}"
            class="w-full border rounded-xl p-3">

    </div>

    {{-- Quote --}}
    <div class="mt-6">

        <label class="block mb-2 font-semibold">
            Quote
        </label>

        <textarea
            name="quote"
            rows="3"
            class="w-full border rounded-xl p-3">{{ old('quote',$student->quote ?? '') }}</textarea>

    </div>
    <div>
    <label class="block mb-2 font-medium">
        Jabatan
    </label>

    <select
        name="jabatan"
        class="w-full rounded-xl border p-3">

        <option>Anggota</option>
        <option>Ketua Kelas</option>
        <option>Wakil Ketua</option>
        <option>Sekretaris</option>
        <option>Bendahara</option>
        <option>Koordinator Kebersihan</option>
        <option>Koordinator Keamanan</option>

    </select>
</div>

    {{-- Foto --}}
    <div class="mt-6">

        <label class="block mb-2 font-semibold">
            Foto Profil
        </label>

        <input
            type="file"
            name="photo"
            class="w-full border rounded-xl p-3">

        @isset($student)
            @if($student->photo)
                <img
                    src="{{ asset('storage/'.$student->photo) }}"
                    class="w-28 h-28 rounded-xl object-cover mt-4">
            @endif
        @endisset

    </div>

    <hr class="my-10">

    <h2 class="text-2xl font-bold mb-8">
        🌐 Media Sosial
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div>
            <label class="block mb-2 font-semibold">Instagram</label>
            <input
                type="url"
                name="instagram"
                value="{{ old('instagram',$student->instagram ?? '') }}"
                class="w-full border rounded-xl p-3"
                placeholder="https://instagram.com/username">
        </div>

        <div>
            <label class="block mb-2 font-semibold">GitHub</label>
            <input
                type="url"
                name="github"
                value="{{ old('github',$student->github ?? '') }}"
                class="w-full border rounded-xl p-3"
                placeholder="https://github.com/username">
        </div>

        <div>
            <label class="block mb-2 font-semibold">LinkedIn</label>
            <input
                type="url"
                name="linkedin"
                value="{{ old('linkedin',$student->linkedin ?? '') }}"
                class="w-full border rounded-xl p-3"
                placeholder="https://linkedin.com/in/username">
        </div>

        <div>
            <label class="block mb-2 font-semibold">TikTok</label>
            <input
                type="url"
                name="tiktok"
                value="{{ old('tiktok',$student->tiktok ?? '') }}"
                class="w-full border rounded-xl p-3"
                placeholder="https://tiktok.com/@username">
        </div>

        <div class="md:col-span-2">
            <label class="block mb-2 font-semibold">Website / Portofolio</label>
            <input
                type="url"
                name="website"
                value="{{ old('website',$student->website ?? '') }}"
                class="w-full border rounded-xl p-3"
                placeholder="https://website.com">
        </div>

    </div>

    <div class="mt-10">

        <button
            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">

            💾 Simpan Data

        </button>

    </div>

</div>