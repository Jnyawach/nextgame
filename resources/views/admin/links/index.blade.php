@extends('layouts.admin')
@section('title','Match Links')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection
@section('content')
    <section>
        @include('includes.status')
        <div class="card">
            <div class="card-header ">
                <h6>
                    Match Links
                    <a href="{{route('links.create')}}" class="btn btn-primary btn-sm float-end"><i class="fal fa-plus me-2"></i>Add Links</a>
                </h6>

            </div>
            <div class="card-body">
                <table id="match-links" class="display">
                    <thead>
                    <tr>
                        <td>Id</td>
                        <td>Match</td>
                        <td>Date</td>
                        <td>Links</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($links->count()>0)
                        @foreach($links as $link)
                            <tr>
                                <td>{{$link->id}}</td>
                                <td>{{$link->home_team}} vs {{$link->away_team}}</td>
                                <td>{{\Carbon\Carbon::parse($link->match_date)->isoFormat('DD MMM YYYY h:mm a')}}</td>
                                <td>
                                    {{count(json_decode($link->links))}}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                           Actions
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#match-links').DataTable();
        } );
    </script>
@endsection

