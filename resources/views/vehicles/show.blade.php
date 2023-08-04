@extends('layouts.app')

@section('title')
    {{ $vehicle->make->make . ' ' . $vehicle->model->model }} @parent
@endsection

@section('header_styles')
    <style>
        #loansectiontoggle:hover {
            cursor: pointer;
        }

        .loansection {
            display: none;
        }

        input[type="range"] {
            width: 100%;
            height: 15px;
            background-color: #006544;
            color: #006544;
            border: none;
            outline: none;
            border-radius: 5px;
        }

        .rangeslider__fill {
            color: #006544;
        }
    </style>
@endsection

@section('main')
    @php
        $images = json_decode($vehicle->images);
        $vehicle_no = $vehicle->vehicle_no ?? $vehicle->id;
        $dealer = !is_null($vehicle->dealer) ? $vehicle->dealer : $vehicle->user;
        $location = $vehicle->location ?? $vehicle->yard?->address;
    @endphp
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('vehicles.list') }}">Vehicles</a></li>
                    <li class="active">{{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model.' Ref no '.$vehicle->vehicle_no }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Car details page start -->
    <div class="car-details-page mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">

                    <div class="slide car-details-section cds-2 mb-30">
                        <div class="heading-car clearfix">
                            <div class="pull-left">
                                <h3>{{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}</h3>
                                <a href="#">
                                    <i class="flaticon-user text-warning"></i> &nbsp;{{ $dealer->name }}
                                </a>
                                <hr>
                                <p>
                                    <i class="flaticon-pin"></i> &nbsp;; {{ $location }}
                                </p>
                            </div>
                            <div class="pull-right">
                                <div class="price-box-3"><span><b>Kes:</b></span>&nbsp;&nbsp;
                                    {{ number_format($vehicle->price, 2) }}<span></span></div>
                            </div>
                        </div>

                        <div class="product-slider-box cds-2 clearfix mb-30">
                            <div class="product-img-slide">
                                <div class="slider-for">
                                    {{-- <img src="{{ '/vehicleimages/' . $vehicle->cover_photo }}" class="img-fluid w-100"
                                        alt="slider-car"> --}}
                                    @foreach ($images as $image)
                                        <img src="{{ '/vehicleimages/' . $image->image }}" class="img-fluid w-100"
                                            alt="{{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}">
                                    @endforeach
                                </div>

                                <div class="slider-nav">
                                    {{-- <div class="thumb-slide"><img src="{{ '/vehicleimages/' . $vehicle->cover_photo }}"
                                            class="img-fluid" alt="small-car">
                                    </div> --}}
                                    @foreach ($images as $image)
                                        <div class="thumb-slide"><img src="{{ '/vehicleimages/' . $image->image }}"
                                                class="img-fluid"
                                                alt="{{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <p class="mt-2">{{ $vehicle->description }}</p>
                        </div>

                        <div class="mb-4 card p-3">
                            <div class="row">
                                <div class="col-md-3 mb-1">
                                    <button href="#" id="quoteRequestToggle" class="btn btn-warning btn-block"
                                        data-bs-toggle="modal" data-bs-target="#quoteModal" data-id="{{ $vehicle->id }}"
                                        data-no="{{ $vehicle->vehicle_no }}">Request a
                                        quote</button>
                                </div>

                                <div class="col-md-3 mt-1">
                                    <a href="{{ route('buy', $vehicle_no) }}" id="financeRequestToggle"
                                        class="btn btn-success btn-block">Buy</a>
                                </div>

                                <div class="col-md-3 mt-1">
                                    <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-success btn-block">Apply for
                                        Loan</a>
                                </div>

                                <div class="col-md-3 mt-1">
                                    <button href="#" id="tradeinRequestToggle" class="btn btn-success btn-block"
                                        data-bs-toggle="modal" data-bs-target="#tradeinModal" data-id="{{ $vehicle->id }}"
                                        data-no="{{ $vehicle->vehicle_no }}">Enquire trade in</button>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body loansection">
                                <form action="#" method="GET" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Price</label>
                                            <input type="text" class="form-control" name="principal" id="principalAmount"
                                                value="{{ $vehicle->price }}" required readonly>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Financier</label>
                                            <select name="partner_id" id="loanPartnerID" class="form-select">
                                                <option value="">Select One</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Loan Product</label>
                                            <select name="loan_product_id" id="loanproductID" class="form-select">
                                                <option value="">Select One</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Interest Rate (%)</label>
                                            <input type="text" class="form-control" name="interest" id="interestRate"
                                                readonly>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Period In Months</label>
                                            <input type="text" class="form-control" name="calcperiod" id="calcPeriod"
                                                readonly>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Down Payment</label>
                                            <input type="text" class="form-control" name="calcdepost" id="calcDepost"
                                                readonly>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="form-label">Installments</label>
                                            <input type="text" class="form-control" name="calcinstallment"
                                                id="calcInstallment" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="car-details-section">
                        <div class="tabbing tabbing-box mb-40">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h3 class="heading-2">Features</h3>
                                </div>
                                <div class="card-body">
                                    @foreach ($vehicle->features as $item)
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-check-circle text-success"></i> {{ $item->feature }}
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">
                                    <h3 class="heading-2">Specifications</h3>
                                </div>
                                <div class="card-body row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <ul class="amenities">
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Top Speed:
                                                {{ $vehicle->speed }}
                                            </li>

                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Fuel Type:
                                                {{ $vehicle->fuel_type }}
                                            </li><br>
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Mileage:
                                                {{ $vehicle->mileage }} KM
                                            </li>

                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Engine CC:
                                                {{ $vehicle->enginecc }}
                                            </li>

                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Gear:
                                                {{ $vehicle->gear }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <ul class="amenities">
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Drive Train:
                                                {{ $vehicle->terrain }}
                                            </li>
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Body Style:
                                                {{ @$vehicle->type->type }}
                                            </li>
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Year:
                                                {{ $vehicle->year }}
                                            </li>
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Fuel Type:
                                                {{ $vehicle->fuel_type }}
                                            </li>
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Interior:
                                                {{ $vehicle->interior }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <ul class="amenities">
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Horse Power:
                                                {{ $vehicle->horse_power }}
                                            </li>
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Location:
                                                {{ $vehicle->yard->address ?? $vehicle->location }}
                                            </li>
                                            <li>
                                                <i class="fa fa-check-circle text-success"></i>&nbsp;Exterior Color:
                                                {{ $vehicle->color }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">

                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <div class="widget advanced-search d-none-992">
                            <h3 class="sidebar-title">Vehicle details</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul>
                                <li>
                                    <span>Make </span>{{ $vehicle->make->make ?? '__'}}
                                </li>
                                <li>
                                    <span>Model</span> {{ $vehicle->model->model ?? '__'}}
                                </li>
                                <li>
                                    <span>Body Style</span> {{ @$vehicle->type->type ?? '__' }}
                                </li>
                                <li>
                                    <span>Year</span> {{ $vehicle->year ?? '__' }}
                                </li>
                                <li>
                                    <span>Condition</span>{{ $vehicle->usage ?? '__' }}
                                </li>

                                <li>
                                    <span>Mileage</span>{{ $vehicle->mileage }} Km
                                </li>
                                <li>
                                    <span>Interior</span>{{ $vehicle->interior ?? "___" }}
                                </li>
                                <li>
                                    <span>Transmission</span> {{ $vehicle->transmission ?? '__' }}
                                </li>
                                <li>
                                    <span>Engine CC</span> {{ $vehicle->enginecc ?? '__' }} cc
                                </li>
                                <li>
                                    <span>Engine</span> {{ $vehicle->engine ?? '__' }}
                                </li>
                                <li>
                                    <span>No. of Gears:</span> {{ $vehicle->gears ?? "__" }}
                                </li>
                                <li>
                                    <span>Location</span>
                                    {{ $vehicle->yard?->address ?? ($vehicle->location ?? '__') }}
                                </li>
                                <li>
                                    <span>Fuel Type</span>{{ $vehicle->fuel_type ?? '__' }}
                                </li>
                            </ul>
                        </div>

                        @php
                            $deposit = (40 / 100) * $vehicle->price;
                            $mindeposit = (10 / 100) * $vehicle->price;
                        @endphp

                        <div class="widget mt-4">
                            <h3 class="sidebar-title">Loan Calculator</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <div class="bg-success p-2 text-center" style="border-radius: 10px;">
                                <p class="mb-0 text-white">Estimated Monthly Payment</p>
                                <p class="text-white">Note: Monthly interest rate may differ as we partner with different
                                    finance institutions.</p>
                            </div>

                            <div class="text-center">
                                <h4 class="text">Ksh.&nbsp; <span id="installmentAmount"></span>&nbsp;/Monthly</h4>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="vehicleLoanPrice" value="{{ $vehicle->price }}">
                                <label for="">Down Payment</label> <span class="float-right text-success"
                                    id="downPayment">{{ number_format($mindeposit, 2) }}</span>
                                <div class="range-slider">
                                    <input type="range" min="{{ $mindeposit }}" max="{{ $deposit }}"
                                        step="100" value="{{ $mindeposit }}" data-orientation="horizontal"
                                        id="downPaymentSlider" class="text-warning">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Interest Rate</label> <span class="float-right text-success"
                                    id="interestRateText">10 %</span>
                                <div class="range-slider">
                                    <input type="range" min="0" max="34" step="1" value="10"
                                        data-orientation="horizontal" id="interestRateSlider" class="text-warning">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Tenure</label> <span class="float-right text-success"
                                    id="tenureYears">12</span>&nbsp;Months
                                <div class="range-slider">
                                    <input type="range" min="0" max="36" step="1" value="12"
                                        data-orientation="horizontal" id="tenureSlider" class="text-warning">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($dealervehicles) > 0)
        <div class="featured-car">
            <div class="container">
                <h4 class="text-success">Other Vehicles From the Same Dealer</h4>
                <div class="featured-slider row slide-box-btn slider"
                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>

                    @foreach ($dealervehicles as $item)
                        @php
                            $images = $item->images;
                            $vehicle_no = $item->vehicle_no ?? $item->id;
                            $location = $item->yard !== null ? $item->yard->address : $item->location;
                        @endphp
                        <div class="col-lg-3 slide slide-box">
                            <div class="car-box-3">

                                <div class="car-thumbnail">
                                    <a href="{{ url('/vehicle/' . $vehicle_no) }}" class="car-img">
                                        <div class="for">{{ $item->usage }}</div>
                                        <div class="price-box">
                                            <span>Kes: {{ number_format($item->price, 2) }}</span>
                                        </div>
                                        <img class="d-block w-100"
                                            src="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}"
                                            alt="car">
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
                                                            alt="hidden-img">
                                                    </a>

                                                    @if (is_array($images))
                                                        @foreach ($images as $image)
                                                            <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                class="hidden"
                                                                data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                                <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                    alt="hidden-img">
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
                                        <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i
                                                class="fa fa-hand"></i> Buy</a>
                                        <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i
                                                class="fa fa-"></i>
                                            Apply
                                            Loan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if (count($relatedvehicles))
        <div class="featured-car">
            <div class="container">
                <h4 class="text-success">Other Vehicles You May Like</h4>
                <div class="featured-slider row slide-box-btn slider"
                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>

                    @foreach ($relatedvehicles as $item)
                        @php
                            $images = $item->images;
                            $vehicle_no = $item->vehicle_no ?? $item->id;
                            $location = $item->yard !== null ? $item->yard->address : $item->location;
                        @endphp
                        <div class="col-lg-3 slide slide-box">
                            <div class="car-box-3">

                                <div class="car-thumbnail">
                                    <a href="{{ url('/vehicle/' . $vehicle_no) }}" class="car-img">
                                        <div class="for">{{ $item->usage }}</div>
                                        <div class="price-box">
                                            <span>Kes: {{ number_format($item->price, 2) }}</span>
                                        </div>
                                        <img class="d-block w-100"
                                            src="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}"
                                            alt="car">
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
                                                            alt="hidden-img">
                                                    </a>

                                                    @if (is_array($images))
                                                        @foreach ($images as $image)
                                                            <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                class="hidden"
                                                                data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                                <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                    alt="hidden-img">
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
                                        <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i
                                                class="fa fa-hand"></i> Buy</a>
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
            </div>
        </div>
    @endif

    <div class="modal fade" id="quoteModal" tabindex="-1" role="dialog" aria-labelledby="quoteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content" id="vehiclePreviewSection">
                <div class="modal-header">
                    <div class="modal-title" id="carOverviewModalLabel">
                        <h4 class="text-black">Ask for Quote on {{ $vehicle->make->make . ' ' . $vehicle->model->model }}
                        </h4>
                        <p>Leave us your details on the form below and we will get back to you.</p>
                    </div>
                    <button type="button" class="close btn btn-warning text-danger" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('quotes.store') }}" method="POST" enctype="multipart/form-data"
                        id="quotationForm">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="vehicle_id" id="vehicleID" value="{{ $vehicle->id }}">

                            @if (auth()->user() && auth()->user()->role === 'buyer')
                            @else
                                <div class="col-md-12 form-group mb-2">
                                    <label for="name">Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="quoteName"
                                            placeholder="Name" aria-label="Full Name">
                                    </div>
                                </div>

                                <div class="col-md-12 form-group mb-2">
                                    <label for="email">Email</label>

                                    <div class="form-group email">
                                        <input type="email" class="form-control" name="email" id="quoteEmail"
                                            placeholder="Email" aria-label="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-12 form-group mb-2">
                                    <label for="phone">Phone</label>
                                    <div class="form-group number">
                                        <input type="text" class="form-control" name="phone" id="quotePhone"
                                            placeholder="Phone" aria-label="Phone Number">
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12 form-group mb-2">
                                <label for="subject">Subject</label>
                                <div class="form-group subject">
                                    <input type="text" class="form-control" name="subject" id="quoteSubject"
                                        placeholder="Subject" aria-label="Subject"
                                        value="Quotation on {{ $vehicle->make->make . ' ' . $vehicle->model->model }}"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-12 form-group mb-2">
                                <label for="message">Message</label>

                                <div class="form-group message">
                                    <textarea class="form-control" name="message" id="quoteMessage" placeholder="Write message"
                                        aria-label="Write message" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-12" id="quoteFeedbackDiv">
                                <div id="quotefeeback"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-md btn-warning" id="quoteSubmitDetails">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="financeModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content" id="vehiclePreviewSection">
                <div class="modal-header">
                    <div class="modal-title" id="carOverviewModalLabel">
                        <h4 class="text-black">Ask for financing for
                            {{ $vehicle->make->make . ' ' . $vehicle->model->model }}</h4>
                        <p>Leave us your details on the form below and we will get back to you.</p>
                    </div>
                    <button type="button" class="close btn btn-warning text-danger" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('finances.store') }}" method="POST" enctype="multipart/form-data"
                        id="financialForm">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="vehicle_id" id="vehicleFinanceID" value="{{ $vehicle->id }}">

                            @if (auth()->user() && auth()->user()->role === 'buyer')
                            @else
                                <div class="col-md-12 form-group mb-2">
                                    <label for="name">Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="financeName"
                                            placeholder="Name" aria-label="Full Name" required>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group mb-2">
                                    <label for="email">Email</label>

                                    <div class="form-group email">
                                        <input type="email" class="form-control" name="email" id="financeEmail"
                                            placeholder="Email" aria-label="Email Address">
                                    </div>
                                </div>

                                <div class="col-md-12 form-group mb-2">
                                    <label for="phone">Phone</label>
                                    <div class="form-group number">
                                        <input type="text" class="form-control" name="phone" id="financePhone"
                                            placeholder="Phone" aria-label="Phone Number" required>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12 form-group mb-2">
                                <label for="subject">Financial Provider</label>
                                <div class="form-group subject">
                                    <select name="partner_id" id="partnerID" class="form-select" required>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group mb-2">
                                <label for="subject">Subject</label>
                                <div class="form-group subject">
                                    <input type="text" class="form-control" name="subject" id="financeSubject"
                                        placeholder="Subject" aria-label="Subject" value="Financial support" required>
                                </div>
                            </div>

                            <div class="col-md-12 form-group mb-2">
                                <label for="amount">Facilitation Amount</label>

                                <div class="form-group message">
                                    <input type="text" class="form-control" id="financeAmount" name="amount"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="financefeeback"></div>
                            </div>

                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-md btn-warning">Submi</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="tradeinModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" id="vehiclePreviewSection">
                <div class="modal-header">
                    <div class="modal-title" id="carOverviewModalLabel">
                        <h4 class="text-black">Ask for trade in option with your current vehicle </h4>
                        <p>Leave us your details on the form below and we will get back to you.</p>
                    </div>
                    <button type="button" class="close btn btn-warning text-danger" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('tradein.store') }}" method="POST" enctype="multipart/form-data"
                        id="tradeinForm">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="vehicle_id" id="vehicletradeinID" value="{{ $vehicle->id }}">

                            @if (auth()->user() && auth()->user()->role === 'buyer')
                            @else
                                <div class="col-md-6 form-group mb-2">
                                    <label for="name">Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="tradeinName"
                                            placeholder="Name" aria-label="Full Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-2">
                                    <label for="email">Email</label>

                                    <div class="form-group email">
                                        <input type="email" class="form-control" name="email" id="tradeinEmail"
                                            placeholder="Email" aria-label="Email Address">
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-2">
                                    <label for="phone">Phone</label>
                                    <div class="form-group number">
                                        <input type="text" class="form-control" name="phone" id="tradeinPhone"
                                            placeholder="Phone" aria-label="Phone Number" required>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6 form-group mb-2">
                                <label for="make_id">Your vehicle make</label>
                                <div class="form-group subject">
                                    <select name="make_id" id="makeID" class="form-select" required>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-2">
                                <label for="vehicle_model_id">Your vehicle model</label>
                                <div class="form-group subject">
                                    <select name="vehicle_model_id" id="vehicleModelID" class="form-select"
                                        required></select>
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-2">
                                <label for="reg_no">Your vehicle number plate</label>
                                <div class="form-group subject">
                                    <input type="text" name="reg_no" id="regNO" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-2">
                                <label for="year">Year of manufacture</label>

                                <div class="form-group message">
                                    <select name="year" id="tradeinYear" class="form-select" required>
                                        <option value="">Select One</option>
                                        @for ($i = 2023; $i > 1990; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="tradeinfeeback"></div>
                            </div>

                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-md btn-warning" id="tradeinSubmitDetails">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('footer_scripts')
    <script src="{{ asset('js/main/show.js') }}"></script>
    <script src="{{ asset('js/main/loan.js') }}"></script>
@endsection
