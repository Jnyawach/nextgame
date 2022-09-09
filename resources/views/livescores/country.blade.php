@extends('layouts.main')
@section('title', 'Football Fixtures in'.$country->name)
@section('styles')
    <meta name="description" content="Upcoming football fixtures">
    <meta name="keywords" content="Football fixtures today,Live Football scores, Live football scores tomorrow">
    <meta property="og:title" content="Live Football Scores: {{$country->name}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Upcoming football fixtures">
    <meta name="twitter:description" content="Upcoming football fixtures: {{$country->name}}">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    @livewire('livescore-country',['country'=>$country])
@endsection
@section('scripts')
    @livewireScripts
@endsection

