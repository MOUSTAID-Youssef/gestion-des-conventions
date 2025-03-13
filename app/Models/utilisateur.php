<?php

namespace App\Models;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_ville');
    }
}
