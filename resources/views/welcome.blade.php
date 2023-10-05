@extends('layouts.main')
@section('title','Latest Match highlights and football Predictions')
@section('content')
@section('styles')
<meta name="description" content="Football Betting Tips Today">
<meta name="keywords" content="Football Betting tips: Prediction for today's games">
<meta property="og:title" content="Football Betting Tips Today" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:image" content="{{asset('images/default')}}" />
<meta name="twitter:title" content="Football Betting Tips Today">
<meta name="twitter:description" content="Football Betting tips: Prediction for today's games">
<meta name="twitter:image" content="{{asset('images/default')}}">
<meta name="twitter:card" content="summary_large_image">

@endsection

@if($predictions->count()>0)
<section>
    <div class="my-5">
        <h1 class="fs-6 fw-bold">Latest Predictions</h1>
        <div class="row my-5">
            <div class="col-12 col-md-8">
                <div class="card fixture">
                    <div class="card-header p-0" style="border-bottom:1px solid #222">
                        @include('includes.prediction-nav')
                    </div>
                </div>
                <div class="card-body my-5">
                    @foreach($predictions as $index=>$prediction)
                     <div class="my-5">
                         <h2 class="fs-6 my-2">{{$index}}</h2>
                         <div class="game-detail mt-2">
                             <table class="table league-table">
                                 <thead>
                                 <tr>
                                     <th></th>
                                     <th></th>
                                     <th></th>
                                     <th colspan="3">Odds</th>
                                     <th colspan="3">Place a bet</th>
                                 </tr>
                                 <tr>
                                     <th>Time</th>
                                     <th>Match</th>
                                     <th>Prediction</th>
                                     <th>1</th>
                                     <th>X</th>
                                     <th>2</th>
                                 </tr>
                                 </thead>
                                 <tbody>

                                 @foreach($prediction as $match)
                                     <tr class="text-light ">
                                         <td>
                                             <small>
                                                 {{\Carbon\Carbon::parse($match->match_time)->timezone($_COOKIE['timezone'])->format('g:i A')}}
                                             </small>
                                         </td>
                                         <td style="">
                                             <p class="p-0 m-0 text-capitalize">{{$match->home}} vs {{$match->away}}</p>
                                         </td>
                                         <td>
                                             <button class="btn-primary p-0" style="height: 23px; width: 23px; border-radius:5px;">
                                                 {{$match->prediction}}
                                             </button>
                                         </td>

                                         <td style="letter-spacing: 1px;">
                                             {{number_format($match->odds['1'],2)}}
                                         </td>
                                         <td style="letter-spacing: 1px;">
                                             {{number_format($match->odds['X'],2)}}
                                         </td>
                                         <td style="letter-spacing: 1px;">
                                             {{number_format($match->odds['2'],2)}}
                                         </td>


                                     </tr>
                                 @endforeach


                                 </tbody>
                             </table>


                         </div>
                     </div>
                    @endforeach



                </div>
            </div>
        </div>

    </div>
</section>
@endif

@if($highlights->count()>0)
<section class="latest-highlights mt-5">

    <div class="play-title">
        <h1 class="fs-6 fw-bold">LATEST MATCH HIGHLIGHTS</h1>

    </div>

    <div class="row mt-5">
        @foreach($highlights as $highlight)
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 pt-3">
            <a href="{{route('match-highlights.show', $highlight->slug)}}" title="{{$highlight->name}} Highlights"
                class="text-decoration-none">
                <div>
                    <div class="player-thumbnail">
                        <img src="{{$highlight->thumbnail}}" class="img-fluid curved" alt="{{$highlight->name}}">

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

    <a href="{{route('match-highlights.index')}}" class="btn btn-outline-light mt-5">See all highlights<span
            class="ms-2"><i class="far fa-long-arrow-alt-right"></i></span></a>

</section>
@endif


@endsection
