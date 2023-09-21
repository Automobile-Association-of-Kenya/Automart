@extends('layouts.app')

@section('title')
    Vehicles @parent
@endsection

@section('header_styles')
@endsection

@section('main')
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">All</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="banner" id="banner">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Search box 3 start -->
            <div class="search-box-3">
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
                                            <select class="form-select form-select-lg border-rounded" name="model"
                                                id="vehicleModelID">
                                                <option value=""></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="form-group">
                                            <select class="form-select form-select-lg border-rounded" name="year"
                                                id="filterYear">
                                                <option value="">Select Year</option>
                                                @for ($i = 2023; $i >= 1990; $i--)
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
                                            <input type="hidden" name="start_price" id="rangeSliderStartPrice"
                                                value="0">
                                            <input type="hidden" name="end_price" id="rangeSliderEndPrice"
                                                value="30000000">
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
        <div class="container">
            <div class="row">
                {{-- @php
                    $vehicles = json_decode($vehicles);
                @endphp --}}
                <div class="col-lg-12 col-md-12">


                    <div class="row" id="vehiclesection">

                        @foreach ($vehicles as $item)
                            @php
                                $images = $item->images;
                                $vehicle_no = $item->vehicle_no ?? $item->id;
                            @endphp
                            <div class="col-lg-3 col-md-6">
                                <div class="car-box-3">

                                    <div class="car-thumbnail">
                                        <a href="{{ url('/vehicle/' . $vehicle_no) }}" class="car-img">
                                            <div class="for">{{ $item->usage }}</div>
                                            <div class="price-box">

                                                <span>Kes: {{ number_format($item->price, 2) }}</span>
                                            </div>
                                            <img class="d-block w-100"
                                                src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}" alt="car">
                                        </a>
                                        <div class="carbox-overlap-wrapper">
                                            <div class="overlap-box">
                                                <div class="overlap-btns-area">
                                                    <a class="overlap-btn" data-bs-toggle="modal"
                                                        data-bs-target="#vehicleDetailsModal"
                                                        data-id="{{ $item->id }}" id="vehicleDetailsModalToggle">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </a>
                                                    <a class="overlap-btn wishlist-btn" data-id="{{ $item->id }}">
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
                                                            <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                class="hidden"
                                                                data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                                <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                    alt="hidden-img">
                                                            </a>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="detail text-center">
                                        <h1 class="title">
                                            <a class="text-success"
                                                href="{{ url('/vehicle/' . $vehicle_no) }}">{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}</a>
                                        </h1>
                                        <ul class="custom-list">
                                            <li>
                                                <a href="{{ url('/vehicle/' . $vehicle_no) }}">{{ $item->usage }}</a>
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
                                                <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km &nbsp;|&nbsp;
                                            </li>
                                            <li>
                                                <i class="flaticon-gear"></i> {{ $item->enginecc }} cc
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="footer">
                                        <div class="buttons mb-2 text-center">
                                            <a href="#" class="btn btn-success btn-sm mt-2" id="whatsappToggle"
                                                data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp;
                                                Enquire</a>
                                            <a href="{{ route('buy', $vehicle_no) }}"
                                                class="btn btn-success btn-sm mt-2"><i class="fa fa-hand"></i> Buy</a>
                                            <a href="{{ route('loan', $vehicle_no) }}"
                                                class="btn btn-success btn-sm mt-2"><i class="fa fa-"></i>
                                                Apply
                                                Loan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pagination-box p-box-2 text-center">
                        <nav>
                            <ul class="pagination" id="pagination">
                                {!! $vehicles->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
@endsection
