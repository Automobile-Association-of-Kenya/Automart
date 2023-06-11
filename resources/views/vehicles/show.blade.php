@extends('layouts.app')

@section('title')
    {{ $vehicle->make->make . ' ' . $vehicle->model->model }} @parent
@endsection

@section('header_styles')
@endsection

@section('main')
    @php
        $images = json_decode($vehicle->images);
    @endphp
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ $vehicle->model->model }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ $vehicle->make->make }}</li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Car details page start -->
    <div class="car-details-page content-area-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12">

                    <div class="slide car-details-section cds-2 mb-30">

                        <div class="heading-car clearfix">
                            <div class="pull-left">
                                <h3>{{ $vehicle->make->make . ' ' . $vehicle->model->model }}</h3>
                                <p>
                                    <i class="flaticon-pin"></i>{{ $vehicle->location ?? $vehicle->yard?->address }}
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
                                        <img src="{{ '/vehicleimages/' . $image }}" class="img-fluid w-100"
                                            alt="slider-car">
                                    @endforeach
                                </div>
                                <div class="slider-nav">
                                    {{-- <div class="thumb-slide"><img src="{{ '/vehicleimages/' . $vehicle->cover_photo }}"
                                            class="img-fluid" alt="small-car">
                                    </div> --}}
                                    @foreach ($images as $image)
                                        <div class="thumb-slide"><img src="{{ '/vehicleimages/' . $image }}"
                                                class="img-fluid" alt="small-car">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-1">
                                <button href="#" id="quoteRequestToggle" class="btn btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#quoteModal" data-id="{{ $vehicle->id }}"
                                    data-no="{{ $vehicle->vehicle_no }}">Request for a
                                    quote</button>
                            </div>

                            <div class="col-md-4 mt-1">
                                <button href="#" id="financeRequestToggle" class="btn btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#financeModal" data-id="{{ $vehicle->id }}"
                                    data-no="{{ $vehicle->vehicle_no }}">Request for a
                                    Finance</button>
                            </div>

                            <div class="col-md-4 mt-1">
                                <button href="#" id="tradeinRequestToggle" class="btn btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#tradeinModal" data-id="{{ $vehicle->id }}"
                                    data-no="{{ $vehicle->vehicle_no }}">Enquire trade in</button>
                            </div>
                        </div>

                    </div>


                    <div class="car-details-section">
                        <div class="tabbing tabbing-box mb-40">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Description</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                        type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Features</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                        type="button" role="tab" aria-controls="contact" aria-selected="false">Related
                                        Vehicles</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab-4" data-bs-toggle="tab"
                                        data-bs-target="#contact-4" type="button" role="tab"
                                        aria-controls="contact-4" aria-selected="false">Specifications</button>
                                </li>

                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab-5" data-bs-toggle="tab"
                                        data-bs-target="#contact-5" type="button" role="tab" aria-controls="contact-5"
                                        aria-selected="false">Location</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab-6" data-bs-toggle="tab"
                                        data-bs-target="#contact-6" type="button" role="tab" aria-controls="contact-6"
                                        aria-selected="false">Video</button>
                                </li> --}}
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <div class="car-description mb-50">
                                                <h3 class="heading-2">
                                                    Description
                                                </h3>
                                                <p>{{ $vehicle->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                                        <div class="accordion-item">
                                            <div class="features-info mb-50">
                                                <h3 class="heading-2">Features</h3>
                                                <div class="row">
                                                    @for ($i = 0; $i < count($vehicle->features) / 5; $i++)
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                            <ul>
                                                                <li>
                                                                    {{ $vehicle->features[$i]->feature }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="accordion accordion-flush" id="accordionFlushExample3">
                                        <div class="accordion-item">
                                            <div class="related-car mb-40">

                                                <h3 class="heading-2">Related Vehicles</h3>

                                                <div class="row">
                                                    @foreach ($relatedvehicles as $item)
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
                                                                            <span>Kes:
                                                                                {{ number_format($item->price, 2) }}</span>
                                                                        </div>
                                                                        <img class="d-block w-100"
                                                                            src="{{ asset('/vehicleimages/' . $images[0] . '') }}"
                                                                            alt="car">
                                                                    </a>
                                                                    <div class="carbox-overlap-wrapper">
                                                                        <div class="overlap-box">
                                                                            <div class="overlap-btns-area">
                                                                                <a class="overlap-btn"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#carOverviewModal"
                                                                                    data-id="{{ $item->id }}"
                                                                                    id="vehicleDetailsModalToggle">
                                                                                    <i class="fa fa-eye-slash"></i>
                                                                                </a>
                                                                                <a class="overlap-btn wishlist-btn">
                                                                                    <i class="fa fa-heart-o"></i>
                                                                                </a>
                                                                                <div class="car-magnify-gallery">
                                                                                    <a href="{{ asset('/vehicleimages/' . $images[0] . '') }}"
                                                                                        class="overlap-btn"
                                                                                        data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                                                        <i class="fa fa-expand"></i>
                                                                                        <img class="hidden"
                                                                                            src="{{ asset('/vehicleimages/' . $images[0] . '') }}"
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
                                                                            href="{{ route('vehicles.show', $item->id) }}">{{ $item->model->model }}</a>
                                                                    </h1>
                                                                    <ul class="custom-list">
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('vehicles.show', $item->id) }}">{{ $item->usage }}</a>
                                                                            &nbsp;|&nbsp;
                                                                        </li>
                                                                        <li>
                                                                            <a
                                                                                href="">{{ $item->transmission }}</a>
                                                                            &nbsp;|&nbsp;
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">{{ $item->type?->type }}</a>
                                                                        </li>
                                                                    </ul>
                                                                    <ul class="facilities-list clearfix">

                                                                        <li>
                                                                            <i class="flaticon-fuel"></i>
                                                                            {{ $item->fuel_type }}
                                                                        </li>
                                                                        <li>
                                                                            <i class="flaticon-way"></i>
                                                                            {{ $item->mileage ?? 0 }} km
                                                                        </li>

                                                                        <li>
                                                                            <i class="flaticon-manual-transmission"></i>
                                                                            {{ $item->transmission }}
                                                                        </li>
                                                                        <li>
                                                                            <i class="flaticon-car"></i>
                                                                            {{ $item->type?->type }}
                                                                        </li>

                                                                        <li>
                                                                            <i class="flaticon-gear"></i>
                                                                            {{ $item->color }}
                                                                        </li>
                                                                        <li>
                                                                            <i class="flaticon-calendar-1"></i>
                                                                            {{ $item->year }}
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="contact-4" role="tabpanel"
                                    aria-labelledby="contact-tab-4">
                                    <div class="accordion accordion-flush" id="accordionFlushExample4">
                                        <div class="accordion-item">
                                            <div class="car-amenities mb-30">
                                                <h3 class="heading-2">Specifications</h3>
                                                <div class="row">

                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="amenities">
                                                            <li>
                                                                <i class="fa fa-check"></i>Top Speed:
                                                                {{ $vehicle->speed }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Fuel Type:
                                                                {{ $vehicle->fuel_type }}
                                                            </li><br>
                                                            <li>
                                                                <i class="fa fa-check"></i>Mileage:
                                                                {{ $vehicle->mileage }} KM
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Engine:
                                                                {{ $vehicle->enginecc }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Gear: {{ $vehicle->gear }}
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="amenities">
                                                            <li>
                                                                <i class="fa fa-check"></i>Drive Train:
                                                                {{ $vehicle->terrain }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Body Style:
                                                                {{ $vehicle->type->type }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Year: {{ $vehicle->year }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Fuel Type:
                                                                {{ $vehicle->fuel_type }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Interior Color:
                                                                {{ $vehicle->interior }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="amenities">
                                                            <li>
                                                                <i class="fa fa-check"></i>Horse Power:
                                                                {{ $vehicle->horse_power }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Location:
                                                                {{ $vehicle->yard->address ?? $vehicle->location }}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-check"></i>Exterior Color:
                                                                {{ $vehicle->color }}
                                                            </li>
                                                        </ul>
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
                <div class="col-lg-4 col-md-12">

                    <div class="sidebar-right">
                        <!-- Advanced search start -->
                        <div class="widget advanced-search d-none-992">
                            <h3 class="sidebar-title">Vehicle details</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul>
                                <li>
                                    <span>Make </span>{{ $vehicle->make->make }}
                                </li>
                                <li>
                                    <span>Model</span> {{ $vehicle->model->model }}
                                </li>
                                <li>
                                    <span>Body Style</span> {{ $vehicle->type->type }}
                                </li>
                                <li>
                                    <span>Year</span> {{ $vehicle->year }}
                                </li>
                                <li>
                                    <span>Condition</span>{{ $vehicle->usage ?? 'new' }}
                                </li>
                                <li>
                                    <span>Mileage</span>{{ $vehicle->mileage }} Km
                                </li>
                                <li>
                                    <span>Interior Color</span>{{ $vehicle->interior }}
                                </li>
                                <li>
                                    <span>Transmission</span> {{ $vehicle->transmission ?? 'Automatic' }}
                                </li>
                                <li>
                                    <span>Engine</span> {{ $vehicle->engine ?? 'V-8' }}
                                </li>
                                <li>
                                    <span>No. of Gears:</span> {{ $vehicle->gears ?? 4 }}
                                </li>
                                <li>
                                    <span>Location</span>
                                    {{ $vehicle->yard?->address ?? ($vehicle->location ?? 'Nairobi') }}
                                </li>
                                <li>
                                    <span>Fuel Type</span>{{ $vehicle->fuel_type ?? 'Petrol' }}
                                </li>
                            </ul>
                        </div>

                        <div class="contact-2 financing-calculator widget widget-3">
                            <h3 class="sidebar-title">Financing Calculator</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <form action="#" method="GET" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" id="price"
                                        value="{{ $vehicle->price }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Financier</label>
                                    <select name="partner_id" id="partner_id" class="form-select">
                                        <option value="">Select One</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Interest Rate (%)</label>
                                    <input type="text" class="form-control" placeholder="15%">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Period In Months</label>
                                    <input type="text" class="form-control" placeholder="6 Months">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Down PaymenT</label>
                                    <input type="text" class="form-control" placeholder="$25,500">
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn button-theme btn-md w-100">Cauculate</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


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

                            <div class="col-md-12">
                                <div id="quotefeeback"></div>

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
                        <h4 class="text-black">Ask for trade option with your current vehicle </h4>
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
                                    <button type="submit" class="btn btn-md btn-warning">Submit</button>
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
@endsection
