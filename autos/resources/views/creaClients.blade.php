@extends('disseny')

@section('content')

<h1>Crea un client</h1>
<div class="card mt-5">
    <div class="card-header">
        Afegeix un nou client
    </div>

    <div class="mx-3">
        <form action="{{ url('createClient') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" class="form-control" name="Nom" id="nom" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="Cognom">Cognom</label>
                <input type="text" class="form-control" name="Cognom" id="cognom" placeholder="Cognom">
            </div>
            <div class="form-group">
                <label for="DNI">DNI</label>
                <input type="text" class="form-control" name="DNI" id="dni" placeholder="DNI">
            </div>
            <div class="form-group">
                <label for="Telefon">Telefon</label>
                <input type="text" class="form-control" name="Telefon" id="telefon" placeholder="Telefon">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" name="Email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="Adreca">Adreça</label>
                <input type="text" class="form-control" name="Adreca" id="adreca" placeholder="Adreça">
            </div>
            <div class="form-group">
                <label for="Poblacio">Població</label>
                <input type="text" class="form-control" name="Poblacio" id="poblacio" placeholder="Població">
            </div>
            <div class="form-group">
                <label for="Provincia">Provincia</label>
                <input type="text" class="form-control" name="Provincia" id="provincia" placeholder="Provincia">
            </div>
            <div class="form-group">
                <label for="Codi_postal">Codi postal</label>
                <input type="text" class="form-control" name="Codi_postal" id="codi_postal" placeholder="Codi postal">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection