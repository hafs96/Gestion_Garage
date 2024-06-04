@extends('Admin.master')
@section('content')
    <div class="container-fluid">
        <section class="table__header">
            <h1>Ajouter une Vehicule</h1>
        </section>
        <section class="table__body">
            <!--- End Ajouter client Modal--->
            <!-- Modal ajouter un véhicule --><!-- Modal ajouter un véhicule -->
            <form action="{{ route('ajouterVehicule') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="brand">Marque:</label>
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Marque" required>
                </div>
                <div class="form-group">
                    <label for="model">Modèle:</label>
                    <input type="text" class="form-control" id="model" name="model" placeholder="Modele" required>
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
                <!-- Selectionner les clients -->
                <div class="form-group">
                    <label for="client_id">Client:</label>
                    <select class="form-control" id="client_id" name="client_id" required>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->Nom }} {{ $client->Prenom }}</option>
                        @endforeach
                    </select>
                    <!-- ajouter un client si n'existe pas  -->
                    <button type="button" class="btn showAddClientModal" data-toggle="modal"
                        data-target="#AjouterModal">
                        Ajouter Client
                    </button>
                </div>
    </div>
    <div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn ajt">Ajouter</button>
    </div>
    </form>
    </section>
    </div>
@endsection
