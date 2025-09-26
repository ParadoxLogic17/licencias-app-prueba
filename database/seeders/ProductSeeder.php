<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Importamos el modelo Product para interactuar con la base de datos.
use Illuminate\Support\Str; // Importamos el helper Str para generar el slug.

class ProductSeeder extends Seeder
{
    /**
     * Ejecuta los seeds (semillas) en la base de datos.
     * Este método se llama cuando ejecutas `php artisan db:seed`.
     */
    public function run(): void
    {
        // Usamos el método `truncate()` para vaciar la tabla cada vez que ejecutamos el seeder.
        // Esto evita duplicar productos si lo ejecutamos varias veces.
        Product::truncate();

        // Creamos el primer producto usando el método `create` del modelo.
        // Este método acepta un array con los campos a rellenar (los que definimos en la propiedad `$fillable` del modelo).
        Product::create([
            'name' => 'Windows 11 Pro',
            'slug' => 'windows-11-pro', // El slug es la URL amigable.
            'description' => "La versión más potente de Windows 11, diseñada para profesionales y empresas. Ofrece características avanzadas de seguridad, gestión y productividad para los usuarios más exigentes.\n\n- Cifrado de dispositivo BitLocker.\n- Windows Information Protection (WIP).\n- Escritorio Remoto de Windows.",
            'price' => 199.99,
            // Usamos un servicio de placeholder para las imágenes. Esto es muy útil en desarrollo.
            'image_url' => 'https://images.unsplash.com/photo-1611242320536-f12d3541249b?q=80&w=1974&auto=format&fit=crop'
        ]);

        // Creamos el segundo producto.
        Product::create([
            'name' => 'Microsoft 365 Personal',
            'slug' => 'microsoft-365-personal',
            'description' => "Una suscripción de 12 meses que incluye las aplicaciones premium de Office, almacenamiento en la nube y seguridad avanzada.\n\n- Word, Excel, PowerPoint y Outlook.\n- 1 TB de almacenamiento en la nube de OneDrive.\n- Para una persona, para usar en múltiples dispositivos.",
            'price' => 69.99,
            'image_url' => 'https://images.unsplash.com/photo-1534972195531-d756b9bfa9f2?q=80&w=2070&auto=format&fit=crop'
        ]);

        // Creamos el tercer producto.
        Product::create([
            'name' => 'Adobe Photoshop',
            'slug' => 'adobe-photoshop',
            'description' => 'El mejor software de edición de imágenes y diseño gráfico del mundo. Ideal para fotógrafos, diseñadores y artistas digitales.',
            'price' => 239.88,
            'image_url' => 'https://imgproxy.domestika.org/unsafe/w:1200/rs:fill/plain/src://blog-post-open-graph-covers/000/009/213/9213-original.jpg?1635236344'
        ]);
    }
}