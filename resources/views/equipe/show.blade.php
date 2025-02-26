@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3">Les membres de <span style="color: #007bff;">{{ $equipe->designation }}</span></h1>
            <a href="{{ route('equipe.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retourner à la Liste des équipes
            </a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('equipe.attacherMembre', $equipe->id) }}" method="POST">
            @csrf
            <div class="mb-3 d-flex align-items-center justify-content-center">
                <select name="membre_id" id="membre" class="form-select me-2 w-auto" required>
                    <option value="">Sélectionner un membre</option>
                    @foreach ($membresDisponibles as $membre)
                        @if (!$equipe->membres->contains($membre))
                            <option value="{{ $membre->id }}">{{ $membre->nom }} {{ $membre->prenom }}</option>
                        @endif
                    @endforeach
                </select>   
                <button type="submit" class="btn btn-success mt-2">
                    attacher à l'équipe
                </button>
            </div>
        </form>
        <table class="table table-striped table-fixed">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>CIN</th>
                    <th>Télephone</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>ville</th>
                    <th>statut</th>
                    <th>Détacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($membres as $membre)
                    <tr>
                        <td>{{ $membre->nom }}</td>
                        <td>{{ $membre->prenom }}</td>
                        <td>{{ $membre->cin }}</td>
                        <td>{{ $membre->telephone }}</td>
                        <td>{{ $membre->email }}</td>
                        <td>{{ $membre->adresse }}</td>
                        <td>{{ $membre->ville->nom }}</td>
                        <td>{{ $membre->statut }}</td>
                        <td>
                            <form action="{{ route('equipe.detacherMembre', [$equipe->id, $membre->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    détacher
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
