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

                            @if($fixtures)
                                <h6>Upcoming Matches</h6>
                                @foreach($fixtures->groupby('group') as $key=>$fixture)
                                    <h6 class="mt-4 mb-2">{{$key}}</h6>
                                    @foreach($fixture as $game)
                                    <div class="game-detail mt-2">
                                        <a href="{{route('league.match',[\Illuminate\Support\Str::slug($game['home'].'-vs-'.$game['away']),$game['id']])}}" title="{{$game['home']}}-{{$game['away']}}" class="text-decoration-none text-light">

                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td style="width: 2%" rowspan="2">

                                                        <small>{{\Carbon\Carbon::parse($game['date'])->timezone($_COOKIE['timezone'])->format('H:i')}}</small>
                                                    </td>
                                                    <td style="width: 4%; text-align: center;">
                                                        <img src="{{$game['home_logo']}}" style="height: 18px" alt="{{$game['home']}}">
                                                    </td>
                                                    <td style="width: 60%">
                                                        <p class="p-0 m-0">{{$game['home']}}</p>
                                                    </td>
                                                    <td style="width: 2%" rowspan="2">
                                                        <form>
                                                            <button type="submit" class="btn btn-link" title="Add to Favorite"><i class="fal fa-star"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 4%; text-align: center;">
                                                        <img src="{{$game['away_logo']}}" style="height: 18px" alt="{{$game['away']}}">
                                                    </td>
                                                    <td style="width: 60%">
                                                        <p class="p-0 m-0">{{$game['away']}}</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>


                                        </a>
                                    </div>
                                    @endforeach
                                @endforeach
                            @endif


                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
