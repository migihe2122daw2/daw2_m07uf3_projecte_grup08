@extends('disseny')

@section('content')

<?php
use App\Models\Usuaris;
$usuaris = Usuaris::all();
?>
<<<<<<< HEAD
=======

>>>>>>> 35b6c64827c5ce04be1fdd49411fffda514748c6
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
<<<<<<< HEAD
      @foreach($usuaris as $usu)
      <tr>
        <td>{{$usu->Nom_i_cognoms}}</td>
        <td>{{$usu->Email}}</td>
        <td>{{$usu->Contrasenya}}</td>
        <td>{{$usu->Tipus_de_usuari}}</td>
        <td>{{$usu->Darrera_hora_de_entrada}}</td>
        <td>{{$usu->Darrera_hora_de_sortida}}</td>
        <td>
          <a href="{{ route('usuaris.edit',$usu->id)}}" class="btn btn-primary">Editar</a>
        </td>
        <td>
          <form action="{{ route('usuaris.destroy', $usu->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
=======
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
>>>>>>> 35b6c64827c5ce04be1fdd49411fffda514748c6
        @endforeach
  </table>
<div>
<br><a href="{{ url('usuaris/create') }}" class="btn btn-primary">Afegir un nou usuari</a>
@endsection