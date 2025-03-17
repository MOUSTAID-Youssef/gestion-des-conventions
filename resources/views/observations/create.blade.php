@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1>Ajouter une observation pour l'intervention N° <span style="color: #007bff;">{{ $intervention->id }}</span></h1>
            <a href="{{ route('observations.index', $intervention->id) }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>

        <form action="{{ route('observations.store', $intervention->id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="designation">Désignation</label>
                <textarea name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" rows="3" required>{{ old('designation') }}</textarea>
                @error('designation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-save"></i> Enregistrer
            </button>
        </form>
    </div>
@endsection