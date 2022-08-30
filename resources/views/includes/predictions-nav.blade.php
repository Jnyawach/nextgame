<section class="mt-5 p-3">

    <div class="competition-header">
        <div class="row">
            <div class="col-3 col-sm-2 col-lg-1">
                <img src="{{$league->logo}}" class="img-fluid rounded-circle" alt="{{$league->name}}">
            </div>
            <div class="col-9 col-md-6 align-self-center">
                <h1 class="fw-bold fs-4">{{$league->name}}</h1>
                <label for="season-select">Season:</label>
                <select class=" season mt-2" id="season-select" wire:model="year">
                    <option selected value="2022">2022-23</option>
                    <option value="2021">2021-22</option>
                    <option value="2020">2020-21</option>
                    <option value="2019">2019-20</option>
                </select>
            </div>
        </div>
        <section class="mt-5 prediction-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active"  href="{{route('competitions.index')}}">Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fixtures</a>
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
            <hr class="mt-0">
        </section>


    </div>

</section>
