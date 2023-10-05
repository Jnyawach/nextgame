@extends('layouts.main')
@section('title', $highlight->name)
@section('styles')
    <meta name="description" content="{{$highlight->name}} Highlights-{{$highlight->competition}}">
    <meta name="keywords" content="{{$highlight->name}} Highlights, {{$highlight->name}} Recap,{{$highlight->name}} Review">
    <meta property="og:title" content="{{$highlight->name}} Highlights" />
    <meta property="og:type" content="video.movie" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="{{$highlight->thumnail}}" />
    <meta name="twitter:title" content="{{$highlight->name}} Highlights">
    <meta name="twitter:description" content="{{$highlight->name}} Highlights-{{$highlight->competition}}.">
    <meta name="twitter:image" content="{{$highlight->thumnail}}">
    <meta name="twitter:card" content="summary_large_image">
    <!---Video structured data-->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "VideoObject",
    "name": "{{$highlight->name}} Highlights",
    "description": "{{$highlight->name}} Highlights-{{$highlight->competition}} {{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}",
    "thumbnailUrl": [
      "{{$highlight->thumbnail}}"
    ],
    "uploadDate": "{{$highlight->created_at->toIso8601String()}}",
}
</script>
    <!--Breadcrumbs-->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://nextgame.com"
    },{
      "@type": "ListItem",
      "position": 2,
      "name": "Highlights",
      "item": "https://nextgame.com/match-higlights"
    },{
      "@type": "ListItem",
      "position": 3,
      "name": "{{$highlight->name}} Highlights"
    }]
  }
</script>
@endsection
@section('content')
    <section class="mt-5 p-2">
        <h1 class="fw-bold fs-5">{{$highlight->name}}</h1>


        <div class="highlight mt-3">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="shadow-sm" >
                        <div style='width:100%;height:0px;position:relative;padding-bottom:56.250%;background:#000;'>
                           {!! $highlight->video_embed!!}
                        </div>
                    </div>
                    <div class="mt-3">
                        <div id="social-links">
                            <span class="me-3">Share:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="btn btn-link" target="_blank"><span><i class="fab fa-facebook-f"></i></span></a>
                            <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" class="btn btn-link" target="_blank"><span><i class="fab fa-twitter"></i></span></a>
                            <a href="https://wa.me/?text={{url()->current()}}" class="btn btn-link" target="_blank" ><span><i class="fab fa-whatsapp"></i></span></a>


                        </div>
                        <div class="match-details">
                            <h6 class="mt-3">{{$highlight->competition}}</h6>
                            <p class="fs-6">{{$highlight->name}} <span>{{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</span></p>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-3 text-center p-3">
                    <div class="advert" >

                    </div>

                </div>
            </div>

        </div>

    </section>
    @if($videos->count()>0)
    <section class="mt-5 p-3">
        <h1 class="fw-bold fs-5">Related Match Highlights</h1>
        <div class="row mt-5">
            @foreach($videos as $highlight)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 pt-3">
                    <a href="{{route('match-highlights.show', $highlight->slug)}}" title="{{$highlight->name}} Highlights" class="text-decoration-none">
                        <div>
                            <div class="player-thumbnail">
                                @if(file_get_contents($highlight->thumbnail))
                                    <img src="{{$highlight->thumbnail}}" class="img-fluid curved" alt="{{$highlight->name}}">
                                @else
                                    <img src="{{asset('images/default.jpg')}}" class="img-fluid curved" alt="{{$highlight->name}}">
                                @endif

                                <div class="play-icon">
                                    <span class="fs-4"><i class="fal fa-play"></i></span>

                                </div>

                            </div>

                            <div class="match-details">
                                <h6 class="mt-3">{{$highlight->name}}</h6>
                                <p class="mt-2 ">{{$highlight->competition}}: <span>{{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</span></p>

                            </div>
                        </div>

                    </a>
                </div>
            @endforeach
        </div>


    </section>
    @else
        <section class="mt-5 p-3">
            <h1 class="fw-bold fs-5">Latest Match Highlights</h1>
            <div class="row mt-5">
                @foreach($latest as $highlight)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 pt-3">
                        <a href="{{route('match-highlights.show', $highlight->slug)}}" title="{{$highlight->name}} Highlights" class="text-decoration-none">
                            <div>
                                <div class="player-thumbnail">
                                    @if(file_get_contents($highlight->thumbnail))
                                        <img src="{{$highlight->thumbnail}}" class="img-fluid curved" alt="{{$highlight->name}}">
                                    @else
                                        <img src="{{asset('images/default.jpg')}}" class="img-fluid curved" alt="{{$highlight->name}}">
                                    @endif

                                        <div class="play-icon">
                                            <span class="fs-4"><i class="fal fa-play"></i></span>

                                        </div>

                                </div>

                                <div class="match-details">
                                    <h6 class="mt-3">{{$highlight->name}}</h6>
                                    <p class="mt-2 ">{{$highlight->competition}}: <span>{{\Carbon\Carbon::parse($highlight->match_date)->diffForHumans()}}</span></p>

                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>


        </section>
    @endif
@endsection
@section('scripts')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e8efbdff2cc3431"></script>
@endsection
