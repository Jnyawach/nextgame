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
    <li class="nav-item">
        <a class="nav-link text-uppercase {{ request()->is('predictions/betting-tips/'.\Carbon\Carbon::now()->addDays(4)->format('Y-m-d')) ? 'active' : '' }}" href="{{route('betting-tips',\Carbon\Carbon::now()->addDays(4)->format('Y-m-d'))}}">{{\Carbon\Carbon::now()->addDays(4)->isoFormat('MMM Do')}}</a>
    </li>



</ul>

