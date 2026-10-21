@if(session('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed top-5 right-5 z-50 max-w-sm w-full">
        <div class="bg-white dark:bg-slate-900 border border-emerald-200 dark:border-emerald-800/60 shadow-xl rounded-2xl p-4 flex items-start gap-3">
            <div class="w-9 h-9 rounded-xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 border border-emerald-100 dark:border-emerald-800/40">
                <x-icon name="check" class="w-5 h-5" />
            </div>
            <div class="flex-1 pt-0.5">
                <h4 class="text-sm font-semibold text-slate-900 dark:text-white">Berhasil</h4>
                <p class="text-xs text-slate-600 dark:text-slate-300 mt-0.5 leading-relaxed">
                    {{ session('success') }}
                </p>
            </div>
            <button @click="show = false" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 p-1 rounded-lg transition" aria-label="Tutup notifikasi">
                <x-icon name="x" class="w-4 h-4" />
            </button>
        </div>
    </div>
@endif

@if(session('error'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed top-5 right-5 z-50 max-w-sm w-full">
        <div class="bg-white dark:bg-slate-900 border border-rose-200 dark:border-rose-800/60 shadow-xl rounded-2xl p-4 flex items-start gap-3">
            <div class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 flex items-center justify-center shrink-0 border border-rose-100 dark:border-rose-800/40">
                <x-icon name="alert-triangle" class="w-5 h-5" />
            </div>
            <div class="flex-1 pt-0.5">
                <h4 class="text-sm font-semibold text-slate-900 dark:text-white">Terjadi Kesalahan</h4>
                <p class="text-xs text-slate-600 dark:text-slate-300 mt-0.5 leading-relaxed">
                    {{ session('error') }}
                </p>
            </div>
            <button @click="show = false" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 p-1 rounded-lg transition" aria-label="Tutup notifikasi">
                <x-icon name="x" class="w-4 h-4" />
            </button>
        </div>
    </div>
@endif
