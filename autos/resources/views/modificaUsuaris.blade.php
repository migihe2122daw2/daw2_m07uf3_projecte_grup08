@extends('disseny')

@section('content')


<h1>Menu de modificacio per a Usuaris</h1>
<div class="mt-5">
    <div class="card-header">
        Modifica l'usuari
    </div>

    <div class="mx-3 card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('usuaris.update', $usuaris->Email)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Nom_i_cognoms">Nom i cognoms:</label>
                <input type="text" class="form-control" name="Nom_i_cognoms" value="{{$usuaris->Nom_i_cognoms}}">
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" class="form-control" name="Email" value="{{$usuaris->Email}}">
            </div>
            <div class="form-group">
                <label for="Contrasenya">Contrasenya:</label>
                <input type="text" class="form-control" name="Contrasenya" value="{{$usuaris->Contrasenya}}">
            </div>
            <div class="form-group">
                <label for="Tipus_de_usuari">Tipus</label>
                <select class="form-control" name="Tipus_de_usuari" id="Tipus_d\'usuari">
                    <option value="Treballador">Treballador</option>
                    <option value="Cap de departament">Cap de departament</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Darrera_hora_de_entrada">Darrera hora d'entrada:</label>
                <input type="text" class="form-control" name="Darrera_hora_de_entrada" value="{{$usuaris->Darrera_hora_de_entrada}}">
            </div>
            <div class="form-group">
                <label for="Darrera_hora_de_sortida">Darrera hora de sortida:</label>
                <input type="text" class="form-control" name="Darrera_hora_de_sortida" value="{{$usuaris->Darrera_hora_de_sortida}}">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <button type="button" class="btn btn-primary">
            <a href="{{ url('usuaris') }}" style="color:white; text-decoration:none;">Tornar a la vista d'usuaris</a>
            </button>
        </form>
    </div>
</div>
@endsection