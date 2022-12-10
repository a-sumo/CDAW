<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; 

class pokemonController extends Controller
{
    public function getPokemonList(){
        $users =  DB::table('pokemons')->get();
        return View::make('stats', compact(null));
    }

}
