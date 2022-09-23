<div>
    <section>
        <div class="favorite mt-5">
            @if($switch==false)
                <button type="button" class="btn btn-link text-decoration-none text-light d-lg-none" wire:click="OpenMenu"><span><i class="fal fa-bars"></i> </span>Leagues</button>
            @endif
            <a href="{{route('livescores.index')}}" class="text-decoration-none m-2"><span><i class="fal fa-futbol"></i> </span>Scores</a>
            <a href="#" class="text-decoration-none m-2"><span><i class="fal fa-star"></i> </span>Favorites</a>
            @if($switch==true)
                <button type="button" class="btn btn-sm btn-primary d-lg-none float-end" wire:click="CloseMenu"><span><i class="fal fa-times"></i> </span>Close Menu</button>
            @endif
        </div>
    </section>
    <section class="mt-3 p-2">
        <div class="row">
            <div class=" @if($switch==false)d-none  @endif d-lg-block col-12 col-lg-3">
                @include('includes.livescore_sidebar')
            </div>
            <div class="col-12 col-lg-6 @if($switch==true)d-none @endif" >
                <div class="card fixture">
                    <div class="card-header p-0" style="border-bottom:1px solid #222">
                        <div class="card-header">
                            <div class="fixture-competition mt-3">
                                <a href="{{route('football.index', $league->slug)}}" class="text-decoration-none" title="{{$league->name}}">
                                    <div class="row">
                                        <div class="col-1">
                                            <img src="{{$league->logo}}" style="height:30px;width: 30px" class="float-start" alt="{{$league->name}}">
                                        </div>
                                        <div class="col-9">
                                            <h6>{{$league->name}}</h6>
                                            <span>{{$league->country->name}}</span>
                                        </div>
                                        <div class="col-2 text-end">
                                            <form>
                                                <button type="submit" class="btn btn-link" title="Add to Favorite"><i class="fal fa-star"></i></button>
                                            </form>

                                        </div>
                                    </div>
                                </a>
                                @include('includes.football_nav')

                            </div>
                        </div>
                    </div>
                    <div class="card-body" >
                        <div class="fixture-competition">

                            <div class="standings mt-5">
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
                </div>
            </div>
            <div class="d-none d-lg-block col-3">
                <div class="card fixture">
                    <div class="card-body">
                        {!! livescore() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
