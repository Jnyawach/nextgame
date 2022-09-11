<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Popular;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LivescoreStandings extends Component
{
    public $league;
    public $search;
    public $foo;
    public $favorites=[];
    public $year;
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],

    ];
    public function render()
    {
        $duration=Carbon::now()->addHours(3);
        $popular=Popular::all();
        $countries=Country::when($this->search,function ($query){
            return $query->where('name', 'like', '%'.$this->search.'%');
        })->get();
        $standings =cache()->remember('live_standings'.$this->league->league_id,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'league'=>$this->league->league_id,
                'season'=>Carbon::now()->year,
            ];
            $url='https://v3.football.api-sports.io/standings';
            $response=Http::timeout(3)->withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);

            $result=json_decode($response);
            $teams=array();
            //proceed to assign teams
            foreach ($result->response[0]->league->standings[0] as $team){
                //dd($team);
                $teams[]=[
                    'rank'=>$team->rank,
                    'name'=>$team->team->name,
                    'logo'=>$team->team->logo,
                    'id'=>$team->team->id,
                    'points'=>$team->points,
                    'goals_diff'=>$team->goalsDiff,
                    'matches_played'=>$team->all->played,
                    'win'=>$team->all->win,
                    'lose'=>$team->all->lose,
                    'draw'=>$team->all->draw,
                    'goals_for'=>$team->all->goals->for,
                    'goals_against'=>$team->all->goals->against
                ];
            }
            return collect($teams);

        });
        return view('livewire.livescore-standings',[
            'countries'=>$countries,
            'popular'=>$popular,
            'standings'=>$standings,
        ]);
    }
}
