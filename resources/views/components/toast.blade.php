@if(session('success'))

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition
    class="fixed top-6 right-6 z-50">

    <div class="bg-green-500 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3">

        <div class="text-2xl">
            ✅
        </div>

        <div>

            <h3 class="font-bold">
                Berhasil!
            </h3>

            <p class="text-sm">
                {{ session('success') }}
            </p>

        </div>

    </div>

</div>

@endif

@if(session('error'))

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition
    class="fixed top-6 right-6 z-50">

    <div class="bg-red-500 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3">

        <div class="text-2xl">
            ❌
        </div>

        <div>

            <h3 class="font-bold">
                Gagal!
            </h3>

            <p class="text-sm">
                {{ session('error') }}
            </p>

        </div>

    </div>

</div>

@endif