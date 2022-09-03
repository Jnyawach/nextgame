@extends('layouts.main')
@section('title', $league->name)
@section('styles')
    <meta name="description" content="{{$league->name}} Fixture Results">
    <meta name="keywords" content="{{$league->name}}, Football Leagues, Football fixtures, Fixture Results">
    <meta property="og:title" content="{{$league->name}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="{{$league->name}} Fixture Results">
    <meta name="twitter:description" content="{{$league->name}} Fixture Results">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    @livewire('competition-results',['league'=>$league,'year'=>$year])

@endsection
@section('scripts')
    @livewireScripts
@endsection


