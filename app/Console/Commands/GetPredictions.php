<?php

namespace App\Console\Commands;

use App\Models\Prediction;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Config;

class GetPredictions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:predictions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get football predictions from api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $key = Config::get('rapid.KEY');
        $host = Config::get('rapid.URL');
        $url='https://football-prediction-api.p.rapidapi.com/api/v2/predictions';
        $response=Http::withHeaders([
            'x-rapidapi-host' => $host,
            'x-rapidapi-key' => $key
        ])->get($url);
        $result= json_decode($response);

        foreach ($result->data as $game){

            $prediction=Prediction::updateOrCreate([
               'home'=>$game->home_team,
                'away'=>$game->away_team,
                'prediction_id'=>$game->id,
                'market'=>$game->market,
                'competition'=>$game->competition_name,
                'prediction'=>$game->prediction,
                'country'=>$game->competition_cluster,
                'time'=>Carbon::parse($game->start_date)->setTimezone('UTC'),
                'odds'=>json_encode($game->odds),
                'status'=>$game->status,
                'federation'=>$game->federation
            ]);
        }
    }
}
