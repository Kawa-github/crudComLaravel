@extends('templates.layout')

@section('content')

<nav>
    @auth
    <form action="{{ route('fazerLogout') }}" method="POST">
        @csrf
        <button class="btn btn-danger float-end m-2 fw-bold">SAIR</button>
    </form>
    @endauth
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
