{{-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner banner-slider-inner">
        <div class="carousel-item active item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-6.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h3>Find your Dream Car</h3>
                </div>
                <p> </p>
                <a href="{{ route('new') }}" class="btn-8">
                    <span>Get Started Now</span>
                </a>
            </div>
        </div>

        <div class="carousel-item item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-4.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h3>Are you a Vehicle Dealer?</h3>
                </div>
                <p>We provide a plartform that brings together vehicle buyers, sellers and vehicle financing providers under one plartform to do business in vehicle market hermoniously. </p>
                <p>Are you searching for a platform with expansive reach that will advertise your vehicles to potential customer accross the country? We are here to do the advertisement work for and let you focus on your core business of selling cars.</p>
                <a href="{{ route('dealers.create') }}" class="btn-8">
                    <span>Learn more</span>
                </a>
            </div>
        </div>

        <div class="carousel-item item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-5.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h3>Best place for sell car!</h3>
                </div>
                <p>This plartform rovides the best marketplace to find customers globally for your vehicles. </p>
                <a href="{{ route('dealers.create') }}" class="btn-8">
                    <span>Get Started Now</span>
                </a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> --}}
{{--
<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-slider-inner text-center">
            <div class="carousel-item banner-max-height active item-bg">
                <img class="d-block w-100 h-100" src="img/banner/img-4.jpg" alt="banner">
                <div class="carousel-content container banner-info-2 bi-2">
                    <div class="row bi5">
                        <div class="col-lg-7 text-start">
                            <div class="banner-content3">
                                <h3 class="mb-30">Buying a car?</h3>
                                <div class="price">

                                    <div class="monthly">
                                        <h4>$750</h4>
                                        <h6>Monthly</h6>
                                    </div>
                                    <div class="fresh">
                                        <h5 class="text-uppercase">Get 35% off on<br>selected items.</h5>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <a href="#" class="btn-7" scrollto=".search-box-3">Get Stated</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">

                            <div class="col-md-12">
                                <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active  text-white" id="tradein-tab" data-bs-toggle="tab"
                                                data-bs-target="#tradein" type="button" role="tab"
                                                aria-controls="home" aria-selected="true">Trade In</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-white " id="service-tab" data-bs-toggle="tab"
                                                data-bs-target="#service">Service
                                                Request</button>
                                        </li>
                                    </ul>
                            </div>

                            <div class="card">

                                <div class="card-body">
                                    <div class="tab-content text-start">

                                        <div class="tab-pane fade show active" id="tradein">
                                            <div class="row">
                                                <div class="form-group col-md-12 mt-1">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="name">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        id="email">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" name="phone"
                                                        id="phone">
                                                </div>
                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="make">Make/Brand</label>
                                                    <input type="text" class="form-control" name="make"
                                                        id="make">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="model">Model</label>
                                                    <input type="text" class="form-control" name="model"
                                                        id="model">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="year">Year</label>
                                                    <input type="text" class="form-control" name="year"
                                                        id="year">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="reg_no">Licence Plate</label>
                                                    <input type="text" class="form-control" name="reg_no"
                                                        id="regNo">
                                                </div>

                                                <div class="col-md-12 mt-2">
                                                    <div class="text-center">
                                                    <button class="btn btn-warning" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade " id="service">
                                            <div class="row">
                                                <div class="form-group col-md-12 mt-1">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="servicename">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" name="email"
                                                        id="serviceemail">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" name="phone"
                                                        id="servicephone">
                                                </div>
                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="make">Make/Brand</label>
                                                    <input type="text" class="form-control" name="make"
                                                        id="servicemake">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="model">Model</label>
                                                    <input type="text" class="form-control" name="model"
                                                        id="servicemodel">
                                                </div>

                                                <div class="form-group col-md-6 mt-1">
                                                    <label for="year">Date</label>
                                                    <input type="text" class="form-control" name="date"
                                                        id="date">
                                                </div>

                                                <div class="col-md-12 mt-2">
                                                    <div class="text-center">
                                                    <button class="btn btn-warning" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tradein">
                                    <div class="search-box-4 sb-7 sb-8">
                                        <form method="GET">
                                            <div class="form-group mb-3">
                                                <select class="form-select" name="select-brand">
                                                    <option>Select Brand</option>
                                                    <option>Audi</option>
                                                    <option>BMW</option>
                                                    <option>Honda</option>
                                                    <option>Nissan</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <select class="form-select" name="select-make">
                                                    <option>Select Make</option>
                                                    <option>BMW</option>
                                                    <option>Honda</option>
                                                    <option>Lamborghini</option>
                                                    <option>Sports Car</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <select class="form-select" name="select-location">
                                                    <option>Select Location</option>
                                                    <option>United States</option>
                                                    <option>United Kingdom</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <select class="form-select" name="select-year">
                                                    <option>Select Year</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <select class="form-select" name="select-type">
                                                    <option>Select Type Of Car</option>
                                                    <option>New Car</option>
                                                    <option>Used Car</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <button class="btn w-100 button-theme-2 btn-md">
                                                    <i class="fa fa-search"></i>Find
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-slider-inner text-center">
            <div class="carousel-item banner-max-height active item-bg">
                <img class="d-block w-100 h-100" src="img/banner/img-5.jpg" alt="banner">
                <div class="carousel-content container banner-info-2 bi-2">
                    <div class="row bi5">
                        <div class="col-lg-7 text-start">
                            <div class="banner-content3">
                                <h3 class="mb-30">Buying or Selling Car?</h3>
                                <div class="price">
                                    <p>You are at the right place. Our platform offers a wide selection of vehicles from
                                        trusted dealers across the country, ensuring we match buyers with the perfect
                                        fit for their needs and budget. We also provide financing options to our clients
                                        to enable them acquire or sell their dream cars with ease. </p>
                                </div>
                                <div class="clearfix">
                                    {{-- <a href="{{ route('about') }}" class="btn-7">Read More</a> --}}
                                    <a href="#" class="btn-8">
                                        <span>Get Started as Buyer</span>
                                    </a>

                                    @auth
                                        @if (auth()->user()->role === 'dealer')
                                            <a href="{{ route('dealers.index') }}" class="btn-8">
                                                <span>Your dashboard</span>
                                            </a>
                                        @else
                                            <a href="#" class="btn-8">
                                                <span>Get Started as Seller</span>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('dealers.create') }}" class="btn-8">
                                            <span>Get Started as Seller</span>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-5">
                            <div class="search-box-4 sb-7 sb-8">
                                <form method="GET">
                                    <div class="form-group mb-3">
                                        <select class="form-control" name="select-brand">
                                            <option>Select Brand</option>
                                            <option>Audi</option>
                                            <option>BMW</option>
                                            <option>Honda</option>
                                            <option>Nissan</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <select class="form-control" name="select-make">
                                            <option>Select Make</option>
                                            <option>BMW</option>
                                            <option>Honda</option>
                                            <option>Lamborghini</option>
                                            <option>Sports Car</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <select class="form-control" name="select-location">
                                            <option>Select Location</option>
                                            <option>United States</option>
                                            <option>United Kingdom</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <select class="form-control" name="select-year">
                                            <option>Select Year</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <select class="form-control" name="select-type">
                                            <option>Select Type Of Car</option>
                                            <option>New Car</option>
                                            <option>Used Car</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn w-100 button-theme-2 btn-md">
                                            <i class="fa fa-search"></i>Find
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
