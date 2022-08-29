@extends('layouts.main')
@section('title',$country->name)
@section('styles')
    <meta name="description" content="Football Competitions in {{$country->name}}">
    <meta name="keywords" content="{{$country->name}},Football competitions in {{$country->name}}">
    <meta property="og:title" content="Football Competitions in {{$country->name}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Football Competitions in {{$country->name}}">
    <meta name="twitter:description" content="All Football Competitions in {{$country->name}}">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('content')
    <section class="mt-5 p-3">
        <h1 class="fw-bold fs-5">{{$country->name}}</h1>
        <h6 class="fw-bold fs-5 country-name mt-5">Competitions</h6>
        <div class="row mt-3">
            @foreach($country->leagues->chunk(6) as $league)
            <div class="col-12 col-sm-6 col-md-3">

                <ul class="list-unstyled competitions">
                    @foreach($league as $competition)
                    <li><a href="{{route('competitions.show',$competition->slug)}}" class="text-decoration-none fs-6" title="Premier League">{{$competition->name}}</a> </li>
                    @endforeach

                </ul>
            </div>
            @endforeach

        </div>

    </section>
@endsection

