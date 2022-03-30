@extends('disseny')

@section('content')



<h1>Crea un lloguer</h1>
<div class="card mt-5">
    <div class="card-header">
        Afegeix un nou lloguer
    </div>

    <div class="mx-3">
        <form action="{{ route('lloguers.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="DNI_client">DNI del client</label>
                <input type="text" class="form-control" name="DNI_client" id="DNI_client" placeholder="DNI del client">
            </div>
            <div class="form-group">
                <label for="Matricula_auto">Matricula del vehicle</label>
                <input type="text" class="form-control" name="Matricula_auto" id="Matricula_auto" placeholder="Matricula del vehicle">
            </div>
            <div class="form-group">
                <label for="Data_prestec">Data de prestec</label>
                <input type="date" class="form-control" name="Data_prestec" id="Data_prestec" placeholder="Data de prestec">
            </div>
            <div class="form-group">
                <label for="Data_devolucio">Data de devolució</label>
                <input type="date" class="form-control" name="Data_devolucio" id="Data_devolucio" placeholder="Data de devolució">
            </div>
            <div class="form-group">
                <label for="Lloc_de_devolucio">Lloc de devolució</label>
                <input type="text" class="form-control" name="Lloc_de_devolucio" id="Lloc_de_devolucio" placeholder="Lloc de devolució">
            </div>
            <div class="form-group">
                <label for="Preu_per_dia">Preu per dia</label>
                <input type="text" class="form-control" name="Preu_per_dia" id="Preu_per_dia" placeholder="Preu per dia">
            </div>
            <div class="form-group">
                <label for="Deposit_ple">Dipòsit plè</label>
                <input type="checkbox" name="Deposit_ple" value="1"id="Deposit_ple">
            </div>
            <div class="form-group">
                <label for="Tipus_de_asseguranca">Tipus d'assegurança</label>
                <select class="form-control" name="Tipus_de_asseguranca" id="tipus_de_asseguranca">
                    <option value="Franquícia fins a 1000 Euros">Franquícia fins a 1000 Euros</option>
                    <option value="Franquícia fins a 500 Euros">Franquícia fins a 500 Euros</option>
                    <option value="Sense franquicia">Sense franquicia</option>                    
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Crea lloguer</button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url('lloguers') }}" style="color: white; text-decoration: none;">Torna a la vista de lloguers</a>
            </button>
        </form>
    </div>
</div>
@endsection
