@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
            <h1 class="me-3">Liste des interventions</h1>
            <a href="{{ route('intervention.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Ajouter intervention
            </a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
<div class="table-container">
        <table class="table table-striped table-fixed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Cause</th>
                    <th>Equipe</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Utilisateur</th>
                    <th>Observations</th>
                    <th>Nature terrain</th>
                    <th>Matériels</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($interventions as $intervention)
                    <tr>
                        <td>{{ $intervention->id }}</td>
                        <td>{{ $intervention->libelle }}</td>
                        <td>{{ $intervention->type ? $intervention->type->designation : '' }}</td>
                        <td>{{ $intervention->date_intervention }}</td>
                        <td>{{ $intervention->cause ? $intervention->cause->designation : '' }}</td>
                        <td>{{ $intervention->equipe ? $intervention->equipe->designation : '' }}</td>
                        <td>{{ $intervention->ville ? $intervention->ville->nom : '' }}</td>
                        <td>{{ $intervention->adresse }}</td>
                        <td>{{ $intervention->utilisateur ? $intervention->utilisateur->nom : ''}}
                        </td>
                        <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                        <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                        <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                        <td><a href="{{ route('intervention.edit', ['intervention' => $intervention]) }}"><button
                                    class="btn btn-warning"><i class="fas fa-edit"></i></button></a></td>
                        <td>
                            <form action="{{ route('intervention.delete', ['intervention' => $intervention]) }}"
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
@endsection
