@extends('layouts.main')
@section('title', 'Football Competitions')
@section('styles')
    <meta name="description" content="Football Competitions">
    <meta name="keywords" content="All Football Competitions around the world">
    <meta property="og:title" content="Football Competitions" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Football Competitions">
    <meta name="twitter:description" content="All Football Competitions around the world">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('content')
    <section class="mt-5 p-3">
        <h1 class="fw-bold fs-5">Competitions</h1>
        <div class="row mt-5">
            @foreach($countries as $country)
            <div class="col-12 col-sm-6 col-md-3 p-2">
                <h6 class="fw-bold fs-6 country-name">{{$country->name}}</h6>
                <ul class="list-unstyled competitions">
                    @foreach($country->leagues->take(6) as $league)
                    <li><a href="{{route('competitions.show', $league->slug)}}" class="text-decoration-none fs-6" title="{{$league->name}}">{{$league->name}}</a> </li>
                    @endforeach

                    <li><a href="{{route('competition-countries.show', $country->slug)}}" class="btn btn-link p-0 text-decoration-none text-light">Show all<span class="ms-2"><i class="fal fa-angle-right"></i></span></a> </li>
                </ul>

            </div>
            @endforeach




        </div>
        <div class="text-center mx-auto mt-5 align-content-center">
            {{$countries->links('vendor.pagination.custom')}}
        </div>

    </section>
@endsection
