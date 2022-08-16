<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\League;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Config;

class RequestLeagues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:leagues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request for all available leagues in the world';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //This endpoint to request weekly or monthly basis
        $key = Config::get('sports.KEY');
        $host = Config::get('sports.URL');
        $request = Http::withHeaders([
            'x-rapidapi-host' => $host,
            'x-rapidapi-key' => $key
        ])->get('https://v3.football.api-sports.io/leagues');

        $result = json_decode($request);
        foreach ($result->response as $response) {
            $country=Country::where('name',$response->country->name)->first();
            $timezone = League::updateOrCreate([
                'name' => $response->league->name,
                'country_id'=>$country->id,
                'type'=>$response->league->type,
                'logo'=>$response->league->logo,
                'league_id'=>$response->league->id
            ]);
        }
    }
}
