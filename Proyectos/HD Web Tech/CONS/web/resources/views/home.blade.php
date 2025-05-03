@extends('layouts.navbar')

@section('content')

    {{-- Carrusel de anuncios --}}
    <div id="carouselAnunciosContainer" class="carousel slide mb-5">
        <div class="carousel-indicators" id="carousel-indicators"></div>
        <div class="carousel-inner" id="carousel-inner"></div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAnunciosContainer" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselAnunciosContainer" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    {{-- Paquetes --}}
    <div class="container my-5">
        <h2>Nuestros Paquetes</h2>
        <div class="row" id="paquetes-container"></div>
    </div>

    {{-- Bootstrap + JS dinámico separados --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/anuncios.js') }}"></script>

@endsection