<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return redirect()->route('login');
});


Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('users', App\Http\Controllers\usersController::class);
    Route::resource('kategorijas', App\Http\Controllers\kategorijasController::class);
    Route::resource('narudzbinas', App\Http\Controllers\narudzbinasController::class);
    Route::resource('proizvods', App\Http\Controllers\proizvodsController::class);
    Route::resource('racuns', App\Http\Controllers\racunsController::class);
    Route::resource('stos', App\Http\Controllers\stosController::class);
    Route::resource('stavka_narudzbines', App\Http\Controllers\stavka_narudzbinesController::class);
});
