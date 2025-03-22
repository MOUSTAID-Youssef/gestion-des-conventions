<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'intervention N°</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h1, h3 {
            color: #333;
        }
        .libelle-empty {
            color: red;
        }
        .print-date {
            text-align: right;
            font-size: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Détails de l'intervention: {{ $intervention->id }}</h1>
    <p><strong>Utilisateur: </strong>{{ $intervention->utilisateur->login }}</p>
    <p><strong>Libellé: </strong>
        @if(empty($intervention->libelle))
            <span class="libelle-empty">(sans libelle)</span>
        @else
            {{ $intervention->libelle }}
        @endif
    </p>
    <p><strong>Equipe: </strong>{{ $intervention->equipe->designation }}</p>
    <p><strong>Type: </strong>{{ $intervention->type->designation }}</p>
    <p><strong>Cause: </strong>{{ $intervention->cause->designation }}</p>
    <p><strong>Adresse: </strong>{{ $intervention->adresse }}</p>
    <p><strong>Date: </strong>{{ $intervention->date_intervention }}</p>
    <p><strong>Ville: </strong>{{ $intervention->ville ? $intervention->ville->nom : 'Non renseignée' }}</p>

    <h3>Observations</h3>
    <table>
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

    <h3>Matériels</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Matériel</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($intervention->materiels as $materiel)
                <tr>
                    <td>{{ $materiel->id }}</td>
                    <td>{{ $materiel->designation }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Aucun matériel.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Terrains</h3>
    <table>
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

    <div class="print-date">
        <p>Date de l'impression: {{ now()->format('d/m/Y H:i') }}</p>
    </div>
</body>
</html>
