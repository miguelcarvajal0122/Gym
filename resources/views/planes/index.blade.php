@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Planes</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('planes.create') }}" class="btn btn-primary mb-3">Crear Nuevo Plan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($planes as $plan)
                <tr>
                    <td>{{ $plan->nombre }}</td>
                    <td>{{ $plan->descripcion }}</td>
                    <td>${{ number_format($plan->precio, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('planes.edit', $plan->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('planes.destroy', $plan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este plan?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
