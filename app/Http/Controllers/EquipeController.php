<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use App\Models\Ville;

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
        Equipe::create($data)->with('success','Equipe ajoutée avec succés');
        return redirect(route('equipe.index'));
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
        return redirect(route('equipe.index'))->with('success','equipe modifiée avec succés');
    }
    public function delete(Equipe $equipe){
        $equipe->delete();
        return redirect(route('equipe.index'))->with('success','equipe supprimée avec succés');
    }
}
