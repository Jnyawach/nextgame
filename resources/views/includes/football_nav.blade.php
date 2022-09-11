<div class="prediction-nav m-0 mt-3">
    <ul class="nav mb-0 ms-0">
        <li class="nav-item">

            <a class="nav-link {{ Request::routeIs('football.index') ? 'active' : '' }}"  href="{{route('football.index',$league->slug)}}" title="{{$league->name}}">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('league.fixture') ? 'active' : '' }}" href="{{route('league.fixture', $league->slug)}}" title="{{$league->name}}">Fixtures</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('league.standings') ? 'active' : '' }}" href="{{route('league.standings',$league->slug)}}" title="{{$league->name}}">Standings</a>
        </li>

    </ul>
</div>
