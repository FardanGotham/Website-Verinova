<nav
    x-data="{ open: false }"
    class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-xl border-b border-slate-200 dark:bg-slate-900/90 dark:border-slate-700">

    <div class="max-w-7xl mx-auto px-4 lg:px-6">

        <div class="h-16 lg:h-20 flex items-center justify-between">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3">

                <img
                    src="{{ asset('images/verinova.jpg') }}"
                    class="w-10 h-10 lg:w-12 lg:h-12 rounded-xl object-cover">

                <div>

                    <h1 class="font-bold text-lg lg:text-xl text-slate-800 dark:text-white">
                        XII PPLG 2
                    </h1>

                    <p class="hidden lg:block text-xs text-slate-500 dark:text-slate-400">
                        Website Resmi Kelas
                    </p>

                </div>

            </a>

            {{-- Menu Desktop --}}
            <ul class="hidden lg:flex items-center gap-8 font-medium text-slate-700 dark:text-slate-200">

                <li><a href="#hero" class="hover:text-blue-600 transition">Beranda</a></li>
                <li><a href="#about" class="hover:text-blue-600 transition">Profil</a></li>
                <li><a href="#organization" class="hover:text-blue-600 transition">Organisasi</a></li>
                <li><a href="#schedule" class="hover:text-blue-600 transition">Jadwal</a></li>
                <li><a href="#piket" class="hover:text-blue-600 transition">Piket</a></li>
                <li><a href="#gallery" class="hover:text-blue-600 transition">Galeri</a></li>
                <li><a href="#achievement" class="hover:text-blue-600 transition">Prestasi</a></li>
                <li><a href="#info-kelas" class="hover:text-blue-600 transition">Info</a></li>
                <li><a href="#contact" class="hover:text-blue-600 transition">Kontak</a></li>

            </ul>

            {{-- Desktop Right --}}
            <div class="hidden lg:flex items-center gap-3">

                <button
                    id="theme-toggle"
                    class="w-11 h-11 rounded-full bg-slate-200 dark:bg-slate-800 flex items-center justify-center transition">

                    🌙

                </button>

                <a
                    href="{{ route('login') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl transition">

                    Login Admin

                </a>

            </div>

            {{-- Mobile Right --}}
            <div class="flex items-center gap-2 lg:hidden">

                <button
                    id="theme-toggle-mobile"
                    class="w-10 h-10 rounded-xl bg-slate-200 dark:bg-slate-800 flex items-center justify-center">

                    🌙

                </button>

                <button
                    @click="open=!open"
                    class="p-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7 text-slate-800 dark:text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                </button>

            </div>

        </div>

        {{-- Mobile Menu --}}
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="lg:hidden pb-6">

            <div class="flex flex-col gap-2 mt-3">

                <a @click="open=false" href="#hero" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">🏠 Beranda</a>

                <a @click="open=false" href="#about" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">📖 Profil</a>

                <a @click="open=false" href="#organization" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">👔 Organisasi</a>

                <a @click="open=false" href="#schedule" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">📅 Jadwal</a>

                <a @click="open=false" href="#piket" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">🧹 Jadwal Piket</a>

                <a @click="open=false" href="#gallery" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">📸 Galeri</a>

                <a @click="open=false" href="#achievement" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">🏆 Prestasi</a>

                <a @click="open=false" href="#class-info" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">📢 Info Kelas</a>

                <a @click="open=false" href="#contact" class="px-4 py-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800">📞 Kontak</a>

                <a
                    href="{{ route('login') }}"
                    class="mt-3 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl text-center transition">

                    Login Admin

                </a>

            </div>

        </div>

    </div>

    <script>

        const html = document.documentElement;

        if(localStorage.getItem("theme") === "dark"){
            html.classList.add("dark");
        }

        function updateThemeIcon(){

            const icon = html.classList.contains("dark") ? "☀️" : "🌙";

            const desktop = document.getElementById("theme-toggle");
            const mobile = document.getElementById("theme-toggle-mobile");

            if(desktop) desktop.innerHTML = icon;
            if(mobile) mobile.innerHTML = icon;

        }

        updateThemeIcon();

        function toggleTheme(){

            html.classList.toggle("dark");

            if(html.classList.contains("dark")){
                localStorage.setItem("theme","dark");
            }else{
                localStorage.setItem("theme","light");
            }

            updateThemeIcon();

        }

        document.getElementById("theme-toggle")?.addEventListener("click", toggleTheme);

        document.getElementById("theme-toggle-mobile")?.addEventListener("click", toggleTheme);

    </script>

</nav>