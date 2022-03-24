@extends('disseny')

@section('content')


<h1>Menu de modificacio per a Clients</h1>
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
        <form action="{{ route('clients.update', $client->DNI_client)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="DNI_client">DNI_client</label>
                <input type="text" class="form-control" name="DNI_client" value="{{$client->DNI_client}}">
            </div>
            <div class="form-group">
                <label for="Nom_i_cognoms">Nom_i_cognoms</label>
                <input type="text" class="form-control" name="Nom_i_cognoms" value="{{$client->Nom_i_cognoms}}">
            </div>
            <div class="form-group">
                <label for="Edat">Edat</label>
                <input type="number" class="form-control" name="Edat" value="{{$client->Edat}}">
            </div>
            <div class="form-group">
                <label for="Telefon">Telefon</label>
                <input type="number" class="form-control" name="Telefon" value="{{$client->Telefon}}">
            </div>
            <div class="form-group">
                <label for="Adreça">Adreça</label>
                <input type="text" class="form-control" name="Adreça" value="{{$client->Adreça}}">
            </div>
            <div class="form-group">
                <label for="Ciutat">Ciutat</label>
                <input type="text" class="form-control" name="Ciutat" value="{{$client->Ciutat}}">
            </div>
            <div class="form-group">
                <label for="Pais">Pais</label>
                <input type="text" class="form-control" name="Pais" value="{{$client->Pais}}">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="Email" value="{{$client->Email}}">
            </div>
            <div class="form-group">
                <label for="Número_del_permís_de_conducció">Número_del_permís_de_conducció</label>
                <input type="number" class="form-control" name="Número_del_permís_de_conducció" value="{{$client->Número_del_permís_de_conducció}}">
            </div>
            <div class="form-group">
                <label for="Punts_del_permís_de_conducció">Punts_del_permís_de_conducció</label>
                <input type="number" class="form-control" name="Punts_del_permís_de_conducció" value="{{$client->Punts_del_permís_de_conducció}}">
            </div>
            <div class="form-group">
                <label for="Tipus_de_tajeta">Tipus de tajeta</label>
                <select class="form-control" name="Tipus_de_tajeta" id="Tipus_de_tajeta">
                    <option value="Debit">Debit</option>
                    <option value="Credit">Credit</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Numero_de_tajeta">Número de tajeta</label>
                <input type="number" class="form-control" name="Numero_de_tajeta" value="{{$client->Numero_de_tajeta}}">
            </div>

            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="button" class="btn btn-primary">
            <a href="{{ url('usuaris') }}" style="color:white; text-decoration:none;">Tornar a la vista d'usuaris</a>
            </button>
        </form>
    </div>
</div>
@endsection

