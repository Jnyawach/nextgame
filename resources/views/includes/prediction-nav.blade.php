<ul class="nav live-score">
    <li class="nav-item">
        <a class="nav-link  {{ request()->is('predictions') ? 'active' : '' }}" href="{{route('predictions.index')}}">TODAY</a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-uppercase {{ request()->is('predictions/betting-tips/'.\Carbon\Carbon::now()->addDay()->format('Y-m-d')) ? 'active' : '' }}" href="{{route('betting-tips',\Carbon\Carbon::now()->addDay()->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDay()->isoFormat('MMM Do')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-uppercase {{ request()->is('predictions/betting-tips/'.\Carbon\Carbon::now()->addDays(2)->format('Y-m-d')) ? 'active' : '' }}" href="{{route('betting-tips',\Carbon\Carbon::now()->addDays(2)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(2)->isoFormat('MMM Do')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-uppercase {{ request()->is('predictions/betting-tips/'.\Carbon\Carbon::now()->addDays(3)->format('Y-m-d')) ? 'active' : '' }}" href="{{route('betting-tips',\Carbon\Carbon::now()->addDays(3)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(3)->isoFormat('MMM Do')}}</a>
    </li>

    <li class="nav-item dropdown d-lg-none">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fal fa-calendar-alt"></i> MORE
        </a>
        <div class="dropdown-menu" style="width: 320px; background: none">
            <div class="card fixture" style="background:#030420">
                <div class="card-body">
                    {!! calendar() !!}
                </div>
            </div>
        </div>
    </li>



</ul>

