@extends('disseny')

@section('content')

<h1>Crea un nou vehicle</h1>
<div class="card mt-5">
    <div class="card-header">
        Afegeix un nou vehicle
    </div>

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
        <form action="{{ route('autos.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="Matricula_auto">Matricula_auto</label>
                <input type="text" class="form-control" name="Matricula_auto" id="Matricula_auto" placeholder="Matricula_auto">
            </div>
            <div class="form-group">
                <label for="Numero_de_bastidor">Numero_de_bastidor</label>
                <input type="text" class="form-control" name="Numero_de_bastidor" id="Numero_de_bastidor" placeholder="Numero_de_bastidor">
            </div>
            <div class="form-group">
                <label for="Marca">Marca</label>
                <input type="text" class="form-control" name="Marca" id="Marca" placeholder="Marca">
            </div>
            <div class="form-group">
                <label for="Model">Model</label>
                <input type="text" class="form-control" name="Model" id="Model" placeholder="Model">
            </div>
            <div class="form-group">
                <label for="Color">Color</label>
                <input type="text" class="form-control" name="Color" id="Color" placeholder="Color">
            </div>
            <div class="form-group">
                <label for="Numero_de_places">Numero_de_places</label>
                <input type="number" class="form-control" name="Numero_de_places" id="Numero_de_places" placeholder="Numero_de_places">
            </div>
            <div class="form-group">
                <label for="Numero_de_portes">Numero_de_portes</label>
                <input type="number" class="form-control" name="Numero_de_portes" id="Numero_de_portes" placeholder="Numero_de_portes">
            </div>
            <div class="form-group">
                <label for="Grandaria_del_maleter">Grandaria_del_maleter</label>
                <input type="number" class="form-control" name="Grandaria_del_maleter" id="Grandaria_del_maleter" placeholder="Grandaria_del_maleter">
            </div>
            <div class="form-group">
            <label for="Tipo_de_combustible">Tipus</label>
            <select class="form-control" name="Tipo_de_combustible" id="Tipo_de_combustible">
                <option value="Gasolina">Gasolina</option>
                <option value="Diesel">Diesel</option>
                <option value="Electric">Electric</option>
            </select>
        </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
