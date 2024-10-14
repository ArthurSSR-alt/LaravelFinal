@extends('layouts.main')

@section('content')
    <h1>Editar Banda</h1>
    <form action="{{ route('bands.update', $band->id) }}" method="POST">
        @csrf
        @method('PUT')
        Nome: <input type="text" name="name" value="{{ $band->name }}">
        Foto: <input type="text" name="photo" value="{{ $band->photo }}">
        <button type="submit">Atualizar</button>
    </form>
@endsection
