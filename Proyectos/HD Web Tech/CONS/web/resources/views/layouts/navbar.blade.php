<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>HD Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <script src="{{ asset('js/paquetes.js') }}"></script>
    <script src="{{ asset('js/anuncios.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div class="body-wrapper">

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">HD Tech</a>
            </div>
        </nav>

        {{-- Contenido principal --}}
        <div class="container py-5 main-content">
            @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="bg-dark text-white mt-auto">
            <div class="container py-4 text-center">
                <p class="mb-1">© {{ date('Y') }} HD Tech. Todos los derechos reservados.</p>
                <small>Desarrollado por HD Tech | <a href="mailto:hugo.aldacardenas@gmail.com" class="text-white">Contáctanos</a></small>
            </div>
        </footer>

    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>