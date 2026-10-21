<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
            Tetapkan Kata Sandi Baru
        </h2>
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
            Silakan buat kata sandi baru yang aman untuk akun administrator Anda.
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

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
                    value="{{ old('email', $request->email) }}"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-rose-500 @enderror"
                    required
                    autofocus
                    autocomplete="username">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-rose-500" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-1.5">
                Kata Sandi Baru (Min. 8 Karakter)
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
                    autocomplete="new-password">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-rose-500" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-1.5">
                Ulangi Kata Sandi Baru
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <x-icon name="key" class="w-4 h-4" />
                </div>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password_confirmation') border-rose-500 @enderror"
                    required
                    autocomplete="new-password">
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 text-xs text-rose-500" />
        </div>

        <div class="pt-2">
            <button
                type="submit"
                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-md shadow-blue-600/30 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <span>Simpan Kata Sandi Baru</span>
                <x-icon name="check" class="w-4 h-4" />
            </button>
        </div>
    </form>
</x-guest-layout>
