<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Siembra la base de datos de la aplicación.
     *
     * Este es el punto de entrada principal para los seeders. Cuando ejecutas `php artisan db:seed`,
     * Laravel invoca el método `run()` de esta clase.
     */
    public function run(): void
    {
        // La directiva `$this->call()` ejecuta otros seeders.
        // Aquí, le estamos diciendo a Laravel que ejecute nuestro `ProductSeeder`,
        // lo que a su vez creará los productos de ejemplo en la base de datos.
        $this->call([
            ProductSeeder::class,
        ]);

        // Puedes añadir más seeders aquí en el futuro, por ejemplo, para crear usuarios de prueba:
        // \App\Models\User::factory(10)->create();
    }
}