<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Popular;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;
use stdClass;

class Livescores extends Component
{
    public $search;
    public $foo;
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
        $keyword='live_fixture';
        $duration=Carbon::now()->addMinute();
        $request =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'live'=>'all',


            ];
            $url='https://v3.football.api-sports.io/fixtures';
            $response=Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);
            dd($result);

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
            dd($fixture);
            return collect($fixture);

        });
        return view('livewire.livescores',[
            'countries'=>$countries,
            'popular'=>$popular,
            'fixtures'=>$request
        ]);
    }
}
