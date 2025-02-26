<?php

namespace App\Models;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;
    protected $table = 'equipe';
    protected $fillable = [
        'designation',
        'id_ville',
        'updated_at',
    ];
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_ville');
    }
    public $timestamps = true;
    public function membres()
    {
        return $this->belongsToMany(Membre::class, 'membre_equipe', 'id_equipe', 'id_membre');
    }
    
}
