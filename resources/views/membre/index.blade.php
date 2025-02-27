@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
            <h1 class="me-3">Liste des membres</h1>
            <a href="{{ route('membre.create') }}" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Ajouter membre
            </a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($membres->isEmpty())
        <p class="alert alert-warning" style="background-color: #f8d7da; color: #721c24;">La liste est vide</p>
    @else
        <div class="table-container">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>CIN</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Statut</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
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
                            <td>{{ $membre->ville ? $membre->ville->nom : '' }}</td>
                            <td>{{ $membre->statut }}</td>
                            <td><a href="{{ route('membre.edit', ['membre' => $membre]) }}"><button
                                        class="btn btn-warning"><i class="fas fa-edit"></i></button></a></td>
                            <td>
                                <form action="{{ route('membre.delete', ['membre' => $membre]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
