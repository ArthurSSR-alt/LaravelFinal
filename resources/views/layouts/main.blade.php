<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRM de Bandas')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <ul>
            @if(Auth::check())

                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                    <form action="{{ route('home') }}" method="GET">
                        @csrf
                        <button type="submit">Home</button>
                    </form>

                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Registrar</a></li>
            @endif
        </ul>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
