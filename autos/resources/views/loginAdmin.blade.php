@extends('disseny')
@section('content')

<h1>Login</h1>

<div class="card mt-5 mx-5">
    <div class="card-header">
        Login
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
        <form method="post">
            @csrf
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="Email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="Contrasenya" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
