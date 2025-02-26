@extends('layouts.app')

@section('content')
    <div class="container" style="text-align: center;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3" style="font-size: 28px; font-weight: 600;">Détails de l'utilisateur: <span style="color: #007bff;">{{ $utilisateur->login }}</span></h1>
            <a href="{{ route('utilisateur.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
    
        <div class="card shadow-2xl" style="max-width: 850px; margin: 0 auto; border-radius: 20px; padding: 25px; background: linear-gradient(145deg, #f3f4f7, #e1e3f3); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>ID: </strong>{{ $utilisateur->id }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Nom: </strong>{{ $utilisateur->nom }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Prénom: </strong>{{ $utilisateur->prenom }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>CIN: </strong>{{ $utilisateur->cin }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Login: </strong>{{ $utilisateur->login }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Email: </strong>{{ $utilisateur->email }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Téléphone: </strong>{{ $utilisateur->telephone }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Adresse: </strong>{{ $utilisateur->adresse }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Ville: </strong>{{ $utilisateur->ville ? $utilisateur->ville->nom : 'Non renseignée' }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>Privilège: </strong>{{ $utilisateur->privilege }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #333; margin-bottom: 10px;">
                    <strong>État: </strong>{{ $utilisateur->etat }}
                </p>

                <div class="mt-2">
                    <a href="{{ route('utilisateur.edit', ['utilisateur' => $utilisateur]) }}" class="btn btn-warning btn-lg" style="border-radius: 25px; padding: 12px 30px; background-color: #ffc107; border: none; color: white; font-weight: bold; transition: background-color 0.3s ease;">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
