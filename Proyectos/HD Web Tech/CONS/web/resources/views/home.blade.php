@extends('layouts.navbar')

@section('content')

    {{-- Carrusel de anuncios --}}
    <div id="carouselAnuncios" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($anuncios as $index => $anuncio)
                <button type="button" data-bs-target="#carouselAnuncios" data-bs-slide-to="{{ $index }}" class="@if($index === 0) active @endif" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($anuncios as $index => $anuncio)
                @php $paquete = $anuncio->paquete; @endphp
                @if($paquete)
                    <div class="carousel-item @if($index === 0) active @endif">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-6 ">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAnuncios" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselAnuncios" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    {{-- Lista de paquetes --}}
    <h2 class="mb-4">Nuestros Paquetes</h2>
    <div class="row">
        @foreach($paquetes as $paquete)
            <div class="col-md-4 mb-4">
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection