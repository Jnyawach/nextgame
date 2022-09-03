@extends('layouts.main')
@section('title', 'Football Fixtures Today')
@section('styles')
    <meta name="description" content="Today Football Fixtures">
    <meta name="keywords" content="Football fixtures today,Major Leagues, Tomorrow Fixture ">
    <meta property="og:title" content="Football fixtures today around the world" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Today Football Fixtures">
    <meta name="twitter:description" content="Today Football Fixtures">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    @livewire('fixtures')
@endsection
@section('scripts')
    @livewireScripts
@endsection
