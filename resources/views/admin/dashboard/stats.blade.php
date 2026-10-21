<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
    <x-stat-card
        title="Total Siswa"
        :value="$students"
        icon="users"
        color="blue"
        subtitle="Siswa terdaftar aktif" />

    <x-stat-card
        title="Total Administrator"
        :value="$admins"
        icon="shield-check"
        color="green"
        subtitle="Akun pengelola aktif" />

    <x-stat-card
        title="Galeri Dokumentasi"
        :value="$galleries"
        icon="images"
        color="purple"
        subtitle="Foto momen tersimpan" />

    <x-stat-card
        title="Prestasi Kelas"
        :value="$achievements"
        icon="trophy"
        color="yellow"
        subtitle="Pencapaian & juara" />

    <x-stat-card
        title="Jadwal Pelajaran"
        :value="$schedules"
        icon="calendar-days"
        color="cyan"
        subtitle="Mata pelajaran terdata" />

    <x-stat-card
        title="Informasi & Tugas"
        :value="$classInfos"
        icon="megaphone"
        color="red"
        subtitle="Pengumuman aktif" />
</div>
