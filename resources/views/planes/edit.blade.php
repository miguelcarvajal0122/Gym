@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-warning mb-4">Editar plan</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('planes.update', $plan) }}" method="POST">
                @csrf
                @method('PUT')

                @include('planes.form') <!-- Aquí van nombre, precio, duración -->

                <!-- Aquí va descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $plan->descripcion) }}</textarea>
                </div>

                <div class="mt-3">
                    <a href="{{ route('planes.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
