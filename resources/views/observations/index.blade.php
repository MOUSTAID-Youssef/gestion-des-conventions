@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px;text-align:center">

        <!-- Conteneur des boutons en haut -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <a href="{{ route('intervention.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retourner à la liste des interventions
            </a>
            <a href="{{ route('observations.create', $intervention->id) }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Ajouter Observation
            </a>
        </div>

        <h1>Observations de l'intervention N° <span style="color: #007bff;">{{ $intervention->id }}</span></h1>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($intervention->observations->isEmpty())
            <p class="alert alert-warning" style="background-color: #f8d7da; color: #721c24;">Aucune observation disponible
                pour cette intervention.</p>
        @else
            <div class="table-container">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Désignation</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($intervention->observations as $observation)
                            <tr>
                                <td>{{ $observation->id }}</td>
                                <td>{{ $observation->designation }}</td>
                                <td>
                                    <a href="{{ route('observations.edit', [$intervention->id, $observation->id]) }}">
                                        <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('observations.destroy', [$intervention->id, $observation->id]) }}" method="POST">
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
