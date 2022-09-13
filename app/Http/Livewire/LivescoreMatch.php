<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Popular;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

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
           // dd($result);
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



           //dd($fixture);
           return collect($fixture);

        });

        return view('livewire.livescore-match',[
            'countries'=>$countries,
            'popular'=>$popular,
            'match'=>json_decode($match)

        ]);
    }
}
