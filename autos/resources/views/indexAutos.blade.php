@extends('disseny')

@section('content')

<?php
use App\Models\Autos;
$autos = Autos::all();
?>

<h1>Llista d'usuaris</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>Matricula</td>
          <td>Numero de bastidor</td>
          <td>Marca</td>
          <td>Model</td>
          <td>Color</td>
          <td>Numero de places</td>
          <td>Numero de portes</td>
          <td>Grandaria del maleter</td>
          <td>Tipo de combustible</td>
          <td>Accions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($autos as $auto)
        <tr>
            <td>{{$auto->Matricula_auto}}</td>
            <td>{{$auto->Numero_de_bastidor}}</td>
            <td>{{$auto->Marca}}</td>
            <td>{{$auto->Model}}</td>
            <td>{{$auto->Color}}</td>
            <td>{{$auto->Numero_de_places}}</td>
            <td>{{$auto->Numero_de_portes}}</td>
            <td>{{$auto->Grandaria_del_maleter}}</td>
            <td>{{$auto->Tipo_de_combustible}}</td>
            <td>
                <a href="{{ route('autos.edit',$auto->Matricula_auto)}}" class="btn btn-primary">Editar</a>
                <form action="{{ route('autos.destroy', $auto->Matricula_auto)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
  </table>
<div>
<br><a href="{{ url('autos/create') }}">Afegir un cotxe</a>
@endsection