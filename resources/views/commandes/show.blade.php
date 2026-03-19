
@extends('layouts.app')

@section('title', 'Détails commande')

@section('content')

<h1>Détails de la commande #{{ $commande->id }}</h1>

<a href="{{ route('commandes.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

<p><strong>Client:</strong> {{ $commande->client->nom }}</p>
<p><strong>Date:</strong> {{ $commande->date_commande }}</p>

<h4>Produits:</h4>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    @foreach($commande->details as $detail)
        <tr>
            <td>{{ $detail->produit->nom }}</td>
            <td>{{ $detail->quantite }}</td>
            <td>{{ $detail->prix }}</td>
            <td>{{ $detail->quantite * $detail->prix }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection