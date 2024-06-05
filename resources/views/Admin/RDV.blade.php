@extends('Admin.master')
@section('content')
    <div class="container-fluid">
        <h1>Gérer les rendez-vous</h1>
        <a href="{{ route('rdvcreate') }}" class="btn btn-primary mb-3">Créer un nouveau rendez-vous</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Mécanicien</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rendezvouses as $rdv)
                    <tr>
                        <th scope="row">{{ $rdv->id }}</th>
                        <td>{{ $rdv->client->user->Nom }} {{ $rdv->client->user->Prenom }}</td>
                        <td>{{ $rdv->mecanique->user->Nom }} {{ $rdv->mecanique->user->Prenom }}</td>
                        <td>{{ $rdv->date }}</td>
                        <td>{{ $rdv->time }}</td>
                        <td>{{ $rdv->status }}</td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">Afficher</a>
                            <a href="" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rendez-vous ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
