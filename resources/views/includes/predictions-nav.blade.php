


            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('competitions.show') ? 'active' : '' }}"  href="{{route('competitions.show',$league->slug)}}">Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('competition-fixtures') ? 'active' : '' }}" href="{{route('competition-fixtures',$league->slug)}}">Fixtures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Transfers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Injuries</a>
                </li>
            </ul>

