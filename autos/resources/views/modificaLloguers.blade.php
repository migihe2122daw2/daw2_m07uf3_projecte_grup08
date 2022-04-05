@extends('disseny')

@section('content')


<h1>Menu de modificacio per a Lloguers</h1>
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
        <form action="{{ route('lloguers.update', $lloguer->DNI_client)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="DNI_client">DNI_client</label>
                <input type="text" class="form-control" name="DNI_client" value="{{$lloguer->DNI_client}}">
            </div>
            <div class="form-group">
                <label for="Matricula_auto">Matricula auto</label>
                <input type="text" class="form-control" name="Matricula_auto" value="{{$lloguer->Matricula_auto}}">
            </div>
            <div class="form-group">
                <label for="Data_prestec">Data prestec</label>
                <input type="date" class="form-control" name="Data_prestec" value="{{$lloguer->Data_prestec}}">
            </div>
            <div class="form-group">
                <label for="Data_devolucio">Data devolucio</label>
                <input type="date" class="form-control" name="Data_devolucio" value="{{$lloguer->Data_devolucio}}">
            </div>
            <div class="form-group">
                <label for="Lloc_de_devolucio">Lloc de devolucio</label>
                <input type="text" class="form-control" name="Lloc_de_devolucio" value="{{$lloguer->Lloc_de_devolucio}}">
            </div>
            <div class="form-group">
                <label for="Preu_per_dia">Preu per dia</label>
                <input type="number" class="form-control" name="Preu_per_dia" value="{{$lloguer->Preu_per_dia}}">
            </div>
            <div class="form-group">
                <label for="Deposit_ple">Deposit ple</label>
                <input type ="checkbox" name="Deposit_ple" value="1">
            </div>
            <div class="form-group">
                <label for="Deposit_buit">Deposit buit</label>
                <input type ="checkbox" name="Deposit_ple" value="0">
            </div>
            <!-- Tipo de seguro -->
            <div class="form-group">
                <label for="Tipus_de_asseguranca">Tipus de seguro</label>
                <select class="form-control" name="Tipus_de_asseguranca">
                <option value="Franquícia fins a 1000 Euros">Franquícia fins a 1000 Euros</option>
                <option value="Franquícia fins a 500 Euros">Franquícia fins a 500 Euros</option>
                <option value="Sense franquicia">Sense franquicia</option> 
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="button" class="btn btn-primary">
            <a href="{{ url('usuaris') }}" style="color:white; text-decoration:none;">Tornar a la vista de lloguers</a>
            </button>
        </form>
    </div>
</div>
@endsection