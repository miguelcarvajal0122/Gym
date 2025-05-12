@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="role" class="form-control" required>
                <option value="">Seleccione un rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->name }}" {{ old('role') == $rol->name ? 'selected' : '' }}>{{ $rol->name }}</option>
                @endforeach
            </select>
            @error('role') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Guardar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
