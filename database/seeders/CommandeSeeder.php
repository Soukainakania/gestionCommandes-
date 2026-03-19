<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;

class CommandeSeeder extends Seeder
{
    public function run()
    {
        $clients = Client::all();
        $produits = Produit::all();

        foreach ($clients as $client) {
            $nbCommandes = rand(1, 3); // كل client عنده 1-3 commandes
            for ($i = 0; $i < $nbCommandes; $i++) {
                $commande = Commande::create([
                    'client_id' => $client->id,
                    'date_commande' => now()->subDays(rand(0, 30)),
                ]);

                // كل commande عندها 1-5 produits
                $commandesProduits = $produits->random(rand(1,5));
                foreach ($commandesProduits as $produit) {
                    $commande->details()->create([
                        'produit_id' => $produit->id,
                        'quantite' => rand(1,5),
                        'prix' => $produit->prix,
                    ]);
                }
            }
        }
    }
}
