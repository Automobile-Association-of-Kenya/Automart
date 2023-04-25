@extends('layouts.app')

@section('title')
    Home @parent
@endsection

@section('content')
    @php
        function formatNumber($number)
        {
            if (!is_null($number) && strlen($number) <= 10) {
                return '+254' . intval($number);
            } else {
                return $number;
            }
        }
    @endphp
    <!-- Banner start -->
    <div class="banner" id="banner">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row"
                        style="background:url({{ url('assets/img/banner/img-6.jpg') }}); background-size:cover;padding-top: 180px; min-height:90vh">
                        <div class="container">
                            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                                <div class="typing">
                                    <h2 class="text-white"><b>Buying or Selling cars?</b></h2>
                                </div>
                                <p class="text text-white">You are at the right place. We provide sellers with a
                                    plartform to advertise vehicles, buyers to get their dream vehicles and financial
                                    instution to provide financing to buyers who cannot meet the price of vehicles they
                                    would like to purchase. </p>
                                <a href="{{ route('all_cars') }}" class="btn-8">
                                    <span>Get Started as Buyer</span>
                                </a>

                                @auth
                                    @if (auth()->user()->role === 'dealer')

                                    <a href="{{ route('dealer.home') }}" class="btn-8">
                                        <span>Your dashboard</span>
                                    </a>

                                @else

                                    <a href="{{ route('seller.create') }}" class="btn-8">
                                        <span>Get Started as Seller</span>
                                    </a>

                                @endif
                                @else
                                <a href="{{ route('seller.create') }}" class="btn-8">
                                        <span>Get Started as Seller</span>
                                    </a>
                                @endauth

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Search box 2 start -->

    <div class="search-box-2 bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inline-search-area">

                        <form action="{{ route('vehicle.search') }}" method="post" id="vehicleSearchForm">
                            <div class="row row-3">
                                @csrf
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="searchmake" id="searchMake">
                                        <option> Select Make</option>
                                        @foreach ($makes as $item)
                                            <option value="{{ $item->car_make_id }}">{{ $item->car_make_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="selectmodel" id="selectModel">

                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="searchyear" id="searchYear">
                                        <option value="">Select Year</option>
                                        @for ($i = date('Y', strtotime(now())); $i <= 2003; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="searchtype" id="searchType">
                                        <option value="">Vehicle Type</option>
                                        <option value="Convertibles">Convertibles</option>
                                        <option value="Hatchbacks">Hatchbacks</option>
                                        <option value="SUVs">SUVs</option>
                                        <option value="Saloon Car">Saloon Car</option>
                                        <option value="Station Wagons">Station Wagons</option>
                                        <option value="Pickup Trucks">Pickup Trucks</option>
                                        <option value="Buses">Buses</option>
                                        <option value="Taxis">Taxis</option>
                                        <option value="Vans">Vans</option>
                                        <option value="Motorbikes">Motorbikes</option>
                                        <option value="Trucks">Trucks</option>
                                        <option value="Machinery">Machinery</option>
                                        <option value="Tractors">Tractors</option>
                                        <option value="Trailers">Trailers</option>
                                        <option value="Minis">Minis</option>
                                        <option value="Coupes">Coupes</option>
                                        <option value="Quad Bikes">Quad Bikes</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="searchprice" id="searchPrice">
                                        <option value="">Select Price</option>
                                        <option value="100000">From Ksh. 100000</option>
                                        <option value="500000">From Ksh. 500000</option>
                                        <option value="1000000">From Ksh. 1000000</option>
                                        <option value="1500000">From Ksh. 1500000</option>
                                        <option value="2000000">From Ksh. 2000000</option>
                                        <option value="2500000">From Ksh. 200000</option>
                                        <option value="3000000">From Ksh. 3000000</option>
                                        <option value="3500000">From Ksh. 3500000 and Above</option>
                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <button type="submit" class="btn white-btn btn-search w-100"
                                        style="background-color: #00472F;" id="searchSubmit">
                                        <i class="fa fa-search text-white"></i><strong>Find</strong>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="searchArea"></div>

    <div class="featured-car content-area">
        <div class="container">
            <div class="section-header d-flex">
                <h3>Newly Added</h3>
            </div>
            <div class="featured-slider row slide-box-btn slider"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach ($vehicles as $item)
                    @php
                        $images = json_decode($item->images, true);
                    @endphp
                    <div class="slide slide-box">
                        <div class="car-box bg-white">
                            <a href="{{ route('details', $item->id) }}">
                                <div class="car-image">
                                    <div class="price-box">
                                        <span>Ksh: {{ number_format($item->price, 2) }}</span>
                                    </div>
                                    @if (count($images) > 0)
                                        <img class="d-block w-100" src="{{ asset('images/' . $item->cover_photo) }}">
                                    @else
                                        <img class="d-block w-100" src="#" alt="car-photo">
                                    @endif
                                    <div class="tag">{{ $item->title }}</div>
                                    @if ($item->approved)
                                        <div class="tag bg-warning">
                                            <h4 class="text-white">AA Approved</h4>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div class="detail">
                                <div class="location">
                                    <a href="{{ route('details', $item->id) }}">
                                        <i class="fa-solid fa-engine"></i>Model:
                                        {{ $item->carmodel->car_model_name ?? '' }}
                                    </a>
                                </div>

                                <div class="location">
                                    <a href="#">
                                        <i class="fa fa-eye text-warning"></i>
                                        {{ $item->views ?? 0 }} Views
                                    </a>
                                </div>
                                <div class="location">
                                    <a href="{{ route('details', $item->id) }}">
                                        <i class="fa-solid fa-engine"></i>Make:
                                        {{ $item->carmake->car_make_name ?? '' }}
                                    </a>
                                </div>
                                <div class="location">
                                    <a href="{{ route('details', $item->id) }}">
                                        <i class="fa-solid fa-engine"></i>Fuel: {{ $item->fuel_type }}
                                    </a>
                                </div>
                            </div>

                            <div class="footer clearfix bg-grey">
                                <div class="w-100 ratings">
                                    <i class="fa fa-phone text-success"></i> Call or Chat with the owner <i
                                        class="fa fa-envelope text-success"></i>
                                    <a href="https://wa.me/{{ formatNumber($item->phone) }}"
                                        style="color: #00472F; margin-left:5px">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="featured-car content-area">
        <div class="container">
            <div class="section-header d-flex">
                <h3> Most Viewed</h3>
            </div>
            <div class="row" id="trendingCarsSection">

            </div>
        </div>

    </div>

@section('footer_scripts')
@endsection
@endsection
