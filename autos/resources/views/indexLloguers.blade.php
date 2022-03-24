@extends('disseny')

@section('content')

<?php
use App\Models\Lloguers;
$lloguers = Lloguers::all();
?>

<h1>Llista de lloguers</h1>
<div class="mt-5">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
    <table class="table">
        <thead>
            <tr class="table-primary">
            <td>DNI client</td>
            <td>Matricula auto</td>
            <td>Data prestec</td>
            <td>Data devolucio</td>
            <td>Lloc de devolucio</td>
            <td>Preu per dia</td>
            <td>Deposit ple</td>
            <td>Tipus de assegurança</td>
            <td colspan="2">Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($lloguers as $lloguer)
            <tr>
                <td>{{$lloguer->DNI_client}}</td>
                <td>{{$lloguer->Matricula_auto}}</td>
                <td>{{$lloguer->Data_prestec}}</td>
                <td>{{$lloguer->Data_devolucio}}</td>
                <td>{{$lloguer->Lloc_de_devolucio}}</td>
                <td>{{$lloguer->Preu_per_dia}}</td>
                <td>{{$lloguer->Deposit_ple}}</td>
                <td>{{$lloguer->Tipus_de_assegurança}}</td>
                <td>
                    <a href="{{ route('lloguers.edit',$lloguer->DNI_client)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('lloguers.destroy', $lloguer->DNI_client)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><a href="{{ url('lloguers/create') }}" class="btn btn-primary">Crear un nou lloguer</a>
<a href="{{ url('/')}}" class="btn btn-warning">Tornar al menu</a>
@endsection
