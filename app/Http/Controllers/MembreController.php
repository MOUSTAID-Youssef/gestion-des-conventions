<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membre;
use App\Models\Ville;

class MembreController extends Controller
{
    public function index()
    {
        $membres = Membre::with('ville')->get();
        return view('membre.index', ['membres' => $membres]);
    }
    public function create()
    {
        $villes = Ville::all();
        return view('membre.create', ['villes' => $villes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'nullable|string|max:20',
            'telephone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'id_ville' => 'required|string|max:255',
            'statut' => 'required|string|in:membre,chef',
        ]);
        Membre::create($data);
        return redirect(route('membre.index'))->with('success','membre ajouté avec succés');
    }
    public function edit(Membre $membre)
    {
        $villes = Ville::all();
        return view('membre.edit', ['membre' => $membre, 'villes' => $villes]);
    }
    public function update(Membre $membre, Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'nullable|string|max:20',
            'telephone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'id_ville' => 'required|string|max:255',
            'statut' => 'required|string|in:membre,chef',
        ]);
        $membre->update($data);
        return redirect(route('membre.index'))->with('success','membre modifié avec succés');
    }
    public function delete(Membre $membre){
        $membre->delete();
        return redirect(route('membre.index'))->with('success','membre supprimé avec succés');
    }
}
