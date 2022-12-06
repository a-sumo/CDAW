<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class pokemonListController extends Controller
{
    // Fetch all users from user model
    public function getPokemonList(){
        $users =  DB::table('pokemons')->get();
        return View::make('pokedex', compact('pokemons'));
    }

}
