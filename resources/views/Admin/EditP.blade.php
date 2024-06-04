@extends('Admin.master')

@section('content')
    <div class="container-fluid">
        <h1>{{ isset($piece) ? 'Modifier' : 'Ajouter' }} une pièce de rechange</h1>
        <form action="{{ isset($piece) ? route('pieces.update', $piece->id) : route('pieces.store') }}" method="POST">
            @csrf
            @if (isset($piece))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ isset($piece) ? $piece->nom : '' }}" required>
            </div>
            <div class="form-group">
                <label for="reference">Référence</label>
                <input type="text" class="form-control" id="reference" name="reference" value="{{ isset($piece) ? $piece->reference : '' }}" required>
            </div>
            <div class="form-group">
                <label for="fournisseur">Fournisseur</label>
                <input type="text" class="form-control" id="fournisseur" name="fournisseur" value="{{ isset($piece) ? $piece->fournisseur : '' }}" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" value="{{ isset($piece) ? $piece->prix : '' }}" required>
            </div>
            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" class="form-control" id="quantite" name="quantite" value="{{ isset($piece) ? $piece->quantite : '' }}" required>
            </div>
            <div class="form-group">
                <label for="seuil">Seuil</label>
                <input type="number" class="form-control" id="seuil" name="seuil" value="{{ isset($piece) ? $piece->seuil : '' }}" required>
            </div>
            <button type="submit" class="btn ajt">Enregistrer</button>
            <a href="{{ route('listepiece') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection


