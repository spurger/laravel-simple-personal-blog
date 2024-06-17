<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header class="container mt-1">
        <x-navbar></x-navbar>
    </header>
    <main class="container mb-5 mt-3">
        @yield('content')
    </main>
</body>

</html>
