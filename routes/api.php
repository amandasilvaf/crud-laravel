<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorCategoria;
use App\Http\Controllers\ControladorProduto;

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

Route::get('/categorias', [ControladorCategoria::class, 'indexJson']);

// Route::apiResource('/produtos', ControladorProduto::class);

Route::resource('/produtos', 'ControladorProduto');
