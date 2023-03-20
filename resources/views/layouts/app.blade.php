<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    @yield('css')
</head>

<body>
    <header class="header" @yield('hide_header')>
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-item @if (request()->url() == route('home')) header-selected @endif">
                    <a href="{{ route('home') }}">Главная</a>
                </li>
                @if (auth()->user())
                    <li class="nav-item @if (request()->url() == route('profile.index')) header-selected @endif">
                        <a href="{{ route('profile.index') }}">Профиль</a>
                    </li>
                @endif
                @if (auth()->user()?->role == 'admin')
                    <li class="nav-item @if (request()->url() == route('admin.index')) header-selected @endif">
                        <a href="{{ route('admin.index') }}">Админ панель</a>
                    </li>
                @endif
            </ul>
        </nav>
        @if (auth()->user())
            <div class="user-profile-container">
                <div class="user-profile" id="userProfile"></div>
                <div class="user-menu hidden" id="userMenu">
                    <ul>
                        <li><a href="{{ route('logout') }}">Выйти</a></li>
                    </ul>
                </div>
            </div>
        @endif
    </header>
    <div class="container">
        @yield('content')
    </div>

    @yield('js')
    <script src="{{ asset('/js/header.js') }}"></script>
</body>

</html>
