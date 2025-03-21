<?php

namespace App\Models;

use App\Models\Ville;
use App\Models\Utilisateur;
use App\Models\Equipe;
use App\Models\Type;
use App\Models\Cause;
use App\Models\Materiel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    protected $table = 'intervention';
    protected $fillable = [
        'libelle',
        'date_intervention',
        'id_ville',
        'adresse',
        'icon',
        'photo',
        'latitude',
        'longitude',
        'id_equipe',
        'id_cause',
        'id_type_intervention',
        'id_utilisateur',
        'updated_at',
    ];

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_ville');
    }
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'id_equipe');
    }
    public function cause()
    {
        return $this->belongsTo(Cause::class, 'id_cause');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type_intervention');
    }
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }
    public function observations()
    {
        return $this->hasMany(Observation::class, 'id_intervention');
    }
    public function materiels()
{
    return $this->belongsToMany(Materiel::class, 'materiel_intervention', 'id_intervention', 'id_materiel')
                ->withTimestamps();
}
public function terrains()
{
    return $this->belongsToMany(Terrain::class, 'terrain_intervention', 'id_intervention', 'id_terrain')
                ->withTimestamps();
}
    
    public $timestamps = true;
}
