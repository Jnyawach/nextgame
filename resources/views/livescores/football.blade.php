@extends('layouts.main')
@section('title', 'Football Fixtures'.$date)
@section('styles')
    <meta name="description" content="Upcoming football fixtures">
    <meta name="keywords" content="Football fixtures today,Live Football scores, Live football scores tomorrow">
    <meta property="og:title" content="Live Football Scores: Premier League, laliga, Bundesliga, Ligue 1, Serie A..." />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Upcoming football fixtures">
    <meta name="twitter:description" content="Upcoming football fixtures: Premier League, laliga, Bundesliga, Ligue 1, Serie A...">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    @livewire('livescore-football',['date'=>$date])
@endsection
@section('scripts')
    @livewireScripts
@endsection
