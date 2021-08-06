<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Controllers\ControladorProduto;
use App\Http\Controllers\ControladorCategoria;
use App\Http\Controllers\ControladorHome;


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
    return view('index');
});

Route::get('/produtos', [ControladorProduto::class, 'indexView']);
Route::get('/categorias', [ControladorCategoria::class, 'index']);
Route::get('/home', [ControladorHome::class, 'index']);

Route::get('/categorias/novo', [ControladorCategoria::class, 'create']);

Route::post('/categorias', [ControladorCategoria::class, 'store']);

Route::get('/categorias/deletar/{id}', [ControladorCategoria::class, 'destroy']);

Route::get('/categorias/editar/{id}', [ControladorCategoria::class, 'edit' ]);

Route::post('/categorias/{id}', [ControladorCategoria::class, 'update']);



