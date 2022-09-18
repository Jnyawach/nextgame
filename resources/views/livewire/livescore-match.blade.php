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
            <div class="col-12 col-lg-6 @if($switch==true)d-none @endif">
                <div class="card fixture">
                    <div class="card-header p-0" style="border-bottom:1px solid #222">
                        @include('includes.livsecore_nav')
                    </div>
                    <div class="card-body">
                        @if($match)
                        <div class="match-info">
                            <div class="fixture-competition">


                                <div class="row">
                                    <div class="col-1">
                                        <img src="{{$match->game->league->logo}}" style="width:30px" class="float-start" alt="{{$match->game->league->name}}">
                                    </div>
                                    <div class="col-9">
                                        <h6>{{$match->game->league->name}}</h6>
                                        <span>{{$match->game->league->country}}</span>

                                    </div>
                                    <div class="col-2 text-end">
                                        <form>
                                            <button type="submit" class="btn btn-link"><i class="fal fa-star"></i>
                                            </button>
                                        </form>
                                    </div>

                                </div>
                                <div class="game-detail mt-3">
                                    <div class="row mt-3">
                                        <div class="col-4 text-center">
                                            <img src="{{$match->game->teams->home->logo}}" class="img-fluid" style="height: 20px" alt="{{$match->game->teams->home->name}}">
                                            <h6 class="mt-2">{{$match->game->teams->home->name}}</h6>
                                        </div>
                                        <div class="col-4 text-center">
                                            @if($match->game->fixture->status->short=='NS')
                                            <h2 class="mt-2 fw-bold fs-5">{{\Carbon\Carbon::parse($match->game->fixture->date)->timezone($_COOKIE['timezone'])->format('H:i')}}</h2>
                                                <small>{{\Carbon\Carbon::parse($match->game->fixture->date)->timezone($_COOKIE['timezone'])->isoFormat('MMM Do YY')}}</small>
                                            @elseif($match->game->fixture->status->short=='1H'||$match->game->fixture->status->short=='HT'||$match->game->fixture->status->short=='2H')
                                                <h2 class="mt-2 fw-bold fs-5">{{$match->game->goals->home}} : {{$match->game->goals->away}}</h2>
                                                <small class="text-junior">{{$match->game->fixture->status->elapsed}}'</small>

                                            @elseif($match->game->fixture->status->short=='FT')
                                                <h2 class="mt-2 fw-bold fs-5">{{$match->game->goals->home}} : {{$match->game->goals->away}}</h2>
                                                <small class="text-junior">FT</small>
                                            @else
                                                <h2 class="mt-2 fw-bold fs-5">{{$match->game->fixture->status->short}}</h2>
                                            @endif

                                        </div>
                                        <div class="col-4 text-center">
                                            <img src="{{$match->game->teams->away->logo}}" class="img-fluid" style="height: 20px" alt="{{$match->game->teams->away->name}}">
                                            <h6 class="mt-2">{{$match->game->teams->away->name}}</h6>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="match-info mt-3">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                                aria-controls="home-tab-pane" aria-selected="true">Info
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                                aria-controls="profile-tab-pane" aria-selected="false">Events
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                                aria-controls="contact-tab-pane" aria-selected="false">Stats
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="head-head" data-bs-toggle="tab"
                                                data-bs-target="#head-head-pane" type="button" role="tab"
                                                aria-controls="contact-tab-pane" aria-selected="false">H2H
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="prediction-head" data-bs-toggle="tab"
                                                data-bs-target="#prediction-pane" type="button" role="tab"
                                                aria-controls="contact-tab-pane" aria-selected="false">Predictions
                                        </button>
                                    </li>

                                </ul>
                                <div class="tab-content mt-4" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                         aria-labelledby="home-tab" tabindex="0">
                                        <h6 class="fs-6">Match Information</h6>
                                        <div class="card fixture">
                                            <div class="card-body p-0">
                                                <div class="p-2">
                                                    <div class="row">
                                                        <div class="col-1 text-end">
                                                            <p><i class="fal fa-calendar-alt"></i></p>

                                                        </div>
                                                        <div class="col-10">
                                                            <p class="p-0 m-0">{{\Carbon\Carbon::parse($match->game->fixture->date)->timezone($_COOKIE['timezone'])->isoFormat('MMM Do YY')}}</p>
                                                            <small>{{\Carbon\Carbon::parse($match->game->fixture->date)->timezone($_COOKIE['timezone'])->format('H : i')}}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <div class="p-2">
                                                    <div class="row">
                                                        <div class="col-1 text-end">
                                                            <p><i class="fal fa-location"></i></p>
                                                        </div>
                                                        <div class="col-10">
                                                            <p class="p-0 m-0">{{$match->game->fixture->venue->name?$match->game->fixture->venue->name:'-'}}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr class="mt-0">
                                                <div class="p-2">
                                                    <div class="row">
                                                        <div class="col-1 text-end">
                                                            <p><i class="fal fa-whistle"></i></p>
                                                        </div>
                                                        <div class="col-10">
                                                            <p class="p-0 m-0">{{$match->game->fixture->referee?$match->game->fixture->referee:'-'}}</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                         aria-labelledby="profile-tab" tabindex="0">
                                        <div class="card fixture">
                                            <div class="card-body p-0 m-0">
                                                <!--Match events-->
                                                @if($match->game->event)
                                                <table style="width: 100%" class="events-table">
                                                    <tbody>
                                                    @foreach($match->game->event as $event)
                                                        @if($event->team->id==$match->game->teams->home->id)
                                                            <tr>
                                                                <td><span>{{$event->time->elapsed}}'</span></td>
                                                                <td class="text-start">
                                                                    @if($event->type=='Goal')
                                                                        <span><i class="fas fa-futbol"></i></span>
                                                                    @elseif($event->type=='subst')
                                                                        <span><i class="fal fa-retweet-alt"></i></span>
                                                                    @elseif($event->type=='Card')
                                                                        <span
                                                                            class="@if($event->detail=='Red Card')
                                                                            text-danger @endif
                                                                            @if($event->detail=='Yellow Card')text-warning @endif">
                                                                            <i class="fas fa-square"></i></span>

                                                                    @endif
                                                                    <span>{{$event->player->name}}</span>
                                                                </td>

                                                                <td class="text-center"><span> {{$match->game->goals->home}} - {{$match->game->goals->away}} </span>
                                                                </td>
                                                                <td class="text-end"><span></span></td>
                                                            </tr>
                                                        @endif
                                                        @if($event->team->id==$match->game->teams->away->id)

                                                            <tr>
                                                                <td><span>{{$event->time->elapsed}}'</span></td>
                                                                <td><span></span></td>
                                                                <td class="text-center"><span> {{$match->game->goals->home}} - {{$match->game->goals->away}} </span>
                                                                </td>
                                                                <td class="text-end">
                                                                    <span>{{$event->player->name}}</span>
                                                                    @if($event->type=='Goal')
                                                                        <span><i class="fas fa-futbol"></i></span>
                                                                    @elseif($event->type=='subst')
                                                                        <span><i class="fal fa-retweet-alt"></i></span>
                                                                    @elseif($event->type=='Card')
                                                                        <span
                                                                            class="@if($event->detail=='Red Card')
                                                                            text-danger @endif
                                                                            @if($event->detail=='Yellow Card')text-warning @endif">
                                                                            <i class="fas fa-square"></i></span>

                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                                @else
                                                    <h6 class="text-center mt-3">No events available for this fixture!</h6>
                                                @endif


                                            </div>


                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel"
                                         aria-labelledby="contact-tab" tabindex="0">
                                        <div class="card fixture">
                                            <div class="card-body p-0 m-0">
                                                @if($statistics)
                                                <div class="stats-bar text-center">
                                                    <table class="table">
                                                        <tbody>
                                                        @foreach($statistics as $key=>$data)
                                                            <tr>
                                                                <td>{{$data['home']}}</td>
                                                                <td>{{$key}}</td>
                                                                <td>{{$data['away']}}</td>
                                                            </tr>

                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                                @else
                                                    <h6 class="text-center mt-3">No statistics available for this fixture!</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="head-head-pane" role="tabpanel"
                                         aria-labelledby="head-tab" tabindex="0">
                                        <div class="card fixture">
                                            <div class="card-body">
                                                @if($head)
                                                    @foreach(json_decode($head) as $game)
                                                <div class="game-detail text-center mt-2">

                                                    <div class="row mt-1">
                                                        <div class="col-4 text-center">
                                                            <img src="{{$game->home_logo}}" class="img-fluid"
                                                                 style="height: 20px" alt="{{$game->home}}">
                                                            <h6 class="mt-2">{{$game->home}}</h6>
                                                        </div>
                                                        <div class="col-4 text-center ">

                                                            <h4 class="mt-2 fw-bold fs-4">{{$game->home_goals}} : {{$game->away_goals}}</h4>
                                                            <small>{{\Carbon\Carbon::parse($game->date)->isoFormat('MMM Do YY')}}</small>
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <img src="{{$game->away_logo}}" class="img-fluid"
                                                                 style="height: 20px" alt="{{$game->away}}">
                                                            <h6 class="mt-2">{{$game->away}}</h6>
                                                        </div>
                                                    </div>

                                                </div>
                                                    @endforeach
                                                @else
                                                    <h6 class="text-center mt-3">No data available for this fixture!</h6>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="prediction-pane" role="tabpanel"
                                         aria-labelledby="profile-tab" tabindex="0">
                                        <div class="fixture card">
                                            <div class="card-body">
                                                @if($predictions)
                                                <div class="predictions">
                                                    <h6 class="text-center">Advice:<br> <span class="text-primary">{{$predictions->predictions->advice}}</span></h6>
                                                    <h6 class="mt-5 text-center">Probability</h6>

                                                    <div class="row mt-3">
                                                        <div class="col-4 text-center mx-auto">
                                                            <p>{{$match->game->teams->home->name}}</p>
                                                            <p class="text-primary p-0 m-0">{{$predictions->predictions->percent->home}}</p>

                                                        </div>
                                                        <div class="col-4 text-center mx-auto">
                                                            <p>Draw</p>
                                                            <p class="text-primary p-0 m-0">{{$predictions->predictions->percent->away}}</p>

                                                        </div>
                                                        <div class="col-4 text-center mx-auto">
                                                            <p>{{$match->game->teams->away->name}}</p>
                                                            <p class="text-primary p-0 m-0">{{$predictions->predictions->percent->away}}</p>

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <table class="events-table" style="width: 100%">
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-center">{{$predictions->comparisons->form->home}}</td>
                                                            <td class="text-center text-primary">Form</td>
                                                            <td class="text-center">{{$predictions->comparisons->form->away}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">{{$predictions->comparisons->att->home}}</td>
                                                            <td class="text-center text-primary">Attacking</td>
                                                            <td class="text-center">{{$predictions->comparisons->att->away}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">{{$predictions->comparisons->def->home}}</td>
                                                            <td class="text-center text-primary">Defensive</td>
                                                            <td class="text-center">{{$predictions->comparisons->def->away}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">{{$predictions->comparisons->h2h->home}}</td>
                                                            <td class="text-center text-primary">Head to Head</td>
                                                            <td class="text-center">{{$predictions->comparisons->h2h->away}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">{{$predictions->comparisons->goals->home}}</td>
                                                            <td class="text-center text-primary">Goals</td>
                                                            <td class="text-center">{{$predictions->comparisons->goals->away}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">{{$predictions->comparisons->total->home}}</td>
                                                            <td class="text-center text-primary">Total</td>
                                                            <td class="text-center">{{$predictions->comparisons->total->away}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                    <div class="text-center">
                                                        <h6>This fixture doesn't have predictions</h6>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
