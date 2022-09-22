<div>
    <section class="mt-3 p-2">
        <div class="row">
            <div class="d-none d-lg-block col-3">
                <div class="card fixture">
                    <div class="card-header p-2" style="border-bottom:1px solid #222">
                        <h6 class="ms-3">Competitions</h6>

                    </div>
                    <div class="card-body">
                        @if(json_decode($fixtures))
                        <ul class="list-unstyled">
                            @foreach(json_decode($fixtures) as $menu)
                            <li class="mt-2">
                                <a href="{{route('competition-tips',[\Illuminate\Support\Str::slug($menu->league_name),$menu->league_id])}}" class="text-decoration-none" title="competition-name">
                                    <div class="panel-image">
                                        <img src="{{$menu->league_logo}}" class="img-fluid" title="England" style="width: 20px">
                                        <span class="ms-3">{{ \Illuminate\Support\Str::limit($menu->league_name, 20, $end='...') }}</span>

                                    </div>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card fixture">
                    <div class="card-header p-0" style="border-bottom:1px solid #222">
                        @include('includes.prediction-nav')
                    </div>
                    <div class="card-body">
                        @foreach(json_decode($fixtures) as $fixture)
                        <div class="fixture-competition mt-5">
                            <div class="row">
                                <div class="col-1">
                                    <img src="{{$fixture->league_logo}}" style="width:30px" class="float-start">
                                </div>
                                <div class="col-10">
                                    <h6>{{$fixture->league_name}}</h6>
                                    <span>{{$fixture->league_country}}</span>
                                </div>
                                <div class="col-1">
                                    <p><i class="fal fa-angle-right"></i></p>

                                </div>
                            </div>

                        </div>
                            @foreach($fixture->games as $match)
                            <div class="game-detail mt-2">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td style="width: 2%" rowspan="2">
                                            <small>{{\Carbon\Carbon::parse($match->date)->timezone($_COOKIE['timezone'])->format('H:i')}}</small>
                                        </td>
                                        <td style="width: 5%; text-align: center;">
                                            <img src="{{$match->home_logo}}" style="height: 18px" alt="{{$match->home_team}}">
                                        </td>
                                        <td style="width: 50%">
                                            <p class="p-0 m-0">{{$match->home_team}}</p>
                                        </td>
                                        <td style="width: 40%" rowspan="2" class="text-end">
                                            <a href="{{route('fixture-tip',[\Illuminate\Support\Str::slug($match->home_team.'-vs-'.$match->away_team),$match->fixture_id])}}" title="See Prediction"
                                               class="btn btn-link text-decoration-none">See prediction<i
                                                    class="fal fa-angle-right ms-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 5%; text-align: center;">
                                            <img src="{{$match->away_logo}}" style="height: 18px" alt="{{$match->away_team}}">
                                        </td>
                                        <td style="width: 50%">
                                            <p class="p-0 m-0">{{$match->away_team}}</p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>
                            @endforeach
                        @endforeach



                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-3">
                <div class="card fixture">
                    <div class="card-body">
                        <div id="element"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
