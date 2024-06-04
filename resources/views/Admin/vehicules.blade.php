@extends('Admin.master')
@section('content')
<div class="container-fluid">
    <section class="table__header">
        <h1>Liste des véhicules</h1>
        <a href="{{route('addV')}}">
            <ion-icon name="add-circle-outline" style="color:#c56618;font-size:28px;"></ion-icon>
        </a>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Type de Carburant</th>
                    <th>Immatriculation</th>
                    <th>Client</th>
                    <th>Photo Vehicule</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($vehicules as $vehicule)
                <tr>
                    <td>{{ $vehicule->id }}</td>
                    <td>{{ $vehicule->brand }}</td>
                    <td>{{ $vehicule->model }}</td>
                    <td>{{ $vehicule->fuel_type }}</td>
                    <td>{{ $vehicule->registration_number }}</td>
                    <td>{{ $vehicule->client->user->Nom }} {{ $vehicule->client->user->Prenom }}</td>
                    <td>
                        @if($vehicule->photo)
                            <img src="{{ $vehicule->photo }}" alt="{{ $vehicule->brand }}" width="100">
                        @else
                            Pas d'image
                        @endif
                    </td>
                    <td>
                        <a href="{{route('editvehicule', $vehicule->id)}}" class="btn"><ion-icon name="settings-outline" style="color:#c56618;font-size:28px;" ></ion-icon></a>
                        <form action="{{route('Vdestroy',$vehicule->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?')"><ion-icon name="trash-outline" style="color:#c56618;font-size:28px;" ></ion-icon></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {!! $vehicules->links() !!}
        </div>
    </section>
    </div>

<script>
     $(document).ready(function() {
        $('#showAddVehicleModal').click(function() {
            if ($('#AjouterModal').hasClass('show')) {
                $('#AjouterModal').modal('hide');
            }
            $('#addVehicleModal').modal('show');
        });
    });
    $(document).ready(function() {
        $('#showAddClientModal').click(function() {
            if ($('#addVehicleModal').hasClass('show')) {
                $('#addVehicleModal').modal('hide');
            }
            $('#AjouterModal').modal('show');
        });
    });
//Ajouter client
$(document).ready(function() {
    // Gérer la soumission du formulaire pour ajouter un véhicule
    $('#ajouterVehiculeBtn').click(function() {
        // Récupérer les données du formulaire
        var formData = $('#ajouterVehiculeForm').serialize();
        $.ajax({
            type: 'POST',
            url: '{{ route("ajouterVehicule") }}',
            data: formData,
            success: function(response) {
                window.location.href = '{{ route("admin.vehicules") }}';
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>
@endsection
