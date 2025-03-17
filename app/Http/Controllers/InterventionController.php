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
        $interventions = Intervention::with('ville','utilisateur')->get();
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
            'photo' =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'id_equipe' => 'required|integer|exists:equipe,id',
            'id_cause' => 'required|integer|exists:cause,id',
            'id_type_intervention' => 'required|integer|exists:type_intervention,id',
            'id_utilisateur' => 'nullable|integer|exists:utilisateur,id',
        ]);
        
        $path = null; // Default to null if no photo is uploaded
        if ($request->hasFile('photo')) {
            // Get the uploaded photo
            $photo = $request->file('photo');

            // Store the photo in the 'public' storage (this will store it in storage/app/public folder)
            $path = $photo->store('interventions_photos', 'public');
        }
        $data['photo'] = $path;
        $intervention = Intervention::create($data);
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
            'photo' =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'id_equipe' => 'required|integer|exists:equipe,id',
            'id_cause' => 'required|integer|exists:cause,id',
            'id_type_intervention' => 'required|integer|exists:type_intervention,id',
            'id_utilisateur' => 'required|integer|exists:utilisateur,id',
        ]);
        // Handle the new photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($intervention->photo && file_exists(storage_path('app/public/' . $intervention->photo))) {
                unlink(storage_path('app/public/' . $intervention->photo));
            }
            // Store the new photo
            $path = $request->file('photo')->store('interventions_photos', 'public');
            $data['photo'] = $path;
        }
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
    public function showMap()
    {
        $interventions = Intervention::with(['type', 'cause', 'equipe', 'ville', 'utilisateur'])
            ->get();

        return view('map', compact('interventions'));
    }
}
