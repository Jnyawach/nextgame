<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Popular;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Livewire\Component;
use Config;
use stdClass;

class Livescores extends Component
{
    public $search;
    public $foo;
    public $favorites=[];
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],

    ];

    public function mount(){
       // $this->favorites=unserialize($_COOKIE['favorite_id']);
    }


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
            $response=Http::timeout(4)->withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get($url,$body);
            $result= json_decode($response);
            //dd($result);
            $groupedObjects=array();

            foreach ($result->response as $cont){
                $leagueName=$cont->league->name;
                if (!isset($groupedObjects[$leagueName])){
                    $groupedObjects[$leagueName]=[
                        'league_name'=>$cont->league->name,
                        'league_id'=>$cont->league->id,
                        'league_logo'=>$cont->league->logo,
                        'league_country'=>$cont->league->country,
                        'games'=>[]
                    ];
                }
                $game=[
                    'fixture_id'=>$cont->fixture->id,
                    'date'=>$cont->fixture->date,
                    'status'=>$cont->fixture->status->short,
                    'status_long'=>$cont->fixture->status->long,
                    'elapsed'=>$cont->fixture->status->elapsed,
                    'home_team'=>$cont->teams->home->name,
                    'home_logo'=>$cont->teams->home->logo,
                    'away_team'=>$cont->teams->away->name,
                    'away_logo'=>$cont->teams->away->logo,
                    'home_goals'=>$cont->goals->home,
                    'away_goals'=>$cont->goals->away
                ];

                array_push($groupedObjects[$leagueName]['games'],$game);


            }
           // dd($groupedObjects);
            return json_encode($groupedObjects);

        });
        return view('livewire.livescores',[
            'countries'=>$countries,
            'popular'=>$popular,
            'fixtures'=>$request
        ]);
    }

    public function AddFavorite(Request $request,$id){
        if($cookie=$request->cookie('favorite')){
           $cookie.= (string)$id. ',';

            $data=cookie('favorite', $cookie, 120);
            dd($data);
        }

    }
}
