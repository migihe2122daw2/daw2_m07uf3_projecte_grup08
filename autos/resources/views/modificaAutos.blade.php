@extends('disseny')

@section('content')


<h1>Menu de modificacio per a Autos</h1>
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
        <form action="{{ route('autos.update', $auto->Matricula_auto)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Matricula_auto">Matricula auto</label>
                <input type="text" class="form-control" name="Matricula_auto" value="{{$auto->Matricula_auto}}">
            </div>
            <div class="form-group">
                <label for="Numero_de_bastidor">Numero de bastidor</label>
                <input type="text" class="form-control" name="Numero_de_bastidor" value="{{$auto->Numero_de_bastidor}}">
            </div>
            <div class="form-group">
                <label for="Marca">Marca</label>
                <input type="text" class="form-control" name="Marca" value="{{$auto->Marca}}">
            </div>
            <div class="form-group">
                <label for="Model">Model</label>
                <input type="text" class="form-control" name="Model" value="{{$auto->Model}}">
            </div>
            <div class="form-group">
                <label for="Color">Color</label>
                <input type="text" class="form-control" name="Color" value="{{$auto->Color}}">
            </div>
            <div class="form-group">
                <label for="Numero_de_places">Numero de places</label>
                <input type="number" class="form-control" name="Numero_de_places" value="{{$auto->Numero_de_places}}">
            </div>
            <div class="form-group">
                <label for="Numero_de_portes">Numero de portes</label>
                <input type="number" class="form-control" name="Numero_de_portes" value="{{$auto->Numero_de_portes}}">
            </div>
            <div class="form-group">
                <label for="Grandaria_del_maleter">Grandaria del maleter</label>
                <input type="number" class="form-control" name="Grandaria_del_maleter" value="{{$auto->Grandaria_del_maleter}}">
            </div>
            <div class="form-group">
                <label for="Tipo_de_combustible">Tipo de combustible</label>
                <input type="text" class="form-control" name="Tipo_de_combustible" value="{{$auto->Tipo_de_combustible}}">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <button type="button" class="btn btn-primary">
            <a href="{{ url('usuaris') }}" style="color:white; text-decoration:none;">Tornar a la vista d'usuaris</a>
            </button>
        </form>
    </div>
</div>
@endsection

