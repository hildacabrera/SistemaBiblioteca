<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EjemplarController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Models\Editorial;


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
Route::resource('/Autor', AutorController::class);
Route::get('/Autor/{id}/delete',[AutorController::class,'delete']);
Route::get('/Editorial/{id}/delete',[EditorialController::class,'delete']);
Route::resource('/Editorial', EditorialController::class);
Route::get('/Usuario/{id}/delete',[UsuarioController::class,'delete']);
Route::resource('/Usuario', UsuarioController::class);
Route::get('/Ejemplar/{id}/delete',[EjemplarController::class,'delete']);
Route::resource('/Ejemplar', EjemplarController::class);
Route::get('/Libro/{id}/delete',[LibroController::class,'delete']);
Route::resource('/Libro', LibroController::class);
Route::get('/Prestamo/{id}/delete',[PrestamoController::class,'delete']);
Route::resource('/Prestamo', PrestamoController::class);