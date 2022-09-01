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

                </div>
            </div>
            <section class="mt-5 prediction-nav">
                @include('includes.predictions-nav')
                <hr class="mt-0">
            </section>


        </div>
    </section>
    <section class="mt-5 p-3">
        @if($fixtures)
            @foreach($fixtures->groupBy('round') as $key=>$round)
        <h6 class="mt-5">{{$key}}</h6>
        <div class="row mt-3">
            @foreach(json_decode($round) as $fixture)

            <div class="col-12 col-md-6 col-lg-4 p-1">
                <a href="{{route('fixtures.show',$fixture->id)}}" class="text-decoration-none text-light"
                   title="{{$fixture->home}}-{{$fixture->away}}">

                    <div class="card fixture transform-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">

                                    <div>
                                        <img src="{{$fixture->home_logo}}" class="img-fluid d-inline-block m-1" style="width: 28px">
                                        <p class="d-inline-block m-1">{{$fixture->home}}</p>
                                    </div>
                                    <div class="mt-2">
                                        <img src="{{$fixture->away_logo}}" class="img-fluid d-inline-block m-1" style="height: 25px">
                                        <p class="d-inline-block m-1">{{$fixture->away}}</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <p>{{\Carbon\Carbon::parse($fixture->date)->format('g:i A')}}</p>
                                    <p>{{\Carbon\Carbon::parse($fixture->date)->isoFormat('MMM Do YY')}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>

            </div>
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
