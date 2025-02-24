@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Modifier le membre: <span style="color: blue;">{{ $membre->nom }} {{ $membre->prenom }}</span>
            </h1>
            <a href="{{ route('membre.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>

        @if ($errors->any())
            <div>
                <ul style="color: red; font-weight: bold;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('membre.update', ['membre' => $membre]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-2">
                <label for="nom" class="col-md-4 col-form-label">Nom *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $membre->nom }}"
                        required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="prenom" class="col-md-4 col-form-label">Prénom *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $membre->prenom }}"
                        required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="cin" class="col-md-4 col-form-label">CIN</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="cin" name="cin" value="{{ $membre->cin }}">
                </div>
            </div>

            <div class="row mb-2">
                <label for="telephone" class="col-md-4 col-form-label">Télephone</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="telephone" name="telephone"
                        value="{{ $membre->telephone }}">
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $membre->email }}">
                </div>
            </div>

            <div class="row mb-2">
                <label for="adresse" class="col-md-4 col-form-label">Adresse</label>
                <div class="col-md-8">
                    <textarea type="text" class="form-control" id="adresse" name="adresse">{{ $membre->adresse }}</textarea>
                </div>
            </div>

            <div class="row mb-2">
                <label for="id_ville" class="col-md-4 col-form-label">Ville</label>
                <div class="col-md-8">
                    <select class="form-select" name="id_ville" id="id_ville" required>
                        @foreach ($villes as $ville)
                            <option value="{{ $ville->id }}" 
                                {{$membre->id_ville == $ville->id ? 'selected' : '' }}>
                                {{ $ville->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="statut" class="col-md-4 col-form-label">Statut</label>
                <div class="col-md-8">
                    <select class="form-select" id="statut" name="statut" required>
                        <option value="membre" {{$membre->statut == 'membre' ? 'selected' : ''}}>membre</option>
                        <option value="chef" {{$membre->statut == 'chef' ? 'selected' : ''}}>chef</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-success w-48">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>
@endsection
