@extends('Admin.master')
@section('content')

<!--- Show Modal--->
<div id="ShowModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Les informations de <span id="userName"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>Adresse:</strong>
                    <span id="userAdresse"></span>
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <span id="userEmail"></span>
                </div>
                <div class="form-group">
                    <strong>Telephone:</strong>
                    <span id="userTel"></span>
                </div>
                <div class="form-group">
                    <strong>Role:</strong>
                    <span id="userrole"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!--- End Show Modal--->

<!-- Edit Client Modal -->
<div id="EditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditModalLabel">Modification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditClientForm">
                    @csrf
                    <div class="form-group">
                        <label for="editNom">Nom</label>
                        <input type="text" class="form-control" id="editNom" name="Nom" required>
                    </div>
                    <div class="form-group">
                        <label for="editPrenom">Prenom</label>
                        <input type="text" class="form-control" id="editPrenom" name="Prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="editusername">UserName</label>
                        <input type="text" class="form-control" id="editusername" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="editAdresse">Adresse :</label>
                        <input type="text" class="form-control" id="editAdresse" name="Adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="editNumeroTelephone">Telephone :</label>
                        <input type="text" class="form-control" id="editNumeroTelephone" name="NumeroTelephone" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Adresse Email :</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="editRole">Role :</label>
                        <input type="text" class="form-control" id="editRole" name="role" required>
                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn save">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Edit Client Modal -->
<!--- Delete Modal--->
<div id="DeleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteModalLabel">Supprimer le client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Etes-vous sûr de vouloir supprimer ce client ?</p>
                <input type="hidden" id="deleteClientId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn supprimer" id="deleteClientBtn">Supprimer</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete Modal -->

<!--- Ajouter client Modal--->

<div id="AjouterModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="AjouterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AjouterModalLabel">Ajouter un client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="errorMessages" class="alert alert-danger" style="display:none;"></div>
                <form id="AjouterClientForm">
                    @csrf
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="Nom">Nom</label>
                        <input type="text" class="form-control" id="Nom" name="Nom" required>
                    </div>
                    <div class="form-group">
                        <label for="Prenom">Prenom</label>
                        <input type="text" class="form-control" id="Prenom" name="Prenom" required>
                    </div>
                    <div class="form-group">
                        <label for="Adresse">Adresse</label>
                        <input type="text" class="form-control" id="Adresse" name="Adresse" required>
                    </div>
                    <div class="form-group">
                        <label for="NumeroTelephone">Numero de Téléphone</label>
                        <input type="text" class="form-control" id="NumeroTelephone" name="NumeroTelephone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Rôle</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="client">Client</option>
                            <option value="admin">Admin</option>
                            <option value="mecanicien">Mécanicien</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn ajt" id="ajouterClientBtn">Ajouter</button>
            </div>
        </div>
    </div>
</div>

<!--- End Ajouter client Modal--->
<div class="container-fluid">
    <section class="table__header">
        <h1>Liste des clients</h1>
        <div class="input-group">
            <input type="search" placeholder="Rechercher..." id="search-input">
        </div>
        <!-- Importation  -->
        <div class="importation">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" id="import-form">
                @csrf
                <input type="file" name="file" id="file-input" style="display: none;">
                <label for="file-input" class="file-input-label">
                    <ion-icon name="cloud-download-outline" style="font-size: 30px; color: #b46f15; cursor: pointer;"></ion-icon>
                </label>
                <button type="submit" id="upload-button" style="display: none;">Upload</button>
            </form>
        </div>
        <!-- Exportation  -->
        <div class="exportation">
            <form action="{{ route('excel.export') }}" method="POST" id="export-form">
                @csrf
                <input type="text" name="name" placeholder="Nom de fichier" class="inpe">
                <button type="submit" id="export-button" style="display: none;">Export</button>
                <label for="export-button" class="export-label">
                    <ion-icon name="cloud-upload-outline" style="font-size: 30px; color: #b46f15; cursor: pointer;"></ion-icon>
                </label>
            </form>
        </div>
        <!-- ajouter un client  -->
        <button type="button" class="btn ajouterClientBtn"  data-toggle="modal" data-target="#AjouterModal">
            <ion-icon name="person-add-outline" style="font-size: 35px; color:#b46f15;"></ion-icon>
        </button>
    </section>

    <section class="table__body">
        <table id="clients-table">
            <thead>
                <tr>
                    <th> Id </th>
                    <th> Nom Complet </th>
                    <th> UserName </th>
                    <th> Adresse</th>
                    <th> Telephone </th>
                    <th> Role </th>
                    <th> Email </th>
                    <th> Actions </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->Nom }} {{ $client->Prenom }}</td>
                    <td>{{ $client->username }}</td>
                    <td>{{ $client->Adresse }}</td>
                    <td>{{ $client->NumeroTelephone }}</td>
                    <td>{{ $client->role }}</td>
                    <td>{{ $client->email }}</td>
                    <td style="display: flex">
                        <button type="button" class="btn showbtn" value="{{ $client->id }}"><ion-icon name="eye-outline" style="color:#c56618; font-size:28px; "></ion-icon></button>
                        <button type="button" class="btn editbtn" value="{{ $client->id }}"><ion-icon name="settings-outline" style="color:#c56618;font-size:28px;" ></ion-icon></button>
                        <button type="button" class="btn deletebtn" value="{{ $client->id }}"><ion-icon name="person-remove-outline"  style="color:#c56618;font-size:28px;" ></ion-icon></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {!! $clients->links() !!}
        </div>
    </section>

</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    // Recherche
    const searchInput = document.getElementById('search-input');
    const table = document.getElementById('clients-table');
    const rows = table.getElementsByTagName('tr');
    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();
        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let showRow = false;
            for (let j = 0; j < cells.length; j++) {
                if (cells[j].innerText.toLowerCase().includes(filter)) {
                    showRow = true;
                    break;
                }
            }
            rows[i].style.display = showRow ? '' : 'none';
        }
    });
});

//Affichage Client
$(document).on('click', '.showbtn', function() {
    var clientId = $(this).val();
    $('#userName').html('');
    $('#userEmail').html('');
    $.ajax({
        type: "GET",
        url: "/admin/ShowClient/" + clientId,
        success: function(response) {
            if (response && response.client) {
                $('#userName').html(response.client.Nom + " " + response.client.Prenom);
                $('#userEmail').html(response.client.email);
                $('#userAdresse').html(response.client.Adresse);
                $('#userrole').html(response.client.role);
                $('#userTel').html(response.client.NumeroTelephone);
                $('#ShowModal').modal('show');
            } else {
                console.error('Invalid response:', response);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });


});
//Modification d'un client
$(document).ready(function() {
    $(document).on('click', '.editbtn', function() {
        var clientId = $(this).val();
        $('#EditModal').modal('show');

        $.ajax({
            type: "GET",
            url: "/admin/ShowClient/" + clientId,
            success: function(response) {
                if (response && response.client) {
                    $('#editNom').val(response.client.Nom);
                    $('#editPrenom').val(response.client.Prenom);
                    $('#editusername').val(response.client.username);
                    $('#editAdresse').val(response.client.Adresse);
                    $('#editNumeroTelephone').val(response.client.NumeroTelephone);
                    $('#editEmail').val(response.client.email);
                    $('#editRole').val(response.client.role);
                    $('#id').val(response.client.id);
                } else {
                    console.error('Invalid response:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    });
    $('#EditClientForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var clientId = $('#id').val();
        $.ajax({
            type: "PUT",
            url: "/admin/EditClient/" + clientId,
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Client updated successfully');
                    location.reload();
                } else {
                    console.error('Update failed:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    });
});
//Suppression d'un client
$(document).ready(function() {
    $(document).on('click', '.deletebtn', function() {
        var clientId = $(this).val();
        $('#deleteClientId').val(clientId);
        $('#DeleteModal').modal('show');
    });
    $('#deleteClientBtn').click(function() {
        var clientId = $('#deleteClientId').val();
        $.ajax({
            type: "DELETE",
            url: "/admin/DeleteClient/" + clientId,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    alert('Client deleted successfully');
                    location.reload();
                } else {
                    console.error('Deletion failed:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    });
});
//Ajouter Client
$(document).ready(function() {
    $('#ajouterClientBtn').click(function() {
        var formData = $('#AjouterClientForm').serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('ajouterClient') }}",
            data: formData,
            success: function(response) {
                console.log('Success:', response);
                $('#AjouterModal').modal('hide');
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMessage += '<p>' + errors[key] + '</p>';
                    }
                }
                $('#errorMessages').html(errorMessage).show();
            }
        });
    });
});
</script>
@endsection
