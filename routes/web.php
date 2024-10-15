<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokedexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('pokemon', PokemonController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Masukkan route yang ingin diproteksi di sini
    Route::get('/form', [PokemonController::class, 'form'])->name('form');
});
Route::get('/', PokedexController::class)->name('pokedex.index');
Route::get('pokemon/image/{id}', [PokemonController::class, 'showImage'])->name('pokemon.image');
