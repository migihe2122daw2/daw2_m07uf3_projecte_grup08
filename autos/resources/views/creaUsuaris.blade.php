@extends('disseny')

@section('content')

<h1>Crear Usuaris</h1>
<div class="card mt-5">
    <div class="card-header">
        Afegeix un nou usuari
    </div>


<div class="mx-3">
    <form action="{{ route('usuaris.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="Nom_i_cognoms">Nom i cognoms</label>
            <input type="text" class="form-control" name="Nom_i_cognoms" id="nom_i_cognoms" placeholder="Nom i cognoms">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="Email" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="Contrasenya">Contrasenya</label>
            <input type="password" class="form-control" name="Contrasenya" id="contrasenya" placeholder="Contrasenya">
        </div>
        <div class="form-group">
            <label for="Tipus_de_usuari">Tipus</label>
            <select class="form-control" name="Tipus_de_usuari" id="Tipus_d\'usuari">
                <option value="Treballador">Treballador</option>
                <option value="Cap de departament">Cap de departament</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Darrera_hora_de_entrada">Darrera hora d'entrada</label>
            <input type="time" class="form-control" name="Darrera_hora_de_entrada" id="darrera_hora_d_entrada" placeholder="Darrera hora d'entrada">
        </div>
        <div class="form-group">
            <label for="Darrera_hora_de_sortida">Darrera hora de sortida</label>
            <input type="time" class="form-control" name="Darrera_hora_de_sortida" id="darrera_hora_de_sortida" placeholder="Darrera hora de sortida">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <button type="button" class="btn btn-primary">
        <a href="{{ url('usuaris') }}" style="color:white; text-decoration:none;">Tornar a la vista d'usuaris</a>
        </button>
    </form>

</div>

</div>
<br>

@endsection