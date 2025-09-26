<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * El modelo Product representa un registro en la tabla `products`.
 * Eloquent (el ORM de Laravel) lo utiliza para interactuar con la base de datos
 * de una manera orientada a objetos.
 */
class Product extends Model
{
    use HasFactory; // Trait que permite usar "model factories" para generar datos de prueba.

    /**
     * Los atributos que se pueden asignar de forma masiva.
     *
     * Cuando usamos métodos como `Product::create()` o `Product::update()` con un array de datos,
     * solo los campos listados aquí serán aceptados. Esto previene que un usuario malintencionado
     * pueda actualizar campos sensibles que no debería (como un campo `is_admin`).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image_url',
    ];
}