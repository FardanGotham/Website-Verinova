<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
            Masuk Administrator
        </h2>
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
            Gunakan akun administrator Anda untuk mengakses dashboard pengelolaan.
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
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
                    autofocus
                    autocomplete="username">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-rose-500" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300">
                    Kata Sandi
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs text-blue-600 dark:text-blue-400 hover:underline">
                        Lupa sandi?
                    </a>
                @endif
            </div>
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

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-slate-300 dark:border-slate-700 text-blue-600 shadow-sm focus:ring-blue-500 dark:bg-slate-800"
                    name="remember">
                <span class="ms-2 text-xs text-slate-600 dark:text-slate-400 font-medium">Ingat saya di perangkat ini</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button
                type="submit"
                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-md shadow-blue-600/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-slate-900 transition-all duration-200">
                <span>Masuk ke Dashboard</span>
                <x-icon name="arrow-right" class="w-4 h-4" />
            </button>
        </div>
    </form>
</x-guest-layout>
