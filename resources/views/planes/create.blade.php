@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Crear nuevo plan</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('planes.store') }}" method="POST">
                @csrf

                @include('planes.form')

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                </div>

                <div class="mt-3">
                    <a href="{{ route('planes.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection