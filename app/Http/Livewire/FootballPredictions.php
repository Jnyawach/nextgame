<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class FootballPredictions extends Component
{
    public $date;
    public function render()
    {
        $keyword='prediction_today'.$this->date;
        $duration=Carbon::now()->addHours(6);
        $request =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'date'=>$this->date,
            ];
            $url='https://v3.football.api-sports.io/fixtures';
            $response=Http::withHeaders([
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
        return view('livewire.football-predictions',[
            'fixtures'=>$request
        ]);
    }
}
