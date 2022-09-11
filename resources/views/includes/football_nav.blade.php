<div class="prediction-nav m-0 mt-3">
    <ul class="nav mb-0 ms-0">
        <li class="nav-item">

            <a class="nav-link {{ Request::routeIs('football.index') ? 'active' : '' }}"  href="{{route('football.index',$league->slug)}}">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('competition-fixtures') ? 'active' : '' }}" href="#">Fixtures</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('competition-results') ? 'active' : '' }}" href="#">Standings</a>
        </li>

    </ul>
</div>
