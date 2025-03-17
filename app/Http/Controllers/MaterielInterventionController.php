<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielInterventionController extends Controller
{
    public function index($interventionId)
    {
        $intervention = Intervention::with('materiels')->findOrFail($interventionId);
        $usedMaterielIds = $intervention->materiels->pluck('id')->toArray();
        $availableMateriels = Materiel::whereNotIn('id', $usedMaterielIds)->get();

        return view('materiel_intervention.index', [
            'intervention' => $intervention,
            'availableMateriels' => $availableMateriels
        ]);
    }

    public function store(Request $request, $interventionId)
    {
        $request->validate([
            'materiel_id' => 'required|exists:materiel,id'
        ]);

        $intervention = Intervention::findOrFail($interventionId);
        
        // Vérifier si le matériel n'est pas déjà attaché
        if (!$intervention->materiels->contains($request->materiel_id)) {
            $intervention->materiels()->attach($request->materiel_id);
        }

        return redirect()
            ->route('materiel_intervention.index', $interventionId)
            ->with('success', 'Matériel ajouté avec succès');
    }

    public function destroy($interventionId, $materielId)
    {
        $intervention = Intervention::findOrFail($interventionId);
        $intervention->materiels()->detach($materielId);

        return redirect()
            ->route('materiel_intervention.index', $interventionId)
            ->with('success', 'Matériel retiré avec succès');
    }
}