<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\Highlight;
use App\Models\League;
use App\Models\Popular;
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
          return  Highlight::take(4)->get();
        });
        return view('welcome', compact('popular','highlights'));
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
}
