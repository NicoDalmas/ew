@extends('layout')



@section('title', "Mi Perfil - Id: {$user_auth->id}")

@section('content')
<div style="visibility: hidden">@Auth::user()</div>

<div class="card">
        <h4 class="card-header">Datos personales</h4>
        <div class="card-body">

			<table class="table table-dark">
				<thead>
					<tr>
					<th scope="col">Usuario</th>
					<th scope="col">#{{ $user_auth->id }}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Nombre del usuario:</td>
						<td>{{ $user_auth->name }}</td>
					</tr>
					<tr>
						<td>Correo electrónico:</td>
						<td>{{ $user_auth->email }}</td>
					</tr>
				</tbody>
			</table>

		    <p>
		    	<a class="btn btn-primary" href="{{ route('users.edit', $user_auth) }}">Editar mi información</a>
		        <a class="btn btn-secondary" href="{{ route('users.index') }}">Ir al listado de usuarios</a>
		    </p>
		</div>
</div>

@endsection