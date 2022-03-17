@extends('disseny')

@section('content')

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
          <td># ID</td>
          <td>Nom i cognoms</td>
          <td>Email</td>
          <td>Contrasenya</td>
          <td>Tipus:</td>
          <td>Darrera hora d'entrada</td>
          <td>Darrera hora de sortida</td>
        </tr>
    </thead>
    <tbody>
      @foreach($usuaris as $usu)
      <tr>
        <td>{{$usu->id}}</td>
        <td>{{$usu->nom_i_cognoms}}</td>
        <td>{{$usu->email}}</td>
        <td>{{$usu->contrasenya}}</td>
        <td>{{$usu->tipus}}</td>
        <td>{{$usu->darrera_hora_d_entrada}}</td>
        <td>{{$usu->darrera_hora_de_sortida}}</td>
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
        @endforeach
    </tbody>
  </table>
<div>
<br><a href="{{ url('usuaris/create') }}">Afegir un nou usuari</a>
@endsection