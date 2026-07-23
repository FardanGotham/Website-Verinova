<x-card>

    <h2 class="text-2xl font-bold mb-6">
        👨‍🎓 Siswa Terbaru
    </h2>

    <div class="space-y-4">

        @forelse($latestStudents as $student)

            <div class="flex items-center justify-between border-b pb-3">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-xl">
                        👤
                    </div>

                    <div>

                        <h3 class="font-semibold dark:text-white">
                            {{ $student->nama }}
                        </h3>

                        <p class="text-sm text-slate-500">
                            Absen {{ $student->absen }}
                        </p>

                    </div>

                </div>

            </div>

        @empty

            <p class="text-slate-500">
                Belum ada data siswa.
            </p>

        @endforelse

    </div>

</x-card>