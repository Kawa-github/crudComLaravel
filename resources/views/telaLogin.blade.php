@extends('templates.layout')
@section('content')    
    @if (Session::has('msg-error')) {{-- No caso de apresentar erro em login --}}
        <script>
            Swal.fire({
                icon: 'error',
                text: '{{ Session::get('msg-error') }}',
            })
        </script>
    @endif

    @if (Session::has('msg-success')) 
        <script>
            Swal.fire({
                icon: 'success',
                text: '{{ Session::get('msg-success') }}',
            })
        </script>
    @endif

    <form method="POST" action="{{ route('realizar_login') }}" class="frmLogin d-flex justify-content-center">
        @csrf
        <div class="card mt-5 shadow-lg cardLogin">
            <div class="row">
                <div class="p-5 col-12 col-md-6">
                    <div class="mb-3">
                        <label for="">Email:</label>
                        <input type="email" class="form-control" placeholder="Insira o e-mail" name="email">
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Senha:</label>
                        <input type="password" placeholder="Insira a senha" name="password" class="form-control">
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-entrar fw-bold">ENTRAR</button>
                    <div>
                        <p class="mt-2">Não tem uma conta? Se <a href="/cadastro" title="Criar conta">cadastre</a></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center">
                    <aside class="py-2 d-flex justify-content-center 
                        align-items-center flex-column informations-custom h-100">
                        <div class="text-white fw-bolder">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        </div>
                        <div class="text-white fs-5 fw-bolder">
                            Venha conhecer nossa
                            <a href="#" class="text-decoration-underline">plataforma</a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </form>
    
@endsection