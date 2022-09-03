<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class CompetitionResults extends Component
{
    public $league;
    public $year;
    public function render()
    {
        $keyword=$this->year.$this->league->id.'results';
        $duration=Carbon::now()->addHours(6);
        $request =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'status'=>'FT',
                'league'=>$this->league->league_id,
                'season'=>$this->year,

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
                    'round'=>$data->league->round,
                    'home'=>$data->teams->home->name,
                    'home_logo'=>$data->teams->home->logo,
                    'away'=>$data->teams->away->name,
                    'away_logo'=>$data->teams->away->logo,
                    'id'=>$data->fixture->id,
                    'date'=>$data->fixture->date,
                    'home_goals'=>$data->goals->home,
                    'away_goals'=>$data->goals->away

                );
            }
            return collect($round);

        });
        return view('livewire.competition-results',[
            'fixtures'=>$request
        ]);
    }
}
