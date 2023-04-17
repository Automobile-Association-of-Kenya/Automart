@extends('layouts.app')
@section('title')
    Home @parent
@endsection

@section('content')
    @php
        function formatNumber($number)
        {
            if (strlen($number) <= 10) {
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
                                <a href="{{ route('register') }}" class="btn-8">
                                    <span>Get Started as Buyer</span>
                                </a>

                                <a href="{{ route('seller.create') }}" class="btn-8">
                                    <span>Get Started as Seller</span>
                                </a>

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
                        <div class="row row-3">
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="select-brand">
                                    <option> Select Make</option>
                                    @foreach ($makes as $item)
                                        <option value="{{ $item->car_make_id }}">{{ $item->car_make_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="selectModel">
                                    <option>Select Model</option>
                                </select>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="select-location">
                                    <option>Select Location</option>
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="select-year">
                                    <option>Select Year</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2021</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="select-type">
                                    <option>Select Type Of Car</option>
                                    <option>New Car</option>
                                    <option>Used Car</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <button class="btn white-btn btn-search w-100" style="background-color: #00472F;">
                                    <i class="fa fa-search text-white"></i><strong>Find</strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-car content-area">
        <div class="container">
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
                                    @if (count($images) > 0)
                                        <img src="{{ asset('images/' . $images[0]) }}" width="100%"
                                            height="280px">
                                    @else
                                        <img src="#" alt="car-photo" width="100%" height="250px">
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

                                <div class="location ratings" style="margin-left: -5%">
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star text-success"></i>
                                    <i class="fa fa-star-o text-success"></i>
                                </div>
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

                            <div class="footer clearfix"
                                style="text-align: center; width:100%; height=30%; background:rgb(190, 186, 186)">
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

@endsection