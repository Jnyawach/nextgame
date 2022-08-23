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
                <h6>Add Competitions to Popular</h6>
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
                            <th>ADD</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leagues  as $league)

                            <tr>
                                <td>{{$league->id}}</td>
                                <td>
                                    <img src="{{$league->logo}}" alt="{{$league->name}}" class="img-fluid" style="height: 20px">
                                </td>
                                <td>{{$league->name}}</td>
                                <td>{{$league->type}}</td>
                                <td>{{$league->league_id}}</td>
                                <td>
                                    <form action="{{route('popular.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="league_id" value="{{$league->id}}">
                                        <button type="submit" class="btn btn-sm btn-primary">Add</button>
                                    </form>
                                </td>
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



