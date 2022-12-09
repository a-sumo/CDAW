<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('moves')->insert([
            'name' => 'Leaf Punch',
            'power' => 50,
            'accuracy' => 100,
            'type' => 'Grass',
        ]);
        DB::table('moves')->insert([
            'name' => 'Fire Slap',
            'power' => 50,
            'accuracy' => 100,
            'type' => 'Fire',
        ]);
        DB::table('moves')->insert([
            'name' => 'Water Gun',
            'power' => 50,
            'accuracy' => 100,
            'type' => 'Water',
        ]);
        DB::table('moves')->insert([
            'name' => 'Karate Chop',
            'power' => 50,
            'accuracy' => 100,
            'type' => 'Normal',
        ]);
        DB::table('moves')->insert([
            'name' => 'Chuck Kick',
            'power' => 100,
            'accuracy' => 50,
            'type' => 'Normal',
        ]);
        DB::table('moves')->insert([
            'name' => 'Wind Chip',
            'power' => 10,
            'accuracy' => 50,
            'type' => 'Normal',
        ]);
    }
}
