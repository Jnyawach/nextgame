<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Popular;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class LeagueLivescore extends Component
{
    public $league;
    public $search;
    public $foo;
    public $favorites=[];
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],

    ];
    public function render()
    {
        $popular=Popular::all();
        $countries=Country::when($this->search,function ($query){
            return $query->where('name', 'like', '%'.$this->search.'%');
        })->get();
        Carbon::now()->year;
        //prerequisites
        $keyword='five-games-ago'.$this->league->id.'fixtures';
        $keyword_two='five-next-games'.$this->league->id.'fixtures';
        $duration=Carbon::now()->addHours(3);
        $last_games =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'league'=>$this->league->league_id,
                'last'=>5

            ];
            $url='https://v3.football.api-sports.io/fixtures';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);

            $round=array();
            foreach ($result->response as $data){

                $round[]=array(
                    'home'=>$data->teams->home->name,
                    'home_logo'=>$data->teams->home->logo,
                    'away'=>$data->teams->away->name,
                    'away_logo'=>$data->teams->away->logo,
                    'id'=>$data->fixture->id,
                    'date'=>$data->fixture->date,
                    'home_goals'=>$data->goals->home,
                    'away_goals'=>$data->goals->away,
                    'status'=>$data->fixture->status->short

                );
            }
            return json_encode($round);

        });
        $next_games =cache()->remember($keyword_two,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'league'=>$this->league->league_id,
                'next'=>7,


            ];
            $url='https://v3.football.api-sports.io/fixtures';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);

            $round=array();
            foreach ($result->response as $data){

                $round[]=array(
                    'home'=>$data->teams->home->name,
                    'home_logo'=>$data->teams->home->logo,
                    'away'=>$data->teams->away->name,
                    'away_logo'=>$data->teams->away->logo,
                    'id'=>$data->fixture->id,
                    'date'=>$data->fixture->date,
                    'status'=>$data->fixture->status->short

                );
            }
            return json_encode($round);

        });

        $standings =cache()->remember('live_standings'.$this->league->league_id,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'league'=>$this->league->league_id,
                'season'=>Carbon::now()->year,
            ];
            $url='https://v3.football.api-sports.io/standings';
            $response=Http::withHeaders([
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

        return view('livewire.league-livescore',[
            'countries'=>$countries,
            'popular'=>$popular,
            'last_games'=>$last_games,
            'next_games'=>$next_games,
            'standings'=>$standings,
        ]);
    }
}
