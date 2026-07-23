<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body class="bg-slate-100">
<x-toast />
<div class="flex min-h-screen">

    @include('layouts.partials.sidebar')

    <div class="flex-1">

        @include('layouts.partials.admin-navbar')

        <main class="p-8">

            @yield('content')

        </main>

    </div>

</div>
@stack('scripts')
</body>

</html>