@extends('layouts.master')

@section('content')
    <h1>Álbum: {{ $album->title }}</h1>

    <p>Detalhes do álbum.</p>

    @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('albums.edit', [$bandId, $album->id]) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('albums.destroy', [$bandId, $album->id]) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    @endif

    <a href="{{ route('albums.index', $bandId) }}" class="btn btn-secondary">Voltar</a>
@endsection
