@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pago</h1>

    <form action="{{ route('pagos.update', $pago->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="suscripcion_id" class="form-label">Usuario - Plan</label>
            <select name="suscripcion_id" class="form-select" required>
                @foreach($suscripciones as $suscripcion)
                    <option value="{{ $suscripcion->id }}" {{ $suscripcion->id == $pago->suscripcion_id ? 'selected' : '' }}>
                        {{ optional($suscripcion->user)->name ?? 'Usuario eliminado' }} - {{ optional($suscripcion->plan)->nombre ?? 'Plan eliminado' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" name="monto" class="form-control" value="{{ $pago->monto }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
            <input type="date" name="fecha_pago" class="form-control" value="{{ $pago->fecha_pago }}" required>
        </div>

        <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de Pago</label>
            <select name="metodo_pago" class="form-select" required>
                <option value="efectivo" {{ $pago->metodo_pago == 'efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="tarjeta" {{ $pago->metodo_pago == 'tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                <option value="transferencia" {{ $pago->metodo_pago == 'transferencia' ? 'selected' : '' }}>Transferencia</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection