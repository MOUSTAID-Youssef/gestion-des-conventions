<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\Intervention;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    // Afficher la liste des observations
    public function index($interventionId)
    {
        $intervention = Intervention::with('observations')->findOrFail($interventionId);
        return view('observations.index', ['intervention' => $intervention]);
    }

    // Afficher le formulaire de création
    public function create($interventionId)
    {
        $intervention = Intervention::findOrFail($interventionId);
        return view('observations.create', ['intervention' => $intervention]);
    }

    // Enregistrer une nouvelle observation
    public function store(Request $request, $interventionId)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
        ]);

        $intervention = Intervention::findOrFail($interventionId);

        Observation::create([
            'id_intervention' => $intervention->id,
            'designation' => $request->designation,
        ]);

        return redirect()
            ->route('observations.index', $intervention->id)
            ->with('success', 'Observation ajoutée avec succès');
    }

    // Afficher le formulaire de modification
    public function edit($interventionId, $observationId)
    {
        $intervention = Intervention::findOrFail($interventionId);
        $observation = Observation::findOrFail($observationId);
        
        // Vérifier que l'observation appartient à l'intervention
        if ($observation->id_intervention !== $intervention->id) {
            abort(404);
        }

        return view('observations.edit', [
            'intervention' => $intervention,
            'observation' => $observation
        ]);
    }

    // Mettre à jour une observation
    public function update(Request $request, $interventionId, $observationId)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
        ]);

        $observation = Observation::findOrFail($observationId);
        
        // Vérifier que l'observation appartient à l'intervention
        if ($observation->id_intervention !== (int)$interventionId) {
            abort(404);
        }

        $observation->update([
            'designation' => $request->designation,
        ]);

        return redirect()
            ->route('observations.index', $interventionId)
            ->with('success', 'Observation modifiée avec succès');
    }

    // Supprimer une observation
    public function destroy($interventionId, $observationId)
    {
        $observation = Observation::findOrFail($observationId);
        
        // Vérifier que l'observation appartient à l'intervention
        if ($observation->id_intervention !== (int)$interventionId) {
            abort(404);
        }

        $observation->delete();

        return redirect()
            ->route('observations.index', $interventionId)
            ->with('success', 'Observation supprimée avec succès');
    }
}