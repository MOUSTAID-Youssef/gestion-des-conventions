<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    // Specify the table name (optional, Laravel assumes the plural form of the model name)
    protected $table = 'ville';

    // Define the fillable fields to protect against mass assignment vulnerability
    protected $fillable = [
        'nom',
        'latitude',
        'longitude',
        'lat1',
        'lat2',
        'lng1',
        'lng2',
    ];

    // The model automatically assumes the 'created_at' and 'updated_at' fields
    public $timestamps = true;

    // You can define relationships here if needed, e.g., a Ville can have many Utilisateurs
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'id_ville');
    }
}
