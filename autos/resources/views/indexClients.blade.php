@extends('disseny')

@section('content')

<?php
use App\Models\Clients;
$clients = Clients::all();
?>

<h1>Llista de clients</h1>
<div class="mt-5">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr class="table-primary">
            <td>DNI client</td>
            <td>Nom i cognoms</td>
            <td>Edat</td>
            <td>Telefon</td>
            <td>Adreça</td>
            <td>Ciutat</td>
            <td>Pais</td>
            <td>Email</td>
            <td>Número del permís de conducció</td>
            <td>Punts del permís de conducció</td>
            <td>Tipus de tajeta</td>
            <td>Numero de tajeta</td>
            <td colspan="2">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
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
                <td>
                    <a href="{{ route('clients.edit',$client->DNI_client)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('clients.destroy', $client->DNI_client)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    <!-- Botón para generar un pdf -->
                    <a href="{{ route('clients.pdf',$client->DNI_client) }}" class="btn btn-primary">PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
<br><a href="{{ url('clients/create') }}" class="btn btn-primary">Afegir un nou client</a>
<a href="{{ url('/')}}" class="btn btn-warning">Tornar al menu</a>
@endsection