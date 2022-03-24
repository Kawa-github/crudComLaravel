<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title','Crud com Laravel')</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Crud com Laravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">

          @guest
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          @endguest

        @auth
          <li class="nav-item">
            <a class="nav-link" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/listar">Listar usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cadastro">Cadastrar</a>
          </li>
        </ul>

        <form action="{{ route('fazerLogout') }}" method="POST" class="frmSair">
          @csrf
            <button class="btn btn-outline-warning btn-sm 
            btnSair float-end 
            m-2 fw-bold">
            SAIR
          </button>
        </form>
      </div>

      @endauth
    </div>
  </nav>
  
  <body class="bg-ligth">
    <div>
      @yield('content')
    </div>

    @auth
      <button class="btn btn-sm btn-danger position-fixed m-3" onclick="history.go(-1)">Voltar</button>
    @endauth
    
  </body>

{{-- <footer class="mt-5 bg-dark text-white text-center text-lg-start d-flex align-items-end">
  @yield('footer')
  
  <div class="container p-4">
    <div class="row"> 
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Footer text</h5>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
          molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
          aliquam voluptatem veniam, est atque cumque eum delectus sint!
        </p>
      </div>
  
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Footer text</h5>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
          molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
          aliquam voluptatem veniam, est atque cumque eum delectus sint!
        </p>
      </div>
    </div>
  </div>
  
  <div class="text-center p-3">
    © 2022 Copyright
  </div>
</footer> --}}

</html>