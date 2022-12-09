<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    use HasFactory;
    protected $table = 'participants';

    protected $fillable = [
        'user_id',
        'battle_id',
        'is_winner',
    ];
}
