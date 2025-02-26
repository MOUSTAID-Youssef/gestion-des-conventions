<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intervention;
use App\Models\Ville;
use App\Models\Equipe;
use App\Models\Cause;
use App\Models\Type;

class InterventionController extends Controller
{
    public function index()
    {
        $interventions = Intervention::with('ville')->get();
        return view('intervention.index', ['interventions' => $interventions]);
    }
    public function create()
    {
        $equipes = Equipe::all();
        $villes = Ville::all();
        $causes = Cause::all();
        $types = Type::all();
        return view('intervention.create', [
            'villes' => $villes,
            'types' => $types,
            'equipes' => $equipes,
            'causes' => $causes
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'libelle' => 'nullable|string|max:255',
            'date_intervention' => 'required|date',
            'id_ville' => 'required|integer|exists:ville,id',
            'adresse' => 'required|string|max:255',
            'photo' => 'nullable|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'id_equipe' => 'required|integer|exists:equipe,id',
            'id_cause' => 'required|integer|exists:cause,id',
            'id_type_intervention' => 'required|integer|exists:type_intervention,id',
            'id_utilisateur' => 'nullable|integer|exists:utilisateur,id',
        ]);

        Intervention::create($data);
        return redirect(route('intervention.index'))->with('success', 'intervention ajouté avec succés');
    }
    public function edit(Intervention $intervention)
    {
        $equipes = Equipe::all();
        $villes = Ville::all();
        $causes = Cause::all();
        $types = Type::all();
        return view('intervention.edit', [
            'intervention' => $intervention,
            'villes' => $villes,
            'types' => $types,
            'equipes' => $equipes,
            'causes' => $causes
        ]);
    }
    public function update(Intervention $intervention, Request $request)
    {
        $data = $request->validate([
            'libelle' => 'nullable|string|max:255',
            'date_intervention' => 'required|date',
            'id_ville' => 'required|integer|exists:ville,id',
            'adresse' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'photo' => 'nullable|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'id_equipe' => 'required|integer|exists:equipe,id',
            'id_cause' => 'required|integer|exists:cause,id',
            'id_type_intervention' => 'required|integer|exists:type_intervention,id',
            'id_utilisateur' => 'required|integer|exists:utilisateur,id',
        ]);
        $intervention->update($data);
        return redirect(route('intervention.index'))->with('success', 'intervention modifié avec succés');
    }
    public function delete(Intervention $intervention)
    {
        $intervention->delete();
        return redirect(route('intervention.index'))->with('success', 'intervention supprimé avec succés');
    }
    public function show(Intervention $intervention)
    {
        return view('intervention.show', ['intervention' => $intervention]);
    }
}
