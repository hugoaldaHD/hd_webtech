@extends('layouts.navbar')

@section('content')

    {{-- Carrusel de anuncios --}}
    <div id="carouselAnuncios" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators" id="carousel-indicators"></div>
        <div class="carousel-inner" id="carousel-inner"></div>
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
    <div class="row" id="paquetes-container">
        <!-- Aquí se insertarán dinámicamente los paquetes -->
    </div>

@endsection