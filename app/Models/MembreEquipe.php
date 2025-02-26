<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembreEquipe extends Model
{
    use HasFactory;

    // Table associée
    protected $table = 'membre_equipe';

    // Si vous avez des champs supplémentaires dans la table, vous pouvez les ajouter ici
    protected $fillable = [
        'id_membre',
        'id_equipe',
    ];

    // Les relations
    public function membre()
    {
        return $this->belongsTo(Membre::class, 'id_membre');
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'id_equipe');
    }
}
