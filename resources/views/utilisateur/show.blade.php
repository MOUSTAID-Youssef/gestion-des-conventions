@extends('layouts.app')

@section('content')
    <div class="container text-center pt-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3" style="font-size: 28px; font-weight: 700; color: #333; margin-bottom: 20px;">
                Détails de l'utilisateur: <span style="color: #007bff;">{{ $utilisateur->login }}</span>
            </h1>
            <a href="{{ route('utilisateur.index') }}" class="btn btn-outline-primary" style="border-radius: 30px; padding: 10px 30px; background-color: #ff9800; border: none; color: white; font-weight: bold; transition: background-color 0.3s ease;">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>

        <div class="card shadow-lg mx-auto" style="max-width: 850px; border-radius: 15px; padding: 30px; background: linear-gradient(135deg, #ffffff, #f0f2f5); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);">
            <div class="card-body">
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>ID: </strong>{{ $utilisateur->id }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Nom: </strong>{{ $utilisateur->nom }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Prénom: </strong>{{ $utilisateur->prenom }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>CIN: </strong>{{ $utilisateur->cin }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Login: </strong>{{ $utilisateur->login }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Email: </strong>{{ $utilisateur->email }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Téléphone: </strong>{{ $utilisateur->telephone }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Adresse: </strong>{{ $utilisateur->adresse }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Ville: </strong>{{ $utilisateur->ville ? $utilisateur->ville->nom : 'Non renseignée' }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Privilège: </strong>{{ $utilisateur->privilege }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>État: </strong>{{ $utilisateur->etat }}
                </p>

                <div class="mt-3">
                    <a href="{{ route('utilisateur.edit', ['utilisateur' => $utilisateur]) }}" class="btn btn-warning btn-lg" style="border-radius: 30px; padding: 12px 30px; background-color: #ff9800; border: none; color: white; font-weight: bold; transition: all 0.3s ease;">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
