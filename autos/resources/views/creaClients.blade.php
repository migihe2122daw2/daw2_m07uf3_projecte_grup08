@extends('disseny')

@section('content')

<h1>Crea un client</h1>
<div class="card mt-5">
    <div class="card-header">
        Afegeix un nou client
    </div>

    <! -- Si hay errores se muestran aqui -->

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="mx-3">
        <form action="{{ route('clients.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="DNI_client">DNI_client</label>
                <input type="text" class="form-control" name="DNI_client" id="DNI_client" placeholder="DNI_client">
            </div>
            <div class="form-group">
                <label for="Nom_i_cognoms">Nom_i_cognoms</label>
                <input type="text" class="form-control" name="Nom_i_cognoms" id="Nom_i_cognoms" placeholder="Nom_i_cognoms">
            </div>
            <div class="form-group">
                <label for="Edat">Edat</label>
                <input type="number" class="form-control" name="Edat" id="Edat" placeholder="Edat">
            </div>
            <div class="form-group">
                <label for="Telefon">Telefon</label>
                <input type="number" class="form-control" name="Telefon" id="Telefon" placeholder="Telefon">
            </div>
            <div class="form-group">
                <label for="Adreça">Adreça</label>
                <input type="text" class="form-control" name="Adreça" id="Adreça" placeholder="Adreça">
            </div>
            <div class="form-group">
                <label for="Ciutat">Ciutat</label>
                <input type="text" class="form-control" name="Ciutat" id="Ciutat" placeholder="Ciutat">
            </div>
            <div class="form-group">
                <label for="Pais">Pais</label>
                <input type="text" class="form-control" name="Pais" id="Pais" placeholder="Pais">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="Email" id="Email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="Número_del_permís_de_conducció">Número_del_permís_de_conducció</label>
                <input type="text" class="form-control" name="Número_del_permís_de_conducció" id="Número_del_permís_de_conducció" placeholder="Número_del_permís_de_conducció">
            </div>
            <div class="form-group">
                <label for="Punts_del_permís_de_conducció">Punts_del_permís_de_conducció</label>
                <input type="number" class="form-control" name="Punts_del_permís_de_conducció" id="Punts_del_permís_de_conducció" placeholder="Punts_del_permís_de_conducció">
            </div>
            <div class="form-group">
            <label for="Tipus_de_tajeta">Tipus de Tarjeta</label>
            <select class="form-control" name="Tipus_de_tajeta" id="Tipus_de_tajeta">
                <option value="Debit">Debit</option>
                <option value="Credit">Credit</option>
            </select>
            </div>
            <div class="form-group">
                <label for="Numero_de_tajeta">Numero_de_tajeta</label>
                <input type="number" class="form-control" name="Numero_de_tajeta" id="Numero_de_tajeta" placeholder="Numero_de_tajeta">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection