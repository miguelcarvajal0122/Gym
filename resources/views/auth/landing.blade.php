<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido - Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1554284126-aa88f22d8b74');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .landing-box {
            background: white;
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(121, 108, 108, 0.1);
            text-align: center;
        }
        .landing-box h1 {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="landing-box">
        <h1>🏋️ Bienvenido a Gym</h1>
        <p>Elige una opción para continuar:</p>
        <a href="{{ route('login') }}" class="btn btn-primary m-2">🔐 Iniciar sesión</a>
        <a href="{{ route('register') }}" class="btn btn-success m-2">🧾 Crear cuenta</a>
    </div>
</body>
</html>