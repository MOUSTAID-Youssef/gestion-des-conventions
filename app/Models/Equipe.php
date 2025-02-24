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
}
