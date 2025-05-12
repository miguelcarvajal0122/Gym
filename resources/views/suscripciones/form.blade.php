{{-- Campo oculto con el ID del usuario autenticado --}}
<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

{{-- Mostrar el nombre del usuario autenticado --}}
<div class="mb-3">
    <label class="form-label">Usuario</label>
    <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
</div>

{{-- Selección de Plan --}}
<div class="mb-3">
    <label for="plan_id" class="form-label">Plan</label>
    <select name="plan_id" class="form-control" required>
        <option value="">Seleccione un plan</option>
        @foreach($planes as $plan)
            <option value="{{ $plan->id }}" {{ old('plan_id', $suscripcion->plan_id ?? '') == $plan->id ? 'selected' : '' }}>
                {{ $plan->nombre }}
            </option>
        @endforeach
    </select>
</div>

{{-- Fecha de inicio --}}
<div class="mb-3">
    <label for="fecha_inicio" class="form-label">Fecha inicio</label>
    <input type="date" name="fecha_inicio" class="form-control"
        value="{{ old('fecha_inicio', $suscripcion->fecha_inicio ?? '') }}" required>
</div>

{{-- Fecha de fin --}}
<div class="mb-3">
    <label for="fecha_fin" class="form-label">Fecha fin</label>
    <input type="date" name="fecha_fin" class="form-control"
        value="{{ old('fecha_fin', $suscripcion->fecha_fin ?? '') }}" required>
</div>

{{-- Estado --}}
<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" class="form-control" required>
        <option value="activa" {{ old('estado', $suscripcion->estado ?? '') == 'activa' ? 'selected' : '' }}>Activa</option>
        <option value="inactiva" {{ old('estado', $suscripcion->estado ?? '') == 'inactiva' ? 'selected' : '' }}>Inactiva</option>
        <option value="vencida" {{ old('estado', $suscripcion->estado ?? '') == 'vencida' ? 'selected' : '' }}>Vencida</option>
    </select>
</div>
