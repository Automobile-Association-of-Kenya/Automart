@extends('layouts.app')

@section('title')
    Financing @parent
@endsection

@section('header_styles')
@endsection

@section('main')
    <div class="banner" id="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner banner-slider-inner text-center">
                <div class="carousel-item active item-bg">
                    <img class="d-block w-100" src="images/automart.jpg" alt="banner">
                    <div class="carousel-content container banner-info-2">
                        <div class="row">
                            <div class="col-lg-7 text-start">
                                <div class="p-3" style="background: rgb(175, 177, 175, 0.8);border-radius: 5px;">
                                    <h4 class="mb-30 text-white">Vehicle Financing</h4>
                                    <div class="price">
                                        <p></p>
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
    <div class="compare-info content-area-14">
        <div class="container">
            <div class="main-title">
                <h2>Reasons to FInance with our partners</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-info">
                        <button class="accordion">Competitive Interest Rates</button>
                        <div class="panel">
                            <div class="compare-table">
                                <p>Our financial partners offer highly competitive interest  rates, ensuring that you get the best deal possible on your car financing.</p>
                            </div>
                        </div>

                        <button class="accordion">Easy Application Process</button>
                        <div class="panel">
                            <div class="compare-table">
                                <p>Applying for financing through our platform is quick and straightforward. You can complete the application online, saving you time and effort.</p>
                            </div>
                        </div>

                        <button class="accordion">Flexible Repayment Terms</button>
                        <div class="panel">
                            <div class="compare-table">
                                <p>We offer flexible repayment terms, so you can choose a plan that suits your budget and lifestyle.</p>
                            </div>
                        </div>

                        <button class="accordion">Fast Approval</button>
                        <div class="panel">
                            <div class="compare-table">
                                <p>Say goodbye to long approval waiting times. Thanks to our efficient system, you&#39;ll receive fast approval for your car financing
                                                application.Fast Approval: Say goodbye to long approval waiting times.
                                                Thanks to our efficient
                                                system, you&#39;ll receive fast approval for your car financing
                                                application.</p>
                            </div>
                        </div>

                        <button class="accordion">No Hidden Charges</button>
                        <div class="panel">
                            <div class="compare-table">
                                <p>Transparency is crucial to us. Rest assured, there are no hidden fees or surprises with our financing product.</p>
                            </div>
                        </div>

                        <button class="accordion">Dedicated Support</button>
                        <div class="panel">
                            <div class="compare-table">
                                <p>Our customer support team is always ready to assist you throughout the financing process, ensuring a smooth and pleasant experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-car content-area-21 bg-white">
        <div class="container">

            <div class="row" id="latestCarsSection">

                @foreach ($vehicles as $item)
                    @php
                        $images = $item->images;
                        $image = @$images[0]?->image;
                        $vehicle_no = $item->vehicle_no ?? $item->id;
                    @endphp
                    <div class="col-lg-3 col-md-6">
                        <div class="car-box-3">
                            <div class="car-thumbnail">
                                <a href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}" class="car-img">
                                    <div class="for">{{ $item->usage }}</div>
                                    <div class="price-box">
                                        <span>Kes: {{ number_format($item->price, 2) }}</span>
                                    </div>
                                        <img class="d-block w-100" src="{{ asset('/vehicleimages/' . $image) }}"
                                            alt="{{ $item->make->make . ' ' . $item->model->model }}">

                                </a>
                                <div class="carbox-overlap-wrapper">
                                    <div class="overlap-box">
                                        <div class="overlap-btns-area">
                                            <a class="overlap-btn" data-bs-toggle="modal"
                                                data-bs-target="#vehicleDetailsModal" data-id="{{ $item->id }}"
                                                id="vehicleDetailsModalToggle">
                                                <i class="fa fa-eye-slash"></i>
                                            </a>
                                            <a class="overlap-btn wishlist-btn" data-id="{{ $item->id }}">
                                                <i class="fa fa-heart-o"></i>
                                            </a>

                                            <div class="car-magnify-gallery">
                                                <a href="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}"
                                                    class="overlap-btn"
                                                    data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                    <i class="fa fa-expand"></i>
                                                    <img class="hidden"
                                                        src="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}"
                                                        alt="{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}">
                                                </a>


                                                @if (is_array($images))
                                                    @foreach ($images as $image)
                                                    <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                            class="hidden"
                                                            data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                            <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                alt="{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="detail text-center">
                                <h1 class="title">
                                    <a class="text-success"
                                        href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}">{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}</a>
                                </h1>
                                <ul class="custom-list">
                                    <li>
                                        <a
                                            href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}">{{ $item->usage }}</a>
                                        &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <a href="">{{ $item->transmission }}</a> &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <a href="#">{{ $item->fuel_type }}</a>
                                    </li>
                                </ul>
                                <ul class="custom-list">

                                    <li>
                                        <i class="flaticon-way text-warning"></i> {{ $item->mileage ?? 0 }} km &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <i class="flaticon-gear text-warning"></i> {{ $item->enginecc }} cc
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <div class="buttons mb-2 text-center">
                                    <a href="#" class="btn btn-success btn-sm  mt-2" id="whatsappToggle"
                                        data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp; Enquire</a>
                                    <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i
                                            class="fa fa-hand"></i> Buy</a>
                                    <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i
                                            class="fa fa-"></i> Apply
                                        Loan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 text-center">
                    <a class="btn-9 btn bg-white" href="{{ route('new') }}">
                        <span></span><span></span><span></span><span></span><strong>View More</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partners')
@endsection

@section('footer_scripts')
@endsection
