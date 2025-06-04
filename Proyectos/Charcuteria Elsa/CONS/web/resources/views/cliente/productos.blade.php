@extends('layouts.navbarCliente')

@section('title', 'Productos')

@section('content')
    <div class="text-center mb-5">
        <h1>Bienvenido a la sección de Productos</h1>
    </div>

    <div class="row" id="paquetes-container">
        <!-- Las tarjetas se insertan dinámicamente aquí -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/cliente/listar_paquetes.js') }}"></script>
@endpush
