@extends('templates.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3 text-center ">
                
                <div class="card-header ">{{ __('Página Inicial') }}</div>
                <div class="card-body">
                   <div> Seja bem vindo, {{ auth()->user()->name }} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
