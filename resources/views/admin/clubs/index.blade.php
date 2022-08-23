@extends('layouts.admin')
@section('title','Teams')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('content')
    <section>
        @include('includes.status')
        <div class="card">
            <div class="card-header">
                <h6>Countries ({{$teams->count()}})</h6>
            </div>
            <div class="card-body">
                @if($teams->count()>0)
                    <table id="timezone" class="display">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>LOGO</th>
                            <th>NAME</th>
                            <th>TEAM ID</th>
                            <th>COUNTRY</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams  as $team)

                            <tr>
                                <td>{{$team->id}}</td>
                                <td>
                                    <img src="{{$team->logo}}" alt="{{$team->name}}" class="img-fluid" style="height: 20px">
                                </td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->team_id}}</td>
                                <td>{{$team->country->name}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#timezone').DataTable();
        } );
    </script>
@endsection



