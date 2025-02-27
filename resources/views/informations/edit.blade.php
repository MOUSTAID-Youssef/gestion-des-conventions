@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Modifier les informations</h1>
            <a href="{{ route('informations.index') }}" class="btn btn-primary">
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
        <form action="{{ route('informations.update', ['informations' => $informations]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-2">
                <label for="raison_sociale" class="col-md-4 col-form-label">Raison Sociale *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="raison_sociale" name="raison_sociale"
                        value="{{ $informations->raison_sociale }}" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="adresse" class="col-md-4 col-form-label">Adresse*</label>
                <div class="col-md-8">
                    <textarea type="text" class="form-control" id="adresse" name="adresse">{{ $informations->adresse }}</textarea>
                </div>
            </div>

            <div class="row mb-2">
                <label for="telephone" class="col-md-4 col-form-label">Téléphone*</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="telephone" name="telephone"
                        value="{{ $informations->telephone }}">
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-md-4 col-form-label">Email*</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $informations->email }}">
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
