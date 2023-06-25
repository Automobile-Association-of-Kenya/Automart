@extends('layouts.app')

@section('title')
    {{ $vehicle->make->make . ' ' . $vehicle->model->model }} @parent
@endsection

@section('header_styles')
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
                                        <img src="{{ asset('vehicleimages/' . @$images[0]) }}"
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

                            <a href="#" data-bs-toggle="modal" data-bs-target="#loanCalculatorModal"
                                class="btn btn-warning btn-md">Try Loan Calculator</a>
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

                            <a href="#" data-bs-toggle="modal" data-bs-target="#loanApplicationModal"
                                class="btn btn-success btn-md">Apply Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="featured-car">
        <div class="container">
            <h4 class="text-success">Reasons to Finance Your Vehicles on our Plartform.</h4>
            <div class="featured-slider row slide-box-btn slider"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>

                @foreach ($services as $item)
                    <div class="slide slide-box">
                        <div class="card" style="border-radius: 15px; background: #DAF7A6; padding:1.5em;">
                            <h5 class="card-title white">{{ $item->service }}</h5>
                            <p class="card-text white">{{ $item->description }}</p>

                            <a href="{{ route('services.index') }}" class="btn btn-light btn-sm">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
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

<div class="modal fade" id="loanApplicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#userinfo" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Personal Information</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#businessandEmploymentTab" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">Employment Info</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#bankaccountTab" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Bank information</button>
                    </li>
                </ul>
                <button type="button" class="close btn btn-warning text-danger" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="#" method="post">
                <div class="modal-body tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="userinfo" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
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
                                    <label for="dateOfbirth" class="control-label">Date of birth <sup>*</sup></label>
                                    <input id="dateOfbirth" name="date_of_birth" type="date" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="emailAddress" class="control-label">Email address <sup>*</sup></label>
                                    <input id="emailAddress" name="email" type="email" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="phoneNumber" class="control-label">Phone Number <sup>*</sup></label>
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

                            <div class="col-md-12 ">

                                <button class='btn btn-success btn-md float-right' type="submit" id='savevehicle'><i
                                        class="fa fa-save fa-fw"></i>Next </button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="businessandEmploymentTab" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <div class="col-md-12">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="employment"value="salary" required>
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

                            <div class="col-md-6 form-group">
                                <label for="industry">Industry <sup>*</sup></label>
                                <select name="industry" id="industry" class="form-select">
                                    <option value=""></option>

                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="employerName">Name of Employer <sup>*</sup></label>
                                <input type="text" name="employername" id="employerName" class="form-control"
                                    required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="yearsOfEmployment">Year(s) with Employer <sup>*</sup></label>
                                <input type="text" name="years_of_employment" id="yearsOfEmployment"
                                    class="form-control" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="employerAddress">Employer Address <sup>*</sup></label>
                                <input type="text" name="employeraddress" id="employerAddress"
                                    class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
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
                                <label for="businessowner" class="control-label">Are you the owner of the business or
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
                                <label for="businessindustry">Industry</label>
                                <select name="" id="" class="form-select"></select>
                            </div>

                            <div class="col-md-6 form-group business">
                                <label for="businessname">Business Name</label>
                                <input type="text" name="businessname" id="businessName" class="form-control">
                            </div>

                            <div class="col-md-6 form-group business">
                                <label for="businessregno">Business Reg Number</label>
                                <input type="text" name="businessregno" id="businessRegNo" class="form-control">
                            </div>

                            <div class="col-md-6 form-group business">
                                <label for="businesstype">Business Type</label>
                                <select name="businesstype" id="businesstype" class="form-select">
                                    <option value=""></option>
                                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                                    <option value="Limited Liability Company">Limited Liability Company</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group business">
                                <label for="sidebusinessaddress">Business Address</label>
                                <input type="text" name="businessaddress" id="businessAddress"
                                    class="form-control">
                            </div>

                        </div>

                        <div class="col-md-12 ">
                            <button class='btn btn-warning btn-md float-left' type="submit" data-bs-toggle="tab"
                                data-bs-target="#userinfo"><span class="text-white">
                                    << Prev</span></button>
                            <button class='btn btn-success btn-md float-right' type="submit" id='savevehicle'><i
                                    class="fa fa-save fa-fw"></i>Next </button>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="bankaccountTab" role="tabpanel" aria-labelledby="home-tab">
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
                                <input type="text" name="accountnumber" id="accountNumber" class="form-control">
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
                                <label for="monthlyturnover">Bank Account monthly turnover <sup>*</sup></label>
                                <input name="monthlyturnover" id="monthlyTurnover" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <button class='btn btn-warning btn-md float-left' type="button" data-bs-toggle="tab"
                                data-bs-target="#businessandEmploymentTab"><span class="text-white">
                                    << Prev</span></button>
                            <button class='btn btn-success btn-md float-right' type="submit" id='savevehicle'><i
                                    class="fa fa-save fa-fw"></i>Finish </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@section('footer_scripts')
    <script src="{{ asset('js/main/loan.js') }}"></script>
@endsection
