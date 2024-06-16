<nav>
    <ul>
        <li>
            <a href="{{ route('articles.index') }}">Articles</a>
        </li>
        <li>
            <a href="{{ route('about') }}">About</a>
        </li>
        <li>
            <a href="{{ route('admin') }}">Admin</a>
        </li>
        @auth
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @method('DELETE')
                    @csrf

                    <button type="submit">Logout</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>
