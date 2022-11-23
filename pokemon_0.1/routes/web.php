<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userListController;
use App\Http\Controllers\pokemonListController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('userList', [userListController::class, 'getUserList']);
Route::get('pokemonList', [pokemonListController::class, 'getPokemonList']);

// Route::get('/pokemonList', function () {
//     return 'Hello World';
// });