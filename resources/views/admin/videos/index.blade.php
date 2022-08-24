@extends('layouts.admin')
@section('title','Match Highlights')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('content')
    <section>
        @include('includes.status')
        <div class="card">
            <div class="card-header" style="border-bottom: 1px solid black">
                <h6 class="d-inline-block">Highlights ({{$highlights->count()}})</h6>

            </div>
            <div class="card-body">

                <table id="timezone" class="display">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>THUMBNAIL</th>
                        <th>GAME</th>
                        <th>DATE</th>
                        <th>COMPETITION</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($highlights  as $highlight)

                        <tr>
                            <td>{{$highlight->id}}</td>
                            <td>
                                <img src="{{$highlight->thumbnail}}" alt="{{$highlight->name}}" class="img-fluid" style="height: 20px">
                            </td>
                            <td>{{$highlight->name}}</td>
                            <td>{{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</td>
                            <td>{{$highlight->competition}}</td>
                            <td>

                                <div class="dropdown">
                                    <button class="btn btn-link bnt-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item btn btn-link" href="{{route('videos.show',$highlight->slug)}}">View</a>
                                        </li>
                                        <li>
                                            <form action="{{route('videos.destroy',$highlight->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn  btn-link text-danger dropdown-item">Delete</button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>


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




