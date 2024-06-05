@extends('Admin.master')

@section('content')
<div class="container">
    <h1>Factures</h1>
    <a href="" class="btn btn-primary">Créer une nouvelle facture</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reparation ID</th>
                <th>Date</th>
                <th>Montant total</th>
                <th>Client ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factures as $facture)
                <tr>
                    <td>{{ $facture->id }}</td>
                    <td>{{ $facture->reparation_id }}</td>
                    <td>{{ $facture->date }}</td>
                    <td>{{ $facture->total_amount }}</td>
                    <td>{{ $facture->client_id }}</td>
                    <td>
                        <a href="" class="btn btn-info">Voir</a>
                        <a href="" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('factures.pdf', $facture->id) }}" class="btn btn-secondary">Télécharger PDF</a>
                        <form action="" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette facture ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
