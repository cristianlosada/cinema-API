<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProductosConfiteriaController;

// forma de acceder a las rutas agrupadas del proyecto
// Route::controller(MoviesController::class)->group(function () {
//     Route::get('/movies',            'index');
//     Route::get('/movie/{id}',        'show');
//     Route::post('/movie',            'store');
//     // Route::get('/movie/{id}/tareas', 'tareas');
//     // Route::post('/moviefilter',      'filter');
//     // Route::put('/movie/{id}',        'edit');
//     // Route::delete('/movie/{id}',     'delete');

// })->middleware('sanctum');

// forma de acceder a las rutas agrupadas del proyecto
Route::controller(MoviesController::class)->group(function () {
    Route::get('/listar-generos',    'obtenerGeneros');
    Route::get('/listar-peliculas',  'obtenerPeliculas');
})->middleware('sanctum');

Route::controller(ProductosConfiteriaController::class)->group(function () {
    Route::post('/crear-confiteria',    'store');
    Route::get('/consultar-confiterias',    'obtenerConfiteria');
    Route::get('/consultar-confiteria/{id}',    'obtenerConfiteriaId');
})->middleware('sanctum');
