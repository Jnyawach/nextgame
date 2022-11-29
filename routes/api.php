<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoTestController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('football/test',[\App\Http\Controllers\MainController::class,'SoccerTest']);

//Frontend test routes

Route::group([], function (){
    Route::post('/todos/updateAll',[TodoTestController::class, 'updateAll']);
    Route::get('/todos/clearComplete',[TodoTestController::class, 'clearComplete']);
    Route::resource('/todos',TodoTestController::class);
});
