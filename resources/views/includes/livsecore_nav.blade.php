<ul class="nav live-score">
    <li class="nav-item">
        <a class="nav-link btn {{ Request::routeIs('livescores.index') ? 'active' : '' }}" href="{{route('livescores.index')}}">LIVE</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('livescores/football/'.\Carbon\Carbon::now()->format('Y-m-d')) ? 'active' : '' }}" href="{{route('livescore-football',\Carbon\Carbon::now()->format('Y-m-d'))}}">TODAY</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-uppercase {{ request()->is('livescores/football/'.\Carbon\Carbon::now()->addDay()->format('Y-m-d')) ? 'active' : '' }}" href="{{route('livescore-football',\Carbon\Carbon::now()->addDay()->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDay()->isoFormat('MMM Do')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-uppercase {{ request()->is('livescores/football/'.\Carbon\Carbon::now()->addDays(2)->format('Y-m-d')) ? 'active' : '' }}" href="{{route('livescore-football',\Carbon\Carbon::now()->addDays(2)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(2)->isoFormat('MMM Do')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-uppercase {{ request()->is('livescores/football/'.\Carbon\Carbon::now()->addDays(3)->format('Y-m-d')) ? 'active' : '' }}" href="{{route('livescore-football',\Carbon\Carbon::now()->addDays(3)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(3)->isoFormat('MMM Do')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-uppercase {{ request()->is('livescores/football/'.\Carbon\Carbon::now()->addDays(4)->format('Y-m-d')) ? 'active' : '' }}" href="{{route('livescore-football',\Carbon\Carbon::now()->addDays(4)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(4)->isoFormat('MMM Do')}}</a>
    </li>



</ul>
