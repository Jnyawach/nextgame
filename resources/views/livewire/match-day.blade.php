<div>
    <ul class="nav live-score mt-5">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('fixtures') ? 'active' : '' }}"
               href="{{route('fixtures.index')}}">TODAY</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase {{ request()->is('fixtures/match-day'.\Carbon\Carbon::now()->addDay()->format('Y-m-d')) ? 'active' : '' }}"
               href="{{route('match-day',\Carbon\Carbon::now()->addDay()->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDay()->isoFormat('MMM Do')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase {{ request()->is('fixtures/match-day'.\Carbon\Carbon::now()->addDays(2)->format('Y-m-d')) ? 'active' : '' }}"
               href="{{route('match-day',\Carbon\Carbon::now()->addDays(2)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(2)->isoFormat('MMM Do')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase {{ request()->is('fixtures/match-day'.\Carbon\Carbon::now()->addDays(3)->format('Y-m-d')) ? 'active' : '' }}"
               href="{{route('match-day',\Carbon\Carbon::now()->addDays(3)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(3)->isoFormat('MMM Do')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase {{ request()->is('fixtures/match-day'.\Carbon\Carbon::now()->addDays(4)->format('Y-m-d')) ? 'active' : '' }}"
               href="{{route('match-day',\Carbon\Carbon::now()->addDays(4)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(4)->isoFormat('MMM Do')}}</a>
        </li>
    </ul>

    <section class="p-3">
        @if($fixtures)
            @foreach($fixtures->groupBy('league_country') as $key=>$league)
                <h6 class="mt-5">{{$key}}</h6>
                <div class="row mt-3">
                    @foreach(json_decode($league) as $fixture)
                        @if($fixture->status=='NS')
                            <div class="col-12 col-md-6 col-lg-4 p-1">
                                <a href="{{route('league.match',[\Illuminate\Support\Str::slug($fixture->home_name.'-vs-'.$fixture->away_name),$fixture->fixture_id])}}" class="text-decoration-none text-light"
                                   title="{{$fixture->home_name}}-{{$fixture->away_name}}">

                                    <div class="card fixture transform-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">

                                                    <div>
                                                        <img src="{{$fixture->home_logo}}" class="img-fluid d-inline-block m-1" style="height: 25px">
                                                        <p class="d-inline-block m-1">{{ \Illuminate\Support\Str::limit($fixture->home_name, 20, $end='...') }}</p>
                                                    </div>
                                                    <div class="mt-2">
                                                        <img src="{{$fixture->away_logo}}" class="img-fluid d-inline-block m-1" style="height: 25px">
                                                        <p class="d-inline-block m-1">{{ \Illuminate\Support\Str::limit($fixture->away_name, 20, $end='...') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 align-self-center">
                                                    <p class="m-1">{{\Carbon\Carbon::parse($fixture->date)->timezone($_COOKIE['timezone'])->format('g:i A')}}</p>
                                                    <p class="m-1">{{\Carbon\Carbon::parse($fixture->date)->timezone($_COOKIE['timezone'])->isoFormat('MMM Do YY')}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>

                            </div>
                        @elseif($fixture->status=='1H'||$fixture->status=='HT'||$fixture->status=='2H')
                            <div class="col-12 col-md-6 col-lg-4 p-1">
                                <a href="{{route('fixtures.show',$fixture->fixture_id)}}" class="text-decoration-none text-light"
                                   title="{{$fixture->home_name}}-{{$fixture->away_name}}">

                                    <div class="card fixture transform-card" style="border-left: 1px solid green">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">

                                                    <div>
                                                        <img src="{{$fixture->home_logo}}" class="img-fluid d-inline-block m-1" style="height: 25px">
                                                        <p class="d-inline-block m-1">{{ \Illuminate\Support\Str::limit($fixture->home_name, 20, $end='...') }}</p>
                                                        <p class="d-inline-block m-1 float-end">{{$fixture->home_goals}}</p>
                                                    </div>
                                                    <div class="mt-2">
                                                        <img src="{{$fixture->away_logo}}" class="img-fluid d-inline-block m-1" style="height: 25px">
                                                        <p class="d-inline-block m-1">{{ \Illuminate\Support\Str::limit($fixture->away_name, 20, $end='...') }}</p>
                                                        <p class="d-inline-block m-1 float-end">{{$fixture->away_goals}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 align-self-center">
                                                    <p class="m-1">{{$fixture->status}}</p>
                                                    <p class="m-1 text-success">{{$fixture->elapsed}}'</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>

                            </div>
                        @else
                            <div class="col-12 col-md-6 col-lg-4 p-1">
                                <a href="{{route('fixtures.show',$fixture->fixture_id)}}" class="text-decoration-none text-light"
                                   title="{{$fixture->home_name}}-{{$fixture->away_name}}">

                                    <div class="card fixture transform-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-8">

                                                    <div>
                                                        <img src="{{$fixture->home_logo}}" class="img-fluid d-inline-block m-1" style="height: 25px">
                                                        <p class="d-inline-block m-1">{{ \Illuminate\Support\Str::limit($fixture->home_name, 20, $end='...') }}</p>
                                                        <p class="d-inline-block m-1 float-end">{{$fixture->home_goals}}</p>
                                                    </div>
                                                    <div class="mt-2">
                                                        <img src="{{$fixture->away_logo}}" class="img-fluid d-inline-block m-1" style="height: 25px">
                                                        <p class="d-inline-block m-1">{{ \Illuminate\Support\Str::limit($fixture->away_name, 20, $end='...') }}</p>
                                                        <p class="d-inline-block m-1 float-end">{{$fixture->away_goals}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 align-self-center">
                                                    <p class="m-1">{{$fixture->status}}</p>
                                                    <p class="m-1">{{\Carbon\Carbon::parse($fixture->date)->isoFormat('MMM Do YY')}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endif



                    @endforeach



                </div>
            @endforeach
        @else
            <div class="text-center">
                <h6>Sorry! No fixtures available</h6>

            </div>
        @endif

    </section>
</div>
