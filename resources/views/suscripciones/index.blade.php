@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Suscripciones</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('suscripciones.create') }}" class="btn btn-primary mb-3">Crear Suscripción</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Plan</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suscripciones as $suscripcion)
                <tr>
                    <td>{{ $suscripcion->usuario->name ?? 'N/A' }}</td>
                    <td>{{ $suscripcion->plan->nombre ?? 'N/A' }}</td>
                    <td>{{ $suscripcion->fecha_inicio }}</td>
                    <td>{{ $suscripcion->fecha_fin }}</td>
                    <td>{{ $suscripcion->estado }}</td>
                    <td>
                        <a href="{{ route('suscripciones.edit', $suscripcion) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('suscripciones.destroy', $suscripcion) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta suscripción?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
