@extends('layouts.master')

@section('content')
    <h1>Editar Álbum: {{ $album->title }}</h1>

    @if (!auth()->check() || !auth()->user()->isAdmin())
        <div class="alert alert-danger">Você não tem permissão para editar álbuns.</div>
        <a href="{{ route('albums.index', $bandId) }}" class="btn btn-secondary">Voltar</a>
        @return
    @endif

    <form action="{{ route('albums.update', [$bandId, $album->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título do Álbum</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $album->title }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
