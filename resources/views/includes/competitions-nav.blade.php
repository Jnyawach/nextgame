            <ul class="nav live-score">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('competitions.show') ? 'active' : '' }}"  href="{{route('competitions.show',$league->slug)}}">Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('competition-fixtures') ? 'active' : '' }}" href="{{route('competition-fixtures',$league->slug)}}">Fixtures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('competition-results') ? 'active' : '' }}" href="{{route('competition-results',$league->slug)}}">Results</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('competition-injuries') ? 'active' : '' }}" href="{{route('competition-injuries',$league->slug)}}">Injuries</a>
                </li>
            </ul>

