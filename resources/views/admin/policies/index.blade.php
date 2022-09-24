@extends('layouts.admin')
@section('title','Policy')
@section('content')

    <div class="container p-5">
       <div class="mb-3">
           <h5 class="d-inline-block">Terms and Conditions/ Privacy Policy</h5>
           <a href="{{route('policies.create')}}" class="btn btn-primary d-inline-block float-end">Create Policy</a>


       </div>
        <hr>
        <div class="row">
            @if($policies->count()>0)
                @foreach($policies as $policy)
                    <div class="col-12 col-m-6 col-lg-6 p-2">
                        <div class="card border-3 border-top border-top-primary">
                            <a href="{{route('policies.show', $policy->id)}}" class="text-decoration-none">
                                <div class="card-body">
                                    <h5 class="text-muted">
                                        {{$policy->category}}
                                    </h5>

                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Last Updated: {{$policy->updated_at->isoFormat('MMMM
                                                 Do YYYY')}}</h5>
                                    </div>

                                </div>
                            </a>
                        </div>

                    </div>
                @endforeach
            @else
                <h4>There are no terms and conditions in the database</h4>
            @endif
        </div>

    </div>

@endsection
