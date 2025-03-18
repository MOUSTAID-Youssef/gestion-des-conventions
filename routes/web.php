<?php

use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\MaterielInterventionController;
use App\Http\Controllers\TerrainInterventionController;

// public routes
Route::get('/', [UtilisateurController::class, 'showLoginForm'])->name('login');
Route::post('/', [UtilisateurController::class, 'login'])->name('utilisateur.login.submit');

// authentified users routes :
Route::middleware(['auth'])->group(function () {
    Route::get('/redirect', function () {return view('auth.redirect');})->name('redirect');
    Route::post('/logout', [UtilisateurController::class, 'logout'])->name('utilisateur.logout');
    Route::get('/logout', [UtilisateurController::class, 'logout'])->name('utilisateur.logout');

    Route::get('/intervention', [InterventionController::class, 'index'])->name('intervention.index');
    Route::get('/intervention/create', [InterventionController::class, 'create'])->name('intervention.create');
    Route::post('/intervention', [InterventionController::class, 'store'])->name('intervention.store');
    Route::get('/intervention/{intervention}/edit', [InterventionController::class, 'edit'])->name('intervention.edit');
    Route::put('/intervention/{intervention}/update', [InterventionController::class, 'update'])->name('intervention.update');
    Route::delete('/intervention/{intervention}/delete', [InterventionController::class, 'delete'])->name('intervention.delete');
    Route::get('/map', [InterventionController::class, 'showMap'])->name('map');

    Route::get('/informations', [InformationsController::class, 'index'])->name('informations.index');


    // Show profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [ProfileController::class, 'PasswordForm'])->name('password.edit');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');


    Route::prefix('intervention/{intervention}')->group(function () {
        Route::get('/observations', [ObservationController::class, 'index'])->name('observations.index');
        Route::get('/observations/create', [ObservationController::class, 'create'])->name('observations.create');
        Route::post('/observations', [ObservationController::class, 'store'])->name('observations.store');
        Route::get('/observations/{observation}/edit', [ObservationController::class, 'edit'])->name('observations.edit');
        Route::put('/observations/{observation}', [ObservationController::class, 'update'])->name('observations.update');
        Route::delete('/observations/{observation}', [ObservationController::class, 'destroy'])->name('observations.destroy');

        //intervention_materiels
        Route::get('/materiels', [MaterielInterventionController::class, 'index'])->name('materiel_intervention.index');
        Route::post('/materiels', [MaterielInterventionController::class, 'store'])->name('materiel_intervention.store');
        Route::delete('/materiels/{materiel}', [MaterielInterventionController::class, 'destroy'])->name('materiel_intervention.destroy');
        
        //intervention_terrains
        Route::get('/terrains', [TerrainInterventionController::class, 'index'])->name('terrain_intervention.index');
        Route::post('/terrains', [TerrainInterventionController::class, 'store'])->name('terrain_intervention.store');
        Route::delete('/terrains/{terrain}', [TerrainInterventionController::class, 'destroy'])->name('terrain_intervention.destroy');
    });

    // Admin-only routes
    Route::middleware(['check_admin'])->group(function () {

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

        Route::get('/informations/create', [InformationsController::class, 'create'])->name('informations.create');
        Route::post('/informations', [InformationsController::class, 'store'])->name('informations.store');
        Route::get('/informations/{informations}/edit', [InformationsController::class, 'edit'])->name('informations.edit');
        Route::put('/informations/{informations}/update', [InformationsController::class, 'update'])->name('informations.update');
    });
});

Route::fallback(function () {
    return redirect()->route('login')->with('error', "la page souhaité n'existe pas.");
});
