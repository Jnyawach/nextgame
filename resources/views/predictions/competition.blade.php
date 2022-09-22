@extends('layouts.main')
@section('title', 'Football Betting Tips '.$competition)
@section('styles')
    <meta name="description" content="Football Betting Tips {{$competition}}">
    <meta name="keywords" content="Football Betting tips: Prediction for today's games">
    <meta property="og:title" content="Football Betting Tips {{$competition}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Football Betting Tips {{$competition}}">
    <meta name="twitter:description" content="Football Betting tips: Prediction for today's games">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    <section class="mt-5">
        @livewire('competition-prediction',['league'=>$league,'date'=>$date])
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection

