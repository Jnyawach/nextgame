<div>
    <section class="mt-5 p-3">
        <div class="competition-header">
            <div class="row">
                <div class="col-3 col-sm-2 col-lg-1">
                    <div class="logo-image">
                        <img src="{{$league->logo}}"  alt="{{$league->name}}" title="{{$league->name}}">
                    </div>
                </div>
                <div class="col-9 col-md-6 align-self-center">
                    <h1 class="fw-bold fs-4">{{$league->name}}</h1>
                    <label for="season-select">Season:</label>
                    <select class=" season mt-2" id="season-select" wire:model="year">
                        <option selected value="2022">2022-23</option>
                        <option value="2021">2021-22</option>
                        <option value="2020">2020-21</option>
                        <option value="2019">2019-20</option>
                    </select>
                </div>
            </div>
            <section class="mt-5 prediction-nav">
                @include('includes.predictions-nav')
                <hr class="mt-0">
            </section>


        </div>
    </section>
    <section class="mt-5 p-3">

        @if($standings->response)
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
                        <th class="premier-head d-none d-md-table-cell">GF</th>
                        <th class="premier-head d-none d-md-table-cell">GA</th>
                        <th class="premier-head">GD</th>
                        <th class="premier-head">PTS</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($standings->response[0]->league->standings[0] as $team)
                    <tr>

                        <td style="width:3%;font-weight: bold">{{$team->rank}}</td>
                        <td style="width:4%;text-align: left"><img src="{{$team->team->logo}}" class="img-fluid" style="height: 24px"></td>
                        <td style="width: 50%;text-align: left"><a href="#" class="text-decoration-none" title="{{$team->team->name}}">{{$team->team->name}}</a> </td>
                        <td class="premier-body">{{$team->all->played}}</td>
                        <td class="premier-body">{{$team->all->win}}</td>
                        <td class="premier-body">{{$team->all->draw}}</td>
                        <td class="premier-body">{{$team->all->lose}}</td>
                        <td class="premier-body d-none d-md-table-cell">{{$team->all->goals->for}}</td>
                        <td class="premier-body d-none d-md-table-cell">{{$team->all->goals->against}}</td>
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
