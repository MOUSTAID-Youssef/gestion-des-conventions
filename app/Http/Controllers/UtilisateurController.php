<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index(){
        return view('utilisateur.index');
    }
    public function create(){
        return view('utilisateur.create');
    }
}

