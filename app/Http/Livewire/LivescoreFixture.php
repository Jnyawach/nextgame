<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Popular;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Config;

class LivescoreFixture extends Component
{
    public $league;
    public $search;
    public $switch=false;
    public $foo;
    public $favorites=[];
    public $year;
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

        $keyword=$this->year.$this->league->id.'fixtures_live';
        $duration=Carbon::now()->addHours(3);
        $fixtures =cache()->remember($keyword,$duration,function (){
            $key = Config::get('sports.KEY');
            $host = Config::get('sports.URL');
            $body=[
                'league'=>$this->league->league_id,
                'status'=>'NS',
                'season'=>$this->year

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
                    'status'=>$data->fixture->status->short,
                    'group'=>Carbon::parse($data->fixture->date)->isoFormat('MMM Do YY')

                );
            }
            return collect($round);

        });
        return view('livewire.livescore-fixture',[
            'countries'=>$countries,
            'popular'=>$popular,
            'fixtures'=>$fixtures,

        ]);
    }

    public function CloseMenu(){
        $this->switch=false;
    }

    public function OpenMenu(){
        $this->switch=true;
    }
}
