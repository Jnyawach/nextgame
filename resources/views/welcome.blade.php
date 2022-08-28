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
                            <p class="mt-2 ">{{$highlight->competition}}: <span>{{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</span></p>

                        </div>
                    </div>

                </a>
            </div>
            @endforeach
        </div>

        <a href="{{route('match-highlights.index')}}" class="btn btn-outline-light mt-5">See all highlights<span class="ms-2"><i class="far fa-long-arrow-alt-right"></i></span></a>

    </section>
    @endif
    <section class="popular-competitions mt-5">
        <hr>
        <div class="mt-5 mb-5">
            <h1 class="fs-6 fw-bold">MOST FOLLOWED COMPETITIONS</h1>

                <div class="row display-flex mt-5">
                    @foreach($popular as $competition)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-2">
                            <a href="#" class="text-decoration-none" title="League Name">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <div class="row ">
                                            <div class="col-3">
                                                <div class="popular-logo text-center">
                                                    <img src="{{$competition->league->logo}}" title="Premier League"
                                                         class="img-fluid">
                                                </div>


                                            </div>
                                            <div class="col-9">
                                                <h6 class="text-uppercase">{{$competition->league->type}}</h6>
                                                <p class="fw-bold fs-6">{{ $competition->league->name }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach


                </div>


        </div>
        <hr>

    </section>
    <section class="previous-highlights mt-5">
        <h1 class="fs-6 fw-bold">BETTING TIPS</h1>


    </section>
@endsection
