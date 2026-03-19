@extends('layouts.app')

@section('title', 'Ajouter commande')

@section('content')

<h1 class="mb-4">Ajouter une nouvelle commande</h1>

<a href="{{ route('commandes.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

<form method="POST" action="{{ route('commandes.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Client:</label>
        <select name="client_id" class="form-select">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nom }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Date commande:</label>
        <input type="date" name="date_commande" class="form-control" required>
    </div>

    <h4>Produits:</h4>
    @foreach($produits as $produit)
    <div class="form-check mb-1">
        <input class="form-check-input" type="checkbox" name="produits[]" value="{{ $produit->id }}" id="prod{{ $produit->id }}">
        <label class="form-check-label" for="prod{{ $produit->id }}">{{ $produit->nom }}</label>
        <input type="number" name="quantites[]" value="1" min="1" class="form-control w-auto d-inline ms-2">
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
</form>

@endsection
