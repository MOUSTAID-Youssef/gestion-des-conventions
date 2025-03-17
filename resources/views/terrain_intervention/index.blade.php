@extends('layouts.app')

@section('content')
    <div style="margin-left: 18px; text-align:center">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1>Terrains de l'intervention N° <span style="color: #007bff;">{{ $intervention->id }}</span></h1>
            <a href="{{ route('intervention.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Retouner à la liste des interventions
            </a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Formulaire d'ajout -->
        <form action="{{ route('terrain_intervention.store', $intervention->id) }}" method="POST" class="mb-4">
            @csrf
            <div class="row g-3 align-items-end">
                <div class="col-md-8">
                    <select name="terrain_id" id="terrain_id" class="form-select" required>
                        <option value="">Sélectionner un materiél</option>
                        @foreach ($availableTerrains as $terrain)
                            <option value="{{ $terrain->id }}">{{ $terrain->designation }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fa-solid fa-plus"></i> Ajouter
                    </button>
                </div>
            </div>
        </form>

        <!-- Tableau des terrains -->
        @if ($intervention->terrains->isEmpty())
        <p class="alert alert-warning" style="background-color: #f8d7da; color: #721c24;">Aucun Terrain affecté à cette intervention.</p>
        @else
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Désignation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($intervention->terrains as $terrain)
                            <tr>
                                <td>{{ $terrain->id }}</td>
                                <td>{{ $terrain->designation }}</td>
                                <td>
                                    <form action="{{ route('terrain_intervention.destroy', [$intervention->id, $terrain->id]) }}" method="POST">
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