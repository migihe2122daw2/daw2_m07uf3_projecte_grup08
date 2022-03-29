@extends('disseny')

@section('content')

<?php
use App\Models\Autos;
// Seleciona solo el auto que tenga la matricula que se le pasa por parametro
$autos = Autos::where('Matricula_auto', $matricula)->first();
// Desempaqueta el objeto
$dades = unserialize($autos->Dades);

?>

<h1>Auto</h1>
<div class="mt-5 ml-5 mr-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover">
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
        <tr>
            <td>{{$autos->Matricula_auto}}</td>
            <td>{{$autos->Numero_de_bastidor}}</td>
            <td>{{$autos->Marca}}</td>
            <td>{{$autos->Model}}</td>
            <td>{{$autos->Color}}</td>
            <td>{{$autos->Numero_de_places}}</td>
            <td>{{$autos->Numero_de_portes}}</td>
            <td>{{$autos->Grandaria_del_maleter}}</td>
            <td>{{$autos->Tipo_de_combustible}}</td>
        </tr>
    </tbody>
    </table>
</div>




