@extends('layouts.main')
@section('title', $match)
@section('styles')
    <meta name="description" content="{{$match}} Events, lineups, scores and progress">
    <meta name="keywords" content="{{$match}}, Football Leagues, Football Competitions">
    <meta property="og:title" content="{{$match}}"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="{{$match}}">
    <meta name="twitter:description" content="{{$match}} Events, lineups, scores and progress">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    @livewire('livescore-match',['fixture'=>$fixture])

@endsection
@section('scripts')
    @livewireScripts
@endsection

