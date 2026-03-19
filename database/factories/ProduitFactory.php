<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    protected $model = \App\Models\Produit::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'prix' => $this->faker->numberBetween(50, 500),
            'stock' => $this->faker->numberBetween(10, 100),
        ];
    }
}
