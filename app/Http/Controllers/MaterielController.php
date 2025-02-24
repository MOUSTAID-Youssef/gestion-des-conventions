<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiel;

class MaterielController extends Controller
{
    public function index()
    {
        $materiels = Materiel::all();
        return view('materiel.index', ['materiels' => $materiels]);
    }
    public function create()
    {
        return view('materiel.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
        ]);
        Materiel::create($data)->with('success','Matériel ajouté avec succés');
        return redirect(route('materiel.index'));
    }
    public function edit(Materiel $materiel)
    {
        return view('materiel.edit',['materiel'=>$materiel]);
    }
    public function update(Materiel $materiel, Request $request)
    {
        $data = $request->validate([
            'designation' => 'required|string|max:255',
        ]);
        $materiel->update($data);
        return redirect(route('materiel.index'))->with('success', 'Matériel modifié avec succés');
    }
    public function delete(Materiel $materiel)
    {
        $materiel->delete();
        return redirect(route('materiel.index'))->with('success', 'Matériel supprimé avec succés');
    }
}
