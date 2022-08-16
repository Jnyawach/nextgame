@extends('layouts.admin')
@section('title','Timezones')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@section('content')
    <section>
        @include('includes.status')
        <div class="card">
            <div class="card-header">
                <h6>Available timezones</h6>
            </div>
            <div class="card-body">
                @if($timezones->count()>0)
                <table id="timezone" class="display">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>TIMEZONE</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($timezones as $timezone)

                    <tr>
                        <td>{{$timezone->id}}</td>
                        <td>{{$timezone->name}}</td>
                        <td>
                            <form action="{{route('timezones.destroy',$timezone->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><span class="me-2"> <i class="align-middle" data-feather="trash-2"></i></span>Delete</button>
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
