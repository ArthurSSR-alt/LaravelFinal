@extends('layouts.main')
@section('title', 'Lista de Bandas')
@section('content')

<div class="row">
<div class="col-md-12">
<h1>Lista de Bandas</h1>
<table class="table table-bordered">
     <thead>
        <tr>
            <th>Nome</th>
            <th>Álbuns</th>
            <th>Ações</th>
        </tr>
     </thead>
    <tbody>
        @foreach ($bands as $bands)
        <tr>
          <td>{{ $bands->name }}</td>
          <td>{{ $bands->albums_count }}</td>
        </tr>
        @endforeach
    </tbody>
@foreach ($bands as $bands)
<tr>
<td>{{ $bands->name }}</td>
<td>{{ $bands->albums_count }}</td>
<td>
<a href="{{ route('band.show', $bands->id) }}" class="btn btn-info">Ver</a>
<form action="{{ route('bands.destroy', $bands->id) }}" method="POST" style="display:inline-block"></form>

</td>

</tr>



@endforeach



</table>

</div>


</div>
