<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Charcutería Elsa</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <!-- Css -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <!-- Js -->
    <script src="{{ asset('js/listar_paquetes.js') }}"></script>
    <script src="{{ asset('js/crear_paquetes.js') }}"></script>
    <script src="{{ asset('js/editar_paquetes.js') }}"></script>
    <script src="{{ asset('js/eliminar_paquetes.js') }}"></script>
    <script src="{{ asset('js/listar_anuncios.js') }}"></script>
    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div class="body-wrapper">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin') }}">Charcutería Elsa</a>
            </div>
        </nav>

        <!-- contenido principal -->
        <div class="container py-5 main-content">
            @yield('content')
        </div>

        <!-- footer -->
        <footer class="bg-dark text-white mt-auto">
            <div class="container py-4 text-center">
                <p class="mb-1">© {{ date('Y') }} Charcutería Elsa. Todos los derechos reservados.</p>
                <small>Desarrollado por HD Tech | <a class="text-white">Contáctanos</a></small>
            </div>
        </footer>

    </div>
</body>
</html>