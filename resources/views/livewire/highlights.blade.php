<div>
    <h6>Recently added</h6>
    <div class="row">
        <div class="col-12 col-md-8 col-lg-8 p-2">
            <a href="{{route('match-highlights.show', $recent->slug)}}" title="{{$recent->name}} Highlights" class="text-decoration-none">
                <div>
                    <div class="player-thumbnail">
                        @if(file_get_contents($recent->thumbnail))
                            <img src="{{$recent->thumbnail}}" class="img-fluid" alt="{{$recent->name}}">
                        @else
                            <img src="{{asset('images/default.jpg')}}" class="img-fluid" alt="{{$recent->name}}">
                        @endif

                        <div class="play-icon">
                            <span class="fs-4"><i class="fal fa-play"></i></span>

                        </div>

                    </div>

                    <div class="match-details">
                        <h6 class="mt-3">{{$recent->name}}</h6>
                        <p class="mt-2 ">{{$recent->competition}}: <span>{{\Carbon\Carbon::parse($recent->match_date)->diffForHumans()}}</span></p>

                    </div>
                </div>

            </a>
        </div>
        <div class="col-12 col-md-4 col-lg-3 p-2">
            @foreach($headers as $highlight)
         <div class="most-recent">
             <a href="{{route('match-highlights.show', $highlight->slug)}}" title="{{$highlight->name}} Highlights" class="text-decoration-none">
                 <div>
                     <div class="player-thumbnail">
                         @if(file_get_contents($highlight->thumbnail))
                             <img src="{{$highlight->thumbnail}}" class="img-fluid curved" alt="{{$highlight->name}}">
                         @else
                             <img src="{{asset('images/default.jpg')}}" class="img-fluid curved" alt="{{$highlight->name}}">
                         @endif

                         <div class="play-icon">
                             <span class="fs-4"><i class="fal fa-play"></i></span>

                         </div>

                     </div>

                     <div class="match-details">
                         <h6 class="mt-3 fw-bold">{{$highlight->name}}</h6>
                         <p class="mt-2 ">{{$highlight->competition}}: <span>{{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</span></p>

                     </div>
                 </div>

             </a>
         </div>
            @endforeach
        </div>
    </div>

    <section class="mt-5">
        <h6>Previous Highlights</h6>
        <div class="row">
            @foreach($highlights as $highlight)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 pt-3">
                    <a href="{{route('match-highlights.show', $highlight->slug)}}" title="{{$highlight->name}} Highlights" class="text-decoration-none">
                        <div>
                            <div class="player-thumbnail">
                                @if(file_get_contents($highlight->thumbnail))
                                    <img src="{{$highlight->thumbnail}}" class="img-fluid curved" alt="{{$highlight->name}}" loading="lazy">
                                @else
                                    <img src="{{asset('images/default.jpg')}}" class="img-fluid curved" alt="{{$highlight->name}}">
                                @endif

                                <div class="play-icon">
                                    <span class="fs-4"><i class="fal fa-play"></i></span>

                                </div>

                            </div>

                            <div class="match-details">
                                <h6 class="mt-3">{{$highlight->name}}</h6>
                                <p class="mt-2 ">{{$highlight->competition}}: <span>{{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</span></p>

                            </div>
                        </div>

                    </a>
                </div>


            @endforeach
        </div>

        <div class="text-center mt-5">
            <div wire:loading.remove>
                <button type="button" class="btn btn-primary" wire:click="loadMore">More Highlights</button>
            </div>
            <div wire:loading>
                <div class="spinner-border text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>


    </section>
</div>
