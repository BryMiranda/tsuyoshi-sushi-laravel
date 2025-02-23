<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $productos = [
            [
                'nombre' => 'Sushi Clásico',
                'descripcion' => 'Delicioso sushi tradicional preparado con pescado fresco.',
                'precio' => 10.50,
                'stock' => 50,
            ],
            [
                'nombre' => 'Sashimi Especial',
                'descripcion' => 'Cortes de pescado premium para un sashimi exquisito.',
                'precio' => 15.75,
                'stock' => 40,
            ],
            [
                'nombre' => 'Ramen de Cerdo',
                'descripcion' => 'Ramen con caldo concentrado y tierno cerdo en rodajas.',
                'precio' => 12.00,
                'stock' => 30,
            ],
            [
                'nombre' => 'Tempura Mixta',
                'descripcion' => 'Variedad de mariscos y vegetales en un crujiente rebozado.',
                'precio' => 9.25,
                'stock' => 60,
            ],
            [
                'nombre' => 'Roll de California',
                'descripcion' => 'Roll clásico con aguacate, surimi y pepino.',
                'precio' => 8.50,
                'stock' => 70,
            ],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
