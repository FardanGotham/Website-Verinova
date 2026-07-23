@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-semibold">Judul Prestasi</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $achievement->title ?? '') }}"
            class="w-full border rounded-xl p-3"
            required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">Tingkat</label>
        <input
            type="text"
            name="level"
            value="{{ old('level', $achievement->level ?? '') }}"
            placeholder="Sekolah / Kabupaten / Provinsi / Nasional"
            class="w-full border rounded-xl p-3"
            required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">Tahun</label>
        <input
            type="number"
            name="year"
            value="{{ old('year', $achievement->year ?? date('Y')) }}"
            class="w-full border rounded-xl p-3"
            required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">Foto</label>

        <input
            type="file"
            name="photo"
            class="w-full border rounded-xl p-3">

        @isset($achievement)
            @if($achievement->photo)
                <img
                    src="{{ asset('storage/'.$achievement->photo) }}"
                    class="w-28 h-28 rounded-xl mt-3 object-cover">
            @endif
        @endisset
    </div>

</div>

<div class="mt-6">
    <label class="block mb-2 font-semibold">Deskripsi</label>

    <textarea
        name="description"
        rows="5"
        class="w-full border rounded-xl p-3">{{ old('description', $achievement->description ?? '') }}</textarea>
</div>

<div class="mt-8">
    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">
        💾 Simpan
    </button>
</div>