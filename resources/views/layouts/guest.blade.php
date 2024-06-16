<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="{{ route('articles.index') }}">Articles</a>
            </li>
            <li>
                <a href="{{ route('about') }}">About</a>
            </li>
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
