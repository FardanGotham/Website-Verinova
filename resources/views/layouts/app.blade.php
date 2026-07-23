<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
content="Website Resmi XII PPLG 2 SMK Negeri 2 Purbalingga">

    <title>Website Kelas | Verinova</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script>
        if(localStorage.getItem('theme') === 'dark'){
            document.documentElement.classList.add('dark');
        }
    </script>
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-white text-slate-800 transition-all duration-300 dark:bg-slate-950 dark:text-white">

    @include('layouts.partials.navbar')

    @yield('content')

    @include('layouts.partials.footer')

    <script>

        const html = document.documentElement;

        const btn = document.getElementById("theme-toggle");

        function updateIcon(){

            btn.innerHTML = html.classList.contains("dark")
                ? "☀️"
                : "🌙";

        }

        updateIcon();

        btn.addEventListener("click",function(){

            html.classList.toggle("dark");

            if(html.classList.contains("dark")){

                localStorage.setItem("theme","dark");

            }else{

                localStorage.setItem("theme","light");  

            }

            updateIcon();

        });

    </script>

</body>

</html>