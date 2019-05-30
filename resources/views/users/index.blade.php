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

    <div class="table-responsive">
     <table class="table table-striped table-bordered" style="width:100%" id="users-table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
   </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro que quieres eliminar este Usuario?</h5>
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


@endsection

@section('sidebar')
    @parent
@endsection

@section('javascript')
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
                       table.ajax.reload();
                       
                       
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });


    //datatable
    table= $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        responsive: true,
        colReorder: true,
        keys: true,
        select: true,
        ajax: '{!! route('users.datatable') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

</script>
@endsection
