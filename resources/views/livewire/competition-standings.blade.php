<div>
    @include('includes.predictions-nav')
    <section class="mt-5 p-3">

        @if(!$standings->response)
            <h6>Standings</h6>
        <div class="row mt-3">
            <div class="col-12 col-md-9">


                <table class="league-table" >
                    <thead>
                    <tr>
                        <th colspan="3" style="width: 57%;text-align: left">Club</th>
                        <th class="premier-head">MP</th>
                        <th class="premier-head">W</th>
                        <th class="premier-head">D</th>
                        <th class="premier-head">L</th>
                        <th class="premier-head">GF</th>
                        <th class="premier-head">GA</th>
                        <th class="premier-head">GD</th>
                        <th class="premier-head">PTS</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($standings->response[0]->league->standings[0] as $team)
                    <tr>

                        <td style="width:3%;font-weight: bold">{{$team->rank}}</td>
                        <td style="width:4%;text-align: left"><img src="{{$team->team->logo}}" class="img-fluid" style="width: 24px"></td>
                        <td style="width: 50%;text-align: left">{{$team->team->name}}</td>
                        <td class="premier-body">{{$team->all->played}}</td>
                        <td class="premier-body">{{$team->all->win}}</td>
                        <td class="premier-body">{{$team->all->draw}}</td>
                        <td class="premier-body">{{$team->all->lose}}</td>
                        <td class="premier-body">{{$team->all->goals->for}}</td>
                        <td class="premier-body">{{$team->all->goals->against}}</td>
                        <td class="premier-body">{{$team->goalsDiff}}</td>
                        <td class="premier-body">{{$team->points}}</td>

                    </tr>
                   @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @else
           <div class="text-center">
               <h6>Sorry! No Standings available</h6>

           </div>
        @endif

    </section>
</div>
