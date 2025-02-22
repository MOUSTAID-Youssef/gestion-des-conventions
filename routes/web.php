<?php

use Illuminate\Support\Facades\Route;

Route::get('/utilisateur', function () {
    return view('pages.utilisateur');
})->name('utilisateur');

Route::get('/membre', function () {
    return view('pages.membre');
})->name('membre');

Route::get('/equipe', function () {
    return view('pages.equipe');
})->name('equipe');

Route::get('/materiel', function () {
    return view('pages.materiel');
})->name('materiel');

Route::get('/terrain', function () {
    return view('pages.terrain');
})->name('terrain');

Route::get('/type', function () {
    return view('pages.type');
})->name('type');

Route::get('/cause', function () {
    return view('pages.cause');
})->name('cause');

Route::get('/ville', function () {
    return view('pages.ville');
})->name('ville');

Route::get('/informations', function () {
    return view('pages.informations');
})->name('informations');

Route::get('/consulter_intervention', function () {
    return view('pages.consulter_intervention');
})->name('consulter_intervention');


Route::get('/', function () {
    return view('auth.login');
});
