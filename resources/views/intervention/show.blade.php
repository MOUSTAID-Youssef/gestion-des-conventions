@extends('layouts.app')

@section('content')
    <div class="container text-center pt-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="me-3" style="font-size: 28px; font-weight: 700; color: #333; margin-bottom: 20px;">
                Détails de l'intervention: <span style="color: #007bff;">{{ $intervention->id }}</span>
            </h1>
            <a href="{{ route('intervention.index') }}" class="btn btn-outline-primary"
                style="border-radius: 30px; padding: 10px 30px; background-color: #ff9800; border: none; color: white; font-weight: bold; transition: background-color 0.3s ease;">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
        <div class="mt-3">
            <a href="{{ route('intervention.exportPDF', ['id' => $intervention->id]) }}" class="btn btn-success btn-lg"
                style="border-radius: 30px; padding: 12px 30px; background-color: #4caf50; border: none; color: white; font-weight: bold; transition: all 0.3s ease;">
                <i class="fas fa-file-pdf"></i> Imprimer en PDF
            </a>
        </div>
        <br>
        <div class="card shadow-lg mx-auto"
            style="max-width: 850px; border-radius: 15px; padding: 30px; background: linear-gradient(135deg, #ffffff, #f0f2f5); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);">
            <div class="card-body">

                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Utilisateur: </strong>{{ $intervention->utilisateur->login }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Libellé: </strong>
                    @if (empty($intervention->libelle))
                        <span style="color: red; font-weight: bold;">Sans libellé</span>
                    @else
                        {{ $intervention->libelle }}
                    @endif
                </p>

                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Equipe: </strong>{{ $intervention->equipe->designation }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>type: </strong>{{ $intervention->type->designation }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>cause: </strong>{{ $intervention->cause->designation }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Adresse: </strong>{{ $intervention->adresse }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Date: </strong>{{ $intervention->date_intervention }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Ville: </strong>{{ $intervention->ville ? $intervention->ville->nom : 'Non renseignée' }}
                </p>
                <p class="card-text" style="font-size: 18px; color: #444; margin-bottom: 8px;">
                    <strong>Photo: </strong>
                    @if (!empty($intervention->photo))
                        <br>
                        <img src="{{ asset('storage/' . $intervention->photo) }}" alt="Photo de l'intervention"
                            style="max-width: 100px; height: auto; border-radius: 5px;">
                    @else
                        <span style="color: red; font-weight: bold;">Pas de photo</span>
                    @endif
                </p>

                <!-- Observations -->
                <h3>Observations</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Observation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($intervention->observations as $observation)
                            <tr>
                                <td>{{ $observation->id }}</td>
                                <td>{{ $observation->designation }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Aucune observation.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Materiels -->
                <h3>Matériels</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Matériel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($intervention->materiels as $materiel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $materiel->designation }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Aucun matériel.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Terrains -->
                <h3>Terrains</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Terrain</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($intervention->terrains as $terrain)
                            <tr>
                                <td>{{ $terrain->id }}</td>
                                <td>{{ $terrain->designation }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Aucun terrain.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    <a href="{{ route('intervention.edit', ['intervention' => $intervention]) }}"
                        class="btn btn-warning btn-lg"
                        style="border-radius: 30px; padding: 12px 30px; background-color: #ff9800; border: none; color: white; font-weight: bold; transition: all 0.3s ease;">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
