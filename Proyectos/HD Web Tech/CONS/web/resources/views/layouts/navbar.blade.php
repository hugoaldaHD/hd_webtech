<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>HD Tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- Navbar superior --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">HD Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <div class="container py-5">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4 text-center">
            <p class="mb-1">© {{ date('Y') }} HD Tech. Todos los derechos reservados.</p>
            <small>Desarrollado por HD Tech | <a href="mailto:hugo.aldacardenas@gmail.com" class="text-white">Contáctanos</a></small>
        </div>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>