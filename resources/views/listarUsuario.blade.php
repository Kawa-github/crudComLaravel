@extends('templates.layout')
@section('content')
  <div class="d-flex justify-content-center">
      <div class="table-responsive w-75">
    <table class="table table-hover mt-3">
                <thead class="bg-dark text-white">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email:</th>
                    <th></th>
                </thead>
                <tbody>
                    @if(!$users->isEmpty())
                        @foreach ($users as $user)
                        <tr>
                            <td> {{ $user->id }} </td>         
                            <td> {{$user->name}} </td>         
                            <td>  {{$user->email}} </td>
                            <td class="d-flex justify-content-center align-items-center">
                                <a class="btn btn-warning btn-sm me-1 text-white" href="/listar/edit/{{$user->id}}">Editar</a>    
                                <form action="{{ route('deletar_usuario', $user->id) }}" method="POST" class="frmDelete mb-0">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm text-white btnDelete">Deletar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
                    @else
                        <td colspan="4"><p class="alert alert-warning m-3 text-center">Não há registros na tabela!</p></td>
                    @endif
                </table>
            </div>
    </div>
    
    <div class="mt-5 d-flex justify-content-center align-items-center">
        {{ $users->links() }}   {{-- {{ Paginação}} --}}
    </div>
    
    @endsection

    {{-- @section('footer')
    @endsection --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
    </script>
    <script>
        
        let forms = document.querySelectorAll('.frmDelete')
    
        Array.from(forms).map(form => {
            form.addEventListener("submit", function(e) {
            e.preventDefault();
           
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você não poderá reverter isto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (!result.isConfirmed) return;
                    e.target.submit();
            })
        })    
    })

    </script>

    @if (Session::has('msg-success'))
    <script>
        Swal.fire({
            icon: 'success',
            text: '{{ Session::get('msg-success') }}',
        })
    </script>
    @endif


