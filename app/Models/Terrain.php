<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;
    protected $table = 'terrain';
    protected $fillable = [
        'designation',
    ];
    public function interventions()
    {
        return $this->belongsToMany(Intervention::class, 'terrain_intervention', 'id_terrain', 'id_intervention')
                    ->withTimestamps();
    }
}
