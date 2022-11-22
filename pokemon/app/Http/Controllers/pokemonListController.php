<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class pokemonListController extends Controller
{
    public function getPokemonList() {
        $pokemons =  DB::table('pokemons')->get();
        return View::make('pokemonList', compact('pokemons'));
    }
}
