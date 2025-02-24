<?php

namespace App\Models;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $table = 'membre';
    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'telephone',
        'email',
        'adresse',
        'id_ville',
        'statut',
        'updated_at'
    ];
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_ville');
    }
    public $timestamps = true;
}
