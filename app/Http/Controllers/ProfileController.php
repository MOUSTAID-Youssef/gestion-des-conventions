<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $utilisateur = Auth::user();
        return view('profile.index', compact('utilisateur'));
    }

    // Afficher le formulaire de modification du profil
    public function edit()
    {
        $utilisateur = Auth::user();
        return view('profile.edit', compact('utilisateur'));
    }

    // Mettre à jour les informations du profil
    public function update(Request $request)
    {
        $utilisateur = Utilisateur::find(Auth::id());

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:utilisateurs,login,' . $utilisateur->id,
            'cin' => 'nullable|string|max:20',
            'telephone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
        ]);

        $utilisateur->update($data);

        return redirect()->route('profile.index')->with('success', 'Profil modifié avec succès.');
    }

    // Afficher le formulaire de changement de mot de passe
    public function PasswordForm()
    {
        return view('profile.password');
    }

    // Mettre à jour le mot de passe de l'utilisateur
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $utilisateur = Utilisateur::find(Auth::id());

        if (!Hash::check($request->old_password, $utilisateur->password)) {
            return back()->withErrors(['old_password' => 'L’ancien mot de passe est incorrect.']);
        }

        $utilisateur->password = Hash::make($request->new_password);
        $utilisateur->save();

        return redirect()->route('profile.index')->with('success', 'le Mot de passe à été modifié avec succès.');
    }
}
