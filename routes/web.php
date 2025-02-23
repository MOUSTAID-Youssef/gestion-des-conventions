<?php

use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;


Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur.index');
Route::get('/utilisateur/create', [UtilisateurController::class, 'create'])->name('utilisateur.create');


Route::get('/membre', function () {
    return view('membre.index');
})->name('membre.index');

Route::get('/equipe', function () {
    return view('equipe.index');
})->name('equipe.index');

Route::get('/materiel', function () {
    return view('materiel.index');
})->name('materiel.index');

Route::get('/terrain', function () {
    return view('terrain.index');
})->name('terrain.index');

Route::get('/type', function () {
    return view('type.index');
})->name('type.index');

Route::get('/cause', function () {
    return view('cause.index');
})->name('cause.index');

Route::get('/ville', function () {
    return view('ville.index');
})->name('ville.index');

Route::get('/informations', function () {
    return view('informations.index');
})->name('informations.index');

Route::get('/intervention', function () {
    return view('intervention.index');
})->name('intervention.index');


Route::get('/', function () {
    return view('auth.login');
});
