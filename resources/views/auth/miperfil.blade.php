@extends('layout')

@Auth::user()

@section('title', "Mi Perfil - Id: {$user_auth->id}")

@section('content')
    <h1>Usuario #{{ $user_auth->id }}</h1>

    <p>Nombre del usuario: {{ $user_auth->name }}</p>
    <p>Correo electrónico: {{ $user_auth->email }}</p>

    <p>
        <a href="{{ route('users.index') }}">Ir al listado de usuarios</a>
    </p>
@endsection