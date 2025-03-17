<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $table = 'materiel';
    protected $fillable = [
        'designation',
    ];
    public function interventions()
    {
        return $this->belongsToMany(Intervention::class, 'materiel_intervention', 'id_materiel', 'id_intervention')
                    ->withTimestamps();
    }
}
