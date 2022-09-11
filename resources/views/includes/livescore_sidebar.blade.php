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
                        <a href="{{route('livescore-country',$country->slug)}}" class="text-decoration-none" title="{{$country->name}}">
                            <div class="panel-image">
                                <img src="{{$country->flag}}" class="img-fluid" alt="{{$country->name}}" style="width: 20px" loading="lazy">
                                <span class="ms-3">{{$country->name}}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            @endif



        </ul>

    </div>
</div>
