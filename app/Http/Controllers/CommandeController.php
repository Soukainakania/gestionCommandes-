<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Produit;
use App\Models\DetailCommande;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    // Afficher toutes les commandes avec pagination
    public function index()
    {
        $commandes = Commande::with('client')->paginate(10);
        return view('commandes.index', compact('commandes'));
    }

    // Formulaire pour créer une nouvelle commande
    public function create()
    {
        $clients = Client::all(); // pour sélectionner le client
        $produits = Produit::all(); // pour ajouter produits
        return view('commandes.create', compact('clients', 'produits'));
    }

    // Enregistrer une nouvelle commande
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_commande' => 'required|date',
            'produits' => 'required|array',
            'quantites' => 'required|array'
        ]);

        $commande = Commande::create([
            'client_id' => $request->client_id,
            'date_commande' => $request->date_commande
        ]);

        foreach ($request->produits as $index => $produit_id) {
            $produit = Produit::find($produit_id);
            DetailCommande::create([
                'commande_id' => $commande->id,
                'produit_id' => $produit->id,
                'quantite' => $request->quantites[$index],
                'prix' => $produit->prix
            ]);
        }

        return redirect()->route('commandes.index');
    }

    // Formulaire pour modifier une commande
    public function edit($id)
    {
        $commande = Commande::with('details.produit')->findOrFail($id);
        $clients = Client::all();
        $produits = Produit::all();
        return view('commandes.edit', compact('commande', 'clients', 'produits'));
    }

    // Mettre à jour une commande existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date_commande' => 'required|date'
        ]);

        $commande = Commande::findOrFail($id);
        $commande->update([
            'client_id' => $request->client_id,
            'date_commande' => $request->date_commande
        ]);

        // Supprimer les anciens détails
        $commande->details()->delete();

        // Ajouter les nouveaux détails
        if($request->has('produits')) {
            foreach ($request->produits as $index => $produit_id) {
                $produit = Produit::find($produit_id);
                DetailCommande::create([
                    'commande_id' => $commande->id,
                    'produit_id' => $produit->id,
                    'quantite' => $request->quantites[$index],
                    'prix' => $produit->prix
                ]);
            }
        }

        return redirect()->route('commandes.index');
    }

    // Supprimer une commande
    public function destroy($id)
    {
        Commande::destroy($id);
        return redirect()->route('commandes.index');
    }

    // Afficher les détails d'une commande
    public function show($id)
    {
        $commande = Commande::with('details.produit', 'client')->findOrFail($id);
        return view('commandes.show', compact('commande'));
    }

    // Statistiques: commandes par client et chiffre d'affaire par produit
    public function statistiques()
    {
        $commandesParClient = DB::table('commandes')
            ->select('client_id', DB::raw('count(*) as total'))
            ->groupBy('client_id')
            ->get();

        $chiffreAffaire = DB::table('detail_commandes')
            ->select('produit_id', DB::raw('SUM(prix * quantite) as total'))
            ->groupBy('produit_id')
            ->get();

        return view('commandes.stats', compact('commandesParClient', 'chiffreAffaire'));
    }
}
