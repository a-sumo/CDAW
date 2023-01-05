<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StatsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pokemon', ['App\Http\Controllers\PokemonController', 'listApi']);
Route::post('/species', ['App\Http\Controllers\SpeciesController', 'createApi']);
Route::delete('/species/{id}', ['App\Http\Controllers\SpeciesController', 'deleteApi']);
Route::post('/pokemon', ['App\Http\Controllers\PokemonController', 'createApi']);
Route::delete('/pokemon/{id}', ['App\Http\Controllers\PokemonController', 'deleteApi']);