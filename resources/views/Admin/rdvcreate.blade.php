@extends('Admin.master')

@section('content')
    <div class="container-fluid">
        <h1>Rendez-vous</h1>
        <form action="{{ isset($rendezvous) ? route('rendezvous.update', $rendezvous->id) : route('rendezvous.store') }}" method="POST">
            @csrf
            @if(isset($rendezvous))
                @method('PUT')
            @endif

            <label for="client_id">Client:</label>
            <select name="client_id" id="client_id" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ isset($rendezvous) && $rendezvous->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->Nom }} {{ $client->Prenom }}
                    </option>
                @endforeach
            </select>

            <label for="mec_id">Mécanicien:</label>
            <select name="mec_id" id="mec_id" required>
                @foreach($mecaniciens as $mecanicien)
                    <option value="{{ $mecanicien->id }}" {{ isset($rendezvous) && $rendezvous->mec_id == $mecanicien->id ? 'selected' : '' }}>
                        {{ $mecanicien->Nom }} {{ $mecanicien->Prenom }}
                    </option>
                @endforeach
            </select>

            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="{{ isset($rendezvous) ? $rendezvous->date : '' }}" required>

            <label for="time">Heure:</label>
            <input type="time" name="time" id="time" value="{{ isset($rendezvous) ? $rendezvous->time : '' }}" required>

            <label for="status">Statut:</label>
            <select name="status" id="status" required>
                <option value="confirmé" {{ isset($rendezvous) && $rendezvous->status == 'confirmé' ? 'selected' : '' }}>confirmé</option>
                <option value="Annulé" {{ isset($rendezvous) && $rendezvous->status == 'Annulé' ? 'selected' : '' }}>Annulé</option>
                <option value="en_attente" {{ isset($rendezvous) && $rendezvous->status == 'en_attente' ? 'selected' : '' }}>en attente</option>
            </select>

            <button type="submit">{{ isset($rendezvous) ? 'Modifier' : 'Ajouter' }}</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Mécanicien</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rendezvouses as $rendezvous)
                    <tr>
                        <td>{{ $rendezvous->client->user->Nom }} {{ $rendezvous->client->user->Prenom }}</td>
                        <td>{{ $rendezvous->mecanique->user->Nom }} {{ $rendezvous->mecanique->user->Prenom }}</td>
                        <td>{{ $rendezvous->date }}</td>
                        <td>{{ $rendezvous->time }}</td>
                        <td>{{ $rendezvous->status }}</td>
                        <td>
                            <a href="{{ route('rendezvous.edit', $rendezvous->id) }}">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
