@extends('layouts.main')
@section('title','Latest Match highlights and football Predictions')
@section('content')
    @if($highlights->count()>0)
    <section class="latest-highlights mt-5">
        <div class="play-title">
            <h1 class="fs-6 fw-bold">LATEST MATCH HIGHLIGHTS</h1>

        </div>

        <div class="row mt-5">
            @foreach($highlights as $highlight)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 pt-3">
                <a href="{{route('match-highlights.show', $highlight->slug)}}" title="{{$highlight->name}} Highlights" class="text-decoration-none">
                    <div>
                        <div class="player-thumbnail">
                            @if(file_get_contents($highlight->thumbnail))
                                <img src="{{$highlight->thumbnail}}" class="img-fluid curved" alt="{{$highlight->name}}">
                            @else
                                <img src="{{asset('images/default.jpg')}}" class="img-fluid curved" alt="{{$highlight->name}}">
                            @endif

                            <div class="play-icon">
                                <span class="fs-4"><i class="fal fa-play"></i></span>

                            </div>

                        </div>

                        <div class="match-details">
                            <h6 class="mt-3">{{$highlight->name}}</h6>

                            <p><span>{{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</span></p>

                        </div>
                    </div>

                </a>
            </div>
            @endforeach
        </div>

        <a href="{{route('match-highlights.index')}}" class="btn btn-outline-light mt-5">See all highlights<span class="ms-2"><i class="far fa-long-arrow-alt-right"></i></span></a>

    </section>
    @endif
    @if($fixtures->count()>0)
    <section class="prediction-section mt-5">
        <hr>
        <h1 class="fs-6 fw-bold mt-5">TODAY'S TIPS</h1>
        <div class="row mt-5">
            @foreach($fixtures->take(5) as $fixture)

                @foreach(array_slice($fixture->games,0,2) as $match)
                    <div class="col-12 col-sm-6 col-md-4">
                    <div class="game-detail mt-2 betting-card">
                        <table>
                            <tbody>
                            <tr>

                                <td style="width: 5%; text-align: center;">
                                    <img src="{{$match->home_logo}}" style="height: 18px" alt="{{$match->home_team}}">
                                </td>
                                <td style="width: 50%">
                                    <p class="p-0 m-0">{{$match->home_team}}</p>
                                </td>
                                <td style="width: 40%" rowspan="2" class="text-end">
                                    <a href="{{route('fixture-tip',[\Illuminate\Support\Str::slug($match->home_team.'-vs-'.$match->away_team),$match->fixture_id])}}" title="See Prediction"
                                       class="btn btn-link text-decoration-none">See prediction<i
                                            class="fal fa-angle-right ms-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 5%; text-align: center;">
                                    <img src="{{$match->away_logo}}" style="height: 18px" alt="{{$match->away_team}}">
                                </td>
                                <td style="width: 50%">
                                    <p class="p-0 m-0">{{$match->away_team}}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>


                    </div>
                    </div>
                @endforeach
            @endforeach
        </div>

        <a href="{{route('predictions.index')}}" class="btn btn-outline-light mt-5">See all betting tips<span class="ms-2"><i class="far fa-long-arrow-alt-right"></i></span></a>

    </section>
    @endif
    <section class="popular-competitions mt-5">
        <hr>
        <div class="mt-5 mb-5">
            <h1 class="fs-6 fw-bold">MOST FOLLOWED COMPETITIONS</h1>

                <div class="row display-flex mt-5">
                    @foreach($popular as $competition)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-1">
                            <a href="{{route('competitions.show',$competition->league->slug)}}" class="text-decoration-none" title="{{$competition->league->name}}">
                                <div class="card transform-card fixture">
                                    <div class="card-body p-2">
                                        <div class="row ">
                                            <div class="col-3 align-self-center">
                                                <div class="popular-logo text-center">
                                                    <img src="{{$competition->league->logo}}" title="Premier League"
                                                         class="img-fluid">
                                                </div>


                                            </div>
                                            <div class="col-9">
                                                <h6 class="">{{$competition->league->type}}</h6>
                                                <p class="fw-bold p-0 m-0">{{ \Illuminate\Support\Str::limit($competition->league->name, 24, $end='...') }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach


                </div>


        </div>


    </section>

@endsection
