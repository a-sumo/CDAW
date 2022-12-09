<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;
    protected $table = 'species';

    protected $fillable = [
        'name', 
        'base_hp', 
        'base_attack', 
        'base_defense', 
        'base_speed',
    ];
}