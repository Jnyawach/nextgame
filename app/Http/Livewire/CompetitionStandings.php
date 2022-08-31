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

        $keyword=$this->year.$this->league->id;
        $duration=Carbon::now()->addHour();

        $request =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'league'=>$this->league->league_id,
                'season'=>$this->year
            ];
            $url='https://v3.football.api-sports.io/standings';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            return json_decode($response);

        });



        return view('livewire.competition-standings',[
            'standings'=>$request
        ]);
    }
}
