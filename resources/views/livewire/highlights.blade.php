<div>
   <div class="d-flex justify-content-between">
       <div>
           <h4>Recently added</h4>
       </div>
       <div class="highlight-search">
           <div class="input-group">
               <span class="input-group-text p-2" id="basic-addon1"><i class="fal fa-search"></i></span>
               <input type="search" name="search" class="form-control p-2" placeholder="Search Highlights..." wire:model.debounce.500ms="search">
           </div>
       </div>
   </div>
    <div class="row mt-4">
        <div class="col-12 col-md-8 col-lg-8 p-2">
            <a href="{{route('match-highlights.show', $recent->slug)}}" title="{{$recent->name}} Highlights" class="text-decoration-none">
                <div>
                    <div class="player-thumbnail">
                        <img src="{{$recent->thumbnail}}" class="img-fluid" alt="{{$recent->name}}">

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

                             <img src="{{$highlight->thumbnail}}" class="img-fluid curved" alt="{{$highlight->name}}">


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
            @foreach($highlights->slice(3) as $highlight)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 pt-3">
                    <a href="{{route('match-highlights.show', $highlight->slug)}}" title="{{$highlight->name}} Highlights" class="text-decoration-none">
                        <div>
                            <div class="player-thumbnail">

                                    <img src="{{$highlight->thumbnail}}" class="img-fluid curved" alt="{{$highlight->name}}" loading="lazy">

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
