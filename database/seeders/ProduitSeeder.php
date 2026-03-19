<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;


class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    {
        Produit::factory()->count(15)->create();
    }

    }
}
