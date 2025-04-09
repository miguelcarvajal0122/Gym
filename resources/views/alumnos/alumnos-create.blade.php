<!DOCTYPE html> 
<html>
<head>
    <title>Agregar Alumno</title>
</head>
<body>
    <h1>Agregar Alumno</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('alumnos.store') }}">
        @csrf

        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br><br>

        <label>Tipo de Plan:</label>
        <input type="text" name="plan" required><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
/*iverson*\