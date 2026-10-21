<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
            Atur Ulang Kata Sandi
        </h2>
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">
            Masukkan alamat email yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang kata sandi akun administrator Anda.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-1.5">
                Alamat Email
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <x-icon name="mail" class="w-4 h-4" />
                </div>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@verinova.sch.id"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-rose-500 @enderror"
                    required
                    autofocus>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-rose-500" />
        </div>

        <div class="flex items-center justify-between pt-2">
            <a href="{{ route('login') }}" class="text-xs text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 inline-flex items-center gap-1 font-medium">
                <x-icon name="arrow-left" class="w-3.5 h-3.5" />
                <span>Kembali ke Login</span>
            </a>

            <button
                type="submit"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs shadow-md shadow-blue-600/30 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <span>Kirim Tautan Reset</span>
            </button>
        </div>
    </form>
</x-guest-layout>
