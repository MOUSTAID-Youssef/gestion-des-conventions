<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    use HasFactory;
    protected $table = 'cause';
    protected $fillable = [
        'designation',
        'updated_at',
    ];
    public $timestamps = true;
}
