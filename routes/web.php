<?php

use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicarAnunciosController;
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

Route::post('logout',[SesionController::class, 'destroy'])->middleware('auth');
Route::get('logout',[SesionController::class, 'destroy'])->middleware('auth');//Para cuando intento acceder sin estar logueado

Route::get('/perfil', [PerfilController::class, 'show'])->middleware('auth')->name('perfil.show');
Route::post('/perfil', [PerfilController::class, 'update'])->middleware('auth')->name('perfil.update');

Route::get('/publicar', [PublicarAnunciosController::class, 'show'])->middleware('auth');
Route::post('/publicar', [PublicarAnunciosController::class, 'create'])->middleware('auth');

Route::get('/anuncios', [AnunciosController::class, 'show'])->middleware('auth');
Route::delete('/anuncios/{id}/delete', [AnunciosController::class, 'delete'])->middleware('auth')->name('anuncios.delete');
Route::get('/anuncios/{id}/editar', [AnunciosController::class, 'edit'])->middleware('auth')->name('anuncios.editar');
Route::put('/anuncios/{id}/editar', [AnunciosController::class, 'edit'])->middleware('auth')->name('anuncios.editar');



