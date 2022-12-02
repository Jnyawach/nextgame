@extends('layouts.admin')
@section('title','Match Links')

@section('content')
   <section>
       <div>
           <h6>Add match links</h6>
           <hr>
           <div class="mt-5">
               <form action="{{route('links.store')}}" method="POST">
                   @csrf
                   <div class="form-group ">
                       <label for="match-date">Match Date & Time:</label>
                       <input type="datetime-local" class="form-control w-50 mt-2" id="match-date" name="match_time" value="{{old('match_time')}}">
                   </div>
                   <div class="form-group row mt-4">
                       <div class="col-6">
                           <label for="home-team">Home Team:</label>
                           <input type="text" class="form-control mt-2" id="home-team" name="home_team" value="{{old('home_team')}}">
                       </div>
                       <div class="col-6">
                           <label for="away-team">Away Team:</label>
                           <input type="text" class="form-control mt-2" id="away-team" name="away_team" value="{{old('away_team')}}">
                       </div>
                   </div>
                   <div class="form-group mt-4">
                       <label for="links">Links:</label>
                       <div><small>Enter links separated by a comma.</small></div>
                       <textarea class="form-control" name="links" rows="6" >{{old('links')}}</textarea>
                   </div>
                   <div class="form-group mt-4 text-end">
                       <button type="submit" class="btn btn-primary">Save</button>
                   </div>
               </form>
           </div>
       </div>

   </section>
@endsection


