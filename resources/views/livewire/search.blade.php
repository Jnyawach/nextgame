<div>
    <section class="search-form mt-5 p-3 p-lg-5 ">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                <h1 class="text-center fs-2">Search for Competitions and Clusters</h1>
                <div class="fixture p-0 mt-5" style="border-bottom: 1px solid #222">
                    <div class="input-group">
                        <span class="input-group-text p-3" id="basic-addon1"><i class="fal fa-search"></i></span>
                        <input type="search" name="search" class="form-control p-3" placeholder="Start typing to search" wire:model.debounce.500ms="search">
                    </div>
                </div>


                <div class="search-placeholder mt-4">
                    <div class="row">
                        @if(!$countries||!$leagues)
                        <div class="col-11 col-md-10 mx-auto text-center">
                            @foreach($popular as $competition)
                            <a href="{{route('competitions.show',$competition->league->slug)}}" class="btn btn-outline-secondary shortcuts m-1" title="{{$competition->league->name}}">#{{$competition->league->name}}</a>
                            @endforeach
                                <a href="{{route('competitions.index')}}" class="btn btn-outline-secondary shortcuts m-1" title="All Competitions">#All Competitions</a>

                        </div>
                        @else
                            <div class="col-11 col-md-10 mx-auto text-center">
                                @foreach($countries as $country)
                                    <a href="{{route('countries.show',$country->slug)}}" class="btn btn-outline-secondary shortcuts m-1" title="{{$country->name}}">#{{$country->name}}</a>
                                @endforeach
                                    @foreach($leagues as $league)
                                        <a href="{{route('competitions.show',$league->slug)}}" class="btn btn-outline-secondary shortcuts m-1" title="{{$league->name}}">#{{$league->country->name}}-{{$league->name}}</a>
                                    @endforeach
                                </div>

                        @endif
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>
