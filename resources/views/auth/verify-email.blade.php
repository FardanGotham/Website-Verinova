<x-guest-layout>
    <div class="mb-6">
        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
            Verifikasi Alamat Email
        </h2>
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">
            Terima kasih telah mendaftar. Silakan klik tautan verifikasi yang baru saja kami kirimkan ke alamat email Anda.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <x-alert type="success" class="mb-4">
            Tautan verifikasi baru telah berhasil dikirimkan ke alamat email Anda.
        </x-alert>
    @endif

    <div class="space-y-4 pt-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button
                type="submit"
                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm shadow-md shadow-blue-600/30 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <span>Kirim Ulang Email Verifikasi</span>
                <x-icon name="mail" class="w-4 h-4" />
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center">
            @csrf
            <button type="submit" class="text-xs text-slate-500 dark:text-slate-400 hover:text-rose-600 dark:hover:text-rose-400 font-medium">
                Keluar dari Akun (Logout)
            </button>
        </form>
    </div>
</x-guest-layout>
