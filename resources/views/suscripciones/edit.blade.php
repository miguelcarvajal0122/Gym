@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Suscripción</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @isset($suscripcion)
    <form action="{{ route('suscripciones.update', $suscripcion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <input type="text" class="form-control" value="{{ $suscripcion->usuario->name ?? 'N/A' }}" disabled>
        </div>

        <div class="mb-3">
            <label for="plan_id" class="form-label">Plan</label>
            <select name="plan_id" class="form-control">
                @foreach($planes as $plan)
                    <option value="{{ $plan->id }}" {{ $plan->id == $suscripcion->plan_id ? 'selected' : '' }}>
                        {{ $plan->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ $suscripcion->fecha_inicio }}">
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha Fin</label>
            <input type="date" name="fecha_fin" class="form-control" value="{{ $suscripcion->fecha_fin }}">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" class="form-control" value="{{ $suscripcion->estado }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('suscripciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @endisset
</div>
@endsection