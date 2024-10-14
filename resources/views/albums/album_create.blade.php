@extends('layouts.main')

@section('content')
    <h1>Add Album for {{ $band->name }}</h1>

    <form action="{{ route('albums.store', $band->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Album Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="release_date">Release Date:</label>
            <input type="date" id="release_date" name="release_date" required>
        </div>

        <div>
            <label for="image">Cover Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit">Add Album</button>
    </form>

    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
