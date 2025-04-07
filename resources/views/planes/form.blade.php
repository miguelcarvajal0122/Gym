<div class="mb-3">
    <label for="nombre" class="form-label">Nombre del plan</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $plan->nombre ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" name="precio" id="precio" value="{{ old('precio', $plan->precio ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="duracion" class="form-label">Duración (días)</label>
    <input type="number" name="duracion" id="duracion" value="{{ old('duracion', $plan->duracion ?? '') }}" class="form-control" required>
</div>
