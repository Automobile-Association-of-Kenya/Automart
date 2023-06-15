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
    <div class="featured-car content-area-21 bg-white">
        <div class="container">
            <div class="main-title">
                <h1>Latest Vehicles</h1>
                <p>On this platform, you can get newly manufactured, imported cars and refurbished vehicles at affordable
                    prices. </p>
            </div>
            <div class="row bg-grey pt-4 pb-2" id="latestCarsSection">
                <div class="text-center">
                    <div class="lds-roller">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-car content-area-21 bg-white">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Vehicles on Offer</h1>
                <p>Get the best cars in the market at discounted prices. </p>
            </div>
            <div class="row bg-grey pt-4 pb-2" id="vehiclesonoffer">
                @foreach ($discounts as $item)
                    @php
                        $images = json_decode($item['images']);
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="car-box-3">

                            <div class="car-thumbnail">
                                <a href="{{ url('/vehicle-details/' . $item->id) }}" class="car-img">
                                    <div class="for">{{ $item->usage }}</div>
                                    <div class="price-box">
                                        <span class="del"><del>{{ number_format($item->initial_price, 2) }}</del></span>
                                        <br>
                                        <span>Kes: {{ number_format($item->current_price, 2) }}</span>
                                    </div>
                                    <img class="d-block w-100" src="{{ asset('/vehicleimages/' . @$images[0] . '') }}"
                                        alt="car">
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
                                                <a href="{{ asset('/vehicleimages/' . @$images[0] . '') }}"
                                                    class="overlap-btn"
                                                    data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                    <i class="fa fa-expand"></i>
                                                    <img class="hidden"
                                                        src="{{ asset('/vehicleimages/' . @$images[0] . '') }}"
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
                                    <a
                                        href="{{ url('/vehicle-details/' . $item->id) }}">{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}</a>
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
                                        <a href="#">{{ $item->fuel_type }}</a>
                                    </li>
                                </ul>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km
                                    </li>
                                    <li>
                                        <i class="flaticon-gear"></i> {{ $item->enginecc }} cc
                                    </li>
                                </ul>
                            </div>

                            <div class="footer">
                                <div class="d-flex justify-space-between mb-2 mt-2">
                                    <div class="col-md-3 text-center">
                                        <a href="#" class="btn btn-success btn-sm" id="whatsappToggle"><i
                                                class="fa fa-whatsapp fa-2x"></i></a>
                                    </div>

                                    <div class="col-md-3 text-center">
                                        <a href="{{ url('/buy/'.$item->vehicle_no ?? $item->id) }}"
                                            class="btn btn-warning btn-block" style="color: #fff;"><i
                                                class="fa fa-hand-heart"></i> Buy</a>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <a href="{{ url('/loan/'.$item->vehicle_no ?? $item->id) }}"
                                            class="btn btn-success btn-block" style="color: #fff;"><i
                                                class="fa fa-hand-heart"></i> Apply Loan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 text-center">
                    <a class="btn-9 btn bg-white" href="{{ route('vehicles.discounted') }}">
                        <span></span><span></span><span></span><span></span><strong>View More</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="service-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center">
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
                        <div class="text-center">
                            <div class="lds-roller">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="partners">
        <div class="container">
            <div class="main-title">
                <h1>Top Brands</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="custom-slider slide-box-btn" id="brands-section">
                        <div class="text-center">
                            <div class="lds-roller">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
<script src="{{ asset('js/welcome.js') }}"></script>
@endsection
