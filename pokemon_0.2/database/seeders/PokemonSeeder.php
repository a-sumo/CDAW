<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pokemons')->insert([
        'name' => 'Bulbasaur',
        'type' => 'Grass',
        'species_id' =>1,
        'user_id' =>1,
        'move_1_id' =>1,
        'move_2_id' =>4,
        'move_3_id' =>5,
        'move_4_id' =>6,
        'experience' => 20,
        'hp' => 23,
        'attack' => 10,
        'defense' => 10,
        'speed' => 10,
        ]);
        DB::table('pokemons')->insert([
            'name' => 'Charmander',
            'type' => 'Fire',
            'species_id' =>2,
            'user_id' =>1,
            'move_1_id' =>2,
            'move_2_id' =>4,
            'move_3_id' =>5,
            'move_4_id' =>6,
            'experience' => 10,
            'hp' => 20,
            'attack' => 10,
            'defense' => 10,
            'speed' => 10,
        ]);
        DB::table('pokemons')->insert([
            'name' => 'Squirtle',
            'type' => 'Water',
            'species_id' =>3,
            'user_id' =>1,
            'move_1_id' =>3,
            'move_2_id' =>4,
            'move_3_id' =>5,
            'move_4_id' =>6,
            'experience' => 30,
            'hp' => 15,
            'attack' => 10,
            'defense' => 10,
            'speed' => 10,
        ]);
    }
}
