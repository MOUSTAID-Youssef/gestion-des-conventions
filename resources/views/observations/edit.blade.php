@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1>Modifier l'observation N° <span style="color: #007bff;">{{ $observation->id }}</span></h1>
            <a href="{{ route('observations.index', $intervention->id) }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>

        <form action="{{ route('observations.update', [$intervention->id, $observation->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="designation">Désignation</label>
                <textarea name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" rows="3" required>{{ old('designation', $observation->designation) }}</textarea>
                @error('designation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-save"></i> Mettre à jour
            </button>
        </form>
    </div>
@endsection