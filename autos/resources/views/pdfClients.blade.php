@extends('disseny')

@section('content')

<?php
use App\Models\Clients;
// Seleciona solo el cliente que tenga el dni que se le pasa por parametro
$client = Clients::where('DNI_client', $dni)->first();

// Desempaqueta el objeto
$dades = unserialize($client->Dades);
?>

<h1>Client</h1>
<div class="mt-5 ml-5 mr-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-hover">
    <thead>
        <tr class="table-primary">
          <td>DNI_client</td>
          <td>Nom_i_cognoms</td> 
          <td>Edat</td>
          <td>Telefon</td>
          <td>Adreça</td>
          <td>Ciutat</td>
          <td>Pais</td>
          <td>Email</td>
          <td>Número_del_permís_de_conducció</td>
          <td>Punts_del_permís_de_conducció</td>
          <td>Tipus_de_tajeta</td>
          <td>Numero_de_tajeta</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$client->DNI_client}}</td>
            <td>{{$client->Nom_i_cognoms}}</td>
            <td>{{$client->Edat}}</td>
            <td>{{$client->Telefon}}</td>
            <td>{{$client->Adreça}}</td>
            <td>{{$client->Ciutat}}</td>
            <td>{{$client->Pais}}</td>
            <td>{{$client->Email}}</td>
            <td>{{$client->Número_del_permís_de_conducció}}</td>
            <td>{{$client->Punts_del_permís_de_conducció}}</td>
            <td>{{$client->Tipus_de_tajeta}}</td>
            <td>{{$client->Numero_de_tajeta}}</td>         
        </tr>
    </tbody>
    </table>
</div>
