<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@extends('layouts.navbar')

@section('content')

    <!-- Carrusel de anuncios -->
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


    <!-- Lista de paquetes -->
    <h2 class="mb-4">Nuestros Paquetes</h2>
    <div class="row" id="paquetes-container">
        <!-- Aquí se insertarán dinámicamente los paquetes -->
    </div>

    <!-- Modal para añadir paquete -->
    <div class="modal fade" id="modalPaquete" tabindex="-1" aria-labelledby="modalPaqueteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formPaquete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPaqueteLabel">Añadir nuevo paquete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Detalles</label>
                            <div id="detalles-container">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control detalle-input" placeholder="Escribe un detalle">
                                    <button class="btn btn-outline-danger btn-remove-detalle" type="button">&times;</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="btnAddDetalle">Añadir detalle</button>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio (€)</label>
                            <input type="number" class="form-control" id="precio" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar paquete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection