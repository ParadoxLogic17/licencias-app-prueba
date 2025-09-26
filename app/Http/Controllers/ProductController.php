<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importamos el modelo Product para poder interactuar con la tabla de productos.
use Illuminate\Http\Request; // No se usa en este controlador, pero es común tenerlo.

/**
 * El ProductController maneja las peticiones HTTP relacionadas con los productos.
 * Cada método público corresponde a una ruta y una acción específicas.
 */
class ProductController extends Controller
{
    /**
     * Muestra una lista de todos los productos.
     * Este método se asociará a la ruta principal de la tienda.
     */
    public function index()
    {
        // 1. Obtenemos todos los registros de la tabla `products` usando el modelo Product.
        $products = Product::all();

        // 2. Retornamos la vista `products.index`.
        //    La función `view()` busca un archivo en `resources/views/products/index.blade.php`.
        //    La función `compact('products')` pasa la variable $products a la vista,
        //    para que podamos acceder a ella dentro del archivo Blade.
        return view('products.index', compact('products'));
    }

    /**
     * Muestra un único producto específico.
     * Gracias a la magia de Laravel (Route Model Binding), Laravel automáticamente
     * encontrará el producto basado en el 'slug' que viene en la URL.
     *
     * @param  \App\Models\Product  $product El producto inyectado automáticamente por Laravel.
     */
    public function show(Product $product)
    {
        // 1. Laravel ya ha encontrado el producto por nosotros. No necesitamos buscarlo.

        // 2. Retornamos la vista `products.show` y le pasamos el producto encontrado.
        //    El archivo estará en `resources/views/products/show.blade.php`.
        return view('products.show', compact('product'));
    }
}