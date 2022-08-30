@extends('layouts.main')
@section('title', $league->name)
@section('styles')
    <meta name="description" content="{{$league->name}} Football Competition">
    <meta name="keywords" content="{{$league->name}}, Football Leagues, Football Competitions">
    <meta property="og:title" content="{{$league->name}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="{{$league->name}}">
    <meta name="twitter:description" content="{{$league->name}} Football Competition">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    @livewire('competition-standings',['league'=>$league,'year'=>$year])

@endsection
@section('scripts')
    @livewireScripts
@endsection
