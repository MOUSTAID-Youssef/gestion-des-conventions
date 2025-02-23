@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; ">
    <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
        <h1 class="me-3">Ajouter un utilisateur</h1>
        <a href="{{ route('utilisateur.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
    </div>

    {{-- <form action="{{ route('users.store') }}" method="POST"> --}}
        <form action="" method="POST">
        @csrf
        <div class="mb-1">
            <label for="name" class="form-label">Nom *</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-1">
            <label for="first_name" class="form-label">Prénom *</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>

        <div class="mb-1">
            <label for="login" class="form-label">Login *</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>

        <div class="mb-1">
            <label for="password" class="form-label">Mot de passe *</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-1">
            <label for="cin" class="form-label">CIN</label>
            <input type="text" class="form-control" id="cin" name="cin">
        </div>

        <div class="mb-1">
            <label for="phone" class="form-label">Tél</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="mb-1">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-1">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>

        <div class="mb-1">
            <label for="city" class="form-label">Ville</label>
            <select class="form-select" id="city" name="city" required>
                <option value="Agadir" selected>Agadir</option>
                <option value="Casablanca">Casablanca</option>
                <option value="Fès">Fès</option>
                <option value="Marrakech">Marrakech</option>
                <option value="Rabat">Rabat</option>
            </select>
        </div>

        <div class="mb-1">
            <label for="privilege" class="form-label">Privilège</label>
            <select class="form-select" id="privilege" name="privilege" required>
                <option value="user" selected>User</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>

        <div class="mb-1">
            <label for="status" class="form-label">Etat</label>
            <select class="form-select" id="status" name="status" required>
                <option value="actif">Actif</option>
                <option value="inactif">Inactif</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
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
