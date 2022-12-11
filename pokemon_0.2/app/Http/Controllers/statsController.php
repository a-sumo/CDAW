<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;

class StatsController extends Controller
{
    public function getPokemonData(){
        $pokemons = Pokemon::all();
        $sprite_back_animated = Http::get('https://pokeapi.co/api/v2/pokemon/bulbasaur/')
        ['sprites']['versions']['generation-v']['black-white']['animated']['back_default'];
        $sprite_front_animated = Http::get('https://pokeapi.co/api/v2/pokemon/bulbasaur/')
        ['sprites']['versions']['generation-v']['black-white']['animated']['front_default'];
        return view('stats',['pokemons' => $pokemons, 'sprites'=> [$sprite_back_animated, $sprite_front_animated]]);
    }

}
