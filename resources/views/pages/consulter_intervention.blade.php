@extends('layouts.app')

@section('content')
<div style="margin-left: 18px; text-align:center">
    <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 15px;">
        <h1 class="me-3">Liste des interventions</h1>
        <a href="" class="btn btn-success">
            <i class="fa-solid fa-plus"></i> Ajouter intervention
        </a>
    </div>
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
                {{-- <th>Observations</th> --}}
                <th>Nature terrain</th>
                <th>Matériels</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Maintenance</td>
                <td>Réparation</td>
                <td>2025-02-20</td>
                <td>Défaillance électrique</td>
                <td>Equipe A</td>
                <td>Fès</td>
                <td>Rue Hassan II</td>
                <td>ADIL</td>
                {{-- <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td> --}}
                <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Réparation</td>
                <td>Entretien</td>
                <td>2025-02-21</td>
                <td>Problème hydraulique</td>
                <td>Equipe B</td>
                <td>Casablanca</td>
                <td>Avenue Mohammed V</td>
                <td>RACHID</td>
                {{-- <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td> --}}
                <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                <td><button class="btn btn-info"><i class="fas fa-eye"></i></button></td>
                <td><button class="btn btn-warning"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <!-- Ajoute d'autres lignes ici si nécessaire -->
        </tbody>
    </table>
</div>
@endsection
