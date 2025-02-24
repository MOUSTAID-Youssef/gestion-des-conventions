@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Modifier cause d'intervention: <span style="color: blue;">{{ $cause->designation }}</span>
            </h1>
            <a href="{{ route('cause.index') }}" class="btn btn-primary">
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

        <form action="{{ route('cause.update', ['cause' => $cause]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-2">
                <label for="designation" class="col-md-4 col-form-label">Désignation *</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="designation" name="designation" value="{{ $cause->designation }}"
                        required>
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
