<?php

namespace App\Console\Commands;

use App\Models\Highlight;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Config;

class RequestHighlights extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:highlights';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command request video highlights from scorebat. Should be called
    once on a daily basis';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $response=Http::get('https://www.scorebat.com/video-api/v3/feed/?token='.Config::get('scorebat.access_token'));
       $highlights= json_decode($response, True);




       foreach ($highlights as $video){
               foreach ($video as $highlight){
                   $item= Highlight::updateOrCreate([
                       'name'=>$highlight['title'],
                       'competition'=>$highlight['competition'],
                       'competition_url'=>$highlight['competitionUrl'],
                       'match_url'=>$highlight['matchviewUrl'],
                       'thumbnail'=>$highlight['thumbnail'],
                       'match_date'=>Carbon::parse($highlight['date']),
                       'video_id'=>$highlight['videos'][0]['id'],
                       'video_title'=>$highlight['videos'][0]['title'],
                       'video_embed'=>$highlight['videos'][0]['embed'],
                       'published'=>Carbon::parse($highlight['date']),
                       'index_status'=>0
                   ]);
               }

           }



    }
}
