<?php

namespace App\Models;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $table = 'utilisateur';
    protected $fillable = [
        'nom',
        'prenom',
        'login',
        'password',
        'cin',
        'telephone',
        'email',
        'adresse',
        'id_ville',
        'privilege',
        'etat',
        'updated_at',
    ];

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_ville');
    }
    public $timestamps = true;
}
