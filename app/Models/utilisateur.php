<?php

namespace App\Models;

use App\Models\Ville;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    // Le nom de la table dans la base de données
    protected $table = 'utilisateur';

    // Les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'nom',
        'prenom',
        'login',
        'pass',
        'cin',
        'telephone',
        'email',
        'adresse',
        'id_ville',
        'privilege',
        'etat',
    ];

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_ville');
    }


    public $timestamps = true;
}
