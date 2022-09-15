<div>
    @if($sidebar==false)
    <div class="card fixture">
        <div class="card-header p-2" style="border-bottom:1px solid #222">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fal fa-search"></i> </span>
                <input type="search" class="form-control" placeholder="Search..."  wire:model="search">
            </div>

        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                @if($popular->count()>0)
                    @foreach($popular as $competition)
                        <li class="mt-2">
                            <a href="{{route('football.index', $competition->league->slug)}}" class="text-decoration-none" title="{{$competition->league->name}}">
                                <div class="panel-image">
                                    <img src="{{$competition->league->logo}}" class="img-fluid" alt="{{$competition->league->name}}" style="height: 20px" loading="lazy">
                                    <span class="ms-3">{{$competition->league->name}}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                @endif

            </ul>
            <ul class="list-unstyled">
                @if($countries->count()>0)
                    @foreach($countries as $country)
                        <li class="mt-2">

                            <button type="button" class="btn btn-link text-decoration-none fs-6 country-btn"  wire:click="Leagues({{$country->id}})">
                                <img src="{{$country->flag}}" class="img-fluid" alt="{{$country->name}}" style="width: 20px" loading="lazy">
                                <span class="ms-2">{{$country->name}}</span>
                            </button>

                        </li>
                    @endforeach
                @endif



            </ul>

        </div>
    </div>
    @endif
    @if($sidebar==true)
    <div class="card fixture">
        <div class="card-header p-2" style="border-bottom:1px solid #222">
        <button type="button" class="btn btn-link text-decoration-none text-light" wire:click="CloseMenu"><span class="me-3"><i class="far fa-angle-left"></i></span>{{$nation->name}}</button>
        </div>
        <div class="card-body">
            @if($menu->count()>0)
            <ul class="list-unstyled">

                    @foreach($menu as $competition)
                        <li class="mt-2">
                            <a href="{{route('football.index', $competition->slug)}}" class="text-decoration-none" title="{{$competition->name}}">
                                <div class="panel-image">
                                    <img src="{{$competition->logo}}" class="img-fluid" alt="{{$competition->name}}" style="height: 20px" loading="lazy">
                                    <span class="ms-3">{{$competition->name}}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
            </ul>
            @endif
        </div>
    </div>
        @endif
</div>
