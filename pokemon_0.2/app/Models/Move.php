<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;
    protected $table = 'moves';

    protected $fillable = [
        'name',
        'power',
        'accuracy',
        'type',
    ];
}
