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
                        <option selected value="{{\Carbon\Carbon::now()->format('Y')}}">{{\Carbon\Carbon::now()->format('Y')}}-{{\Carbon\Carbon::now()->addYear()->isoFormat('YY')}}</option>
                        <option value="{{\Carbon\Carbon::now()->subYear()->format('Y')}}">{{\Carbon\Carbon::now()->subYear()->format('Y')}}-{{\Carbon\Carbon::now()->IsoFormat('YY')}}</option>
                        <option value="{{\Carbon\Carbon::now()->subYears(2)->format('Y')}}">{{\Carbon\Carbon::now()->subYears(2)->format('Y')}}-{{\Carbon\Carbon::now()->subYear()->IsoFormat('YY')}}</option>
                        <option value="{{\Carbon\Carbon::now()->subYears(3)->format('Y')}}">{{\Carbon\Carbon::now()->subYears(3)->format('Y')}}-{{\Carbon\Carbon::now()->subYears(2)->IsoFormat('YY')}}</option>
                    </select>
                </div>
            </div>
            <section class="mt-5 prediction-nav">
                @include('includes.predictions-nav')
                <hr class="mt-0">
            </section>


        </div>
    </section>
    <section class="p-3">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="standings">
                    @if(count($standings)>0)
                        <h6>Standings</h6>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card fixture">
                                    <div class="card-body p-0">
                                        <table class="league-table" >
                                            <thead>
                                            <tr style="font-max-size: 12px !important;">
                                                <th colspan="3" style="width: 57%;text-align: left" class="ps-2">Club</th>
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
                                            @foreach($standings as $team)
                                                <tr>

                                                    <td style="width:3%;font-weight: bold">{{$team['rank']}}</td>
                                                    <td style="width:4%;text-align: left"><img src="{{$team['logo']}}" class="img-fluid" style="height: 15px" alt="{{$team['name']}}"></td>
                                                    <td style="width: 50%;text-align: left"><a href="#" class="text-decoration-none" title="{{$team['name']}}">{{$team['name']}}</a> </td>
                                                    <td class="premier-body">{{$team['matches_played']}}</td>
                                                    <td class="premier-body">{{$team['win']}}</td>
                                                    <td class="premier-body">{{$team['draw']}}</td>
                                                    <td class="premier-body">{{$team['lose']}}</td>
                                                    <td class="premier-body d-none d-md-table-cell">{{$team['goals_for']}}</td>
                                                    <td class="premier-body d-none d-md-table-cell">{{$team['goals_against']}}</td>
                                                    <td class="premier-body">{{$team['goals_diff']}}</td>
                                                    <td class="premier-body">{{$team['points']}}</td>

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <h6>Sorry! No Standings available</h6>

                        </div>
                    @endif
                </div>
            </div>
        </div>



    </section>
</div>
