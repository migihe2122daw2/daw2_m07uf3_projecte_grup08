@extends('disseny')

@section('content')

<?php
use App\Models\Usuaris;
$usuaris = Usuaris::all();
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
          <td>Nom i cognoms</td>
          <td>Email</td>
          <td>Contrasenya</td>
          <td>Tipus de usuari</td>
          <td>Darrera hora d'entrada</td>
          <td>Darrera hora de sortida</td>
          <td colspan="2">Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuaris as $usuari)
        <tr>
            <td>{{$usuari->Nom_i_cognoms}}</td>
            <td>{{$usuari->Email}}</td>
            <td>{{$usuari->Contrasenya}}</td>
            <td>{{$usuari->Tipus_de_usuari}}</td>
            <td>{{$usuari->Darrera_hora_de_entrada}}</td>
            <td>{{$usuari->Darrera_hora_de_sortida}}</td>
            <td>
                <a href="{{ route('usuaris.edit',$usuari->Email)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('usuaris.destroy', $usuari->Email)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
  </table>
<div>
<br><a href="{{ url('usuaris/create') }}" class="btn btn-primary">Afegir un nou usuari</a>
<a href="{{ url('/')}}" class="btn btn-warning">Tornar al menu</a>
@endsection