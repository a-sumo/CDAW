<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->foreignId('species_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('users_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('move_1_id')
            ->constrained('moves')
            ->onUpdate('cascade')
            ->onDelete('cascade');  
            $table->foreignId('move_2_id')
            ->constrained('moves')
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->foreignId('move_3_id')
            ->constrained('moves')
            ->onUpdate('cascade')
            ->onDelete('cascade');    
            $table->foreignId('move_4_id')
            ->constrained('moves')
            ->onUpdate('cascade')
            ->onDelete('cascade');                
            $table->unsignedBigInteger('experience');
            $table->unsignedBigInteger('hp');
            $table->unsignedBigInteger('attack');
            $table->unsignedBigInteger('defense');
            $table->unsignedBigInteger('speed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemons');
    }
};
