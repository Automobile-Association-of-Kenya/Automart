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
                <div class="col-lg-6 col-md-12 col-xs-12">

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

                        <div class="widget advanced-search d-none-992 bg-white">
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
                                    <span>Body Style</span> {{ @$vehicle->type->type }}
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
                                    <button class="nav-link" id="contact-tab-4" data-bs-toggle="tab"
                                        data-bs-target="#contact-4" type="button" role="tab" aria-controls="contact-4"
                                        aria-selected="false">Specifications</button>
                                </li>
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

                                <div class="tab-pane fade" id="contact-4" role="tabpanel" aria-labelledby="contact-tab-4">
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
                                                                {{ @$vehicle->type->type }}
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

                <div class="col-lg-6 col-md-12">

                    <div class="sidebar-right">


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{ asset('js/main/show.js') }}"></script>
@endsection
