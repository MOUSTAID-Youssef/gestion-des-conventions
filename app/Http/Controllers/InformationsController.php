<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informations;

class InformationsController extends Controller
{
    public function index()
    {
        $informations = Informations::first();
        return view('informations.index', ['informations' => $informations]);
    }
    public function edit()
    {
        $informations = Informations::first();
        return view('informations.edit', ['informations' => $informations]);
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            'raison_sociale' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);
        $informations = Informations::first();
        $informations->update($data);
        return redirect(route('informations.index'))->with('success', 'les informations ont été modifiées avec succès');
    }
}
