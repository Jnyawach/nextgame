<ul class="nav live-score">
    <li class="nav-item">
        <a class="nav-link  {{ request()->is('livescores') ? 'active' : '' }}" href="{{route('livescores.index')}}">LIVE</a>
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


    <li class="nav-item dropdown d-lg-none">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fal fa-calendar-alt"></i> MORE
        </a>
        <div class="dropdown-menu" style="width: 320px; background: none">
            <div class="card fixture" style="background:#030420">
                <div class="card-body">
                    {!! livescore() !!}
                </div>
            </div>
        </div>
    </li>



</ul>
