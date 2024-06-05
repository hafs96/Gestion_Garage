@extends('Admin.master')

@section('content')
    <div class="container-fluid">
        <h1>Notifications de stock faible</h1>
        @foreach($notifications as $notification)
            <div class="alert alert-warning" role="alert">
                <strong>Stock bas:</strong> {{ $notification->nom }} - Stock: {{ $notification->quantite }} Seuil: {{ $notification->seuil }}
                <form action="{{ route('pieces.replenish', ['id' => $notification->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn ajt">Réapprovisionner le stock</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
