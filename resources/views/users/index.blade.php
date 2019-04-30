@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
             @if( Auth::check() && Auth::user()->hasRole("admin") )
                <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo usuario</a>
            @endif
        </p>
    </div>

    @if ($users->isNotEmpty())
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr id="fila-{{ $user->id }}">
            <th scope="row" class="id">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if( Auth::check() && Auth::user()->hasRole("admin") )
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('users.show', $user) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-link"><span class="oi oi-trash"></span></button>
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-perro="{{ $user->id }}">Eliminar</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    @else
        <p>No hay usuarios registrados.</p>
    @endif


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Está seguro que quiere eliminar este Usuario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Si elimina este registro, no va a poder volver a acceder al sistema.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="borrar" class="btn btn-primary" data-dismiss="modal">Si, eliminar</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
               // Delete the URL and remove it from list.

            $('#exampleModal').on('show.bs.modal', function(e) {
                //get data-id attribute of the clicked element
                var id_usuario = $(e.relatedTarget).data('perro');
                //populate the textbox
                $("#borrar").val(id_usuario);
                console.log(id_usuario);
            });

            $('#borrar').click(function () {

                var user = $(this).val();
                console.log(user);

                $.ajax({
                    url: '/usuarios/delete/' + user,
                    type: 'POST',
                    data: {
                        "_method": 'DELETE',
                        "_token": "{{ csrf_token() }}",
                        "is_ajax": "ok"
                    },                      
                    success: function (data) {
                       console.log(data);
                       $("#fila-" + user).remove();
                       
                       
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
</script>


@endsection

@section('sidebar')
    @parent
@endsection