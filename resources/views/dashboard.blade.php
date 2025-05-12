@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">¡Bienvenido al Gimnasio, {{ Auth::user()->name }}! 🏋️</h1>
        <p class="lead">Tu espacio para entrenar, crecer y sentirte increíble.</p>
    </div>

    <div class="row g-4">
        <!-- Perfil -->
        <div class="col-md-4">
            <div class="card border-0 shadow h-100 text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-person-circle fs-1 text-primary"></i>
                    </div>
                    <h5 class="card-title">Mi Perfil</h5>
                    <p class="card-text">Administra tu cuenta y visualiza tu progreso.</p>
                </div>
            </div>
        </div>

        <!-- Planes -->
        <div class="col-md-4">
            <div class="card border-0 shadow h-100 text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-list-check fs-1 text-success"></i>
                    </div>
                    <h5 class="card-title">Planes de Entrenamiento</h5>
                    <p class="card-text">Consulta tus rutinas y horarios asignados.</p>
                    <a href="{{ route('planes.index') }}" class="btn btn-success">Ver Planes</a>
                </div>
            </div>
        </div>

        <!-- Historial -->
        <div class="col-md-4">
            <div class="card border-0 shadow h-100 text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-receipt fs-1 text-warning"></i>
                    </div>
                    <h5 class="card-title">Historial de Pagos</h5>
                    <p class="card-text">Visualiza tus facturas y pagos realizados.</p>
                    <a href="{{ route('pagos.index') }}" class="btn btn-outline-warning">Ver Historial</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection