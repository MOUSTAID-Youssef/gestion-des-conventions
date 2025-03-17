<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainInterventionController extends Controller
{
    public function index($interventionId)
    {
        $intervention = Intervention::with('terrains')->findOrFail($interventionId);
        $usedTerrainIds = $intervention->terrains->pluck('id')->toArray();
        $availableTerrains = Terrain::whereNotIn('id', $usedTerrainIds)->get();

        return view('terrain_intervention.index', [
            'intervention' => $intervention,
            'availableTerrains' => $availableTerrains
        ]);
    }

    public function store(Request $request, $interventionId)
    {
        $request->validate([
            'terrain_id' => 'required|exists:terrain,id'
        ]);

        $intervention = Intervention::findOrFail($interventionId);
        
        // Vérifier si le matériel n'est pas déjà attaché
        if (!$intervention->terrains->contains($request->terrain_id)) {
            $intervention->terrains()->attach($request->terrain_id);
        }

        return redirect()
            ->route('terrain_intervention.index', $interventionId)
            ->with('success', 'Matériel ajouté avec succès');
    }

    public function destroy($interventionId, $terrainId)
    {
        $intervention = Intervention::findOrFail($interventionId);
        $intervention->terrains()->detach($terrainId);

        return redirect()
            ->route('terrain_intervention.index', $interventionId)
            ->with('success', 'Matériel retiré avec succès');
    }
}