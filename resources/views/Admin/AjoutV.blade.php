@extends('Admin.master')

@section('content')
    <div class="container-fluid">
        <section class="table__header">
            <h1>Ajouter un Véhicule</h1>
        </section>
        <section class="table__body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('ajouterVehicule') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="brand">Marque:</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Marque" required>
                </div>
                <div class="form-group">
                    <label for="model">Modèle:</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="Modèle" required>
                </div>
                <div class="form-group">
                    <label for="fuel_type">Type de Carburant:</label>
                    <select class="form-control" id="fuel_type" name="fuel_type" required>
                        <option value="Essence">Essence</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Electrique">Électrique</option>
                        <option value="Hybride">Hybride</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="registration_number">Numéro d'Immatriculation:</label>
                    <input type="text" class="form-control" id="registration_number" name="registration_number"
                        placeholder="Numéro d'Immatriculation" required>
                </div>
                <div class="form-group">
                    <label for="client_id">Client:</label>
                    <select class="form-control" id="client_id" name="client_id" required>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->Nom }} {{ $client->Prenom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Photo du véhicule:</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn ajt">Ajouter</button>
                    <a href="{{ route('admin.vehicules') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </section>
    </div>
@endsection
