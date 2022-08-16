<?php

namespace App\Console\Commands;

use App\Models\Timezone;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Config;

class RequestTimezone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:timezone';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request available timezone for fixtures';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $key = Config::get('sports.KEY');
        $host = Config::get('sports.URL');
        $request = Http::withHeaders([
            'x-rapidapi-host' => $host,
            'x-rapidapi-key' => $key
        ])->get('https://v3.football.api-sports.io/timezone');

        $result = json_decode($request);
        foreach ($result->response as $response) {
            $timezone = Timezone::updateOrCreate([
                'name' => $response
            ]);
        }


    }
}
