<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\pokemonController;
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
    return view('home');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/play', function () {
        return view('play');
    })->name('play');
    // Route::get('/play', [userListController::class, 'getUserList'],[pokemonListController::class, 'getPokemonList'])->name('play');
    Route::get('/stats', function () {
        return view('stats');
    })->name('stats');
    Route::get('/stats', [userController::class, 'getUserList'])->name('stats');
    Route::get('/stats', [pokemonController::class, 'getPokemonList'])->name('stats');
});
