@extends('layouts.app')

@section('title')
    Vehicles @parent
@endsection

@section('header_styles')
@endsection

@section('main')
    <!-- Banner start -->
    <div class="banner" id="banner">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner banner-slider-inner">
                <div class="carousel-item active item-bg">
                    <img class="d-block w-100 h-100" src="img/banner/img-1.jpg" alt="banner">
                    <div class="carousel-content container banner-info-2 bi-2">
                        <div class="banner-content2">
                            <h2>Find Your Suitable Vehicle. </h2>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search box 3 start -->
            <div class="search-box-3 sb-5">
                <div class="container">
                    <div class="search-area-inner">
                        <div class="search-contents">
                            <form method="GET" action="{{ route('search') }}">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <select class="form-select form-select-lg border-rounded" name="type"
                                                id="filterVehicleType">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <select class="form-select form-select-lg border-rounded" name="make"
                                                id="filterMakesID">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <select class="form-select form-select-lg border-rounded" name="county"
                                                id="countiesID">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <select class="form-select form-select-lg border-rounded" name="year"
                                                id="filterYear">
                                                <option value="">Select Year</option>
                                                @for ($i = 2023; $i >= 1994; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <select class="form-select form-select-lg border-rounded" name="usage"
                                                id="usage">
                                                <option value="">Condition</option>
                                                <option value="New">New</option>
                                                <option value="Semi-new">Semi New</option>
                                                <option value="Locally Used">Locally used</option>
                                                <option value="Foreign Used">Foreign used</option>
                                                <option value="Damaged">Damaged</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <select class="form-select form-select-lg border-rounded" name="transmission"
                                                id="filterTransmission">
                                                <option value="">Transmission</option>
                                                <option value="Automatic">Automatic</option>
                                                <option value="Manual">Manual</option>
                                                <option value="Semi-Auto">Semi-Auto</option>
                                                <option value="Tiptronic">Tiptronic</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <div class="range-slider">
                                                <div data-min="0" data-max="30000000" data-unit="Kes"
                                                    data-min-name="min_price" data-max-name="max_price"
                                                    class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <button class="btn w-100 button-theme btn-md" type="submit">
                                                <i class="fa fa-search"></i>&nbsp;&nbsp;Find
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search box 3 end -->
        </div>
    </div>

    <!-- Featured car start -->
    <div class="featured-car content-area-18">
        <div class="container-fluid">
            <div class="row">
                @php
                    $vehicles = json_decode($vehicles);
                @endphp
                <div class="col-lg-12 col-md-12">
                    <!-- Option bar start -->
                    <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <div class="sorting-options2">
                                    <h5>Showing 1-20 of <span id="countResults">{{ count($vehicles->data) }}</span> Vehicles
                                    </h5>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-6 col-sm-12">
                                {{-- <div class="sorting-options float-end">
                                    <a href="car-list-rightside.html" class="change-view-btn float-right"><i
                                            class="fa fa-th-list"></i></a>
                                    <a href="{{ url('') }}" class="change-view-btn active-view-btn float-right"><i class="fa fa-th-large"></i></a>
                        </div> --}}
                                <div class="sorting-options-3 float-end">
                                    <select class="selectpicker search-fields" name="default-order">
                                        <option>Default Order</option>
                                        <option>Price High to Low</option>
                                        <option>Price: Low to High</option>
                                        <option>Newest Properties</option>
                                        <option>Oldest Properties</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="vehiclesection">
                        @foreach ($vehicles->data as $item)
                            @php
                                $images = json_decode($item->images);
                                // $tags = json_decode($item['tags']);
                            @endphp
                            <div class="col-lg-3 col-md-3">
                                <div class="car-box-3">
                                    <div class="car-thumbnail">
                                        <a href="#" class="car-img">
                                            <div class="for">{{ $item->usage }}</div>
                                            <div class="price-box">
                                                {{-- <span class="del"><del>$950.00</del></span> --}}
                                                {{-- <br> --}}
                                                <span>Kes: {{ number_format($item->price, 2) }}</span>
                                            </div>
                                            <img class="d-block w-100"
                                                src="{{ asset('/vehicleimages/' . @$images[0] . '') }}" alt="car">
                                        </a>
                                        <div class="carbox-overlap-wrapper">
                                            <div class="overlap-box">
                                                <div class="overlap-btns-area">
                                                    <a class="overlap-btn" data-bs-toggle="modal"
                                                        data-bs-target="#carOverviewModal" data-id="{{ $item->id }}"
                                                        id="vehicleDetailsModalToggle">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </a>
                                                    <a class="overlap-btn wishlist-btn">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    {{-- <a class="overlap-btn compare-btn">
                                                        <i class="fa fa-balance-scale"></i>
                                                    </a> --}}
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
                                                            <a href="{{ asset('/vehicleimages/' . $image . '') }}"
                                                                class="hidden"
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
                                                href="{{ url('/vehicle-details/' . $item->id) }}">{{ $item->model->model }}</a>
                                        </h1>
                                        <ul class="custom-list">
                                            <li>
                                                <a
                                                    href="{{ url('/vehicle-details/' . $item->id) }}">{{ $item->usage }}</a>
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
                    </div>
                    <!-- Page navigation start -->
                    <div class="pagination-box p-box-2 text-center">
                        <nav aria-label="Page navigation example">
                            {{-- <ul class="pagination" id="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                                </li>

                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul> --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@endsection
