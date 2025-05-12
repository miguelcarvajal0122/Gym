@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Crear nueva suscripción</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('suscripciones.store') }}" method="POST">
                @csrf

                @include('suscripciones.form')

                <div class="mt-3">
                    <a href="{{ route('suscripciones.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
