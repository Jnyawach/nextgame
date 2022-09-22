<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class ShowTip extends Component
{
    public $fixture;
    public $date;
    public function render()
    {
        $duration=Carbon::now()->addHours(6);
        $keyword=$this->fixture;

        // call for fixture statistics by id
        $match =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'id' => $this->fixture,

            ];
            $url='https://v3.football.api-sports.io/fixtures';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);
            $fixture=array();
            //dd($result);
            if ($result->response){
                $fixture['game']=array(
                    'fixture'=>$result->response[0]->fixture,
                    'teams'=>$result->response[0]->teams,
                    'league'=>$result->response[0]->league,
                    'goals'=>$result->response[0]->goals,
                    'event'=>$result->response[0]->events,
                    'lineups'=>$result->response[0]->lineups,
                    'statistics'=>$result->response[0]->statistics

                );
            }
            // dd($fixture);
            return collect($fixture);

        });
        //Head to head fixtures
        $time=Carbon::now()->addDay();
        $games=json_decode($match);
        $head =cache()->remember($keyword.'H2H',$time,function () use($games){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $teams=$games->game->teams->home->id.'-'.$games->game->teams->away->id;
            $body=[
                'h2h' => $teams,
                'last'=>8

            ];
            $url='https://v3.football.api-sports.io/fixtures/headtohead';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);
            //dd($result);
            $fixture=array();
            foreach ($result->response as $game){
                $fixture[]=[
                    'date'=>$game->fixture->date,
                    'home'=>$game->teams->home->name,
                    'home_logo'=>$game->teams->home->logo,
                    'away'=>$game->teams->away->name,
                    'away_logo'=>$game->teams->away->logo,
                    'home_goals'=>$game->goals->home,
                    'away_goals'=>$game->goals->away
                ];
            }

            return collect($fixture);

        });
        //match stats
        $home=array();
        $away=array();
       //dd($statistics);
        if ($stats=$games->game->statistics){

            foreach ($stats[0]->statistics as $data){
                $type=$data->type;
                if (!isset($home[$type])){
                    $home[$type]=[
                        'home'=>$data->value
                    ];
                }

            }
            foreach ($stats[1]->statistics as $data){
                $type=$data->type;
                if (!isset($away[$type])){
                    $away[$type]=[
                        'away'=>$data->value
                    ];
                }

            }

        }
        $statistics=array_merge_recursive($home,$away);

        //Predictions
        $prediction_keyword=$this->fixture.'tip_prediction';
        $keyword2 = 'prediction_date' . $this->date;
        $predictions=cache()->remember($prediction_keyword,Carbon::now()->addHours(6), function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');

            $body=[
                'fixture' => $this->fixture
            ];
            $url='https://v3.football.api-sports.io/predictions';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);
            $predictions=array();
            $predictions=[
                'predictions'=>$result->response[0]->predictions,
                'comparisons'=>$result->response[0]->comparison,
                'forms'=>$result->response[0]->teams
            ];
            return collect($predictions);
        });
        $leagues = cache()->remember($keyword2, $duration, function () {
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body = [
                'date' => $this->date,
            ];
            $url = 'https://v3.football.api-sports.io/fixtures';
            $response = Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url, $body);
            $result = json_decode($response);
            //dd($result);
            $groupedObjects = array();

            foreach ($result->response as $cont) {
                $leagueName = $cont->league->name;
                if (!isset($groupedObjects[$leagueName])) {
                    $groupedObjects[$leagueName] = [
                        'league_name' => $cont->league->name,
                        'league_id' => $cont->league->id,
                        'league_logo' => $cont->league->logo,
                        'league_country' => $cont->league->country,
                        'games' => []
                    ];
                }
                $game = [
                    'fixture_id' => $cont->fixture->id,
                    'date' => $cont->fixture->date,
                    'status' => $cont->fixture->status->short,
                    'status_long' => $cont->fixture->status->long,
                    'elapsed' => $cont->fixture->status->elapsed,
                    'home_team' => $cont->teams->home->name,
                    'home_logo' => $cont->teams->home->logo,
                    'away_team' => $cont->teams->away->name,
                    'away_logo' => $cont->teams->away->logo,
                    'home_goals' => $cont->goals->home,
                    'away_goals' => $cont->goals->away
                ];

                array_push($groupedObjects[$leagueName]['games'], $game);


            }
            // dd($groupedObjects);
            return json_encode($groupedObjects);

        });

        return view('livewire.show-tip',[

            'match'=>json_decode($match),
            'head'=>$head,
            'statistics'=>$statistics,
            'predictions'=>json_decode($predictions),
            'leagues'=>$leagues

        ]);
    }

}
