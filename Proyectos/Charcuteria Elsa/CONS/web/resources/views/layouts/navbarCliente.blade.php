@php
    $favicon = match(View::getSection('title')) {
        'Novedades' => asset('icons/novedades.svg'),
        'Productos' => asset('icons/productos.svg'),
        'Cómo llegar' => asset('icons/mapa.svg')
    };
@endphp
<link rel="icon" type="image/x-icon" href="{{ $favicon }}">
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SWEETALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- CRFS TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- TITLE --}}
    <title>@yield('title')</title>

    {{-- STYLES --}}
    @stack('styles')

    {{-- GENERAL --}}
        {{-- JS --}}

        {{-- CSS --}}
        <link href="{{ asset('css/cliente.css') }}" rel="stylesheet">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Fontawesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="fondo">
    <div class="redes">
        <h1 class="marquee"><i class="fa-brands fa-whatsapp"></i> Whatsapp: 655 23 11 87ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ<i class="fa-brands fa-instagram"></i> Instagram: xarcuteriaelsa</h1>
    </div>
    <div class="body-wrapper">

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Marca / Título -->
                <a class="navbar-brand" href="{{ route('novedades') }}">Xarcutería Elsa</a>

                <!-- Botones alineados a la derecha -->
                <div class="ms-auto">
                    <a href="{{ route('novedades') }}" 
                    class="btn btn-outline-light me-2 {{ (View::getSection('title') == 'Novedades') ? 'active btn-primary' : '' }}">
                        Novedades
                    </a>
                    <a href="{{ route('productos') }}" 
                    class="btn btn-outline-light me-2 {{ (View::getSection('title') == 'Productos') ? 'active btn-primary' : '' }}">
                        Productos
                    </a>
                    <a href="{{ route('como-llegar') }}" 
                    class="btn btn-outline-light {{ (View::getSection('title') == 'Cómo llegar') ? 'active btn-primary' : '' }}">
                        Cómo llegar
                    </a>
                </div>
            </div>
        </nav>

        <!-- contenido principal -->
        <div class="container py-5 main-content">
            @yield('content')
        </div>

        <!-- footer -->
        <footer class="text-white mt-auto">
            <div class="container py-4 text-center">
                <p class="mb-1">© {{ date('Y') }} Xarcutería Elsa. Todos los derechos reservados.</p>
                <small>Desarrollado por H&D WebTech | <a class="text-white">Contáctanos</a></small>
            </div>
        </footer>

    </div>
    {{-- SCRIPTS --}}
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>