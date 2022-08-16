<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function SoccerTest(){


      /*  $request=Http::withHeaders([
            'x-rapidapi-host' => 'v3.football.api-sports.io',
            'x-rapidapi-key' => 'ccea136018432bac068b4bae9edb2469'
        ])->get('https://v3.football.api-sports.io/fixtures?season=2022&league=39');

        return json_decode($request);*/

        /*$request=Http::withHeaders([
            'x-rapidapi-host' => 'v3.football.api-sports.io',
            'x-rapidapi-key' => 'ccea136018432bac068b4bae9edb2469'
        ])->get('https://v3.football.api-sports.io/predictions?fixture=868189');

        return json_decode($request);*/


       /* $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://football-prediction-api.p.rapidapi.com/api/v2/predictions?market=classic&iso_date=2022-08-16",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: football-prediction-api.p.rapidapi.com",
                "X-RapidAPI-Key: 36658edad1mshd563a16fdba23b6p1e680djsnf96de1513d8f"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }*/

        //timezones test

        /*$request=Http::withHeaders([
            'x-rapidapi-host' => 'v3.football.api-sports.io',
            'x-rapidapi-key' => 'ccea136018432bac068b4bae9edb2469'
        ])->get('https://v3.football.api-sports.io/timezone');

        return json_decode($request);*/

        //countries

        /*$request=Http::withHeaders([
            'x-rapidapi-host' => 'v3.football.api-sports.io',
            'x-rapidapi-key' => 'ccea136018432bac068b4bae9edb2469'
        ])->get('https://v3.football.api-sports.io/countries');

        return json_decode($request);*/

        //leagues per country

        $request=Http::withHeaders([
            'x-rapidapi-host' => 'v3.football.api-sports.io',
            'x-rapidapi-key' => 'ccea136018432bac068b4bae9edb2469'
        ])->get('https://v3.football.api-sports.io/leagues');

        return json_decode($request);
    }
}
