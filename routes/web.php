<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminLinksController;
use App\Http\Controllers\General\FootballPredictionController;
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
use App\Http\Controllers\Admin\AdminPolicyController;


/*General Controller------------*/
use App\Http\Controllers\MainController;
use App\Http\Controllers\General\MatchHighlightsController;
use App\Http\Controllers\General\CompetitionsController;
use App\Http\Controllers\General\CountriesController;
use App\Http\Controllers\General\FixturesController;
use App\Http\Controllers\General\LivescoreController;
use App\Http\Controllers\General\PredictionController;

Route::group(['middleware'=>['auth','role:Admin']], function (){
    Route::resource('admin/links', AdminLinksController::class);
    Route::resource('admin/contact', AdminContactController::class);
    Route::resource('admin/policies', AdminPolicyController::class);
    Route::resource('admin/videos', AdminVideoController::class);
    Route::resource('admin/popular', AdminPopularCompetitions::class);
    Route::resource('admin/teams', AdminTeamsController::class);
    Route::resource('admin/leagues', AdminLeaguesController::class);
    Route::resource('admin/countries', AdminCountriesController::class);
    Route::resource('admin/timezones', AdminTimezoneController::class);
    Route::resource('admin', AdminController::class);
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');
});
//General Routes
Route::get('terms',  [MainController::class, 'terms'])->name('terms');
Route::get('privacy-policy',  [MainController::class, 'policy'])->name('privacy-policy');
Route::get('contact-us',  [MainController::class, 'contact'])->name('contact');
Route::get('dmca',  [MainController::class, 'dmca'])->name('dmca');
Route::get('football-predictions/{date}.html', [FootballPredictionController::class, 'getPrediction'])->name('football.predictions');
Route::resource('/', MainController::class);
Route::resource('match-highlights', MatchHighlightsController::class);

/*
Route::group([], function (){
    Route::get('predictions/tip/{competition}/{id}',  [PredictionController::class, 'tip'])->name('fixture-tip');
    Route::get('predictions/competition/{competition}/{id}',  [PredictionController::class, 'competition'])->name('competition-tips');
    Route::get('predictions/betting-tips/{id}.html',  [PredictionController::class, 'predictions'])->name('betting-tips');


    Route::get('search',  [MainController::class, 'search'])->name('search');

    Route::get('football/match/{match}/{id}',  [MainController::class, 'match'])->name('league.match');
    Route::get('football/{id}/standings',  [MainController::class, 'standings'])->name('league.standings');
    Route::get('football/{id}/fixtures',  [MainController::class, 'fixture'])->name('league.fixture');
    Route::get('football/{id}',  [MainController::class, 'football'])->name('football.index');

    Route::get('fixtures/match-day/{id}',  [FixturesController::class, 'match'])->name('match-day');
    Route::resource('fixtures', FixturesController::class);
    Route::get('competitions/fixtures/{id}',  [CompetitionsController::class, 'fixtures'])->name('competition-fixtures');
    Route::get('competitions/results/{id}',  [CompetitionsController::class, 'results'])->name('competition-results');
    Route::get('competitions/injuries/{id}',  [CompetitionsController::class, 'injuries'])->name('competition-injuries');
    Route::resource('competitions', CompetitionsController::class);
    Route::resource('competition-countries', CountriesController::class);
    Route::get('livescores/football/{id}',  [LivescoreController::class, 'football'])->name('livescore-football');
    Route::get('livescores/country/{id}',  [LivescoreController::class, 'country'])->name('livescore-country');
    Route::get('livescores/competitions/{id}',  [LivescoreController::class, 'competitions'])->name('livescore-competition');
    Route::resource('livescores', LivescoreController::class);
});

*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
