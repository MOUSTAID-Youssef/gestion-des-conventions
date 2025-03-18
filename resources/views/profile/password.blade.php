@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Changer votre mot de passe :</h1>
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

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-2">
                <label for="old_password" class="col-md-4 col-form-label">Ancien mot de passe *</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" id="old_password" name="old_password" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="new_password" class="col-md-4 col-form-label">Nouveau mot de passe *</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="new_password_confirmation" class="col-md-4 col-form-label">Confirmer le mot de passe *</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-success w-48">
                    <i class="fas fa-save"></i> Changer le mot de passe
                </button>
            </div>
        </form>
    </div>
@endsection
