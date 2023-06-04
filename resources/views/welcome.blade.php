@extends('layouts.app')

@section('title')
    Home @parent
@endsection

@section('main')
    <div class="banner" id="banner">
        @include('layouts.banner')
    </div>
    <!-- Banner end -->

    <!-- Search box 2 start -->
    {{-- <div class="search-box-2"> --}}
    @include('layouts.search')
    {{-- </div> --}}
    <!-- Featured car start -->
    <div class="featured-car content-area-21">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Latest Vehicles</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
            </div>
            <div class="row" id="latestCarsSection">
            </div>
        </div>
    </div>

    <!-- Featured car end -->
    <div class="featured-car content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Vehicles on Offer</h1>
                <p>Get the best cars in the market at discounted prices. </p>
            </div>
            <div class="featured-slider row slide-box-btn slider"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach ($discounts as $item)
                    @php
                        $images = json_decode($item['images']);
                        $tags = json_decode($item['tags']);
                    @endphp
                    <div class="col-lg-4 col-md-4">
                        <div class="car-box-3">
                            <div class="car-thumbnail">
                                <a href="#" class="car-img">
                                    <div class="for">{{ $tags[0] }}</div>
                                    <div class="price-box">
                                        <span class="del"><del>{{ number_format($item->initial_price, 2) }}</del></span>
                                        <br>
                                        <span>Kes: {{ number_format($item->current_price, 2) }}</span>
                                    </div>
                                    <img class="d-block w-100"
                                        src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}" alt="car">
                                </a>
                                <div class="carbox-overlap-wrapper">
                                    <div class="overlap-box">
                                        <div class="overlap-btns-area">
                                            <a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal"
                                                data-id="{{ $item->id }}" id="vehicleDetailsModalToggle">
                                                <i class="fa fa-eye-slash"></i>
                                            </a>
                                            <a class="overlap-btn wishlist-btn">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                            
                                            <div class="car-magnify-gallery">
                                                <a href="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                    class="overlap-btn"
                                                    data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                    <i class="fa fa-expand"></i>
                                                    <img class="hidden"
                                                        src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                        alt="hidden-img">
                                                </a>
                                                @foreach ($images as $image)
                                                    <a href="{{ asset('/vehicleimages/' . $image . '') }}" class="hidden"
                                                        data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                        <img src="{{ asset('/vehicleimages/' . $image . '') }}"
                                                            alt="hidden-img">
                                                    </a>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @foreach ($images as $image)
                            @endforeach

                            <div class="detail">
                                <h1 class="title">
                                    <a href="{{ url('/vehicle-details/'.$item->id) }}">{{ $item->model->model }}</a>
                                </h1>
                                <ul class="custom-list">
                                    <li>
                                        <a href="{{ route('vehicles.show', $item->id) }}">{{ $item->usage }}</a>
                                        &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <a href="">{{ $item->transmission }}</a> &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <a href="#">{{ $item->type?->type }}</a>
                                    </li>
                                </ul>

                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-fuel"></i> {{ $item->fuel_type }}
                                    </li>
                                    <li>
                                        <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km
                                    </li>
                                    <li>
                                        <i class="flaticon-gear"></i> {{ $item->color }}
                                    </li>
                                    <li>
                                        <i class="flaticon-calendar-1"></i> {{ $item->year }}
                                    </li>
                                </ul>

                            </div>

                        </div>
                    </div>
                @endforeach
                {{-- @foreach ($discounts as $item)
                    <div class="slide slide-box">
                        <div class="car-box">
                            <div class="car-image">
                                <img class="d-block w-100" src="{{ asset('vehicleimages/' . $item->cover_photo) }}"
                                    alt="car-photo">
                                <div class="tag">{{ $item->usage }}</div>
                                <div class="facilities-list clearfix">
                                    <ul>
                                        <li>
                                            <i class="flaticon-way"></i> {{ $item->mileage }} km
                                        </li>
                                        <li>
                                            <i class="flaticon-calendar-1"></i> {{ $item->year }}
                                        </li>
                                        <li>
                                            <i class="flaticon-manual-transmission"></i> {{ $item->transmission }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a
                                        href="vehicle-details/{{ $item->id }}">{{ $item->make->make . ' ' . $item->model->model }}</a>
                                </h1>
                                <div class="location">
                                    <a href="vehicle-details/{{ $item->id }}">
                                        <i class="flaticon-pin"></i>{{ $item->location ?? $item->yard?->address }}
                                    </a>
                                </div>
                            </div>
                            <div class="footer">
                                <div class="pull-right">
                                    <p class="price"><span>Kes: </span>{{ number_format(floatval($item->price), 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            </div>

            <div class="col-lg-12 text-center"><a class="btn-9 btn" href="{{ route('vehicles.discounted') }}">&nbsp;Learn
                    More</a></div>

        </div>
    </div>
    <!-- Service section start -->

    <div class="service-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center">
                    <!-- Main title -->
                    <div class="main-title">
                        <h1>Our Services</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                        <a class="btn-3 btn-defaults none-btn-992" href="{{ url('services') }}">
                            Read More <i class="arrow"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="row" id="servicesSection">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partners strat -->
    <div class="partners">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="custom-slider slide-box-btn">
                        <div class="custom-box"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                        <div class="custom-box"><img src="img/brand/brand-2.png" alt="brand" class="img-fluid"></div>
                        <div class="custom-box"><img src="img/brand/brand-3.png" alt="brand" class="img-fluid"></div>
                        <div class="custom-box"><img src="img/brand/brand-4.png" alt="brand" class="img-fluid"></div>
                        <div class="custom-box"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                        <div class="custom-box"><img src="img/brand/brand-2.png" alt="brand" class="img-fluid"></div>
                        <div class="custom-box"><img src="img/brand/brand-3.png" alt="brand" class="img-fluid"></div>
                        <div class="custom-box"><img src="img/brand/brand-4.png" alt="brand" class="img-fluid"></div>
                        <div class="custom-box"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
