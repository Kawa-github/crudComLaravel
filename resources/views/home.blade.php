@extends('templates.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Página Inicial') }}</div>
                <div class="card-body">
                    {{ ('Você está logado.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
