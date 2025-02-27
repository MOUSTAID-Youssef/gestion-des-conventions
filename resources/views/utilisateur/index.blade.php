@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
            <h1 class="me-3">Liste des utilisateurs</h1>
            <a href="{{ route('utilisateur.create') }}" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Ajouter utilisateur
            </a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($utilisateurs->isEmpty())
        <p class="alert alert-warning" style="background-color: #f8d7da; color: #721c24;">La liste est vide</p>
    @else
        <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Login</th>
                    <th>Privilège</th>
                    <th>Ville</th>
                    <th>Etat</th>
                    <th>Consulter</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($utilisateurs as $utilisateur)
                    <tr>
                        <td>{{ $utilisateur->id }}</td>
                        <td>{{ $utilisateur->nom }}</td>
                        <td>{{ $utilisateur->prenom }}</td>
                        <td>{{ $utilisateur->login }}</td>
                        <td>{{ $utilisateur->privilege }}</td>
                        <td>{{ $utilisateur->ville ? $utilisateur->ville->nom : '' }}</td>
                        <td>{{ $utilisateur->etat }}</td>
                        <td><a href="{{ route('utilisateur.show', ['utilisateur' => $utilisateur]) }}"
                                class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                        <td><a href="{{ route('utilisateur.edit', ['utilisateur' => $utilisateur]) }}"><button
                                    class="btn btn-warning"><i class="fas fa-edit"></i></button></a></td>
                        <td>
                            <form action="{{ route('utilisateur.delete', ['utilisateur' => $utilisateur]) }}"
                                method="POST">
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
