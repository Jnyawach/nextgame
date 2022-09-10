<div>
    <section>
        <div class="favorite mt-5">
            <a href="{{route('livescores.index')}}" class="text-decoration-none m-2"><span><i class="fal fa-futbol"></i> </span>Scores</a>
            <a href="#" class="text-decoration-none m-2"><span><i class="fal fa-star"></i> </span>Favorites</a>
        </div>
    </section>
    <section class="mt-3 p-2">
        <div class="row">
            <div class="d-none d-lg-block col-3">
                <div class="card fixture">
                    <div class="card-header p-2" style="border-bottom:1px solid #222">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fal fa-search"></i> </span>
                            <input type="search" class="form-control" placeholder="Search..."  wire:model="search">
                        </div>

                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @if($popular->count()>0)
                                @foreach($popular as $competition)
                                    <li class="mt-2">
                                        <a href="{{route('football.index', $competition->league->slug)}}" class="text-decoration-none" title="{{$competition->league->name}}">
                                            <div class="panel-image">
                                                <img src="{{$competition->league->logo}}" class="img-fluid" title="{{$competition->league->name}}" style="height: 20px" loading="lazy">
                                                <span class="ms-3">{{$competition->league->name}}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                        <ul class="list-unstyled">
                            @if($countries->count()>0)
                                @foreach($countries as $country)
                                    <li class="mt-2">
                                        <a href="{{route('livescore-country',$country->slug)}}" class="text-decoration-none" title="{{$country->name}}">
                                            <div class="panel-image">
                                                <img src="{{$country->flag}}" class="img-fluid" title="{{$country->name}}" style="width: 20px" loading="lazy">
                                                <span class="ms-3">{{$country->name}}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif



                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6" >
                <div class="card fixture">
                    <div class="card-header p-0" style="border-bottom:1px solid #222">
                       <div class="card-header">
                           <div class="fixture-competition mt-3">
                               <a href="{{route('football.index', $league->slug)}}" class="text-decoration-none" title="{{$league->name}}">
                                   <div class="row">
                                       <div class="col-1">
                                           <img src="{{$league->logo}}" style="height:30px;width: 30px" class="float-start">
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

                               <div class="prediction-nav m-0 mt-3">
                                   <ul class="nav mb-0 ms-0">
                                       <li class="nav-item">

                                           <a class="nav-link {{ Request::routeIs('football.index') ? 'active' : '' }}"  href="{{route('football.index',$league->slug)}}">Overview</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link {{ Request::routeIs('competition-fixtures') ? 'active' : '' }}" href="#">Fixtures</a>
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link {{ Request::routeIs('competition-results') ? 'active' : '' }}" href="#">Standings</a>
                                       </li>

                                   </ul>
                               </div>


                           </div>
                       </div>
                    </div>
                    <div class="card-body" >
                        <div class="fixture-competition">
                            <h6>Upcoming Matches</h6>
                            @if($next_games)
                               @foreach(json_decode($next_games) as $game)
                                    <div class="game-detail mt-2">
                                        <a href="{{route('livescores.show',$game->id)}}" title="{{$game->home}}-{{$game->away}}" class="text-decoration-none text-light">

                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td style="width: 2%" rowspan="2">
                                                        <small>{{$game->status}}</small>
                                                        <small>{{\Carbon\Carbon::parse($game->date)->format('H:i')}}</small>
                                                    </td>
                                                    <td style="width: 4%; text-align: center;">
                                                        <img src="{{$game->home_logo}}" style="height: 18px" alt="{{$game->home}}">
                                                    </td>
                                                    <td style="width: 60%">
                                                        <p class="p-0 m-0">{{$game->home}}</p>
                                                    </td>
                                                    <td style="width: 2%" rowspan="2">
                                                        <form>
                                                            <button type="submit" class="btn btn-link" title="Add to Favorite"><i class="fal fa-star"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 4%; text-align: center;">
                                                        <img src="{{$game->away_logo}}" style="height: 18px" alt="{{$game->away}}">
                                                    </td>
                                                    <td style="width: 60%">
                                                        <p class="p-0 m-0">{{$game->away}}</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>


                                        </a>
                                    </div>
                                @endforeach
                            @endif
                            <div class="standings mt-5">
                                @if($standings->response)
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
                                                        @foreach($standings->response[0]->league->standings[0] as $team)
                                                            <tr>

                                                                <td style="width:3%;font-weight: bold">{{$team->rank}}</td>
                                                                <td style="width:4%;text-align: left"><img src="{{$team->team->logo}}" class="img-fluid" style="height: 15px"></td>
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

        </div>
    </section>
</div>
