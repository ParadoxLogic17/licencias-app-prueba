@extends('layout.app')

{{-- El título de la página será el nombre del producto. --}}
@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Columna de la Imagen -->
        <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="{{ $product->image_url }}" class="img-fluid rounded shadow-sm" alt="{{ $product->name }}" style="max-height: 500px; object-fit: cover; width: 100%;">
        </div>

        <!-- Columna de los Detalles -->
        <div class="col-lg-6 d-flex flex-column">
            {{-- Título del producto --}}
            <h1 class="display-5 fw-bold">{{ $product->name }}</h1>
            
            {{-- Precio --}}
            <div class="my-3">
                <p class="fs-2 fw-bold text-primary">${{ number_format($product->price, 2) }}</p>
            </div>

            {{-- Descripción --}}
            {{-- La clase `text-secondary` y el estilo `pre-wrap` aseguran que el texto sea legible y respete los saltos de línea. --}}
            <p class="text-secondary" style="white-space: pre-wrap;">{{ $product->description }}</p>
            
            {{-- Botón de Compra --}}
            <div class="mt-auto pt-3">
                <div class="d-grid gap-2">
                    {{-- El botón es un placeholder visual. No realiza ninguna acción. --}}
                    <a href="#" class="btn btn-primary btn-lg w-100">Comprar Licencia</a>
                </div>
                <div class="text-center mt-2">
                    <small class="text-muted">Transacción segura y garantizada</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlace para volver al catálogo -->
    <div class="mt-5">
        <a href="{{ route('products.index') }}" class="text-decoration-none">&larr; Volver al catálogo</a>
    </div>
</div>
@endsection