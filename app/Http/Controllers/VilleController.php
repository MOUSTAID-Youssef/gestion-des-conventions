<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;

class VilleController extends Controller
{
    public function index()
    {
        $villes = Ville::all();
        return view('ville.index', ['villes' => $villes]);
    }
    public function create()
    {
        $villes = Ville::all();
        return view('ville.create', ['villes' => $villes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'latitude' => 'required|numeric|max:255',
            'longitude' => 'required|numeric|max:255|',
            'lat1' => 'required|numeric|max:255',
            'lat2' => 'required|numeric|max:255',
            'lng1' => 'required|numeric|max:255',
            'lng2' => 'required|numeric|max:255',
        ]);

        Ville::create($data);
        return redirect(route('ville.index'))->with('success', 'ville ajouté avec succés');
    }
    public function edit(Ville $ville)
    {
        $villes = Ville::all();
        return view('ville.edit', ['ville' => $ville, 'villes' => $villes]);
    }
    public function update(Ville $ville, Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'latitude' => 'required|numeric|max:255',
            'longitude' => 'required|numeric|max:255|',
            'lat1' => 'required|numeric|max:255',
            'lat2' => 'required|numeric|max:255',
            'lng1' => 'required|numeric|max:255',
            'lng2' => 'required|numeric|max:255',
        ]);
        $ville->update($data);
        return redirect(route('ville.index'))->with('success', 'ville modifié avec succés');
    }
    public function delete(Ville $ville)
    {
        $ville->delete();
        return redirect(route('ville.index'))->with('success', 'ville supprimé avec succés');
    }
    public function show(Ville $ville)
    {
        return view('ville.show', ['ville' => $ville]);
    }
}
