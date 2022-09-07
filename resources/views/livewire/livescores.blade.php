<div>
    <section>
        <div class="favorite mt-5">
            <a href="#" class="text-decoration-none m-2"><span><i class="fal fa-futbol"></i> </span>Scores</a>
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
                                        <a href="#" class="text-decoration-none" title="{{$competition->league->name}}">
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
                                <a href="#" class="text-decoration-none" title="{{$country->name}}">
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
            <div class="col-12 col-lg-6" wire:poll.750ms>
                <div class="card fixture">
                    <div class="card-header p-0" style="border-bottom:1px solid #222">
                        <ul class="nav live-score">
                            <li class="nav-item">
                                <a class="nav-link btn active" href="{{route('livescores.index')}}">LIVE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">TODAY</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">AUG 27</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">AUG 28</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">AUG 29</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">AUG 30</a>
                            </li>



                        </ul>
                    </div>
                    <div class="card-body" >
                        @if(isset($fixtures))
                        @foreach(json_decode($fixtures) as $fixture)
                        <div class="fixture-competition mt-4">
                            <a href="#" class="text-decoration-none">
                                <div class="row">
                                    <div class="col-1">
                                        <img src="{{$fixture->league_logo}}" style="height:30px;width: 30px" class="float-start">
                                    </div>
                                    <div class="col-10">
                                        <h6>{{$fixture->league_name}}</h6>
                                        <span>{{$fixture->league_country}}</span>
                                    </div>
                                    <div class="col-1">
                                        <p><i class="fal fa-angle-right"></i></p>

                                    </div>
                                </div>
                            </a>


                        </div>


                        <!---Live fixture--->
                            @foreach($fixture->games as $match)
                        <div class="game-detail mt-2">
                            <a href="{{route('livescores.show',$match->fixture_id)}}" title="fixture" class="text-decoration-none text-light">

                                <table>
                                    <tbody>
                                    <tr>
                                        <td style="width: 2%" rowspan="2">
                                            @if($match->status=='HT')
                                                <small class="text-junior">{{$match->status}}</small>
                                            @else
                                                <small class="text-junior">{{$match->elapsed}}<span>'</span></small>
                                            @endif


                                        </td>
                                        <td style="width: 4%; text-align: center;">
                                            <img src="{{$match->home_logo}}" style="height: 18px" alt="{{$match->home_team}}">
                                        </td>
                                        <td style="width: 60%">
                                            <p class="p-0 m-0">{{$match->home_team}}</p>
                                        </td>
                                        <td style="width: 2%">
                                            <p class="p-0 m-0 fw-bold">{{$match->home_goals}}</p>
                                        </td>
                                        <td style="width: 2%" rowspan="2">
                                            <form wire:submit.prevent="AddFavorite({{$match->fixture_id}})" id="{{$match->fixture_id}}">
                                                <button type="submit" class="btn btn-link" title="Add to Favorite"><i class="fal fa-star"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 4%; text-align: center;">
                                            <img src="{{$match->away_logo}}" style="height: 18px" alt="{{$match->away_team}}">
                                        </td>
                                        <td style="width: 60%">
                                            <p class="p-0 m-0">{{$match->away_team}}</p>
                                        </td>
                                        <td style="width: 2%">
                                            <p class="p-0 m-0 fw-bold">{{$match->away_goals}}</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>


                            </a>
                        </div>
                                @endforeach

                        @endforeach
                        @else
                            <div class="text-center">
                                <h6>Sorry! No live fixtures available currently</h6>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
