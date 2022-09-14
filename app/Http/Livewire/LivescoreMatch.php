<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Popular;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;
use function Symfony\Component\String\s;

class LivescoreMatch extends Component
{
    public $fixture;
    public $search;
    public $foo;
    public $favorites=[];
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],

    ];
    public function render()
    {
        $duration=Carbon::now()->addMinute();
        $keyword=$this->fixture;
        $popular=Popular::all();
        $countries=Country::when($this->search,function ($query){
            return $query->where('name', 'like', '%'.$this->search.'%');
        })->get();
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
         //dd($statistics);
        return view('livewire.livescore-match',[
            'countries'=>$countries,
            'popular'=>$popular,
            'match'=>json_decode($match),
            'head'=>$head,
            'statistics'=>$statistics

        ]);
    }
}
