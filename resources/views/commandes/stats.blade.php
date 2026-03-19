@extends('layouts.app')

@section('title', 'Statistiques Commandes')

@section('content')

<h1>Statistiques Commandes</h1>

<a href="{{ route('commandes.index') }}" class="btn btn-secondary mb-3">Retour à la liste</a>

<h4>Commandes par client:</h4>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Client ID</th>
            <th>Nombre de commandes</th>
        </tr>
    </thead>
    <tbody>
    @foreach($commandesParClient as $c)
        <tr>
            <td>{{ $c->client_id }}</td>
            <td>{{ $c->total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h4 class="mt-4">Chiffre d'affaire par produit:</h4>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Produit ID</th>
            <th>Total CA</th>
        </tr>
    </thead>
    <tbody>
    @foreach($chiffreAffaire as $p)
        <tr>
            <td>{{ $p->produit_id }}</td>
            <td>{{ $p->total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection