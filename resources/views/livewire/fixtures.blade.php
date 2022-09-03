<div>
    <section class="mt-5 p-1">
        <a href="#" class="btn btn-outline-primary btn-sm d-inline-block m-1 active-btn">
            Today ({{\Carbon\Carbon::now()->isoFormat('MMM Do')}})
        </a>
        <a href="#" class="btn btn-outline-primary btn-sm d-inline-block m-1">
            Tomorrow ({{\Carbon\Carbon::now()->addDay()->isoFormat('MMM Do')}})
        </a>
        <a href="#" class="btn btn-outline-primary btn-sm d-inline-block m-1">
            {{\Carbon\Carbon::now()->addDays(2)->format('l')}} ({{\Carbon\Carbon::now()->addDays(2)->isoFormat('MMM Do')}})
        </a>
        <a href="#" class="btn btn-outline-primary btn-sm d-inline-block  m-1">
            {{\Carbon\Carbon::now()->addDays(3)->format('l')}} ({{\Carbon\Carbon::now()->addDays(3)->isoFormat('MMM Do')}})
        </a>
        <a href="#" class="btn btn-outline-primary btn-sm d-inline-block m-1">
            {{\Carbon\Carbon::now()->addDays(4)->format('l')}} ({{\Carbon\Carbon::now()->addDays(4)->isoFormat('MMM Do')}})
        </a>

    </section>
    <section>

    </section>
</div>
