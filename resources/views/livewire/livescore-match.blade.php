<div>
    <section>
        <div class="favorite mt-5">
            <a href="#" class="text-decoration-none m-2"><span><i class="fal fa-futbol"></i> </span>Scores</a>
            <a href="#" class="text-decoration-none m-2"><span><i class="fal fa-star"></i> </span>Favorites</a>
        </div>
    </section>
    <section class="mt-3 p-2">
        <div class="row">
            <div class="d-none d-lg-block col-3">
                @include('includes.livescore_sidebar')
            </div>
            <div class="col-12 col-lg-6">
                <div class="card fixture">
                    <div class="card-header p-0" style="border-bottom:1px solid #222">
                        @include('includes.livsecore_nav')
                    </div>
                    <div class="card-body">
                        <div class="fixture-competition">

                            <div class="row">
                                <div class="col-1">
                                    <img src="images/premier-league.png" style="width:30px" class="float-start">
                                </div>
                                <div class="col-9">
                                    <h6>Premier League</h6>
                                    <span>England</span>

                                </div>
                                <div class="col-2 text-end">
                                    <form>
                                        <button type="submit" class="btn btn-link"><i class="fal fa-star"></i></button>
                                    </form>
                                </div>

                            </div>
                            <div class="game-detail mt-3">
                                <div class="row mt-3">
                                    <div class="col-4 text-center">
                                        <img src="images/Arsenal-FC-icon.png" class="img-fluid" style="width: 30px">
                                        <h6 class="mt-2">Arsenal</h6>
                                    </div>
                                    <div class="col-4 text-center">
                                        <!---Indicate the match progress or time or result if complete-->

                                        <h2 class="mt-2 fw-bold fs-4">21:00</h2>
                                        <small class="text-junior">31'</small>
                                    </div>
                                    <div class="col-4 text-center">
                                        <img src="images/premier-league.png" class="img-fluid" style="width: 30px">
                                        <h6 class="mt-2">Manchester United</h6>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="match-info mt-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Events</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Stats</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="head-head" data-bs-toggle="tab" data-bs-target="#head-head-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">H2H</button>
                                </li>

                            </ul>
                            <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <h6 class="fs-6">Match Information</h6>
                                    <div class="card fixture">
                                        <div class="card-body p-0">
                                            <div class="p-2">
                                                <div class="row">
                                                    <div class="col-1 text-end">
                                                        <p><i class="fal fa-calendar-alt"></i></p>

                                                    </div>
                                                    <div class="col-10">
                                                        <p class="p-0 m-0">August 30, 2022</p>
                                                        <small>21:00</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-0">
                                            <div class="p-2">
                                                <div class="row">
                                                    <div class="col-1 text-end">
                                                        <p ><i class="fal fa-location"></i></p>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="p-0 m-0">Old Trafford</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr class="mt-0">
                                            <div class="p-2">
                                                <div class="row">
                                                    <div class="col-1 text-end">
                                                        <p ><i class="fal fa-whistle"></i></p>
                                                    </div>
                                                    <div class="col-10">
                                                        <p class="p-0 m-0">Joanne Makena</p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <div class="card fixture">
                                        <div class="card-body">
                                            <table  style="width: 100%">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        41'
                                                    </td>
                                                    <td style="width: 20%">Jesus'</td>
                                                    <td>Goal</td>
                                                    <td>1-0</td>
                                                    <td style="width: 50%"></td>
                                                </tr>


                                                </tbody>
                                            </table>


                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                    <div class="card fixture">
                                        <div class="card-body">
                                            <div class="stats-bar text-center">
                                                <div class="match-data">
                                                    <small>Shorts on Goal</small>
                                                    <div class="stats-table">
                                                        <div class="row">

                                                            <div class="col-6 mx-auto">
                                                                <p class="text-start p-0 m-0">1</p>
                                                                <div class="progress justify-content-end">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6 mx-auto">
                                                                <p class="text-end p-0 m-0">8</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="match-data mt-3">
                                                    <small>Shorts off Goal</small>
                                                    <div class="stats-table">
                                                        <div class="row">

                                                            <div class="col-6 mx-auto">
                                                                <p class="text-start p-0 m-0">1</p>
                                                                <div class="progress justify-content-end">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6 mx-auto">
                                                                <p class="text-end p-0 m-0">8</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="match-data mt-3">
                                                    <small>Total Shorts</small>
                                                    <div class="stats-table">
                                                        <div class="row">

                                                            <div class="col-6 mx-auto">
                                                                <p class="text-start p-0 m-0">1</p>
                                                                <div class="progress justify-content-end">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6 mx-auto">
                                                                <p class="text-end p-0 m-0">8</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="match-data mt-3">
                                                    <small>Fouls</small>
                                                    <div class="stats-table">
                                                        <div class="row">

                                                            <div class="col-6 mx-auto">
                                                                <p class="text-start p-0 m-0">1</p>
                                                                <div class="progress justify-content-end">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6 mx-auto">
                                                                <p class="text-end p-0 m-0">8</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="match-data mt-3">
                                                    <small>Corner Kicks</small>
                                                    <div class="stats-table">
                                                        <div class="row">

                                                            <div class="col-6 mx-auto">
                                                                <p class="text-start p-0 m-0">1</p>
                                                                <div class="progress justify-content-end">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6 mx-auto">
                                                                <p class="text-end p-0 m-0">8</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="match-data mt-3">
                                                    <small>Possession</small>
                                                    <div class="stats-table">
                                                        <div class="row">

                                                            <div class="col-6 mx-auto ">
                                                                <p class="text-start p-0 m-0">1</p>
                                                                <div class="progress justify-content-end">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6 mx-auto">
                                                                <p class="text-end p-0 m-0">8</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="match-data mt-3">
                                                    <small>Red Cards</small>
                                                    <div class="stats-table">
                                                        <div class="row">

                                                            <div class="col-6 mx-auto ">
                                                                <p class="text-start p-0 m-0">1</p>
                                                                <div class="progress justify-content-end">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6 mx-auto">
                                                                <p class="text-end p-0 m-0">8</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="match-data mt-3">
                                                    <small>Yellow Cards</small>
                                                    <div class="stats-table">
                                                        <div class="row">

                                                            <div class="col-6 mx-auto">
                                                                <p class="text-start p-0 m-0">1</p>
                                                                <div class="progress justify-content-end">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>
                                                            <div class="col-6 mx-auto">
                                                                <p class="text-end p-0 m-0">8</p>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="head-head-pane" role="tabpanel" aria-labelledby="head-tab" tabindex="0">
                                    <div class="card fixture">
                                        <div class="card-body">
                                            <div class="game-detail text-center">

                                                <div class="row mt-1">
                                                    <div class="col-4 text-center">
                                                        <img src="images/Arsenal-FC-icon.png" class="img-fluid" style="width: 30px">
                                                        <h6 class="mt-2">Arsenal</h6>
                                                    </div>
                                                    <div class="col-4 text-center ">
                                                        <small >August 20, 2022</small>
                                                        <h2 class="mt-2 fw-bold fs-4">0 : 1</h2>

                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <img src="images/premier-league.png" class="img-fluid" style="width: 30px">
                                                        <h6 class="mt-2">Manchester United</h6>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="game-detail text-center mt-2">

                                                <div class="row mt-1">
                                                    <div class="col-4 text-center">
                                                        <img src="images/Arsenal-FC-icon.png" class="img-fluid" style="width: 30px">
                                                        <h6 class="mt-2">Arsenal</h6>
                                                    </div>
                                                    <div class="col-4 text-center ">
                                                        <small >August 20, 2022</small>
                                                        <h2 class="mt-2 fw-bold fs-4">0 : 1</h2>

                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <img src="images/premier-league.png" class="img-fluid" style="width: 30px">
                                                        <h6 class="mt-2">Manchester United</h6>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>







                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
