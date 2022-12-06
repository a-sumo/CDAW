<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userListController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/leaderboard', function () {
        return view('leaderboard');
    })->name('leaderboard');
    Route::get('/leaderboard', [userListController::class, 'getUserList'])->name('leaderboard');
    Route::get('/pokedex', function () {
        return view('pokedex');
    })->name('pokedex');
    Route::get('/pokedex', [pokemonListController::class, 'getPokemonList'])->name('pokedex');
});
