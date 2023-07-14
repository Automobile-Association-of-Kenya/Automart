@extends('layouts.app')

@section('title')
    {{ $vehicle->make->make . ' ' . $vehicle->model->model }} @parent
@endsection

@section('header_styles')
    <style>
        .Home {
            display: none;
        }
    </style>
@endsection

@section('main')
    @php
        $images = json_decode($vehicle->images);
        $location = !is_null($vehicle->location) ? $vehicle->location : $vehicle->yard?->address;
        $vehicle_no = $vehicle->vehicle_no ?? $vehicle->id;
    @endphp
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('vehicles/make/' . $vehicle->make->id) }}">{{ $vehicle->make->make }}</a></li>
                    <li><a
                            href="{{ url('/vehicle/' . $vehicle->id) }}">{{ $vehicle->year . ' ' . $vehicle->model->model }}</a>
                    </li>
                    <li class="active">Purchase</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="car-details-page mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-4">
                    <div class="intro">

                        <div class="introimage" style="max-height: 500px;">
                            @php
                                $images = $vehicle->images;
                            @endphp
                            <img src="{{ asset('vehicleimages/' . $images[0]->image) }}"
                                alt="{{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}"
                                width="100%" max-height="350px">
                        </div>

                        <div class="introtext mt-2">
                            <a href="{{ url('vehicle/' . $vehicle_no) }}">
                                <h3 class="text text-success">
                                    {{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}
                                </h3>
                            </a>
                            <h4>Ksh. &nbsp;{{ number_format($vehicle->price, 2) }}</h4>

                            <p><i class="flaticon-pin"></i>&nbsp; {{ $location }}</p>
                        </div>
                    </div>
                    <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-warning btn-md">You can also apply for
                        financing here</a>

                    <div class="card mt-4">
                        <div class="card-header bg-white">
                            <h4 class="text-success">Before you buy any vehicles on this platform</h4>
                        </div>

                        <div class="card-body">
                            <p><span class="fa fa-check-circle text-success"></span>&nbsp;Inspect the vehicle to make sure
                                they meet your needs.</p>
                            <p><span class="fa fa-check-circle text-success"></span>&nbsp;Meet the seller at a safe public
                                place.</p>
                            <p><span class="fa fa-check-circle text-success"></span>&nbsp;Don't send any pre-payments.</p>
                            <p><span class="fa fa-check-circle text-success"></span>&nbsp;Ensure to check and verifying car documents before proceeding to transact.</p>
                            <p><span class="fa fa-check-circle text-success"></span>Always make payments using secure and verifiable methods.</p>
                            {{-- <p><span class="fa fa-check-circle text-success"></span></p>
                            <p><span class="fa fa-check-circle text-success"></span></p> --}}
                        </div>
                        <div class="card-footer bg-white text-center">
                            <p>You are agreeing to to<a href="{{ route('terms') }}" class="text-success"> <strong>our terms
                                        of
                                        use</strong></a> and <a href="{{ route('privacy') }}"
                                    class="text-success"><strong>privacy
                                        policy</strong></a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Fill this form for all purchase details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('purchase') }}" method="post" id="vehiclePurchaseForm">
                                @csrf
                                <input type="hidden" name="vehicle_id" id="purchaseVehicleID" value="{{ $vehicle->id }}">
                                <div id="purchasefeedback"></div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="buyerName">Buyer Name</label>
                                        <input type="text" class="form-control" name="name" id="buyerName" required>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="buyerName">ID NO</label>
                                        <input type="text" class="form-control" name="id_no" id="idNO" required>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="buyerPhone">Buyer Phone</label>
                                        <input type="text" class="form-control" name="phone" id="buyerPhone" required>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="buyerEmail">Buyer Email</label>
                                        <input type="email" class="form-control" name="email" id="buyerEmail" required>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="pickupType">Pickup</label>
                                        <select name="pickup" id="pickupType" class="form-select" required>
                                            <option value="">Select One</option>
                                            <option value="In Person">In Person</option>
                                            <option value="Home">Home delivery</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 form-group Home">
                                        <label for="homeEstate">Estate</label>
                                        <input type="text" class="form-control" name="estate" id="homeEstate">
                                    </div>

                                    <div class="col-md-12 form-group Home">
                                        <label for="houseNumber">House Number</label>
                                        <input type="text" class="form-control" name="housenumber" id="houseNumber">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="paymentMethod">Payment Method</label>
                                        <select name="payment_method" id="paymentMethod" class="form-select" required>
                                            <option value="">Select One</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Bank">Bank</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-success"><i
                                            class="fa fa-save fa-lg fa-fw"></i>&nbsp;Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="sidebar-title">Vehicles Features</h3>
                        <div class="card mt-4">
                            <div class="row">
                                @foreach ($vehicle->features as $item)
                                    <div class="col-md-6">
                                        <p class="m-2 bg-grey p-2">{{ $item->feature }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>


    <div class="featured-car">
        <div class="container mt-4">
            <div class="main-title">
                <h4 class="text-success">Reasons to Buy Your Vehicles on our Plartform.</h4>
            </div>
            <div class="featured-slider row slide-box-btn slider mt-4"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>

                @foreach ($services as $item)
                    <div class="slide slide-box">
                        <div class="card" style="border-radius: 8px; padding:1.5em;">
                            <h5 class="card-title white">{{ $item->service }}</h5>
                            <p class="card-text white">{{ $item->description }}</p>
                            <a href="{{ route('services.index') }}" class="btn btn-success btn-sm">Learn More ...</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


        <div class="featured-car mt-4">
            <div class="container">
                <h4>Other vehicles you may like</h4>
                <div class="featured-slider row slide-box-btn">
                    @foreach ($vehiclesrelated as $item)
                        @php
                            $images = $item->images;
                            $vehicle_no = $item->vehicle_no ?? $item->id;
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="car-box-3">

                                <div class="car-thumbnail">
                                    <a href="{{ url('/vehicle/' . $vehicle_no) }}" class="car-img">
                                        <div class="for">{{ $item->usage }}</div>
                                        <div class="price-box">
                                            <span>Kes: {{ number_format($item->price, 2) }}</span>
                                        </div>
                                        @if (count($images) > 0)
                                            <img class="d-block w-100"
                                                src="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}" alt="car">
                                        @endif
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
                                        <a href="{{ url('/vehicle/' . $vehicle_no . '/buy') }}"
                                            class="btn btn-success btn-sm mt-2"><i class="fa fa-hand"></i> Buy</a>
                                        <a href="{{ url('/vehicle/' . $vehicle_no . '/loan') }}"
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
    </div>

    @include('layouts.brands')

@endsection

@section('footer_scripts')
    <script>
        (function() {
            $('#pickupType').on('change', function() {
                if ($(this).val() === "Home") {
                    $('.Home').show();
                } else {
                    $('.Home').hide();
                }
            })
        })()
    </script>
@endsection
