<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Ville;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::with('ville')->get();
        return view('utilisateur.index', ['utilisateurs' => $utilisateurs]);
    }
    public function create()
    {
        $villes = Ville::all();
        return view('utilisateur.create', ['villes' => $villes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:utilisateur',
            'password' => 'required|string|min:6',
            'cin' => 'nullable|string|max:20',
            'telephone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'id_ville' => 'required|string|max:255',
            'privilege' => 'required|string|in:user,admin',
            'etat' => 'required|string|in:actif,inactif',
        ]);

        $data['password'] = Hash::make($data['password']);
        Utilisateur::create($data);
        return redirect(route('utilisateur.index'))->with('success', 'utilisateur ajouté avec succés');
    }
    public function edit(Utilisateur $utilisateur)
    {
        $villes = Ville::all();
        return view('utilisateur.edit', ['utilisateur' => $utilisateur, 'villes' => $villes]);
    }
    public function update(Utilisateur $utilisateur, Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:utilisateur,login,' . $utilisateur->id,
            'cin' => 'nullable|string|max:20',
            'telephone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'id_ville' => 'required|string|max:255',
            'privilege' => 'required|string|in:user,admin',
            'etat' => 'required|string|in:actif,inactif',
        ]);
        $utilisateur->update($data);
        return redirect(route('utilisateur.index'))->with('success', 'utilisateur modifié avec succés');
    }
    public function delete(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return redirect(route('utilisateur.index'))->with('success', 'utilisateur supprimé avec succés');
    }
    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateur.show', ['utilisateur' => $utilisateur]);
    }
    // Méthode de connexion
    public function login(Request $request)
    {
        $data = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(['login' => $data['login'], 'password' => $data['password']])) {
            return redirect()->route('utilisateur.index')->with('success', 'Connexion réussie');
        } else {
            return back()->withErrors(['login' => 'Le login ou le mot de passe est incorrect.']);
        }
    }

    // Méthode de déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('utilisateur.login')->with('success', 'Déconnexion réussie');
    }
    public function showLoginForm()
    {
        return view('auth.login');  // This will load the login.blade.php view
    }
}
