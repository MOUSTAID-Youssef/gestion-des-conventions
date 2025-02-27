@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
            <h1 class="me-3">Liste des équipes</h1>
            <a href="{{ route('equipe.create') }}" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Ajouter équipe
            </a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($equipes->isEmpty())
        <p class="alert alert-warning" style="background-color: #f8d7da; color: #721c24;">La liste est vide</p>
    @else
        <div class="table-container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Désignation</th>
                    <th>Ville</th>
                    <th>Membres</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipes as $equipe)
                    <tr>
                        <td>{{ $equipe->id }}</td>
                        <td>{{ $equipe->designation }}</td>
                        <td>{{ $equipe->ville ? $equipe->ville->nom : 'N/A' }}</td>
                        <td><a href="{{ route('equipe.show', ['equipe' => $equipe]) }}"
                            class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                        <td><a href="{{ route('equipe.edit', ['equipe' => $equipe]) }}"><button class="btn btn-warning"><i
                                        class="fas fa-edit"></i></button></a></td>
                        <td>
                            <form action="{{ route('equipe.delete', ['equipe' => $equipe]) }}" method="POST">
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