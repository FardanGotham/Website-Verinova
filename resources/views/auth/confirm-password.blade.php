<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
            Konfirmasi Kata Sandi
        </h2>
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">
            Ini adalah area keamanan administrator tingkat lanjut. Masukkan kata sandi akun Anda untuk melanjutkan tindakan ini.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-1.5">
                Kata Sandi
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <x-icon name="lock" class="w-4 h-4" />
                </div>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-rose-500 @enderror"
                    required
                    autocomplete="current-password">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-rose-500" />
        </div>

        <div class="pt-2">
            <button
                type="submit"
                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-md shadow-blue-600/30 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <span>Konfirmasi Akses</span>
                <x-icon name="check" class="w-4 h-4" />
            </button>
        </div>
    </form>
</x-guest-layout>
