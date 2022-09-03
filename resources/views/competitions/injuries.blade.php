@extends('layouts.main')
@section('title', $league->name)
@section('styles')
    <meta name="description" content="{{$league->name}} Injuries">
    <meta name="keywords" content="{{$league->name}}, Football injuries, Sidelines, Current Injuries, Latest Injuries">
    <meta property="og:title" content="{{$league->name}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="{{$league->name}} Injuries">
    <meta name="twitter:description" content="{{$league->name}} Injuries">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    @livewire('competition-injuries',['league'=>$league,'year'=>$year])

@endsection
@section('scripts')
    @livewireScripts
@endsection



