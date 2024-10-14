@extends('layouts.main')

@section('content')
    <h1>Bands</h1>

    @foreach($bands as $band)
        <div>
        <img src="{{ asset('storage/bands/testeband.png') }}" alt="Band Image">
            <p>{{ $band->name }}</p>
            <p>Number of Albums: {{ $band->albums->count() }}</p>

            <a href="{{ route('albums.index', $band) }}">View Albums</a>

            @if(Auth::user() && Auth::user()->role === 'admin')
                <a href="{{ route('bands.edit', $band) }}">Edit</a>
                <form action="{{ route('bands.destroy', $band) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif
        </div>
    @endforeach

    @if(Auth::user() && Auth::user()->role === 'admin')
        <a href="{{ route('bands.create') }}">Add New Band</a>
    @endif
@endsection
