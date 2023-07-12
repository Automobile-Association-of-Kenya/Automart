@extends('layouts.app')

@section('title')
    {{ $vehicle->make->make . ' ' . $vehicle->model->model }} @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('js/bootstrapvalidator/css/bootstrapValidator.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
    <style>
        .employment {
            display: none;
        }

        .business {
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
        .loancalcsection {
            background: #fff;
            padding: 1em;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            border-radius: 10px;
        }
    </style>
@endsection

@section('main')
    @php
        $images = $vehicle->images;
        $location = !is_null($vehicle->location) ? $vehicle->location : $vehicle->yard?->address;
        $vehicle_no = $vehicle->vehicle_no ?? $vehicle->id;
    @endphp
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('makes/' . $vehicle->make->id) }}">{{ $vehicle->make->make }}</a></li>
                    <li><a
                            href="{{ url('/vehicle/' . $vehicle->id) }}">{{ $vehicle->year . ' ' . $vehicle->model->model }}</a>
                    </li>
                    <li class="active">Loan Application</li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Car details page start -->
    <div class="car-details-page mb-4 mt-4">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="intro">
                                <div class="introimage" style="max-height: 500px;">
                                    @if (count($images) > 0)
                                        <img src="{{ asset('vehicleimages/' . @$images[0]->image) }}"
                                            alt="{{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}"
                                            width="100%">
                                    @endif
                                </div>
                                <div class="introtext mt-2">
                                    <a href="{{ url('vehicle/' . $vehicle_no) }}">
                                        <h3 class="text text-success">
                                            {{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}
                                        </h3>
                                    </a>
                                    <h4 class="float-right">Ksh. &nbsp;{{ number_format($vehicle->price, 2) }}</h4>

                                    <p><i class="flaticon-pin"></i>&nbsp; {{ $location }}</p>
                                </div>
                            </div>

                            {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#loanCalculatorModal"
                                class="btn btn-warning btn-md">Loan Calculator</a> --}}

                        </div>

                        <div class="col-md-9 text-center">
                            <h4><strong>How vehicle financing works on our plartform. </strong></h4>

                            <div class="row">
                                <div class="col-md-4 col-md-4 col-sm-6">
                                    <div class="service-info-2">
                                        <div class="icon">
                                            <i class="flaticon-support-2"></i>
                                        </div>
                                        <div class="detail">
                                            <h3>Compare Rates</h3>
                                            <p>Use the loan calculator on our plartform to sompare financing options by our
                                                providers.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-md-4 col-sm-6">
                                    <div class="service-info-2">
                                        <div class="icon">
                                            <i class="flaticon-air-conditioner"></i>
                                        </div>
                                        <div class="detail">
                                            <h3>Apply Loan</h3>
                                            <p>Apply for loan and get the feedback from our partner within 24 hours.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-md-4 col-sm-6">
                                    <div class="service-info-2">
                                        <div class="icon">
                                            <i class="flaticon-car-2"></i>
                                        </div>
                                        <div class="detail">
                                            <h3>Pay Deposit and Drive</h3>
                                            <p>Pay the deposit and choose for home delivery or self pickup. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="#" data-bs-toggle="modal" data-bs-target="#vehicleDetailsModal"
                                class="btn btn-success btn-md">Apply Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @php
            $deposit = (40 / 100) * $vehicle->price;
            $mindeposit = (10 / 100) * $vehicle->price;
        @endphp
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget mt-4">
                            <div class="text-center">
                                <h3 class="sidebar-title">Loan Calculator</h3>
                            </div>
                            <div class="loancalcsection">
                                <div class="bg-success p-2 text-center" style="border-radius: 10px;">
                                    <p class="mb-0 text-white">Estimated Monthly Payment</p>
                                    <p class="text-white">Note: Monthly interest rate may differ as we partner with
                                        different
                                        finance institutions.</p>
                                </div>

                                <div class="text-center mt-2">
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
                                        <input type="range" min="0" max="36" step="1"
                                            value="12" data-orientation="horizontal" id="tenureSlider"
                                            class="text-warning">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="widget mt-4">

                            <div class="text-center">
                                <h3 class="sidebar-title">Vehicles Features</h3>
                            </div>

                            <div class="loancalcsection">
                                <div class="row">
                                    @foreach ($vehicle->features as $item)
                                    {{-- <span class="mb-2 bg-grey p-2">{{ $item->feature }}</span> --}}
                                    <div class="col-md-6">
                                        <p class="bg-grey p-2">{{ $item->feature }}</p>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="featured-car">
            <div class="container">
                <div class="main-title">
                    <h4 class="text-success">Reasons to Finance Your Vehicles on our Plartform.</h4>
                </div>
                <div class="featured-slider row slide-box-btn"
                    data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>

                    @foreach ($services as $item)
                        <div class="col-md-4 slide slide-box">
                            <div class="card" style="border-radius: 8px; padding:1.5em;">
                                <h5 class="card-title white">{{ $item->service }}</h5>
                                <p class="card-text white">{{ $item->description }}</p>

                                <a href="{{ route('services.index') }}" class="btn btn-success btn-sm">Learn More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>


        <div class="featured-car mt-4">
            <div class="container">
                <h4>Vehicles you may like</h4>
                <div class="featured-slider row slide-box-btn">
                    @foreach ($vehicles as $item)
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

<div class="modal fade" id="loanCalculatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Loan Calculator</h5>
                <button type="button" class="close btn btn-warning text-danger" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="#" method="GET" enctype="multipart/form-data">

                <div class="modal-body row">

                    <div class="col-md-6 form-group">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="principal" id="principalAmount"
                            value="{{ $vehicle->price }}" required readonly>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Financier</label>
                        <select name="partner_id" id="loanPartnerID" class="form-select">
                            <option value="">Select One</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Loan Product</label>
                        <select name="loan_product_id" id="loanproductID" class="form-select">
                            <option value="">Select One</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Interest Rate (%)</label>
                        <input type="text" class="form-control" name="interest" id="interestRate" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Period In Months</label>
                        <input type="text" class="form-control" name="calcperiod" id="calcPeriod" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Down Payment</label>
                        <input type="text" class="form-control" name="calcdepost" id="calcDepost" readonly>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Installments</label>
                        <input type="text" class="form-control" name="calcinstallment" id="calcInstallment"
                            readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="vehicleDetailsModal" tabindex="-1" role="dialog"
    aria-labelledby="carOverviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Loan Application Form</h5>
                <button type="button" class="close btn btn-warning text-danger" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="loanApplicationForm" method="post" action="#" class="validate">
                    @csrf
                    <div id="rootwizard">
                        <ul class="nav nav-pills">
                            <li class="nav-item m-t-15">
                                <a class="nav-link" href="#tab1" data-toggle="tab">
                                    <span class="userprofile_tab1">1</span>Personal Information</a>
                            </li>
                            <li class="nav-item m-t-15">
                                <a class="nav-link" href="#tab2" data-toggle="tab">
                                    <span class="userprofile_tab2">2</span>Employment Info</a>
                            </li>
                            <li class="nav-item m-t-15">
                                <a class="nav-link" href="#tab3" data-toggle="tab"><span>3</span>Bank
                                    information</a>
                            </li>
                        </ul>

                        <div id="loanfeedback"></div>
                        <input type="hidden" id="vehicleloanID" value="{{ $vehicle->id }}">
                        <div class="tab-content mt-3">
                            <div class="tab-pane show active" id="tab1">

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="title" class="control-label">Title <sup>*</sup></label>
                                        <select name="title" id="appliTitle" class="form-select">
                                            <option value="">Select One</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Ms">Ms</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Dr">Dr</option>
                                            <option value="Prof">Prof</option>
                                            <option value="Rev">Rev</option>
                                            <option value="Pastor">Pastor</option>
                                            <option value="Bishop">Bishop</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="firstName" class="control-label">First name <sup>*</sup></label>
                                        <input id="firstName" name="firstname" type="text" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="lastName" class="control-label">Last name <sup>*</sup></label>
                                        <input id="lastName" name="lastname" type="text" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="dateOfbirth" class="control-label">Date of birth
                                            <sup>*</sup></label>
                                        <input id="dateOfbirth" name="date_of_birth" type="date"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="emailAddress" class="control-label">Email address
                                            <sup>*</sup></label>
                                        <input id="emailAddress" name="email" type="email" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="phoneNumber" class="control-label">Phone Number
                                            <sup>*</sup></label>
                                        <input id="phoneNumber" name="phonenumber" type="text"
                                            class="form-control required">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="kraPin" class="control-label">KRA Pin <sup>*</sup></label>
                                        <input id="kraPin" name="krapin" type="text" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="idNo" class="control-label">National ID <sup>*</sup></label>
                                        <input id="idNo" name="idno" type="text" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="idNo" class="control-label">Nationality <sup>*</sup></label>
                                        <select name="country_id" id="countryID" class="form-select">
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="cityResidence" class="control-label">City of residence
                                            <sup>*</sup></label>
                                        <input id="cityResidence" name="city" type="text" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="estateName" class="control-label">Estate / Street name
                                            <sup>*</sup></label>
                                        <input id="estateName" name="estate" type="text" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="houseNO" class="control-label">House NO <sup>*</sup></label>
                                        <input id="houseNO" name="house_no" type="text" class="form-control"
                                            required>
                                    </div>
                                </div>

                                <ul class="pager wizard pager_a_cursor_pointer mt-2">
                                    {{-- <li class="previous">
                                        <a><i class="fa fa-long-arrow-left"></i>
                                            Previous</a>
                                    </li> --}}
                                    <li class="next">
                                        <a class="btn-outline-success">Next <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    </li>
                                    {{-- <li class="next finish" style="display:none;">
                                        <a>Finish</a>
                                    </li> --}}
                                </ul>
                            </div>

                            <div class="tab-pane" id="tab2">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <div class="col-md-12">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="employment" value="employment" required>
                                                <span class="custom-control-label"></span>
                                                <a class="custom-control-description">Salaried Employee</a>
                                            </label>

                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="employment" value="business" required>
                                                <span class="custom-control-label"></span>
                                                <a class="custom-control-description">Business Owner</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="industry">Industry <sup>*</sup></label>
                                        <select name="industry" id="industry" class="form-select">
                                            <option value=""></option>
                                            @foreach ($industries as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group employment">
                                        <label for="employementType">Employment Type <sup>*</sup></label>
                                        <select name="employement_type" id="employementType" class="form-select">
                                            <option value=""></option>
                                            <option value="Permanent">Permanent</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Commission">Commission</option>
                                            <option value="Pensioner">Pensioner</option>
                                            <option value="Unemployed">Unemployed</option>
                                        </select>
                                    </div>



                                    <div class="col-md-6 form-group employment">
                                        <label for="employerName">Proffession <sup>*</sup></label>
                                        <input type="text" name="proffession" id="proffession"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 form-group employment">
                                        <label for="employerName">Name of Employer <sup>*</sup></label>
                                        <input type="text" name="employername" id="employerName"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 form-group employment">
                                        <label for="yearsOfEmployment">Year(s) with Employer <sup>*</sup></label>
                                        <input type="text" name="years_of_employment" id="yearsOfEmployment"
                                            class="form-control" required>
                                    </div>

                                    <div class="col-md-6 form-group employment">
                                        <label for="employerAddress">Employer Address <sup>*</sup></label>
                                        <input type="text" name="employeraddress" id="employerAddress"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6 form-group employment">
                                        <label for="sidebusiness" class="control-label">Do you own a business
                                            <sup>*</sup></label>
                                        <div class="col-md-12">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="sidebusiness" value="yes">
                                                <span class="custom-control-label"></span>
                                                <a class="custom-control-description">Yes</a>
                                            </label>

                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="sidebusiness" value="no">
                                                <span class="custom-control-label"></span>
                                                <a class="custom-control-description">No</a>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-md-6 form-group business">
                                        <label for="businessowner" class="control-label">Are you the owner of the
                                            business or
                                            one of the directors? <sup>*</sup></label>
                                        <div class="col-md-12">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="businessowner" value="Owner">
                                                <span class="custom-control-label"></span>
                                                <a class="custom-control-description">Yes</a>
                                            </label>

                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="businessowner" value="Director">
                                                <span class="custom-control-label"></span>
                                                <a class="custom-control-description">No</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group business">
                                        <label for="businessname">Business Name</label>
                                        <input type="text" name="businessname" id="businessName"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6 form-group business">
                                        <label for="businessregno">Business Reg Number</label>
                                        <input type="text" name="businessregno" id="businessRegNo"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6 form-group business">
                                        <label for="businesstype">Business Type</label>
                                        <select name="businesstype" id="businesstype" class="form-select">
                                            <option value=""></option>
                                            <option value="Sole Proprietorship">Sole Proprietorship</option>
                                            <option value="Limited Liability Company">Limited Liability Company
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group business">
                                        <label for="sidebusinessaddress">Business Address</label>
                                        <input type="text" name="businessaddress" id="businessAddress"
                                            class="form-control">
                                    </div>

                                </div>

                                <ul class="pager wizard pager_a_cursor_pointer">
                                    <li class="previous">
                                        <a class="btn btn-outline-success"><i class="fa fa-long-arrow-left"></i>
                                            Previous</a>
                                    </li>
                                    <li class="next">
                                        <a class="btn btn-outline-success">Next <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    </li>
                                    {{-- <li class="next finish" style="display:none;">
                                        <a>Finish</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="tab-pane" id="tab3">

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="typeOfAccount" class="control-label">Type of bank account
                                            <sup>*</sup></label>
                                        <div class="col-md-12">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="typeOfAccount" value="Personal" required>
                                                <span class="custom-control-label"></span>
                                                <a class="custom-control-description">Personal</a>
                                            </label>

                                            <label class="custom-control custom-radio">
                                                <input type="radio" name="typeOfAccount" value="Business" required>
                                                <span class="custom-control-label"></span>
                                                <a class="custom-control-description">Business</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="bankName">Bank Name <sup>*</sup></label>
                                        <input type="text" name="bank" id="bankName" class="form-control">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="accountholdername">Bank Holder Name <sup>*</sup></label>
                                        <input type="text" name="accountholdername" id="accountholdername"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="accountNumber">Bank Account Number <sup>*</sup></label>
                                        <input type="text" name="accountnumber" id="accountNumber"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="bankAccountType">Bank Account Type <sup>*</sup></label>
                                        <select name="bankaccounttype" id="bankAccountType" class="form-select">
                                            <option value=""></option>
                                            <option value="current">Cheque / Current </option>
                                            <option value="savings">Savings</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="monthlyturnover">Bank Account Monthly Turnover <sup>*</sup></label>
                                        <input name="monthlyturnover" id="monthlyTurnover" class="form-control">
                                    </div>
                                </div>

                                <ul class="pager wizard pager_a_cursor_pointer">
                                    <li class="previous">
                                        <a class="btn btn-outline-success"><i class="fa fa-long-arrow-left"></i>
                                            Previous</a>
                                    </li>
                                    <li class="next">
                                        <a class="btn btn-outline-success">Next <i class="fa fa-long-arrow-right"></i>
                                        </a>
                                    </li>

                                    <li class="next finish" style="display:none;">
                                        <button type="submit" id="loanSubmit"
                                            class="btn btn-round btn-md btn-outline-success float-right"><i
                                                class="fa fa-save"></i>&nbsp;Finish</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('footer_scripts')
    <script src="{{ asset('js/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
    <script src="{{ asset('js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/wizard.js') }}"></script>

    <script src="{{ asset('js/main/loan.js') }}"></script>
@endsection
