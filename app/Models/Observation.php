<?php

// app/Models/Observation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_intervention',
        'designation',
    ];

    public function intervention()
    {
        return $this->belongsTo(Intervention::class, 'id_intervention');
    }
}

