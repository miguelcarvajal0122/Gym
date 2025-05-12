@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Pagos</h1>

    <a href="{{ route('pagos.create') }}" class="btn btn-primary mb-3">Nuevo Pago</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Usuario - Plan</th>
                    <th>Monto</th>
                    <th>Fecha de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pagos as $pago)
                    <tr>
                        <td>
                            {{ $pago->suscripcion?->usuario?->name ?? 'Usuario no disponible' }} -
                            {{ $pago->suscripcion?->plan?->nombre ?? 'Plan no disponible' }}
                        </td>
                        <td>${{ number_format($pago->monto, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-sm btn-warning" title="Editar pago">Editar</a>
                            <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este pago?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar pago">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay pagos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($pagos, 'links'))
        <div class="d-flex justify-content-center mt-3">
            {{ $pagos->links() }}
        </div>
    @endif
</div>
@endsection