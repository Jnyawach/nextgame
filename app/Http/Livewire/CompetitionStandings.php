<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class CompetitionStandings extends Component
{
    public $league;
    public $year;
    public function render()
    {
        //This endpoint to request weekly or monthly basis
        $key = Config::get('sports.KEY');
        $host = Config::get('sports.URL');
        $body=[
           'league'=>$this->league->league_id,
            'season'=>$this->year
        ];
        $url='https://v3.football.api-sports.io/standings';
        $request = Http::withHeaders([
            'x-rapidapi-host' => $host,
            'x-rapidapi-key' => $key
        ])->get($url,$body);
       $result=json_decode($request);

        return view('livewire.competition-standings',[
            'standings'=>$result
        ]);
    }
}
