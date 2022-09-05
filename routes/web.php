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
use App\Http\Controllers\General\MatchHighlightsController;
use App\Http\Controllers\General\CompetitionsController;
use App\Http\Controllers\General\CountriesController;
use App\Http\Controllers\General\FixturesController;
use App\Http\Controllers\General\LivescoreController;

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
    Route::resource('match-highlights', MatchHighlightsController::class);
    Route::resource('fixtures', FixturesController::class);
    Route::get('competitions/fixtures/{id}',  [CompetitionsController::class, 'fixtures'])->name('competition-fixtures');
    Route::get('competitions/results/{id}',  [CompetitionsController::class, 'results'])->name('competition-results');
    Route::get('competitions/injuries/{id}',  [CompetitionsController::class, 'injuries'])->name('competition-injuries');
    Route::resource('competitions', CompetitionsController::class);
    Route::resource('competition-countries', CountriesController::class);
    Route::resource('livescores', LivescoreController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
