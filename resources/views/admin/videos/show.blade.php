@extends('layouts.admin')
@section('title', $highlight->name)
@section('content')
    <section>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="fw-bold">{{$highlight->name}}</h6>
                        <p><span class="text-primary">Competition:</span> {{$highlight->competition}}</p>
                        <p><span class="text-primary">Date:</span> {{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</p>

                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="video-display">
                            {!! $highlight->video_embed !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
