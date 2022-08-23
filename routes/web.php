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
use App\Http\Controllers\Admin\AdminTeamsController;
use App\Http\Controllers\Admin\AdminPopularCompetitions;
use App\Http\Controllers\Admin\AdminVideoController;


/*General Controller------------*/
use App\Http\Controllers\MainController;

Route::group([], function (){
    Route::resource('admin/videos', AdminVideoController::class);
    Route::resource('admin/popular', AdminPopularCompetitions::class);
    Route::resource('admin/teams', AdminTeamsController::class);
    Route::resource('admin/leagues', AdminLeaguesController::class);
    Route::resource('admin/countries', AdminCountriesController::class);
    Route::resource('admin/timezones', AdminTimezoneController::class);
    Route::resource('admin', AdminController::class);
});
//General Routes
Route::group([], function (){
    Route::resource('/', MainController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
