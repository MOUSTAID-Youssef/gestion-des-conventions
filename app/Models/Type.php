<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'type_intervention';
    protected $fillable = [
        'designation',
        'updated_at',
    ];
    public $timestamps = true;
}
