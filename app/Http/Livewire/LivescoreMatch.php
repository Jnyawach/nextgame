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
        $fixtures =cache()->remember($keyword,$duration,function (){
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
             $statistics=array();
            dd($result);
            if ($result->response){
                $statistics[]=array(
                    'home'=>[
                        'name'=>$result->response[0]->team->name,
                        'logo'=>$result->response[0]->team->logo,
                        'stats'=>$result->response[0]->statistics
                    ],
                    'away'=>[
                        'name'=>$result->response[1]->team->name,
                        'logo'=>$result->response[1]->team->logo,
                        'stats'=>$result->response[1]->statistics
                    ]

                );
            }



            dd($statistics);
            return collect($statistics);

        });
        return view('livewire.livescore-match',[
            'countries'=>$countries,
            'popular'=>$popular,

        ]);
    }
}
