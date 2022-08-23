@extends('layouts.admin')
@section('title','Popular Competitions')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('content')
    <section>
        @include('includes.status')
        <div class="card">
            <div class="card-header" style="border-bottom: 1px solid black">
                <h6 class="d-inline-block">Countries ({{$populars->count()}})</h6>
                <a href="{{route('popular.create')}}" class="btn btn-sm btn-primary d-inline-block float-end">Add</a>
            </div>
            <div class="card-body">

                    <table id="timezone" class="display">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>LOGO</th>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>COUNTRY</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($populars  as $popular)

                            <tr>
                                <td>{{$popular->id}}</td>
                                <td>
                                    <img src="{{$popular->league->logo}}" alt="{{$popular->league->name}}" class="img-fluid" style="height: 20px">
                                </td>
                                <td>{{$popular->league->name}}</td>
                                <td>{{$popular->league->type}}</td>
                                <td>{{$popular->league->country->name}}</td>
                                <td>
                                    <form action="{{route('popular.destroy',$popular->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

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
            $('#timezone').DataTable();
        } );
    </script>
@endsection



