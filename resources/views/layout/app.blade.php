<!DOCTYPE html>
<!-- La directiva `lang` establece el idioma de la página, útil para accesibilidad y SEO. -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- La directiva @yield('title', '...') define una sección que las vistas hijas pueden rellenar. -->
    <!-- Si una vista, no define un 'title', se usará 'Tienda de Licencias' por defecto. -->
    <title>@yield('title', 'Tienda de Licencias')</title>

    <!-- CSS de Bootstrap 5 desde un CDN para un diseño moderno y responsivo. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS de Bootstrap Icons para usar su set de iconos. -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Fuente 'Roboto' de Google Fonts para una tipografía limpia. -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Estilos CSS personalizados para pulir la interfaz. -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Un gris muy claro para el fondo */
        }
        .product-card {
            transition: transform .2s, box-shadow .2s; /* Transición suave para efectos hover */
            border: 1px solid #e9ecef;
        }
        .product-card:hover {
            transform: translateY(-5px); /* Eleva la tarjeta ligeramente */
            box-shadow: 0 4px 12px rgba(0,0,0,.1); /* Sombra más pronunciada */
        }
        .footer {
            background-color: #212529; /* Un color oscuro para el pie de página */
            color: white;
            padding: 2rem 0;
            margin-top: 4rem; /* Espacio encima del pie de página */
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Barra de navegación principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- El enlace principal lleva a la ruta nombrada 'products.index' (la página de inicio). -->
            <a class="navbar-brand" href="{{ route('products.index') }}">LicenciasDev</a>

            <!-- Auth Links -->
            <div class="d-flex">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Log in</a>
                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                @endguest
                @auth
                    <div class="text-white me-3 d-flex align-items-center">
                        Hola, {{ Auth::user()->name }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Log Out</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Contenedor principal donde se inyectará el contenido de las páginas hijas. -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Pie de página -->
    <footer class="footer">
        <div class="container text-center">
            <!-- Muestra el año actual dinámicamente. -->
            <p>&copy; {{ date('Y') }} LicenciasDev. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- JavaScript de Bootstrap (y Popper.js) para componentes interactivos como menús desplegables. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>