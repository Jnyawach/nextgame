<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TNVRW6J');</script>
    <!-- End Google Tag Manager -->
    <title>@yield('title') | Kola Sports</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome/css/all.css')}}" rel="stylesheet">
    <link rel = "icon" href ="{{asset('images/kola-icon.png')}}" type = "image/x-icon">
    @yield('styles')


    <script src="{{asset('js/js.cookie.js')}}"></script>
    <script>
        var time=Intl.DateTimeFormat().resolvedOptions().timeZone
        Cookies.set('timezone', time, { expires: 7 })
    </script>
   @livewireStyles
    <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TNVRW6J"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="content">
    <header class="fixed-top">
        <!---extended navbar for bigger menus-->
        <section class="big-menu">
            <nav class="navbar navbar-expand-sm ">
                <div class="container-fluid">
                    <a class="navbar-brand me-5" href="/" title="Kola Sports">
                        <img src="{{asset('images/kolasport.png')}}" class="img-fluid" alt="Nextgame Logo">
                    </a>

                    <div class=" navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link"  href="/">Predictions</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('match-highlights.index')}}" title="Match Highlights">Highlights</a>
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
                    <a class="navbar-brand me-5" href="/" title="Kola Sports">
                        <img src="{{asset('images/kolasport.png')}}" class="img-fluid" alt="Kola Sports Logo" style="width: 180px">
                    </a>

                </div>
                <div class="col-6 text-end pe-4">

                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <button class="btn btn-link fs-5" type="button" data-bs-toggle="modal"
                                    data-bs-target="#menuModal">
                                <span><i class="fal fa-bars"></i></span>
                            </button>
                        </li>

                    </ul>
                </div>
            </div>
            <!--Small Menu Modal-->
            <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-fullscreen" >
                    <div class="modal-content small-menu">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5">Kola sports</h2>

                            <button type="button" class="btn btn-link" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body smaller">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="/" title="Football Predictions">Predictions<span><i data-feather="arrow-up-right"></i></span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('match-highlights.index')}}" title="Football Highlights">Highlights<span><i data-feather="arrow-up-right"></i></span></a>
                                </li>



                            </ul>

                        </div>

                    </div>
                </div>
            </div>

            <!--End of Small Menu Modal-->
        </section>

        <hr>

    </header>
    <main class="p-3 p-md-5 mt-5">



      @yield('content')

    </main>
    @livewire('footer')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

@yield('scripts')
@livewireScripts
</body>
</html>
