<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Highlight;
use App\Models\Prediction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FootballPredictionController extends Controller
{
    //

    public function getPrediction(string $date){
        $highlights=Highlight::orderBy('match_date','DESC')->take(8)->get();
        $predictions=Prediction::whereBetween('match_time', [Carbon::today()->startOfDay(),Carbon::today()->endOfDay()])
            ->get()->groupBy('country');

      return view('predictions.betting-tips', compact('date','highlights','predictions'));
    }
}
