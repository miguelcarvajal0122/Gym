@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Registrar Nuevo Pago</h1>

    <form action="{{ route('pagos.store') }}" method="POST">
        @csrf

        <!-- Usuario - Plan -->
        <div class="mb-3">
            <label for="suscripcion_id" class="form-label">Usuario - Plan</label>
            <select name="suscripcion_id" id="suscripcion_id" class="form-select @error('suscripcion_id') is-invalid @enderror" required>
                <option value="">Seleccione...</option>
                @foreach($suscripciones as $suscripcion)
                    <option value="{{ $suscripcion->id }}" data-precio="{{ $suscripcion->plan->precio }}">
                        {{ $suscripcion->usuario->name }} - {{ $suscripcion->plan->nombre }}
                    </option>
                @endforeach
            </select>
            @error('suscripcion_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Monto automático -->
        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" name="monto" id="monto" class="form-control @error('monto') is-invalid @enderror" readonly required>
            @error('monto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Fecha de pago -->
        <div class="mb-3">
            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
            <input type="date" name="fecha_pago" id="fecha_pago" class="form-control @error('fecha_pago') is-invalid @enderror" required>
            @error('fecha_pago')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- Script para autocompletar monto -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('suscripcion_id');
        const montoInput = document.getElementById('monto');

        select.addEventListener('change', function () {
            const selectedOption = select.options[select.selectedIndex];
            const precio = selectedOption.getAttribute('data-precio');
            montoInput.value = precio ? parseFloat(precio).toFixed(2) : '';
        });
    });
</script>
@endsection