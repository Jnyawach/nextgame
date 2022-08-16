<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Config;

class RequestCountry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:country';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request all countries available for fixtures';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //This endpoint to be request on a weekly or monthly basis
        $key = Config::get('sports.KEY');
        $host = Config::get('sports.URL');
        $request = Http::withHeaders([
            'x-rapidapi-host' => $host,
            'x-rapidapi-key' => $key
        ])->get('https://v3.football.api-sports.io/countries');

        $result = json_decode($request);
        foreach ($result->response as $response) {
            $timezone = Country::updateOrCreate([
                'name' => $response->name,
                'code'=>$response->code,
                'flag'=>$response->flag
            ]);
        }
    }
}
