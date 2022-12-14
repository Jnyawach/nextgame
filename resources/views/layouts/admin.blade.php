<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="Premier league, Betting Prediction">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel = "icon" href ="{{asset('images/nextgame-icon.png')}}" type = "image/x-icon">
    <link href="{{asset('css/fontawesome/css/all.css')}}" rel="stylesheet">

    <title>@yield('title') | Nextgame</title>

    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    @yield('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{route('admin.index')}}">
                <span class="align-middle">NEXTGAME</span>
            </a>

            <ul class="sidebar-nav">

                <li class="sidebar-item {{ request()->is('admin') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('admin.index')}}">
                        <i class="fal fa-sliders-h"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/timezones') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('timezones.index')}}">
                        <i class="fal fa-alarm-clock"></i> <span class="align-middle">Timezones</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/countries') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('countries.index')}}">
                        <i class="fal fa-globe"></i> <span class="align-middle">Countries</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/leagues') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('leagues.index')}}">
                        <i class="far fa-folders"></i> <span class="align-middle">Leagues</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/teams') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('teams.index')}}">
                        <i class="fal fa-users"></i> <span class="align-middle">Teams</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/popular') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('popular.index')}}">
                        <i class="fal fa-thumbs-up"></i> <span class="align-middle">Popular Competitions</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/videos') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('videos.index')}}">
                        <i class="far fa-video"></i> <span class="align-middle">Highlights</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->is('admin/contact') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('contact.index')}}">
                        <i class="far fa-envelope"></i> <span class="align-middle">Messages</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('admin/policies') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('policies.index')}}">
                        <i class="fal fa-file-alt"></i> <span class="align-middle">HighlightsPolicy & Terms</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('links') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('links.index')}}">
                        <i class="fas fa-video"></i> <span class="align-middle">Match links</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('logs') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('logs')}}" target="_blank">
                        <i class="fas fa-clipboard-list"></i> <span class="align-middle">Logs</span>
                    </a>
                </li>




            </ul>

        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="{{asset('images/user-icon.png')}}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">{{Auth::user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                            <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')" class="dropdown-item"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="content">
            <div class="container-fluid p-0">
                @yield('content')

            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a class="text-muted" href="/" target="_blank"><strong>Nextgame &copy;</strong></a> </a>
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="#" target="_blank">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#" target="_blank">Help Center</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#" target="_blank">Privacy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#" target="_blank">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{asset('js/admin.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@yield('scripts')






</body>

</html>
