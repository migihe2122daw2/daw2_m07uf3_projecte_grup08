@extends('disseny')

@section('content')

<?php
use App\Models\Lloguers;
// Seleciona solo el lloguer que tenga el dni de client que se le pasa por parametro
$lloguer = Lloguers::where('DNI_client', $DNI_client)->first();
// Desempaqueta el objeto
$dades = unserialize($lloguer->Dades);
?>

<h1>Lloguer</h1>
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
            <td>Matricula_auto</td>
            <td>Data_prestec</td>
            <td>Data_devolucio</td>
            <td>Lloc_de_devolucio</td>
            <td>Preu_per_dia</td>
            <td>Deposit_ple</td>
            <td>Tipus_de_asseguranca</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$lloguer->DNI_client}}</td>
            <td>{{$lloguer->Matricula_auto}}</td>
            <td>{{$lloguer->Data_prestec}}</td>
            <td>{{$lloguer->Data_devolucio}}</td>
            <td>{{$lloguer->Lloc_de_devolucio}}</td>
            <td>{{$lloguer->Preu_per_dia}}</td>
            <td>{{$lloguer->Deposit_ple}}</td>
            <td>{{$lloguer->Tipus_de_asseguranca}}</td>         
        </tr>
    </tbody>
    </table>
</div>
