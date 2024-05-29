<?php

use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\ediarAnuncioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PublicarAnunciosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\ValoracionController;
use App\Http\Controllers\VerAnuncioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes,
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Página de inicio de sesión
Route::get('/',[SesionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/',[SesionController::class, 'store'])->middleware('guest')->name('login');

// Manejo de cierre de sesión
Route::post('logout',[SesionController::class, 'destroy'])->middleware('auth');
Route::get('logout',[SesionController::class, 'destroy'])->middleware('auth');//Para cuando intento acceder sin estar logueado

// Página de registro
Route::get('/registro', [RegistroController::class, 'create'])->middleware('guest');
Route::post('/registro', [RegistroController::class, 'store'])->middleware('guest');

// Página de inicio y filtrado de anuncios
Route::get('/home', [HomeController::class, 'home'])->middleware('auth');
Route::post('/home', [HomeController::class, 'show'])->middleware('auth');

// Mostrar el perfil del usuario y actualizar 
Route::get('/perfil', [PerfilController::class, 'show'])->middleware('auth')->name('perfil.show');
Route::post('/perfil', [PerfilController::class, 'update'])->middleware('auth')->name('perfil.update');

// Página para publicar anuncios
Route::get('/publicar', [PublicarAnunciosController::class, 'show'])->middleware('auth');
Route::post('/publicar', [PublicarAnunciosController::class, 'create'])->middleware('auth');

// Mostrar todos los anuncios y eliminar un anuncio 
Route::get('/anuncios', [AnunciosController::class, 'show'])->middleware('auth')->name('anuncios.show');;
Route::delete('/anuncios/{id}/delete', [AnunciosController::class, 'delete'])->middleware('auth')->name('anuncios.delete');

// Editar anuncios
Route::post('/editar', [ediarAnuncioController::class, 'edit'])->middleware('auth');
Route::get('/anuncio', [ediarAnuncioController::class, 'show'])->middleware('auth');

// Ver anuncio
Route::post('/ver', [VerAnuncioController::class, 'show'])->middleware('auth');

// Valoraciones de un usuario
Route::get('/valoraciones/{id}', [ValoracionController::class, 'show'])->middleware('auth');
Route::post('/valoraciones', [ValoracionController::class, 'show'])->middleware('auth');
Route::get('/valorar', [ValoracionController::class, 'create'])->middleware('auth');



