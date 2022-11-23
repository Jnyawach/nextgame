@extends('layouts.admin')
@section('title','Messages')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <div class="container p-5">
        <div class="card">
            <div class="card-header p-1">
                <h5 class="fs-5 text-capitalize m-1">{{$message->subject}}
                    <a href="{{route('contact.index')}}" class="float-end fs-5 text-decoration-none">Return to inbox</a>
                </h5>

            </div>
            <div class="card-body">
                <h3 class="card-title fs-5">
                    {{$message->name}}:
                    &nbsp;{{$message->email}}&nbsp;
                    <span>{{$message->created_at->diffForHumans()}}</span>
                </h3>
                <hr class="dropdown-divider">
                <p class="card-text">
                    {{$message->message}}
                </p>
                <hr class="dotted">
                @if(is_null($message->response))
                    @livewire('response',['message' => $message])
                @else
                    <div class="bg-light p-2">
                        <h6 class="fs-6">Replying to {{$message->name}}</h6>
                        <h4 class="fs-6">{{$message->updated_at->diffForHumans()}}</h4>
                    </div>
                    <p class="card-text">{!! $message->response !!}</p>
                @endif
            </div>
        </div>


    </div>

@endsection
@section('scripts')
    @livewireScripts
@endsection
