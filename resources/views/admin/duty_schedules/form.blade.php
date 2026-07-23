@csrf

<div class="bg-white rounded-2xl shadow-lg p-8">

    <div class="grid md:grid-cols-2 gap-6">

        {{-- Hari --}}
        <div class="md:col-span-2">

            <label class="block font-semibold mb-2">
                Hari
            </label>

            <select
                name="day"
                class="w-full border rounded-xl p-3"
                required>

                <option value="">Pilih Hari</option>

                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $day)

                    <option
                        value="{{ $day }}"
                        @selected(old('day',$duty_schedule->day ?? '')==$day)>

                        {{ $day }}

                    </option>

                @endforeach

            </select>

        </div>

        @for($i=1;$i<=5;$i++)

        <div>

            <label class="block font-semibold mb-2">

                Siswa {{ $i }}

            </label>

            <select
                name="student_{{ $i }}"
                class="w-full border rounded-xl p-3"
                required>

                <option value="">Pilih Siswa</option>

                @foreach($students as $student)

                    <option
                        value="{{ $student->id }}"
                        @selected(old('student_'.$i,$duty_schedule->{'student_'.$i} ?? '')==$student->id)>

                        {{ $student->nama }}

                    </option>

                @endforeach

            </select>

        </div>

        @endfor

    </div>

    <div class="mt-8">

        <button
            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">

            💾 Simpan

        </button>

    </div>

</div>