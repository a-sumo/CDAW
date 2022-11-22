<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pokemons = array(
            array('name' => 'pikachu'),
            array('name' => 'mewto'),
            array('name' => 'charmander')
        );

        foreach ($pokemons as $pokemon){
            DB::table('pokemons')->insert([
                'name' => $pokemon['name']
               ]);
        }


        
        //\App\Models\Energy::factory(10)->create();
    }
}