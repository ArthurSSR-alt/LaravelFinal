@extends('layouts.main')

@section('content')
    <h1>Create New Band</h1>
    <form method="POST" action="{{ route('bands.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="name">Band Name</label>
    <input type="text" name="name" required>

    <label for="image">Band Image</label>
    <input type="file" name="image" required>

    <button type="submit">Add Band</button>
</form>
@endsection
