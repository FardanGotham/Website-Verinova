@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Edit Jadwal Pelajaran
</h1>

<form action="{{ route('schedules.update', $schedule->id) }}"
      method="POST"
      class="bg-white rounded-2xl shadow p-8 space-y-5">

    @csrf
    @method('PUT')

    {{-- Hari --}}
    <div>
        <label class="block mb-2 font-medium">Hari</label>

        <select
            name="day"
            class="w-full border rounded-xl p-3">

            <option value="Senin"
                {{ old('day', $schedule->day) == 'Senin' ? 'selected' : '' }}>
                Senin
            </option>

            <option value="Selasa"
                {{ old('day', $schedule->day) == 'Selasa' ? 'selected' : '' }}>
                Selasa
            </option>

            <option value="Rabu"
                {{ old('day', $schedule->day) == 'Rabu' ? 'selected' : '' }}>
                Rabu
            </option>

            <option value="Kamis"
                {{ old('day', $schedule->day) == 'Kamis' ? 'selected' : '' }}>
                Kamis
            </option>

            <option value="Jumat"
                {{ old('day', $schedule->day) == 'Jumat' ? 'selected' : '' }}>
                Jumat
            </option>

        </select>
    </div>

    {{-- Jam Mulai --}}
    <div>
        <label class="block mb-2 font-medium">Jam Mulai</label>

        <input
            type="time"
            name="start_time"
            value="{{ old('start_time', $schedule->start_time) }}"
            class="w-full border rounded-xl p-3">
    </div>

    {{-- Jam Selesai --}}
    <div>
        <label class="block mb-2 font-medium">Jam Selesai</label>

        <input
            type="time"
            name="end_time"
            value="{{ old('end_time', $schedule->end_time) }}"
            class="w-full border rounded-xl p-3">
    </div>

    {{-- Mata Pelajaran --}}
    <div>
        <label class="block mb-2 font-medium">Mata Pelajaran</label>

        <input
            type="text"
            name="subject"
            value="{{ old('subject', $schedule->subject) }}"
            class="w-full border rounded-xl p-3"
            placeholder="Contoh: Matematika">
    </div>

    {{-- Guru --}}
    <div>
        <label class="block mb-2 font-medium">Guru</label>

        <input
            type="text"
            name="teacher"
            value="{{ old('teacher', $schedule->teacher) }}"
            class="w-full border rounded-xl p-3"
            placeholder="Contoh: Bapak Andi">
    </div>

    <div class="flex gap-3">

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition">

            Update Jadwal

        </button>

        <a href="{{ route('schedules.index') }}"
           class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-xl transition">

            Batal

        </a>

    </div>

</form>

@endsection