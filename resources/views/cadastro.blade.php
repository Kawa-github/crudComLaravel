@extends('templates.layout')
@section('content')    

@if ($errors->any() )
    <div class="alert alert-danger">
        {{-- {{dd( $errors )}} --}}
        <ul>
            @foreach ($errors->all() as $erros)
                <li>{{ $erros }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="d-flex justify-content-center">
    <form action="{{ route('cadastrar_usuario') }}" method="POST" class="frmCadastro
    col-12 col-md-6">
    @csrf
    <div class="card cardCadastro shadow-lg mt-4 m-2">
        <h3 id="tituloCard">Formulário de Cadastro</h3>
        <div class="card-body">
            <div id="camposFrm">
                <div class="mb-3">
                    <label for="">Nome:</label>
                    <input type="text" class="form-control inputCad" placeholder="Insira o nome.." name="name" maxlength="20" required>
                </div>
                <div class="mb-3">
                    <label for="">Email:</label>
                    <input type="email" class="form-control" placeholder="Insira o e-mail" name="email" maxlength="20" required>
                </div>
                <div class="mb-3">
                    <label for="">Senha:</label>
                    <input type="password" placeholder="Insira a senha" class="form-control" name="password" maxlength="20" required>
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="invalidCheck">
                <label for="invalidCheck" class="form-check-label">Concordo com os <a href="#"> termos </a> e condições</label>
            </div>
        </div>
       <button type="submit" class="btn btn-primary btn-cad">CADASTRAR</button>
    </div>
    </form>
</div>
    <script>
        
        let formCadastro = document.querySelector('.frmCadastro')        
        let inputsForm = document.querySelectorAll('.card-body #camposFrm input'); 
        
        formCadastro.addEventListener('submit',function(e){
            e.preventDefault();
            if(existeCamposVazios(inputsForm)){
                Swal.fire({
                    icon: 'warning',
                    text: 'É necessário preencher todos os campos!'    
                })
                return;
            }
            formCadastro.submit()
        })

        // function validarCampos(){}

        function existeCamposVazios(inputs){
            array = Array.from(inputs)
            inputsVazios = array.filter(input => input.value == '')
            return inputsVazios.length

        }

    </script>
@endsection