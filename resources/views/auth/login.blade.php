@extends('layouts.main')

@section('content')
    <h1>Login</h1>


    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>
        </div>


        <div>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Lembrar-me</label>
        </div>

        <button type="submit">Entrar</button>
    </form>
@endsection
