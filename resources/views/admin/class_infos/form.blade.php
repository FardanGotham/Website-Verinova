@csrf

<div class="grid md:grid-cols-2 gap-6">

    <div>
        <label class="block mb-2 font-semibold">Judul</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $classInfo->title ?? '') }}"
            class="w-full border rounded-xl p-3"
            required>
    </div>

    <div>
        <label class="block mb-2 font-semibold">Kategori</label>

        <select
            name="category"
            class="w-full border rounded-xl p-3">

            <option value="Tugas" @selected(old('category',$classInfo->category ?? '')=='Tugas')>📚 Tugas</option>
            <option value="Pengumuman" @selected(old('category',$classInfo->category ?? '')=='Pengumuman')>📢 Pengumuman</option>
            <option value="Ulangan" @selected(old('category',$classInfo->category ?? '')=='Ulangan')>📝 Ulangan</option>
            <option value="Agenda" @selected(old('category',$classInfo->category ?? '')=='Agenda')>📅 Agenda</option>
            <option value="Event" @selected(old('category',$classInfo->category ?? '')=='Event')>🎉 Event</option>

        </select>

    </div>

    <div>

        <label class="block mb-2 font-semibold">
            Guru
        </label>

        <input
            type="text"
            name="teacher"
            value="{{ old('teacher',$classInfo->teacher ?? '') }}"
            class="w-full border rounded-xl p-3">

    </div>

    <div>

        <label class="block mb-2 font-semibold">
            Deadline
        </label>

        <input
            type="date"
            name="deadline"
            value="{{ old('deadline',$classInfo->deadline ?? '') }}"
            class="w-full border rounded-xl p-3">

    </div>

</div>

<div class="mt-6">

    <label class="block mb-2 font-semibold">

        Deskripsi

    </label>

    <textarea
        name="description"
        rows="5"
        class="w-full border rounded-xl p-3">{{ old('description',$classInfo->description ?? '') }}</textarea>

</div>

<div class="grid md:grid-cols-3 gap-6 mt-6">

    <div>

        <label class="block mb-2 font-semibold">
            Prioritas
        </label>

        <select
            name="priority"
            class="w-full border rounded-xl p-3">

            <option value="Normal">Normal</option>
            <option value="Penting">Penting</option>
            <option value="Mendesak">Mendesak</option>

        </select>

    </div>

    <div>

        <label class="block mb-2 font-semibold">
            Status
        </label>

        <select
            name="status"
            class="w-full border rounded-xl p-3">

            <option value="Aktif">Aktif</option>
            <option value="Selesai">Selesai</option>

        </select>

    </div>

    <div>

        <label class="block mb-2 font-semibold">

            Lampiran

        </label>

        <input
            type="file"
            name="attachment"
            class="w-full border rounded-xl p-3">

    </div>

</div>

<div class="mt-8">

<button
class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

💾 Simpan

</button>

</div>