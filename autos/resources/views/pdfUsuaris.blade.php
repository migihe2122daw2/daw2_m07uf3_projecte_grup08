@extends('disseny')

@section('content')

<?php
use App\Models\Usuaris;
// Seleciona solo el usuario que tenga el email que se le pasa por parametro
$usuari = Usuaris::where('Email', $Email)->first();
// Desempaqueta el objeto
$dades = unserialize($usuari->Dades);
?>

<h1>Usuari</h1>
<div class="mt-5 ml-5 mr-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover">
    <thead>
        <tr class="table-primary">
          <td>Nom_i_cognoms</td>
          <td>Email</td>
          <td>password</td>
          <td>Tipus_de_usuari</td>
          <td>Darrera_hora_de_entrada</td>
          <td>Darrera_hora_de_sortida</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$usuari->Nom_i_cognoms}}</td>
            <td>{{$usuari->Email}}</td>
            <td>{{$usuari->password}}</td>
            <td>{{$usuari->Tipus_de_usuari}}</td>
            <td>{{$usuari->Darrera_hora_de_entrada}}</td>
            <td>{{$usuari->Darrera_hora_de_sortida}}</td>         
        </tr>
    </tbody>
    </table>
</div>

