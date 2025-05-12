@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Plan</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('planes.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $plan->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $plan->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (días)</label>
            <input type="number" name="duracion" class="form-control" value="{{ old('duracion', $plan->duracion) }}" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" class="form-control" value="{{ old('precio', $plan->precio) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('planes.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
