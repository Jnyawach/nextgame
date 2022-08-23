<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Nextgame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    @yield('styles')

</head>
<body>
<div class="content">
    <header class="fixed-top">
        <!---extended navbar for bigger menus-->
        <section class="big-menu">
            <nav class="navbar navbar-expand-sm ">
                <div class="container-fluid">
                    <a class="navbar-brand me-5" href="#">Nextgame</a>

                    <div class=" navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">PREDICTIONS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">HIGHLIGHTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">LIVESCORE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">FIXTURES</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-link" href="#" style="font-size: 13px"><span><i data-feather="search"></i></span></a>
                            </li>

                        </ul>


                    </div>
                </div>
            </nav>
        </section>
        <!--Small menu trigger-->
        <section class="small-screen ps-3 pb-2 pt-3">
            <div class="row">
                <div class="col-6">
                    <a class="navbar-brand " href="#">Navbar</a>

                </div>
                <div class="col-6 text-end pe-4">

                    <ul class="nav justify-content-end">
                        <li class="nav-item fs-4">
                            <a class="btn btn-link fs-5" href="#"><span><i data-feather="search"></i></span></a>
                        </li>

                        <li class="nav-item">
                            <button class="btn btn-link fs-5" type="button" data-bs-toggle="modal"
                                    data-bs-target="#smallMenu">
                                <span><i data-feather="align-left"></i></span>
                            </button>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
        <!--Small Menu Modal-->
        <div class="modal fade" id="smallMenu" tabindex="-1" aria-labelledby="smallMenuLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen " >
                <div class="modal-content small-menu">
                    <div class="modal-header">
                        <div class="modal-title navbar-brand">
                            <h2>Navbar</h2>
                        </div>
                        <button type="button" class="btn-link fs-5" data-bs-dismiss="modal" aria-label="Close"><span><i data-feather="x"></i></span></button>
                    </div>
                    <div class="modal-body smaller">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Predictions<span><i data-feather="arrow-up-right"></i></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Highlights<span><i data-feather="arrow-up-right"></i></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Livescore<span><i data-feather="arrow-up-right"></i></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Fixtures<span><i data-feather="arrow-up-right"></i></span></a>
                            </li>



                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!--End of Small Menu Modal-->
        <hr>

    </header>
    <main class="p-5 mt-5">
      @yield('content')

    </main>
    <footer class="mt-5">
        <hr>
        <div class="row mt-5">
            <div class="col-6 col-sm-6 col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Predictions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Match highlights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Livescore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Fixtures</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Premier League</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laliga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">UEFA Champions League</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">EUROPA League</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Premier League</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laliga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">UEFA Champions League</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">EUROPA League</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Premier League</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laliga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">UEFA Champions League</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">EUROPA League</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer text-center mt-5">
            <p>&copy; 2022 Soccer world</p>
        </div>

    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
    feather.replace()
</script>
</body>
</html>
