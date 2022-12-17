<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('species')->insert([
            'name' => 'bulbasaur',
        ]);
        DB::table('species')->insert([
            'name' => 'charmander',
        ]);
        DB::table('species')->insert([
            'name' => 'squirtle',
        ]);
    }
}
