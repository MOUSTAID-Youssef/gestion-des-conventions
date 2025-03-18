@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Modifier votre profile:</h1>
            <a href="{{ route('profile.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retourner
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
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')


            <div class="row mb-2">
                <label for="login" class="col-md-4 col-form-label">Login *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="login" name="login"
                        value="{{ Auth::user()->login }}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="nom" class="col-md-4 col-form-label">Nom *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ Auth::user()->nom }}"
                        required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="prenom" class="col-md-4 col-form-label">Prénom *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="prenom" name="prenom"
                        value="{{ Auth::user()->prenom }}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="cin" class="col-md-4 col-form-label">CIN</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="cin" name="cin"
                        value="{{ Auth::user()->cin }}">
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ Auth::user()->email }}">
                </div>
            </div>

            <div class="row mb-2">
                <label for="telephone" class="col-md-4 col-form-label">Téléphone</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="telephone" name="telephone"
                        value="{{ Auth::user()->telephone }}">
                </div>
            </div>

            <div class="row mb-2">
                <label for="adresse" class="col-md-4 col-form-label">Adresse</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="adresse" name="adresse">{{Auth::user()->adresse}}</textarea>
                </div>
            </div>


            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-success w-48">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
            </div>
            <a href="{{ route('password.edit') }}" class="btn btn-warning">
                <i class="fas fa-lock"></i> Changer le mot de passe
            </a>
            
        </form>
    </div>
@endsection
