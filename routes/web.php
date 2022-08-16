<?php

use Illuminate\Support\Facades\Route;

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


/*Admin Controllers here */
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTimezoneController;
use App\Http\Controllers\Admin\AdminCountriesController;
use App\Http\Controllers\Admin\AdminLeaguesController;

Route::group([], function (){
    Route::resource('admin/leagues', AdminLeaguesController::class);
    Route::resource('admin/countries', AdminCountriesController::class);
    Route::resource('admin/timezones', AdminTimezoneController::class);
    Route::resource('admin', AdminController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
