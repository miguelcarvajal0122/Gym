@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-warning mb-4">Editar suscripción</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('suscripciones.update', $suscripcion->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('suscripciones.form', ['suscripcion' => $suscripcion])

                <div class="mt-3">
                    <a href="{{ route('suscripciones.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
