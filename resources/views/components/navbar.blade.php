<nav>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('articles.index')) active @endif"
                href="{{ route('articles.index') }}">Articles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (request()->routeIs('about')) active @endif" href="{{ route('about') }}">About</a>
        </li>
        @auth
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('articles.create')) active @endif"
                    href="{{ route('articles.create') }}">Create article</a>
            </li>
        @endauth
        <li class="nav-item ms-auto">
            <a class="nav-link @if (request()->routeIs('admin')) active @endif" href="{{ route('admin') }}">Admin</a>
        </li>
        @auth
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="nav-link">Logout</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>
