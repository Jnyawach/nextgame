<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\Highlight;
use App\Models\League;
use App\Models\Policy;
use App\Models\Popular;
use App\Models\Prediction;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Config;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $time=Carbon::now()->addHours(2);
        $popular=cache()->remember('popular',$time,function (){
            return Popular::all();
        });
        $highlights=cache()->remember('home-highlights',$time, function (){
          return  Highlight::orderBy('published','DESC')->take(4)->get();
        });

        $keyword='prediction_today'.Carbon::now()->format('Y-m-d');
        $duration=Carbon::now()->addHours(6);
        $request =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'date'=>Carbon::now()->format('Y-m-d'),
            ];
            $url='https://v3.football.api-sports.io/fixtures';
            $response=Http::timeout(100)->withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);
            //dd($result);
            $groupedObjects=array();

            foreach ($result->response as $cont){
                $leagueName=$cont->league->name;
                if (!isset($groupedObjects[$leagueName])){
                    $groupedObjects[$leagueName]=[
                        'league_name'=>$cont->league->name,
                        'league_id'=>$cont->league->id,
                        'league_logo'=>$cont->league->logo,
                        'league_country'=>$cont->league->country,
                        'games'=>[]
                    ];
                }
                $game=[
                    'fixture_id'=>$cont->fixture->id,
                    'date'=>$cont->fixture->date,
                    'status'=>$cont->fixture->status->short,
                    'status_long'=>$cont->fixture->status->long,
                    'elapsed'=>$cont->fixture->status->elapsed,
                    'home_team'=>$cont->teams->home->name,
                    'home_logo'=>$cont->teams->home->logo,
                    'away_team'=>$cont->teams->away->name,
                    'away_logo'=>$cont->teams->away->logo,
                    'home_goals'=>$cont->goals->home,
                    'away_goals'=>$cont->goals->away
                ];

                array_push($groupedObjects[$leagueName]['games'],$game);


            }
            // dd($groupedObjects);
            return json_encode($groupedObjects);

        });
        $fixtures=collect(json_decode($request));


        return view('welcome', compact('popular','highlights','fixtures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function SoccerTest(){


       /*$key = Config::get('sports.KEY');
        $host = Config::get('sports.URL');

        $request=Http::withHeaders([
            'x-rapidapi-host' => $host,
            'x-rapidapi-key' => $key
        ])->get('https://v3.football.api-sports.io/teams?country=England');

        return json_decode($request);*/
        /*$key = Config::get('sports.KEY');
        $host = Config::get('sports.URL');


            $request = Http::withHeaders([
                'x-rapidapi-host' => 'football-prediction-api.p.rapidapi.com',
                'x-rapidapi-key' => '36658edad1mshd563a16fdba23b6p1e680djsnf96de1513d8f'
            ])->get('https://football-prediction-api.p.rapidapi.com/api/v2/predictions?market=classic&iso_date=2022-08-21&federation=UEFA');

            $result = json_decode($request);
            return $result;*/

        //scorebat highlights

        $response=Http::get('https://www.scorebat.com/video-api/v3/feed/?token='.Config::get('scorebat.access_token'));
    $highlights=json_decode($response);
    foreach ($highlights as $highlight){
       foreach($highlight as $video){
           return $video;
       }
    }





    }


    public function football($id){
        $league=League::findBySlugOrFail($id);
        return view('football.index', compact('league'));
    }
    public function fixture($id){
        $league=League::findBySlugOrFail($id);
        $year=date('Y');
        return view('football/fixtures', compact('league','year'));
    }

    public function standings($id){
        $league=League::findBySlugOrFail($id);
        $year=date('Y');
        return view('football/standings', compact('league','year'));
    }

    public function match($match, $id){
        $fixture=$id;
        $match=str_replace('-', ' ', $match);

        return view('football/match', compact('fixture','match'));
    }

    public function policy(){
        $policy=Policy::where('category','Privacy')->latest()->first();
        return view('privacy-policy', compact('policy'));
    }
    public function terms(){
        $term=Policy::where('category','Terms')->latest()->first();
        return view('terms', compact('term'));
    }

    public function search(){

        return view('search', );
    }

    public function dmca(){
        return view('dmca');
    }

    public function contact(){
        return view('contact-us');
    }

}
