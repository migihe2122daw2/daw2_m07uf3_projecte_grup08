@extends('disseny')

@section('content')

<h1>Crea un nou vehicle</h1>
<div class="card mt-5">
    <div class="card-header">
        Afegeix un nou vehicle
    </div>

    <div class="mx-3">
        <form action="{{ route('autos.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="Marca">Marca</label>
                <input type="text" class="form-control" name="Marca" id="marca" placeholder="Marca">
            </div>
            <div class="form-group">
                <label for="Model">Model</label>
                <input type="text" class="form-control" name="Model" id="model" placeholder="Model">
            </div>
            <div class="form-group">
                <label for="Any_de_fabricacio">Any de fabricació</label>
                <input type="number" class="form-control" name="Any_de_fabricacio" id="any_de_fabricacio" placeholder="Any de fabricació">
            </div>
            <div class="form-group">
                <label for="Color">Color</label>
                <input type="text" class="form-control" name="Color" id="color" placeholder="Color">
            </div>
            <div class="form-group">
                <label for="Matricula">Matricula</label>
                <input type="text" class="form-control" name="Matricula" id="matricula" placeholder="Matricula">
            </div>
            <div class="form-group">
                <label for="Any_de_matriculacio">Any de matriculació</label>
                <input type="number" class="form-control" name="Any_de_matriculacio" id="any_de_matriculacio" placeholder="Any de matriculació">
            </div>
            <div class="form-group">
                <label for="Kilometres">Kilometres</label>
                <input type="number"
                    class="form-control"
                    name="Kilometres"
                    id="kilometres"
                    placeholder="Kilometres">
            </div>
            <div class="form-group">
                <label for="Any_de_matriculacio">Tipus</label>
                <select class="form-control" name="Tipus" id="tipus">
                    <option value="Cotxe">Cotxe</option>
                    <option value="Moto">Moto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Any_de_matriculacio">Disponibilitat</label>
                <select class="form-control" name="Disponibilitat" id="disponibilitat">
                    <option value="Disponible">Disponible</option>
                    <option value="No disponible">No disponible</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
