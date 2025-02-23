@extends('layouts.app')

@section('content')
<div class="container mt-5" style="text-align: center;">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="me-3">Détails de l'entreprise</h1>
        <a href="" class="btn btn-warning">
            <i class="fas fa-edit"></i> Modifier
        </a>
    </div>

    <div class="card shadow-lg" style="width: 100%; border-radius: 10px;">
        <div class="card-body">
            <p class="card-text">
                <strong>Raison sociale:</strong> WATEC
            </p>
            <hr>
            <p class="card-text">
                <strong>Adresse:</strong> Lot 282 Zone Industriel Sud Ouest Mohammedia
            </p>
            <hr>
            <p class="card-text">
                <i class="fas fa-phone-alt me-2"></i><strong>Tél:</strong> +212 (0) 5 23 30 11 01
            </p>
            <p class="card-text">
                <i class="fas fa-envelope me-2"></i><strong>Email:</strong> info@watec.ma
            </p>
        </div>
    </div>

</div>
@endsection
