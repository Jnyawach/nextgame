@extends('layouts.main')
@section('title', 'All Countries')
@section('styles')
    <meta name="description" content="Football Competition Countries">
    <meta name="keywords" content="Football competitions,Major Leagues, Football Leagues ">
    <meta property="og:title" content="Competition Countries" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Competition Countries">
    <meta name="twitter:description" content="Football Competition Countries">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('content')
    <section class="mt-5">
        <div class="row">
            @foreach($countries as $letter=>$country)
                <div class="col-6 col-sm-6 col-md-3 p-2">
                    <h6 class="text-primary">{{$letter}}</h6>
                    <div class="countries">
                        <ul class="list-unstyled competitions">
                            @foreach($country as $competition)
                                <li><a href="{{route('competition-countries.show',$competition->slug)}}" class="text-decoration-none fs-6" title="Premier League">{{$competition->name}}</a> </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@endsection
