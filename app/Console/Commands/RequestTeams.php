<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Team;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Config;

class RequestTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:teams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is for requesting all teams around the world';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Should be requested monthly
        $key = Config::get('sports.KEY');
        $host = Config::get('sports.URL');
        $countries=Country::all();
        foreach ($countries as $country){
            $request = Http::withHeaders([
                'x-rapidapi-host' => $host,
                'x-rapidapi-key' => $key
            ])->get('https://v3.football.api-sports.io/teams?country='.$country->name);

            $result = json_decode($request);
            foreach ($result->response as $response) {

                $teams = Team::updateOrCreate([
                    'name' => $response->team->name,
                    'country_id'=>$country->id,
                    'team_id'=>$response->team->id,
                    'code'=>$response->team->code,
                    'founded'=>$response->team->founded,
                    'logo'=>$response->team->logo,
                    'venue_id'=>$response->venue->id,
                    'venue_name'=>$response->venue->name,
                    'venue_address'=>$response->venue->address,
                    'venue_capacity'=>$response->venue->capacity,
                    'venue_surface'=>$response->venue->surface,
                    'venue_image'=>$response->venue->image
                ]);
            }
        }

    }
}
