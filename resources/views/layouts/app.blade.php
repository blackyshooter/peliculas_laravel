<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema MVC de Películas</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f4f6;
            margin: 0;
            color: #111827;
        }

        header {
            background: linear-gradient(135deg, #111827, #1f2937);
            color: white;
            padding: 28px 48px;
        }

        header h1 {
            margin: 0;
            font-size: 30px;
        }

        header p {
            margin: 8px 0 0;
            color: #d1d5db;
        }

        nav {
            background: #0f172a;
            padding: 14px 48px;
            display: flex;
            gap: 14px;
            align-items: center;
            flex-wrap: wrap;
        }

        nav a {
            color: #e5e7eb;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 14px;
            border-radius: 999px;
            transition: 0.2s;
        }

        nav a:hover {
            background: #2563eb;
            color: white;
        }

        .page {
            width: 92%;
            max-width: 1180px;
            margin: 32px auto;
        }

        .panel {
            background: white;
            padding: 28px;
            border-radius: 18px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
        }

        .page-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .page-title h2 {
            margin: 0;
            font-size: 30px;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 11px 16px;
            text-decoration: none;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-success {
            background: #16a34a;
        }

        .btn-secondary {
            background: #6b7280;
        }

        .btn:hover {
            opacity: 0.92;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
        }

        label {
            font-weight: bold;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .form-full {
            grid-column: 1 / -1;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 18px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 18px;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 22px;
        }

        .movie-card,
        .director-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.07);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .movie-card:hover,
        .director-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.12);
        }

        .movie-poster {
            width: 100%;
            height: 340px;
            object-fit: cover;
            background: #e5e7eb;
        }

        .director-photo {
            width: 100%;
            height: 260px;
            object-fit: cover;
            background: #e5e7eb;
        }

        .card-body {
            padding: 18px;
        }

        .card-body h3 {
            margin: 0 0 10px;
            font-size: 21px;
        }

        .card-info {
            margin: 7px 0;
            color: #374151;
            font-size: 14px;
        }

        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .empty {
            text-align: center;
            color: #6b7280;
            padding: 30px;
            background: #f9fafb;
            border-radius: 14px;
        }

        @media (max-width: 700px) {
            header, nav {
                padding-left: 22px;
                padding-right: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .page-title {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Sistema MVC de Películas</h1>
    <p>Gestión simple de películas y directores con Laravel + MySQL</p>
</header>

<nav>
    <a href="{{ route('peliculas.index') }}">Películas</a>
    <a href="{{ route('peliculas.create') }}">Nueva Película</a>
    <a href="{{ route('directores.index') }}">Directores</a>
    <a href="{{ route('directores.create') }}">Nuevo Director</a>
</nav>

<main class="page">
    <section class="panel">

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <strong>Hay errores en el formulario:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </section>
</main>

</body>
</html>