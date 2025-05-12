@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Suscripciones</h1>

    <a href="{{ route('suscripciones.create') }}" class="btn btn-success mb-3">Crear nueva suscripción</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Plan</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suscripciones as $suscripcion)
                <tr>
                    <td>{{ $suscripcion->usuario->name }}</td>
                    <td>{{ $suscripcion->plan->nombre }}</td>
                    <td>{{ $suscripcion->fecha_inicio }}</td>
                    <td>{{ $suscripcion->fecha_fin }}</td>
                    <td>{{ ucfirst($suscripcion->estado) }}</td>
                    <td>
                        <a href="{{ route('suscripciones.edit', $suscripcion->id) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('suscripciones.destroy', $suscripcion->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
