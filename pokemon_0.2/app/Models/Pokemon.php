<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $table = 'pokemons';

    protected $fillable = [
        'name',
        'type',
        'species_id',
        'user_id',
        'move_1_id',
        'move_2_id',
        'move_3_id',
        'move_4_id',
        'experience',
        'hp',
        'attack',
        'defense',
        'speed',
    ];
}
