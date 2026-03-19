@extends('layouts.app')

@section('title', 'Liste des commandes')

@section('content')

<h1 class="mb-4">Liste des commandes</h1>

<div class="mb-3">
    <a href="{{ route('commandes.create') }}" class="btn btn-primary">Ajouter une commande</a>
    <a href="{{ url('/statistiques') }}" class="btn btn-success">Voir statistiques</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Date commande</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($commandes as $commande)
        <tr>
            <td>{{ $commande->id }}</td>
            <td>{{ $commande->client->nom }}</td>
            <td>{{ $commande->date_commande }}</td>
            <td>
                <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form method="POST" action="{{ route('commandes.destroy', $commande->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette commande ?')">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $commandes->links('pagination::bootstrap-5') }}
</div>

@endsection