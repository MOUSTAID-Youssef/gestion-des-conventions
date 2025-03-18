<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intervention;
use App\Models\Ville;
use App\Models\Equipe;
use App\Models\Cause;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class InterventionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->privilege == 'admin') {
            $interventions = Intervention::with(['ville', 'utilisateur'])->get();
        } else {
            $interventions = Intervention::with(['ville', 'utilisateur'])
                ->where('id_utilisateur', $user->id)
                ->get();
        }
        return view('intervention.index', ['interventions' => $interventions]);
    }
    public function create()
    {
        $equipes = Equipe::all();
        $causes = Cause::all();
        $types = Type::all();
        $user = Auth::user();
        // Si utilisateur normal, ne montrer que sa ville
        if ($user->privilege !== 'admin') {
            $villes = Ville::where('id', $user->id_ville)->get();
        } else {
            $villes = Ville::all();
        }
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
            'id_utilisateur' => 'nullable|integer|exists:utilisateurs,id',
        ]);

        $path = 'interventions_photos/default.jpg';
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
        $user = Auth::user();

        // Check if the intervention belongs to the authenticated user or if the user is an admin
        if ($user->privilege !== 'admin' && $intervention->id_utilisateur !== $user->id) {
            // Redirect with an error message if the user is not authorized
            return redirect()->route('redirect');
        }
        $equipes = Equipe::all();
        $causes = Cause::all();
        $types = Type::all();
        $user = Auth::user();
        // Si utilisateur normal, ne montrer que sa ville
        if ($user->privilege !== 'admin') {
            $villes = Ville::where('id', $user->id_ville)->get();
        } else {
            $villes = Ville::all();
        }
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
        $user = Auth::user();

        // Check if the user is either the admin or the user who owns the intervention
        if ($user->privilege !== 'admin' && $intervention->id_utilisateur !== $user->id) {
            return redirect()->route('redirect');
        }
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
    // public function show(Intervention $intervention)
    // {
    //     return view('intervention.show', ['intervention' => $intervention]);
    // }

    public function showMap()
    {
        $user = Auth::user(); // Get the logged-in user

        if ($user->privilege == 'admin') {
            // Admin can see all interventions
            $interventions = Intervention::with(['type', 'cause', 'equipe', 'ville', 'utilisateur'])->get();
        } else {
            // Normal user can only see their own interventions
            $interventions = Intervention::with(['type', 'cause', 'equipe', 'ville', 'utilisateur'])
                ->where('id_ville', $user->id_ville)
                ->get();
        }

        return view('map', compact('interventions'));
    }
}
