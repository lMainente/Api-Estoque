<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/itens-estoque', [ItensEstoqueController::class, 'getAllItems']);

Route::get('/itens-estoque', 'App\Http\Controllers\ItensEstoqueController@index');

Route::post('/itens-estoque', 'App\Http\Controllers\ItensEstoqueController@store');

Route::get('/itens-estoque/{categoria?}/{id?}', 'App\Http\Controllers\ItensEstoqueController@index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
