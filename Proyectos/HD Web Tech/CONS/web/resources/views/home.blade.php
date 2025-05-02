@extends('layouts.navbar')

@section('content')

    {{-- Carrusel de anuncios --}}
    <div id="carouselAnuncios" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($anuncios as $index => $anuncio)
                <div class="carousel-item @if($index === 0) active @endif">
                    <img src="{{ asset($anuncio->imagen_url) }}" class="d-block w-100" alt="Anuncio {{ $index + 1 }}">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAnuncios" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselAnuncios" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    {{-- Lista de paquetes --}}
    <h2 class="mb-4 fade-up">Nuestros Paquetes</h2>
    <div class="row">
        @foreach($paquetes as $paquete)
            <div class="col-md-4 mb-4 fade-up">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-box-seam"></i> {{ $paquete->titulo }}</h5>
                        <p class="card-text">{{ $paquete->descripcion }}</p>
                        <ul>
                            @foreach($paquete->detalles as $detalle)
                                <li>{{ $detalle->texto }}</li>
                            @endforeach
                        </ul>
                        <p><strong>Precio:</strong> {{ number_format($paquete->precio, 2) }} €</p>
                        <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-icon">
                            <i class="bi bi-cart-plus"></i> Solicitar
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        // animar elementos al hacer scroll
        const fadeElements = document.querySelectorAll('.fade-up');

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        });

        fadeElements.forEach(el => observer.observe(el));
    </script>

@endsection