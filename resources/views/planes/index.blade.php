@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Planes</h1>

    <a href="{{ route('planes.create') }}" class="btn btn-success mb-3">Crear nuevo plan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Duración (días)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($planes as $plan)
                <tr>
                    <td>{{ $plan->nombre }}</td>
                    <td>{{ $plan->descripcion }}</td>
                    <td>${{ number_format($plan->precio, 2) }}</td>
                    <td>{{ $plan->duracion }}</td>
                    <td>
                    <a href="{{ route('planes.edit', $plan->id) }}" class="btn btn-primary btn-sm">Editar</a>

                        <form action="{{ route('planes.destroy', $plan->id) }}" method="POST" style="display:inline-block;">
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
