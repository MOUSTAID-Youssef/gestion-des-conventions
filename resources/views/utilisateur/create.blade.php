@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Ajouter un utilisateur</h1>
            <a href="{{ route('utilisateur.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
        @if ($errors->any())
            <div>
                <ul style="color: red; font-weight: bold;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}⚠</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('utilisateur.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <label for="nom" class="col-md-4 col-form-label">Nom *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="prenom" class="col-md-4 col-form-label">Prénom *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="login" class="col-md-4 col-form-label">Login *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="login" name="login" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="password" class="col-md-4 col-form-label">Mot de passe *</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="cin" class="col-md-4 col-form-label">CIN</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="cin" name="cin">
                </div>
            </div>

            <div class="row mb-2">
                <label for="telephone" class="col-md-4 col-form-label">Télephone</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="telephone" name="telephone">
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>

            <div class="row mb-2">
                <label for="adresse" class="col-md-4 col-form-label">Adresse</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="adresse" name="adresse"></textarea>
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

            <div class="row mb-2">
                <label for="privilege" class="col-md-4 col-form-label">Privilège</label>
                <div class="col-md-8">
                    <select class="form-select" id="privilege" name="privilege" required>
                        <option value="user" selected>User</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="etat" class="col-md-4 col-form-label">État</label>
                <div class="col-md-8">
                    <select class="form-select" id="etat" name="etat" required>
                        <option value="actif">Actif</option>
                        <option value="inactif">Inactif</option>
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
