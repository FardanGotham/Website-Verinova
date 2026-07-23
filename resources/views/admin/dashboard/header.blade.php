<div class="bg-gradient-to-r from-blue-600 to-cyan-500 rounded-3xl p-8 text-white shadow-lg">

    <div class="flex flex-col lg:flex-row justify-between lg:items-center gap-6">

        <div>

            <h1 class="text-4xl font-bold">
                Halo, {{ Auth::user()->name }} 👋
            </h1>

            <p class="text-blue-100 mt-2 text-lg">
                Selamat datang kembali di Dashboard Website Kelas XII PPLG 2.
            </p>

        </div>

        <div class="text-left lg:text-right">

            <p class="text-blue-100 text-sm">
                Hari ini
            </p>

            <h2 id="tanggal" class="text-xl font-semibold"></h2>

            <h1 id="jam" class="text-4xl font-bold mt-2"></h1>

        </div>

    </div>

</div>

<script>
function updateClock(){

    const now = new Date();

    const hari = [
        "Minggu","Senin","Selasa","Rabu",
        "Kamis","Jumat","Sabtu"
    ];

    const bulan = [
        "Januari","Februari","Maret","April",
        "Mei","Juni","Juli","Agustus",
        "September","Oktober","November","Desember"
    ];

    document.getElementById("tanggal").innerHTML =
        hari[now.getDay()] + ", " +
        now.getDate() + " " +
        bulan[now.getMonth()] + " " +
        now.getFullYear();

    document.getElementById("jam").innerHTML =
        now.toLocaleTimeString("id-ID");
}

updateClock();

setInterval(updateClock,1000);
</script>