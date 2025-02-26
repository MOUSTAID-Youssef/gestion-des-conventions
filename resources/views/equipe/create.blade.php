@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Ajouter une equipe</h1>
            <a href="{{ route('equipe.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
        <div>
            @if($errors->any())
            <ul style="color: red; font-weight: bold;">
                @foreach($errors->all() as $error)
                <li>{{ $error }} ⚠</li>
                @endforeach
            </ul>
            @endif
        </div>  
        <form action="{{ route('equipe.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <label for="designation" class="col-md-4 col-form-label">Désignation *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="designation" name="designation" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="id_ville" class="col-md-4 col-form-label">Ville</label>
                <div class="col-md-8">
                    <select class="form-select" name="id_ville" id="id_ville" required>
                        @foreach ($villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="reset" class="btn btn-secondary w-48">
                    <i class="fas fa-undo"></i> Réinitialiser
                </button>
                <button type="submit" class="btn btn-success w-48">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>
@endsection
