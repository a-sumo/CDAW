<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'participants';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'battle_id',
        'is_winner',
    ];
}
