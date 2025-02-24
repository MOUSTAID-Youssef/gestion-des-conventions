<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terrain;

class TerrainController extends Controller
{
    public function index()
    {
        $terrains = Terrain::all();
        return view('terrain.index', ['terrains' => $terrains]);
    }
    public function create()
    {
        return view('terrain.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
        ]);
        Terrain::create($data);
        return redirect(route('terrain.index'))->with('success', 'nature de terrain ajoutée avec succés');
    }
    public function edit(Terrain $terrain)
    {
        return view('terrain.edit',['terrain'=>$terrain]);
    }
    public function update(Terrain $terrain, Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
        ]);
        $terrain->update($data);
        return redirect(route('terrain.index'))->with('success', 'terrain modifié avec succés');
    }
    public function delete(Terrain $terrain)
    {
        $terrain->delete();
        return redirect(route('terrain.index'))->with('success', 'terrain supprimé avec succés');
    }
}
