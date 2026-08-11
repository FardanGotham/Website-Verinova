<nav
    x-data="{ open: false }"
    class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-xl border-b border-slate-200 dark:bg-slate-900/90 dark:border-slate-700">

    <div class="max-w-7xl mx-auto px-4 lg:px-6">

        <div class="h-16 lg:h-20 flex items-center justify-between">

            {{-- LOGO --}}
            <button
                onclick="openLogoModal()"
                class="group flex items-center gap-3 shrink-0">

                <div class="relative">

                    <img
                        src="{{ asset('images/verinova.jpeg') }}"
                        alt="Logo Verinova"
                        class="w-12 h-12 md:w-11 md:h-11
                               object-contain rounded-xl
                               transition-transform duration-300
                               group-hover:scale-105">

                  

                </div>

                <div>
                    <a href="{{ url('/') }}"
                       class="text-lg lg:text-xl font-bold text-slate-800 dark:text-white">
                        XII PPLG 2
                    </a>

                    <p class="hidden lg:block text-xs text-slate-500 dark:text-slate-400">
                        Website Resmi Kelas
                    </p>

                </div>

            </button>


            {{-- MENU --}}
            <div class="hidden lg:flex items-center gap-1">

                <a href="#hero"
                   class="nav-link">
                    Beranda
                </a>

                <a href="#about"
                   class="nav-link">
                    Tentang
                </a>

                <a href="#organization"
                   class="nav-link">
                    Organisasi
                </a>

                <a href="#schedule"
                   class="nav-link">
                    Jadwal
                </a>

                <a href="#piket"
                   class="nav-link">
                    Piket
                </a>

                <a href="#gallery"
                   class="nav-link">
                    Galeri
                </a>

                <a href="#achievement"
                   class="nav-link">
                    Prestasi
                </a>

                <a href="#info-kelas"
                   class="nav-link">
                    Info
                </a>

            </div>


            {{-- RIGHT --}}
            <div class="flex items-center gap-2">

                {{-- DARK MODE --}}
                <button
                    id="theme-toggle"
                    class="w-9 h-9
                           flex items-center justify-center
                           rounded-xl
                           text-slate-600 dark:text-slate-300
                           hover:bg-slate-100 dark:hover:bg-slate-800
                           transition">

                    🌙

                </button>


                {{-- LOGIN --}}
                <a
    href="/login"
    class="text-slate-700
           dark:text-slate-200
           hover:text-blue-600
           dark:hover:text-cyan-400
           transition">

    Login

</a>


                {{-- MOBILE --}}
                <button
                    id="mobile-menu-button"
                    class="lg:hidden w-9 h-9
                           flex items-center justify-center
                           rounded-xl
                           text-slate-700 dark:text-slate-300
                           hover:bg-slate-100 dark:hover:bg-slate-800">

                    ☰

                </button>

            </div>

        </div>


        {{-- MOBILE MENU --}}
        <div
            id="mobile-menu"
            class="hidden lg:hidden mt-2
                   p-2
                   bg-white/95 dark:bg-slate-950/95
                   backdrop-blur-xl
                   border border-slate-200 dark:border-slate-800
                   rounded-2xl shadow-lg">

            <a href="#hero" class="mobile-link">Beranda</a>
            <a href="#about" class="mobile-link">Tentang</a>
            <a href="#organization" class="mobile-link">Organisasi</a>
            <a href="#schedule" class="mobile-link">Jadwal</a>
            <a href="#piket" class="mobile-link">Piket</a>
            <a href="#gallery" class="mobile-link">Galeri</a>
            <a href="#achievement" class="mobile-link">Prestasi</a>
            <a href="#info-kelas" class="mobile-link">Info</a>

            <a href="/login"
               class="block mt-2 px-4 py-3 rounded-xl
                      bg-slate-900 dark:bg-white
                      text-slate-700 dark:text-slate-300
                      text-sm font-medium text-center">
                Login Admin
            </a>

        </div>

    </div>
</nav>


<style>

    /* =========================
       DESKTOP NAV
    ========================= */

    .nav-link {
        position: relative;

        padding: 8px 12px;

        font-size: 14px;
        font-weight: 500;

        color: rgb(100 116 139);

        border-radius: 10px;

        transition:
            color .25s ease,
            background .25s ease;
    }


    .dark .nav-link {
        color: rgb(148 163 184);
    }


    .nav-link:hover {
        color: rgb(15 23 42);
        background: rgb(241 245 249);
    }


    .dark .nav-link:hover {
        color: white;
        background: rgb(30 41 59);
    }


    /* garis kecil ketika aktif */

    .nav-link::after {

        content: "";

        position: absolute;

        left: 50%;
        bottom: 3px;

        width: 0;
        height: 2px;

        border-radius: 999px;

        background: rgb(37 99 235);

        transform: translateX(-50%);

        transition: width .25s ease;
    }


    .nav-link:hover::after,
    .nav-link.active::after {

        width: 16px;

    }


    .nav-link.active {

        color: rgb(37 99 235);

    }


    .dark .nav-link.active {

        color: rgb(96 165 250);

    }


    /* =========================
       MOBILE
    ========================= */

    .mobile-link {

        display: block;

        padding: 11px 14px;

        border-radius: 10px;

        font-size: 14px;
        font-weight: 500;

        color: rgb(71 85 105);

        transition: .2s ease;

    }


    .dark .mobile-link {

        color: rgb(203 213 225);

    }


    .mobile-link:hover {

        background: rgb(241 245 249);

        color: rgb(37 99 235);

    }


    .dark .mobile-link:hover {

        background: rgb(30 41 59);

        color: rgb(96 165 250);

    }

</style>


<script>

    /* =========================
       MOBILE MENU
    ========================= */

    const mobileButton =
        document.getElementById('mobile-menu-button');

    const mobileMenu =
        document.getElementById('mobile-menu');


    mobileButton.addEventListener('click', () => {

        mobileMenu.classList.toggle('hidden');

    });


    /* Tutup menu setelah memilih section */

    document.querySelectorAll('.mobile-link').forEach(link => {

        link.addEventListener('click', () => {

            mobileMenu.classList.add('hidden');

        });

    });


    /* =========================
       ACTIVE MENU SAAT SCROLL
    ========================= */

    const sections = document.querySelectorAll(
        'section[id]'
    );

    const navLinks = document.querySelectorAll(
        '.nav-link'
    );


    window.addEventListener('scroll', () => {

        let current = 'hero';


        sections.forEach(section => {

            const sectionTop =
                section.offsetTop - 150;

            if (window.scrollY >= sectionTop) {

                current = section.getAttribute('id');

            }

        });


        navLinks.forEach(link => {

            link.classList.remove('active');

            if (
                link.getAttribute('href') === '#' + current
            ) {

                link.classList.add('active');

            }

        });

    });

</script>