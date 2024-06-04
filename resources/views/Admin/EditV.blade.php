@extends('Admin.master')
@section('content')
    <div class="container">
        <h1>Modifier un véhicule</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('updatevehicule', $vehicule->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="brand">Marque:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $vehicule->brand) }}">
            </div>
            <div class="form-group">
                <label for="model">Modèle:</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $vehicule->model) }}">
            </div>
            <div class="form-group">
                <label for="fuel_type">Type de Carburant:</label>
                <select class="form-control" id="fuel_type" name="fuel_type">
                    <option value="Essence" {{ old('fuel_type', $vehicule->fuel_type) === 'Essence' ? 'selected' : '' }}>Essence</option>
                    <option value="Diesel" {{ old('fuel_type', $vehicule->fuel_type) === 'Diesel' ? 'selected' : '' }}>Diesel</option>
                    <option value="Electrique" {{ old('fuel_type', $vehicule->fuel_type) === 'Electrique' ? 'selected' : '' }}>Électrique</option>
                    <option value="Hybride" {{ old('fuel_type', $vehicule->fuel_type) === 'Hybride' ? 'selected' : '' }}>Hybride</option>
                </select>
            </div>
            <div class="form-group">
                <label for="registration_number">Numéro d'Immatriculation:</label>
                <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ old('registration_number', $vehicule->registration_number) }}">
            </div>
            <button type="submit" class="btn save">Modifier</button>
            <a href="{{ route('admin.vehicules') }}" class="btn">Annuler</a>
        </form>
        <!-- Formulaire de suppression -->
        <form action="{{ route('Vdestroy', $vehicule->id) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn close" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')">Supprimer</button>
        </form>
    </div>
@endsection
