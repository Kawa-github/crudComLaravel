@extends('templates.layout')
@section('content')    

<style>
    .frm-login{
        margin: 15px;
    }
    .frm-login button{
        margin: 5px;    
    }
    h3{
        text-align: center;
        padding: 7px;
    }
</style>

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
<form action="{{ route('cadastrar_usuario') }}" method="POST" class="frm-login d-flex justify-content-center">
    @csrf
    <div class="card w-25">
        <h3>Formulário de Cadastro</h3>
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
        <button type="submit" class="btn btn-primary btn-block btn-cad">CADASTRAR</button>
    </div>
    </form>

    <script>

        let formCadastro = document.querySelector('.frm-login')
        // console.log(formCadastro)
        
        // let btnCadastro = document.querySelector('.btn-cad')
        // console.log(btnCadastro)
        
        let inputsForm = document.querySelectorAll('.card-body #camposFrm input'); 
        // console.log(inputsForm) 
        
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

        function validarCampos(){
            
        }

        function existeCamposVazios(inputs){
            array = Array.from(inputs)
            inputsVazios = array.filter(input => input.value == '')
            return inputsVazios.length

        }

        // let senha = document.querySelector('input[name="senha"]')
        // pegarComprimentoSenha(senha => senha.length)
        
        // function validarCampoSenha(){
        //     formCadastro.preventDefault()
        //     if(senha.value < 0){
        //         alert('é nec')
        //     }
        //     pegarComprimentoSenha(senha)
        // }
    </script>

@endsection