@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->getRoleNames()->first() }}</td>
                <td>
                    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
