<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;
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

Route::get('/',[SesionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/',[SesionController::class, 'store'])->middleware('guest')->name('login');

//Ruta Registro / ->middleware('guest') -> Estas rutas solo tienen logica cuando el usuario no está logueado,SOLO si eres un guest entras aqui (auth , caso contrario)
Route::get('/registro', [RegistroController::class, 'create'])->middleware('guest');
Route::post('/registro', [RegistroController::class, 'store'])->middleware('guest');


Route::get('/home', [HomeController::class, 'home'])->middleware('auth');