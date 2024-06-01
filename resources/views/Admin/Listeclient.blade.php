@extends('Admin.master')
@section('content')
<div class="container">
    <section class="table__header">
        <h1>Liste des clients </h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data..." id="search-input">
        </div>
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
        <div>
           <a href="{{route('AjouterClt')}}">
                <ion-icon name="person-add-outline" style="font-size: 35px; color:#b46f15;"></ion-icon>
            </a>
        </div>
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
                    <td> {{ $client->id }} </td>
                    <td> {{ $client->Nom }} {{ $client->Prenom}} </td>
                    <td> {{ $client->username }} </td>
                    <td> {{ $client->Adresse }}</td>
                    <td> {{ $client->NumeroTelephone }} </td>
                    <td> {{ $client->role }} </td>
                    <td> {{ $client->email }} </td>
                    <td>
                        <button class="show-btn" data-client-id="{{ $client->id }}">Afficher</button>
                        <button class="edit-btn" data-client-id="{{ $client->id }}">Modifier</button>
                        @can('client-delete')
                        <a class="btn btn-danger" date-toggle="modal" data-target="#ModalDelete{{ $client->id }}">Supprimer</a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {!! $clients->links() !!}
        </div>
        @include('Admin.modals.delete')

    </section>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('file-input');
        const uploadButton = document.getElementById('upload-button');
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                uploadButton.click();
            }
        });
        const exportButton = document.querySelector('.export-label');
        exportButton.addEventListener('click', function() {
            document.getElementById('export-button').click();
        });
        const searchInput = document.getElementById('search-input');
        const table = document.getElementById('clients-table');
        const rows = table.getElementsByTagName('tr');
        searchInput.addEventListener('keyup', function() {
            const filter = searchInput.value.toLowerCase();
            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let showRow = false;
                for (let j = 0; j < cells.length - 1; j++) {
                    if (cells[j].innerText.toLowerCase().includes(filter)) {
                        showRow = true;
                        break;
                    }
                }
                rows[i].style.display = showRow ? '' : 'none';
            }
        });
    });
    </script>
@endsection
