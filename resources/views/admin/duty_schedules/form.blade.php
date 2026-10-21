@csrf

<div class="bg-white dark:bg-slate-900 rounded-2xl p-6 sm:p-8 border border-slate-200/80 dark:border-slate-800 shadow-sm space-y-6">

    <!-- Hari Piket -->
    <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
            Hari Piket <span class="text-rose-500">*</span>
        </label>
        <select
            name="day"
            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
            <option value="">Pilih Hari</option>
            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $day)
                <option value="{{ $day }}" @selected(old('day', $duty_schedule->day ?? '') == $day)>
                    {{ $day }}
                </option>
            @endforeach
        </select>
        @error('day')
            <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
        @enderror
    </div>

    <!-- 5 Petugas Piket -->
    <div class="pt-4 border-t border-slate-100 dark:border-slate-800">
        <h4 class="text-sm font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
            <x-icon name="users" class="w-4 h-4 text-blue-500" />
            <span>Pilih 5 Petugas Piket</span>
        </h4>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            @for($i = 1; $i <= 5; $i++)
                <div class="{{ $i == 5 ? 'sm:col-span-2' : '' }}">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Petugas {{ $i }} <span class="text-rose-500">*</span>
                    </label>
                    <select
                        name="student_{{ $i }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('student_'.$i) border-rose-500 @enderror"
                        required>
                        <option value="">-- Pilih Siswa --</option>
                        @foreach($students as $student)
                            <option
                                value="{{ $student->id }}"
                                @selected(old('student_'.$i, $duty_schedule->{'student_'.$i} ?? '') == $student->id)>
                                Absen {{ sprintf('%02d', $student->absen) }} &mdash; {{ $student->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_'.$i)
                        <p class="text-rose-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>
            @endfor
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100 dark:border-slate-800">
        <x-button :href="route('duty-schedules.index')" variant="secondary">
            Batal
        </x-button>

        <x-button type="submit" variant="primary" icon="save">
            Simpan Jadwal Piket
        </x-button>
    </div>

</div>
