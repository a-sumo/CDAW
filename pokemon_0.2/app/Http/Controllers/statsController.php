<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;
use App\Http\Requests\StorePokemonRequest;

class StatsController extends Controller
{
    public function getPokemonData(){
        $pokemons = Pokemon::all();
        $sprites = array();
        foreach ($pokemons as $key => $value){
            $url = 'https://pokeapi.co/api/v2/pokemon/' . lcfirst($value->name) . '/';
            $sprite_front_animated  = Http::get($url)
            ['sprites']['versions']['generation-v']['black-white']['animated']['front_default'];
            array_push($sprites, $sprite_front_animated);
        }   
        return view('stats',['pokemons' => $pokemons, 'sprites' => $sprites ]);
    }
    public function getPokemonGameData(){
        $pokemons = Pokemon::all();
        $sprite_back_animated = Http::get('https://pokeapi.co/api/v2/pokemon/bulbasaur/')
        ['sprites']['versions']['generation-v']['black-white']['animated']['back_default'];
        $sprite_front_animated = Http::get('https://pokeapi.co/api/v2/pokemon/bulbasaur/')
        ['sprites']['versions']['generation-v']['black-white']['animated']['front_default'];
        return view('play',['pokemons' => $pokemons, 'sprites'=> [$sprite_back_animated, $sprite_front_animated]]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePokemonRequest $request)
    {
        $pokemon = Pokemon::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Pokemon Created successfully!",
            'pokemon' => $pokemon
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(StorePokemonRequest $request, Pokemon $pokemon)
    {
        $pokemon->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Pokemon Updated successfully!",
            'pokemon' => $pokemon
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();

        return response()->json([
            'status' => true,
            'message' => "Pokemon Deleted successfully!",
        ], 200);
    }
}
