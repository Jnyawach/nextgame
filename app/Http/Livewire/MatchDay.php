<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class MatchDay extends Component
{
    public $date;
    public function render()
    {
        $keyword=$this->date.'following';
        $duration=Carbon::now()->addMinutes(30);
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

            $fixture=array();
            foreach ($result->response as $data){

                $fixture[]=array(
                    'fixture_id'=>$data->fixture->id,
                    'date'=>$data->fixture->date,
                    'status'=>$data->fixture->status->short,
                    'elapsed'=>$data->fixture->status->elapsed,
                    'league_name'=>$data->league->name,
                    'league_logo'=>$data->league->logo,
                    'league_country'=>$data->league->country,
                    'league_id'=>$data->league->id,
                    'home_name'=>$data->teams->home->name,
                    'home_logo'=>$data->teams->home->logo,
                    'away_name'=>$data->teams->away->name,
                    'away_logo'=>$data->teams->away->logo,
                    'home_goals'=>$data->goals->home,
                    'away_goals'=>$data->goals->away



                );
            }
            return collect($fixture);

        });
        return view('livewire.match-day',[
            'fixtures'=>$request
        ]);
    }
}
