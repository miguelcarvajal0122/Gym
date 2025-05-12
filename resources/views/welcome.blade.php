<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido al Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1554284126-aa88f22d8b74'); /* Fondo gimnasio */
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 3rem;
            border-radius: 1rem;
            text-align: center;
        }

        .btn-custom {
            padding: 0.75rem 2rem;
            font-size: 1.2rem;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1 class="mb-4">¡Bienvenido al sistema del gimnasio!</h1>
        <div class="d-grid gap-2">
            <a href="{{ route('login') }}" class="btn btn-light btn-custom">🔐 Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-custom">🧾 Crear nuevo usuario</a>
        </div>
    </div>
</body>
</html>