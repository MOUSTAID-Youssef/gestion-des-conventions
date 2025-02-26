<?php

use App\Http\Controllers\CauseController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Route;


Route::get('/utilisateur', [UtilisateurController::class, 'index'])->name('utilisateur.index');
Route::get('/utilisateur/create', [UtilisateurController::class, 'create'])->name('utilisateur.create');
Route::post('/utilisateur', [UtilisateurController::class, 'store'])->name('utilisateur.store');
Route::get('/utilisateur/{utilisateur}/edit', [UtilisateurController::class, 'edit'])->name('utilisateur.edit');
Route::put('/utilisateur/{utilisateur}/update', [UtilisateurController::class, 'update'])->name('utilisateur.update');
Route::delete('/utilisateur/{utilisateur}/delete', [UtilisateurController::class, 'delete'])->name('utilisateur.delete');
Route::get('/utilisateur/{utilisateur}', [UtilisateurController::class, 'show'])->name('utilisateur.show');

Route::get('/membre', [MembreController::class, 'index'])->name('membre.index');
Route::get('/membre/create', [MembreController::class, 'create'])->name('membre.create');
Route::post('/membre', [MembreController::class, 'store'])->name('membre.store');
Route::get('/membre/{membre}/edit', [MembreController::class, 'edit'])->name('membre.edit');
Route::put('/membre/{membre}/update', [MembreController::class, 'update'])->name('membre.update');
Route::delete('/membre/{membre}/delete', [MembreController::class, 'delete'])->name('membre.delete');

Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe.index');
Route::get('/equipe/create', [EquipeController::class, 'create'])->name('equipe.create');
Route::post('/equipe', [EquipeController::class, 'store'])->name('equipe.store');
Route::get('/equipe/{equipe}/edit', [EquipeController::class, 'edit'])->name('equipe.edit');
Route::put('/equipe/{equipe}/update', [EquipeController::class, 'update'])->name('equipe.update');
Route::delete('/equipe/{equipe}/delete', [EquipeController::class, 'delete'])->name('equipe.delete');
Route::get('/equipe/{equipe}', [EquipeController::class, 'show'])->name('equipe.show');
Route::post('equipe/{equipe}/attacherMembre', [EquipeController::class, 'attacherMembre'])->name('equipe.attacherMembre');
Route::delete('equipe/{equipe}/membre/{membre}', [EquipeController::class, 'detacherMembre'])->name('equipe.detacherMembre');





Route::get('/materiel', [MaterielController::class, 'index'])->name('materiel.index');
Route::get('/materiel/create', [MaterielController::class, 'create'])->name('materiel.create');
Route::post('/materiel', [MaterielController::class, 'store'])->name('materiel.store');
Route::get('/materiel/{materiel}/edit', [MaterielController::class, 'edit'])->name('materiel.edit');
Route::put('/materiel/{materiel}/update', [MaterielController::class, 'update'])->name('materiel.update');
Route::delete('/materiel/{materiel}/delete', [MaterielController::class, 'delete'])->name('materiel.delete');

Route::get('/terrain', [TerrainController::class, 'index'])->name('terrain.index');
Route::get('/terrain/create', [TerrainController::class, 'create'])->name('terrain.create');
Route::post('/terrain', [TerrainController::class, 'store'])->name('terrain.store');
Route::get('/terrain/{terrain}/edit', [TerrainController::class, 'edit'])->name('terrain.edit');
Route::put('/terrain/{terrain}/update', [TerrainController::class, 'update'])->name('terrain.update');
Route::delete('/terrain/{terrain}/delete', [TerrainController::class, 'delete'])->name('terrain.delete');

Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/create', [TypeController::class, 'create'])->name('type.create');
Route::post('/type', [TypeController::class, 'store'])->name('type.store');
Route::get('/type/{type}/edit', [TypeController::class, 'edit'])->name('type.edit');
Route::put('/type/{type}/update', [TypeController::class, 'update'])->name('type.update');
Route::delete('/type/{type}/delete', [TypeController::class, 'delete'])->name('type.delete');

Route::get('/cause', [CauseController::class, 'index'])->name('cause.index');
Route::get('/cause/create', [CauseController::class, 'create'])->name('cause.create');
Route::post('/cause', [CauseController::class, 'store'])->name('cause.store');
Route::get('/cause/{cause}/edit', [CauseController::class, 'edit'])->name('cause.edit');
Route::put('/cause/{cause}/update', [CauseController::class, 'update'])->name('cause.update');
Route::delete('/cause/{cause}/delete', [CauseController::class, 'delete'])->name('cause.delete');

Route::get('/ville', [VilleController::class, 'index'])->name('ville.index');
Route::get('/ville/create', [VilleController::class, 'create'])->name('ville.create');
Route::post('/ville', [VilleController::class, 'store'])->name('ville.store');
Route::get('/ville/{ville}/edit', [VilleController::class, 'edit'])->name('ville.edit');
Route::put('/ville/{ville}/update', [VilleController::class, 'update'])->name('ville.update');
Route::delete('/ville/{ville}/delete', [VilleController::class, 'delete'])->name('ville.delete');

Route::get('/informations', [InformationsController::class, 'index'])->name('informations.index');
Route::get('/informations/create', [InformationsController::class, 'create'])->name('informations.create');
Route::post('/informations', [InformationsController::class, 'store'])->name('informations.store');
Route::get('/informations/{informations}/edit', [InformationsController::class, 'edit'])->name('informations.edit');
Route::put('/informations/{informations}/update', [InformationsController::class, 'update'])->name('informations.update');

Route::get('/intervention', [InterventionController::class, 'index'])->name('intervention.index');
Route::get('/intervention/create', [InterventionController::class, 'create'])->name('intervention.create');
Route::post('/intervention', [InterventionController::class, 'store'])->name('intervention.store');
Route::get('/intervention/{intervention}/edit', [InterventionController::class, 'edit'])->name('intervention.edit');
Route::put('/intervention/{intervention}/update', [InterventionController::class, 'update'])->name('intervention.update');
Route::delete('/intervention/{intervention}/delete', [InterventionController::class, 'delete'])->name('intervention.delete');

Route::get('/', function () {
    return view('auth.login');
});
