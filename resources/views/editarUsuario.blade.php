@extends('templates.layout')

@section('content')

<form action="/listar/update/{{$user->id}}" method="POST" class="d-flex justify-content-center">
    @csrf
    @method('PUT')
    <div class="card w-25 mt-3">
        {{-- <h3>Editar Usuário {{$user->name}}</h3> --}}
        <div class="card-body">
            <h3>Editar usuário: {{$user->name}}</h3>
            <div id="camposFrm">
            <div class="mb-3">
                <label for="">Nome:</label>
                <input type="text" class="form-control"  name="name" maxlength="20" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="">Email:</label>
                <input type="email" class="form-control" name="email" maxlength="20" value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label for="">Senha:</label>
                <input type="password" class="form-control" name="password" maxlength="20" value="" autofocus>
            </div>
        </div>

        </div>
        <button type="submit" class="btn btn-primary btn-block ">EDITAR</button>
    </div>
    
</form>

@endsection