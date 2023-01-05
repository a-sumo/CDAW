<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\StatsController;
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
    Route::get('/play', [StatsController::class, 'getPokemonUserData'])->name('play');
    Route::get('/stats', function () {
        return view('stats');
    })->name('stats');
    Route::get('/stats', [StatsController::class, 'getPokemonData'])->name('stats');
});
