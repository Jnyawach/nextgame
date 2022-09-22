@extends('layouts.main')
@section('title', 'Football Betting Tips Today')
@section('styles')
    <meta name="description" content="Football Betting Tips {{$date}}">
    <meta name="keywords" content="Football Betting tips: Prediction for {{$date}}">
    <meta property="og:title" content="Football Betting Tips Today" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Football Betting Tips {{$date}}">
    <meta name="twitter:description" content="Football Betting tips: Prediction for {{$date}}">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
    @livewireStyles
@endsection
@section('content')
    <section class="mt-5">
        @livewire('prediction-date',['date'=>$date])
    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection

