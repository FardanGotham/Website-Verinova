<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-700 via-blue-600 to-cyan-600 p-6 sm:p-8 text-white shadow-lg shadow-blue-600/10">
    <!-- Subtle Decorative Glow Background -->
    <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute -left-10 -top-10 w-72 h-72 bg-cyan-400/15 rounded-full blur-2xl pointer-events-none"></div>

    <div class="relative z-10 flex flex-col lg:flex-row justify-between lg:items-center gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md text-xs font-semibold text-blue-100 mb-3 border border-white/20">
                <x-icon name="sparkles" class="w-3.5 h-3.5 text-cyan-200" />
                <span>Portal Administrasi XII PPLG 2</span>
            </div>

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight">
                Selamat Datang, {{ Auth::user()->name }}
            </h1>

            <p class="text-blue-100/90 mt-2 text-sm sm:text-base max-w-2xl leading-relaxed">
                Kelola data operasional, publikasi kegiatan, dan informasi kelas SMK Negeri 2 Purbalingga secara terpadu.
            </p>
        </div>

        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 sm:p-5 flex lg:flex-col justify-between items-center lg:items-end gap-3 shrink-0 min-w-[220px]">
            <div class="flex items-center gap-2 text-blue-100 text-xs font-medium">
                <x-icon name="calendar-days" class="w-4 h-4 text-cyan-200" />
                <span id="tanggal" class="font-medium">Memuat tanggal...</span>
            </div>

            <div class="flex items-center gap-2 text-white">
                <x-icon name="clock" class="w-5 h-5 text-cyan-300" />
                <span id="jam" class="text-2xl sm:text-3xl font-mono font-bold tracking-tight">--:--:--</span>
            </div>
        </div>
    </div>
</div>

<script>
    function updateDashboardClock() {
        const now = new Date();
        const hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const bulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const elTanggal = document.getElementById("tanggal");
        const elJam = document.getElementById("jam");

        if (elTanggal) {
            elTanggal.textContent = `${hari[now.getDay()]}, ${now.getDate()} ${bulan[now.getMonth()]} ${now.getFullYear()}`;
        }

        if (elJam) {
            elJam.textContent = now.toLocaleTimeString("id-ID", {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
        }
    }

    updateDashboardClock();
    setInterval(updateDashboardClock, 1000);
</script>
