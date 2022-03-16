@extends('templates.layout')
@section('content')    
<style>
    .frmLogin{
        margin: 15px;
        /* filter: blur(2px); */
    }
    .frmLogin button{
        border-radius: 20px;
        margin: 5px;
    }

    .card{
        border-radius: 25px;
    }
    .informations-custom{
        border-radius: 15px;
        border-left:3px solid #d3d3dd;
        background-color: #2a2a72; 
        background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%); 
    }
    .informations-custom p{
        text-align: center;
    }
    .informations-custom a{
        color: aliceblue;
    }

    .informations-custom a:hover{
        color: #DCDCDC 	;
    }

    .btn-entrar{
        background-color: #2a2a72;
        background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
    }

</style>
    @if (Session::has('msg-error'))
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
        <div class="card w-75 mt-5 shadow-lg">
            <div class="card-custom">
                <div class="d-flex w-100 h-100">
                    <div class="w-50 p-5">
                        <div class="mb-3">
                    <label for="">Email:</label>
                    <input type="email" class="form-control" placeholder="Insira o e-mail" name="email">
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 w-50">
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
            <div class="w-50 h-100">
                <aside class="float-end informations-custom w-100 h-100">
                    <div class="mt-5">
                        <p class="text-white fw-bolder">Lorem ipsum, dolor sit amet consectetur adipisicing elit. </p>
                        <p class="text-white fs-5 fw-bolder">Venha conhecer nossa <a href="#" class="text-decoration-underline">plataforma</a></p>
                    </div>
                </aside>
            </div>
            </div>
        </div>
    </div>
    </form>
    
@endsection