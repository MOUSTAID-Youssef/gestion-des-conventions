@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="text-align: center;">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Détails de l'entreprise</h1>
            @if(Auth::user()->privilege == 'admin')
            <a href="{{ route('informations.edit', ['informations' => $informations]) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Modifier
            </a>
            @endif
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="card shadow-lg" style="width: 100%; border-radius: 10px;">
            <div class="card-body">
                <p class="card-text">
                    <strong>Raison sociale: </strong>{{ $informations->raison_sociale}}
                </p>
                <hr>
                <p class="card-text">
                    <strong>Adresse: </strong>{{ $informations->adresse}}
                </p>
                <hr>
                <p class="card-text">
                    <i class="fas fa-phone-alt me-2"></i><strong>Tél: (+212) </strong>{{ $informations->telephone}}
                </p>
                <p class="card-text">
                    <i class="fas fa-envelope me-2"></i><strong>Email: </strong>{{ $informations->email}}
                </p>
            </div>
        </div>

    </div>
@endsection
