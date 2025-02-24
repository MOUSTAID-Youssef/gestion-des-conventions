<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    use HasFactory;
    protected $table = 'informations';
    protected $fillable = [
        'raison_sociale',
        'adresse',
        'telephone',
        'email',
        'updated_at',
    ];

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_ville');
    }
    public $timestamps = true;
}
