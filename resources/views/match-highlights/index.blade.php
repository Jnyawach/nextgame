@extends('layouts.main')
@section('title', 'Football Match Highlights')
@section('styles')
    <meta name="description" content="Recent Football Match Highlights">
    <meta name="keywords" content="Football Highlights, Match Recaps,Football match Reviews">
    <meta property="og:title" content="Recent Football Match Highlights" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{asset('images/default')}}" />
    <meta name="twitter:title" content="Recent Football Match Highlights">
    <meta name="twitter:description" content="Football Highlights, Match Recaps,Football match Reviews">
    <meta name="twitter:image" content="{{asset('images/default')}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
