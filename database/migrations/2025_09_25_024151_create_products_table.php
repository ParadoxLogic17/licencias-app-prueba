<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// La clase de migración define cómo crear y deshacer los cambios en la base de datos.
return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     * Este método se llama cuando ejecutas `php artisan migrate`.
     * Define la estructura de la tabla de la base de datos.
     */
    public function up(): void
    {
        // `Schema::create` crea una nueva tabla en la base de datos.
        Schema::create('products', function (Blueprint $table) {
            // Define las columnas de la tabla.
            $table->id(); // Columna de ID auto-incremental (clave primaria).
            $table->string('name'); // Columna para el nombre del producto (texto corto).
            $table->string('slug')->unique(); // Columna para una versión del nombre amigable para URLs. Debe ser única.
            $table->text('description'); // Columna para la descripción detallada (texto largo).
            $table->decimal('price', 8, 2); // Columna para el precio, con 8 dígitos totales y 2 decimales.
            $table->string('image_url'); // Columna para la URL de la imagen del producto.
            $table->timestamps(); // Crea dos columnas: `created_at` and `updated_at` para rastrear fechas de creación/actualización.
        });
    }

    /**
     * Revierte las migraciones.
     * Este método se llama cuando ejecutas `php artisan migrate:rollback`.
     * Elimina la tabla creada en el método `up`.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};