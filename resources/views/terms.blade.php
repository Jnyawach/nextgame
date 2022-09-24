@extends('layouts.main')
@section('title','Terms and Conditions')
@section('content')
    <section class="p-3 p-md-5">
        <h6>Revised: {{$term->updated_at->diffForHUmans()}}</h6>
        <div>
            {!! $term->text !!}
        </div>
    </section>
@endsection
