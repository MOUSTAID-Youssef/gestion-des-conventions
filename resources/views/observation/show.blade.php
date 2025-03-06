@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <h1>Détails de l'observation</h1>
        <p><strong>ID de l'intervention:</strong> {{ $observation->id_intervention }}</p>
        <p><strong>Désignation:</strong> {{ $observation->designation }}</p>
        <p><strong>Date de création:</strong> {{ $observation->created_at }}</p>
        <p><strong>Date de mise à jour:</strong> {{ $observation->updated_at }}</p>

        <a href="{{ route('intervention.index') }}" class="btn btn-secondary">Retour à la liste des interventions</a>
    </div>
@endsection
