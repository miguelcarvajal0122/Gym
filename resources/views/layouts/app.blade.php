<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel - Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: #f3f3f3;
            border-right: 2px solid #ddd;
        }

        .sidebar h4 {
            padding: 1rem;
            background-color: #e0e0ff;
            text-align: center;
            margin-bottom: 0;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li a {
            display: block;
            padding: 0.8rem 1rem;
            color: #333;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            background-color: #ddd;
            color: #000;
        }

        .content {
            flex-grow: 1;
            padding: 2rem;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    @auth
    <div class="sidebar">
        <h4>🏋️ Gym Panel</h4>
        <ul>
            <li><a href="{{ route('dashboard') }}">🏠 Dashboard</a></li>
            <li><a href="{{ route('planes.index') }}">📋 Planes</a></li>
            <li><a href="{{ route('suscripciones.index') }}">👥 Suscripciones</a></li>
            <li><a href="{{ route('pagos.index') }}">📈 Mis Pagos</a></li>
            <li><a href="{{ route('usuarios.index') }}">⚙️ Configuración</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link w-100 text-start">🔓 Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </div>
    @endauth

    <div class="content">
        @yield('content')
    </div>
</body>
</html>