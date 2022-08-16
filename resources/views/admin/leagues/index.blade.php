@extends('layouts.admin')
@section('title','Leagues')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('content')
    <section>
        @include('includes.status')
        <div class="card">
            <div class="card-header">
                <h6>Countries ({{$leagues->count()}})</h6>
            </div>
            <div class="card-body">
                @if($leagues->count()>0)
                    <table id="timezone" class="display">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>LOGO</th>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>LEAGUE ID</th>
                            <th>COUNTRY</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leagues  as $league)

                            <tr>
                                <td>{{$country->id}}</td>
                                <td>
                                    <img src="{{$country->flag}}" alt="{{$country->name}}" class="img-fluid" style="height: 15px">
                                </td>
                                <td>{{$country->name}}</td>
                                <td>{{$country->code}}</td>
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


