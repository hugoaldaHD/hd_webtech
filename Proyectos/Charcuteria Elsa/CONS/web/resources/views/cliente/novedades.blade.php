@extends('layouts.navbarCliente')

@section('title', 'Novedades')

@section('content')
    <div class="text-white text-center mb-4">
        <h1>Bienvenido a la sección de Novedades</h1>
        <p>Aquí encontrarás todas las novedades y noticias de Charcutería Elsa.</p>
    </div>
    <br>
    <div class="container mt-5">
        <div id="carouselAnuncios" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicadores -->
            <div class="carousel-indicators" id="carousel-indicators">
                <!-- Se insertan dinámicamente -->
            </div>
            <!-- Items -->
            <div class="carousel-inner" id="carousel-inner">
                <!-- Se insertan dinámicamente -->
            </div>
            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAnuncios" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAnuncios" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
@endsection
