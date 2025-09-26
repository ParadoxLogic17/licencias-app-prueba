{{-- La directiva @extends le dice a Blade que esta vista hereda de 'layout.app'. --}}
{{-- Todo el contenido de este archivo se insertará en el @yield('content') de la plantilla padre. --}}
@extends('layout.app')

{{-- Esta sección define el contenido para el @yield('title') en el layout. --}}
@section('title', 'Nuestras Licencias')

{{-- Esta es la sección de contenido principal. --}}
@section('content')

<!-- Sección de Bienvenida -->
<div class="bg-primary bg-opacity-50 py-5">
    <div class="container text-center text-white">
        <h1 class="display-4">Bienvenido a LicenciasDev</h1>
        <p class="lead">Las mejores licencias de software para potenciar tu productividad.</p>
    </div>
</div>

<!-- Sección de Confianza -->
<div class="bg-white py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Compra con Confianza</h2>
            <p class="lead text-muted">Te ofrecemos la mejor experiencia y seguridad en cada compra.</p>
        </div>
        <div class="row text-center">
            <!-- Segmento 1: Licencias Genuinas -->
            <div class="col-md-4 mb-3">
                <div class="p-3">
                    <i class="bi bi-patch-check-fill fs-2 text-primary mb-2"></i>
                    <h4 class="fw-bold">Licencias 100% Genuinas</h4>
                    <p>Todas nuestras licencias son verificadas y provienen directamente de los desarrolladores. Garantizamos la autenticidad y el pleno funcionamiento de cada producto.</p>
                </div>
            </div>
            <!-- Segmento 2: Soporte Técnico -->
            <div class="col-md-4 mb-3">
                <div class="p-3">
                    <i class="bi bi-headset fs-2 text-primary mb-2"></i>
                    <h4 class="fw-bold">Soporte Técnico Dedicado</h4>
                    <p>¿Tienes problemas con la instalación o activación? Nuestro equipo de soporte está disponible para ayudarte a resolver cualquier inconveniente de forma rápida y eficiente.</p>
                </div>
            </div>
            <!-- Segmento 3: Garantía de Satisfacción -->
            <div class="col-md-4 mb-3">
                <div class="p-3">
                    <i class="bi bi-shield-lock-fill fs-2 text-primary mb-2"></i>
                    <h4 class="fw-bold">Garantía de Satisfacción</h4>
                    <p>Tu compra está protegida. Si la licencia no funciona como se espera, te ofrecemos un reemplazo o la devolución de tu dinero. Tu tranquilidad es nuestra prioridad.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sección de Productos -->
<div class="container py-5">
    <div class="row">
        {{-- La directiva @forelse es un bucle especial de Blade. --}}
        {{-- Es como un @foreach, pero incluye una sección @empty que se ejecuta si el array está vacío. --}}
        @forelse ($products as $product)
            {{-- Definimos una columna. `col-md-4` significa que en pantallas medianas o más grandes, ocupará 4 de 12 columnas (3 tarjetas por fila). --}}
            <div class="col-md-4 mb-4">
                {{-- La clase `h-100` hace que todas las tarjetas en una fila tengan la misma altura. --}}
                <div class="card product-card h-100">
                    {{-- Mostramos la imagen del producto. La URL y el texto alternativo vienen del objeto $product. --}}
                    <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        {{-- `number_format` formatea el precio para que siempre tenga 2 decimales. --}}
                        <p class="card-text fs-5 text-primary fw-bold">${{ number_format($product->price, 2) }}</p>
                        {{-- `route('products.show', $product->slug)` genera la URL a la página de detalle del producto. --}}
                        {{-- `mt-auto` empuja el botón al final de la tarjeta, alineando todos los botones. --}}
                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-primary mt-auto">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @empty
            {{-- Esta parte solo se muestra si la variable `$products` está vacía. --}}
            <div class="col">
                <div class="alert alert-warning text-center">
                    <p class="mb-0">No hay productos disponibles en este momento. Por favor, vuelve a intentarlo más tarde.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
