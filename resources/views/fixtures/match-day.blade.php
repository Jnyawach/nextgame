@extends('layouts.main')
@section('title', 'Football Fixtures Today')
@section('styles')
    <meta name="description" content="Football Fixtures {{$date}}">
    <meta name="keywords" content="Football fixtures today,Major Leagues, Tomorrow Fixture ">
    <meta property="og:title" content="Football fixtures today around the world" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Football Fixtures {{$date}}">
    <meta name="twitter:description" content="Football Fixtures {{$date}}">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    @livewire('match-day',['date'=>$date])
@endsection
@section('scripts')
    @livewireScripts
@endsection

