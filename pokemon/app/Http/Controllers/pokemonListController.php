<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pokemonListController extends Controller
{
    public function getPokemonList() {
        return view('pokemonList', ['name' => 'James']);
    }
}
