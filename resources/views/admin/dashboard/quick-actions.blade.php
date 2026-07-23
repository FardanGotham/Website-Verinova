<x-card>

    <div class="flex items-center justify-between mb-6">

        <h2 class="text-2xl font-bold dark:text-white">
            ⚡ Aksi Cepat
        </h2>

        <span class="text-sm text-slate-500">
            Shortcut Menu
        </span>

    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">

        <a href="{{ route('admin.students.create') }}"
            class="group bg-blue-50 dark:bg-blue-900/20 rounded-2xl p-6 text-center hover:scale-105 transition duration-300">

            <div class="text-5xl mb-4">👨‍🎓</div>

            <h3 class="font-bold text-lg dark:text-white">
                Tambah Siswa
            </h3>

            <p class="text-sm text-slate-500 mt-2">
                Input data siswa
            </p>

        </a>

        <a href="{{ route('galleries.create') }}"
            class="group bg-purple-50 dark:bg-purple-900/20 rounded-2xl p-6 text-center hover:scale-105 transition duration-300">

            <div class="text-5xl mb-4">📸</div>

            <h3 class="font-bold text-lg dark:text-white">
                Upload Galeri
            </h3>

            <p class="text-sm text-slate-500 mt-2">
                Tambah dokumentasi
            </p>

        </a>

        <a href="{{ route('achievements.create') }}"
            class="group bg-yellow-50 dark:bg-yellow-900/20 rounded-2xl p-6 text-center hover:scale-105 transition duration-300">

            <div class="text-5xl mb-4">🏆</div>

            <h3 class="font-bold text-lg dark:text-white">
                Tambah Prestasi
            </h3>

            <p class="text-sm text-slate-500 mt-2">
                Input prestasi
            </p>

        </a>

        <a href="{{ route('admins.index') }}"
            class="group bg-green-50 dark:bg-green-900/20 rounded-2xl p-6 text-center hover:scale-105 transition duration-300">

            <div class="text-5xl mb-4">👨‍💼</div>

            <h3 class="font-bold text-lg dark:text-white">
                Kelola Admin
            </h3>

            <p class="text-sm text-slate-500 mt-2">
                Manajemen admin
            </p>

        </a>

    </div>

</x-card>