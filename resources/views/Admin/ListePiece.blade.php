@extends('Admin.master')
@section('content')
    <div class="container-fluid">
        <h1>Liste des pièces de rechange</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Référence</th>
                    <th>Fournisseur</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Seuil</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pieces as $piece)
                    <tr>
                        <td>{{ $piece->nom }}</td>
                        <td>{{ $piece->reference }}</td>
                        <td>{{ $piece->fournisseur }}</td>
                        <td>{{ $piece->prix }}</td>
                        <td>{{ $piece->quantite }}</td>
                        <td>{{ $piece->seuil }}</td>
                        <td>
                            <a href="{{ route('pieces.edit', $piece->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('pieces.destroy', $piece->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('pieces.create') }}" class="btn btn-success">Ajouter une pièce</a>
    </div>
    <div class="pagination">
        {!! $pieces->links() !!}
    </div>
@endsection
