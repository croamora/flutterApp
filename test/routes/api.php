<?php

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;
use App\Libro;
use App\Capitulo;
use App\Versiculo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/libros',function () {
    $libros = Libro::get();
    return $libros;
});

Route::post('/capitulos/{id_libro}',function (Request $request, $id_libro) {
    $capitulo = Capitulo::where('id_libro', '=', $id_libro)->get();
    return $capitulo;
});

Route::post('/versiculos/{id_capitulo}',function (Request $request, $id_capitulo) {
    $versiculo = Versiculo::where('id_capitulo', '=', $id_capitulo)->get();
    return $versiculo;
});

Route::get('videos', function () {
    return 'hola';
});