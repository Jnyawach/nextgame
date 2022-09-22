<div>
    <section class="mt-3 p-2">
        <div class="row">
            <div class="d-none d-lg-block col-3">
                <div class="card fixture">
                    <div class="card-header p-2" style="border-bottom:1px solid #222">
                        <h6 class="ms-3">Competitions</h6>

                    </div>
                    <div class="card-body">
                        @if(json_decode($leagues))
                            <ul class="list-unstyled">
                                @foreach(json_decode($leagues) as $menu)
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
                        <a href="{{route('predictions.index')}}" class="btn btn-link text-decoration-none"><span class="me-2"><i class="fal fa-arrow-left"></i></span>Return to all Predictions</a>
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


                                    </div>
                                    <div class="game-detail mt-3">
                                        <div class="row mt-3">
                                            <div class="col-4 text-center">
                                                <img src="{{$match->game->teams->home->logo}}" class="img-fluid" style="height: 20px" alt="{{$match->game->teams->home->name}}">
                                                <h6 class="mt-2">{{$match->game->teams->home->name}}</h6>
                                                <small style="letter-spacing: 2px" class="text-primary">
                                                    {{substr($predictions->forms->home->league->form, 0,5)}}
                                                </small>
                                            </div>
                                            <div class="col-4 text-center">
                                                <h2 class="mt-2 fw-bold fs-5">{{\Carbon\Carbon::parse($match->game->fixture->date)->timezone($_COOKIE['timezone'])->format('H:i')}}</h2>
                                                <small>{{\Carbon\Carbon::parse($match->game->fixture->date)->timezone($_COOKIE['timezone'])->isoFormat('MMM Do YY')}}</small>


                                            </div>
                                            <div class="col-4 text-center">
                                                <img src="{{$match->game->teams->away->logo}}" class="img-fluid" style="height: 20px" alt="{{$match->game->teams->away->name}}">
                                                <h6 class="mt-2">{{$match->game->teams->away->name}}</h6>
                                                <small style="letter-spacing: 2px" class="text-primary">
                                                    {{substr($predictions->forms->away->league->form, 0,5)}}
                                                </small>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="match-info mt-3">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                                    aria-controls="home-tab-pane" aria-selected="true">Prediction
                                            </button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="head-head" data-bs-toggle="tab"
                                                    data-bs-target="#head-head-pane" type="button" role="tab"
                                                    aria-controls="contact-tab-pane" aria-selected="false">H2H
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="head-head" data-bs-toggle="tab"
                                                    data-bs-target="#fixture-per-pane" type="button" role="tab"
                                                    aria-controls="fixture-tab-pane" aria-selected="false">Fixture Performance
                                            </button>
                                        </li>


                                    </ul>
                                    <div class="tab-content mt-4" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                             aria-labelledby="home-tab" tabindex="0">
                                            <div class="fixture card">
                                                <div class="card-body">
                                                    @if($predictions)
                                                        <div class="predictions">
                                                            <p class="text-center" style="line-height: 28px">Advice:<br> <span class="text-primary">{{$predictions->predictions->advice}}</span></p>
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
                                                            <!----Strength-->
                                                            <div class="match-data mt-3">
                                                                <div class="progress-level text-center">
                                                                    <h6>Strength</h6>
                                                                    <table style="width: 100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$predictions->comparisons->total->home}}</td>
                                                                            <td class="text-end"><progress class="home_team" value="{{substr($predictions->comparisons->total->home, 0, strlen($predictions->comparisons->total->home) -1)}}" max="100" style="direction: rtl"> </progress></td>

                                                                            <td class="text-start"><progress class="away_team" value="{{substr($predictions->comparisons->total->away, 0, strlen($predictions->comparisons->total->away) - 1)}}" max="100"></progress></td>
                                                                            <td>{{$predictions->comparisons->total->away}}</td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!----Form-->
                                                            <div class="match-data mt-2">
                                                                <div class="progress-level text-center">
                                                                    <h6>Current Form</h6>
                                                                    <table style="width: 100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$predictions->comparisons->form->home}}</td>
                                                                            <td class="text-end"><progress class="home_team" value="{{substr($predictions->comparisons->form->home, 0, strlen($predictions->comparisons->form->home) -1)}}" max="100" style="direction: rtl"> </progress></td>

                                                                            <td class="text-start"><progress class="away_team" value="{{substr($predictions->comparisons->form->away, 0, strlen($predictions->comparisons->form->away) - 1)}}" max="100"></progress></td>
                                                                            <td>{{$predictions->comparisons->form->away}}</td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!----Attacking-->
                                                            <div class="match-data mt-2">
                                                                <div class="progress-level text-center">
                                                                    <h6>Attacking Potential</h6>
                                                                    <table style="width: 100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$predictions->comparisons->att->home}}</td>
                                                                            <td class="text-end"><progress class="home_team" value="{{substr($predictions->comparisons->att->home, 0, strlen($predictions->comparisons->att->home) -1)}}" max="100" style="direction: rtl"> </progress></td>

                                                                            <td class="text-start"><progress class="away_team" value="{{substr($predictions->comparisons->att->away, 0, strlen($predictions->comparisons->att->away) - 1)}}" max="100"></progress></td>
                                                                            <td>{{$predictions->comparisons->att->away}}</td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!----Defensive-->
                                                            <div class="match-data mt-2">
                                                                <div class="progress-level text-center">
                                                                    <h6>Defensive Potential</h6>
                                                                    <table style="width: 100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$predictions->comparisons->def->home}}</td>
                                                                            <td class="text-end"><progress class="home_team" value="{{substr($predictions->comparisons->def->home, 0, strlen($predictions->comparisons->def->home) -1)}}" max="100" style="direction: rtl"> </progress></td>

                                                                            <td class="text-start"><progress class="away_team" value="{{substr($predictions->comparisons->def->away, 0, strlen($predictions->comparisons->def->away) - 1)}}" max="100"></progress></td>
                                                                            <td>{{$predictions->comparisons->def->away}}</td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!----H2H-->
                                                            <div class="match-data mt-2">
                                                                <div class="progress-level text-center">
                                                                    <h6>Head to Head</h6>
                                                                    <table style="width: 100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$predictions->comparisons->h2h->home}}</td>
                                                                            <td class="text-end"><progress class="home_team" value="{{substr($predictions->comparisons->h2h->home, 0, strlen($predictions->comparisons->h2h->home) -1)}}" max="100" style="direction: rtl"> </progress></td>

                                                                            <td class="text-start"><progress class="away_team" value="{{substr($predictions->comparisons->h2h->away, 0, strlen($predictions->comparisons->h2h->away) - 1)}}" max="100"></progress></td>
                                                                            <td>{{$predictions->comparisons->h2h->away}}</td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!----Goals-->
                                                            <div class="match-data mt-2">
                                                                <div class="progress-level text-center">
                                                                    <h6>Goals</h6>
                                                                    <table style="width: 100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$predictions->comparisons->goals->home}}</td>
                                                                            <td class="text-end"><progress class="home_team" value="{{substr($predictions->comparisons->goals->home, 0, strlen($predictions->comparisons->goals->home) -1)}}" max="100" style="direction: rtl"> </progress></td>

                                                                            <td class="text-start"><progress class="away_team" value="{{substr($predictions->comparisons->goals->away, 0, strlen($predictions->comparisons->goals->away) - 1)}}" max="100"></progress></td>
                                                                            <td>{{$predictions->comparisons->goals->away}}</td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!----Goals-->
                                                            <div class="match-data mt-2">
                                                                <div class="progress-level text-center">
                                                                    <h6>Poisson Distribution</h6>
                                                                    <table style="width: 100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$predictions->comparisons->poisson_distribution->home}}</td>
                                                                            <td class="text-end"><progress class="home_team" value="{{substr($predictions->comparisons->poisson_distribution->home, 0, strlen($predictions->comparisons->poisson_distribution->home) -1)}}" max="100" style="direction: rtl"> </progress></td>

                                                                            <td class="text-start"><progress class="away_team" value="{{substr($predictions->comparisons->poisson_distribution->away, 0, strlen($predictions->comparisons->poisson_distribution->away) - 1)}}" max="100"></progress></td>
                                                                            <td>{{$predictions->comparisons->poisson_distribution->away}}</td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @else
                                                        <div class="text-center">
                                                            <h6>This fixture doesn't have predictions</h6>
                                                        </div>
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
                                        <div class="tab-pane fade" id="fixture-per-pane" role="tabpanel">
                                            <div class="card fixture">
                                                <div class="card-body">
                                                    <div class="game-detail">
                                                        <canvas id="myChart"></canvas>
                                                    </div>
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
            <div class="d-none d-lg-block col-3">
                <div class="card fixture">
                    <div class="card-body">
                        {!! calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = {
            labels: [
                'Wins',
                'Draws',
                'Loses',
                'Goals for',
                'Goals Against'

            ],

            datasets: [{
                label: '{{$match->game->teams->home->name}}',
                data: [{{$predictions->forms->home->league->fixtures->wins->total}},
                    {{$predictions->forms->home->league->fixtures->draws->total}},
                    {{$predictions->forms->home->league->fixtures->loses->total}},
                    {{$predictions->forms->home->league->goals->for->total->total}},
                    {{$predictions->forms->home->league->goals->against->total->total}}],
                fill: false,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }, {
                label: '{{$match->game->teams->away->name}}',
                data: [{{$predictions->forms->away->league->fixtures->wins->total}},
                    {{$predictions->forms->away->league->fixtures->draws->total}},
                    {{$predictions->forms->away->league->fixtures->loses->total}},
                    {{$predictions->forms->away->league->goals->for->total->total}},
                    {{$predictions->forms->away->league->goals->against->total->total}}],
                fill: false,
                backgroundColor: 'rgba(255, 226, 5, 0.2)',
                borderColor: 'rgb(255, 226, 5)',
                pointBackgroundColor: 'rgb(54, 162, 235)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(54, 162, 235)'
            }]
        };
        const config = {
            type: 'radar',
            data: data,
            options: {
                elements: {
                    line: {
                        borderWidth: 3,
                        color:'white'
                    }
                }
            },
        };
    </script>
    <script>

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</div>
