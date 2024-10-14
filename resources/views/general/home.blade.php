@extends('layouts.main')

@section('content')
     <ul>
        <li><a href="{{ route('bands.create') }}">Add Band</a></li>
        <li><a href="{{route('bands.index')}}">All Bands</a></li>
        <li><a href="{{route('albums.create')}}"> Add Album</a></li>
        <li><a href="{{route('albums.index')}}"> All Albums</a></li>

    </ul>
    <ul>
        <li>{{$siteInfo['name']}}</li>
        <li>{{$siteInfo['genre']}}</li>
        <li>{{$siteInfo['dateOfCreation']}}</li>
    </ul>

    <h5>Bands</h5>
    <ul>
        @foreach ($bandInfo as $band)
        <li>{{$band['id']}} : {{$band['name']}} - {{$band['genre'] }}</li>
        @endforeach
    </ul>
@endsection
