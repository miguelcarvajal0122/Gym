@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear nuevo plan (test)</h2>

    <form action="{{ route('planes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" 
           value="{{ old('nombre', isset($plan) ? $plan->nombre : '') }}" required>
</div>

<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" name="precio" class="form-control" step="0.01"
           value="{{ old('precio', isset($plan) ? $plan->precio : '') }}" required>
</div>

<div class="mb-3">
    <label for="duracion" class="form-label">Duración (días)</label>
    <input type="number" name="duracion" class="form-control"
           value="{{ old('duracion', isset($plan) ? $plan->duracion : '') }}" required>
</div>


        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" class="form-control" required>
            
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection