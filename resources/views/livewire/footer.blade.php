<div>
    <footer class="mt-5">
        <hr>

        <div class="row mt-5 p-3">
            <div class="col-6 col-sm-6 col-md-3 p-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/" title="Kola Sports">
                            <img src="{{asset('images/kolasport.png')}}" class="img-fluid" alt="Kola Sport Logo">
                        </a>
                    </li>
                    <div class="mt-5">
                        <h6>Connect:</h6>
                        <div class="social-links mt-3">
                            <a class="p-2 m-1"  href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a class="p-2 m-1"  href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a class="p-2 m-1"  href="#" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
                        </div>
                    </div>
                </ul>
            </div>
            <!--
            <div class="col-6 col-sm-6 col-md-3 p-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        @foreach($popular as $competition)
                            <a class="nav-link" href="{{route('competitions.show',$competition->league->slug)}}" title="{{$competition->league->name}}">{{$competition->league->name}}</a>
                        @endforeach
                    </li>

                </ul>
            </div>
            -->
            <div class="col-6 col-sm-6 col-md-3 p-2">
                <ul class="nav flex-column">
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('competitions.index')}}" title="Football Competitions">Competitions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('competition-countries.index')}}" title="Competition Clusters">Countries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('livescores.index')}}" title="Football Livescore">Livescore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('fixtures.index')}}" title="football Fixtures">Fixtures</a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('match-highlights.index')}}" title="Football Highlights">Highlights<span><i data-feather="arrow-up-right"></i></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" title="Football Predictions">Predictions</a>
                    </li>
                </ul>
            </div>


            <div class="col-6 col-sm-6 col-md-3 p-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('privacy-policy')}}" title="Privacy Policy">Privacy policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('terms')}}" title="Terms of Use">Terms of Use</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}" title="Contact Us">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dmca')}}">DMCA</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer text-center mt-5">
            <p>&copy; {{\Carbon\Carbon::now()->year}} Kola Sports</p>
        </div>

    </footer>
</div>
