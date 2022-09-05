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
    <section class="mt-3 p-3">

        @if($injuries->count()>0)
            <h6>Injuries</h6>
        <div class="row mt-3">
            @foreach(json_decode($injuries) as $injury)
            <div class="col-12 col-md-3 p-1">
                <a href="#" title="{{$injury->id}}" class="text-decoration-none">
                <div class="card fixture transform-card injury">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{$injury->avatar}}" class="img-fluid rounded-circle" title="{{$injury->name}}" alt="{{$injury->name}}">
                            </div>
                            <div class="col-9">
                                <h6 class="fw-bold">{{$injury->name}}</h6>
                                <p class="p-0 m-0"><span>Injury:</span> {{$injury->type}}</p>
                                <small><span>Club:</span> {{ \Illuminate\Support\Str::limit($injury->team, 15, $end='...') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
            <div class="text-center">
                <h6>Sorry! No injury data available</h6>

            </div>
        @endif

    </section>
</div>
