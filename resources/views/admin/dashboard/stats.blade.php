<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

    <x-stat-card
        title="Total Siswa"
        :value="$students"
        icon="👨‍🎓"
        color="blue"/>

    <x-stat-card
        title="Total Admin"
        :value="$admins"
        icon="👨‍💼"
        color="green"/>

    <x-stat-card
        title="Galeri"
        :value="$galleries"
        icon="📸"
        color="purple"/>

    <x-stat-card
        title="Prestasi"
        :value="$achievements"
        icon="🏆"
        color="yellow"/>

    <x-stat-card
        title="Jadwal"
        :value="$schedules"
        icon="📅"
        color="cyan"/>

    <x-stat-card
        title="Info Kelas"
        :value="$classInfos"
        icon="📢"
        color="red"/>

</div>