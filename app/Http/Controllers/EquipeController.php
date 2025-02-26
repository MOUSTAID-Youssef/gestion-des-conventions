<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Ville;
use App\Models\Membre;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = Equipe::with('ville')->get();
        return view('equipe.index', ['equipes' => $equipes]);
    }

    public function create()
    {
        $villes = Ville::all();
        return view('equipe.create', ['villes' => $villes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
            'id_ville' => 'required|string|max:255',
        ]);
        Equipe::create($data);
        return redirect(route('equipe.index'))->with('success', 'Equipe ajoutée avec succés');
    }
    public function edit(Equipe $equipe)
    {
        $villes = Ville::all();
        return view('equipe.edit', ['equipe' => $equipe, 'villes' => $villes]);
    }
    public function update(Equipe $equipe, Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
            'id_ville' => 'required|string|max:255',
        ]);
        $equipe->update($data);
        return redirect(route('equipe.index'))->with('success', 'equipe modifiée avec succés');
    }
    public function delete(Equipe $equipe)
    {
        $equipe->delete();
        return redirect(route('equipe.index'))->with('success', 'equipe supprimée avec succés');
    }
    public function show(Equipe $equipe)
    {
        // Récupérer les membres déjà affectés à cette équipe
        $membres = $equipe->membres; // Relations définies dans le modèle 'Equipe'

        // Récupérer les membres de la même ville que l'équipe
        $membresDisponibles = Membre::where('id_ville', $equipe->id_ville)->get(); // Tous les membres de la même ville

        return view('equipe.show', [
            'equipe' => $equipe,
            'membres' => $membres,
            'membresDisponibles' => $membresDisponibles
        ]);
    }
    public function attacherMembre(Request $request, Equipe $equipe)
    {
        // Validation de l'ID du membre sélectionné
        $request->validate([
            'membre_id' => 'required|exists:membre,id', // S'assurer que l'ID du membre existe
        ]);
        // Ajouter le membre à l'équipe
        $equipe->membres()->attach($request->membre_id);
        // Rediriger avec un message de succès
        return redirect()->route('equipe.show', $equipe->id)
            ->with('success', 'Membre attaché à l\'équipe avec succès!');
    }
    public function detacherMembre(Equipe $equipe, Membre $membre)
    {
        // Supprimer le membre de l'équipe
        $equipe->membres()->detach($membre->id);
        // Rediriger avec un message de succès
        return redirect()->route('equipe.show', $equipe->id)
            ->with('success', 'Membre détaché de l\'équipe avec succès!');
    }
}