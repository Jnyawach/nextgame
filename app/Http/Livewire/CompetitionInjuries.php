<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class CompetitionInjuries extends Component
{
    public $league;
    public $year;
    public function render()
    {
        $keyword=$this->year.$this->league->id.'injuries';
        $duration=Carbon::now()->addHours(6);


        $request =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'league'=>$this->league->league_id,
                'season'=>$this->year,
                'date'=>Carbon::now()->isoFormat('YYYY-MM-DD')
            ];
            $url='https://v3.football.api-sports.io/injuries';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);
            $injuries=array();
            foreach ($result->response as $data){

                $injuries[]=array(
                    'id'=>$data->player->id,
                    'name'=>$data->player->name,
                    'avatar'=>$data->player->photo,
                    'type'=>$data->player->reason,
                    'team'=>$data->team->name


                );
            }
            return collect($injuries);

        });

        return view('livewire.competition-injuries',[
            'injuries'=>$request
        ]);
    }
}
