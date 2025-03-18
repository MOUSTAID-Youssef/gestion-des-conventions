@extends('layouts.app')

@section('content')
    <div class="container text-center pt-3">
        <h1 style="font-size: 28px; font-weight: 700; color: #333; margin-bottom: 20px;">Détails de votre profil</h1>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card shadow-lg mx-auto"
            style="max-width: 700px; border-radius: 15px; padding: 30px; background: linear-gradient(135deg, #ffffff, #f0f2f5); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);">
            <div class="card-body">
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Login :</strong> {{ Auth::user()->login }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Nom :</strong> {{ Auth::user()->nom }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Prénom :</strong> {{ Auth::user()->prenom }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>CIN :</strong> {{ Auth::user()->cin }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Email :</strong> {{ Auth::user()->email }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Téléphone :</strong> {{ Auth::user()->telephone }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Adresse :</strong> {{ Auth::user()->adresse }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Privilège :</strong> {{ Auth::user()->privilege }}
                </p>

                <div class="mt-3">
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-lg"
                        style="border-radius: 30px; padding: 10px 30px; background-color: #ff9800; border: none; color: white; font-weight: bold; transition: all 0.3s ease;">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
