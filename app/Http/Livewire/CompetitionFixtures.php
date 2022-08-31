<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class CompetitionFixtures extends Component
{
    public $league;
    public $year;
    public function render()

    {
        $keyword=$this->year.$this->league->id.'fixtures';
        $duration=Carbon::now()->addHours(6);

        $request =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'status'=>'NS',
                'league'=>$this->league->league_id,
                'season'=>$this->year
            ];
            $url='https://v3.football.api-sports.io/fixtures';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            return json_decode($response);

        });
        dd($request);
        return view('livewire.competition-fixtures',[
            'fixures'=>$request
        ]);
    }
}
