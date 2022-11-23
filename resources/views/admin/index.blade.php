@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
    <section class="">
        <div class="row">
            <div class="col-4">
                <a href="{{route('contact.index')}}" title="messages" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-5 fw-bold">Messages</h5>
                            <p>{{$messages}} Unread</p>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
