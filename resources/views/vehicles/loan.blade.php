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
    @endphp
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('makes/' . $vehicle->make->id) }}">{{ $vehicle->make->make }}</a></li>
                    <li><a
                            href="{{ url('/vehicle-details/' . $vehicle->id) }}">{{ $vehicle->year . ' ' . $vehicle->model->model }}</a>
                    </li>
                    <li class="active">Loan Application</li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Car details page start -->
    <div class="car-details-page mt-4 mb-4">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="intro">
                                <div class="introimage" style="max-height: 500px;">
                                    <img src="{{ asset('vehicleimages/' . @$images[0]) }}"
                                        alt="{{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}"
                                        width="100%" height="350px">
                                </div>
                                <div class="introtext mt-2">
                                    <a href="{{ route('vehicles.show',$vehicle->vehicle_no ?? $vehicle->id) }}"><h3>{{ $vehicle->make->make . ' ' . $vehicle->model->model }}</h3></a>
                                    <h3 class="text text-success">
                                        {{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}
                                    </h3>
                                    <hr>
                                    <h4 class="float-right">Ksh. &nbsp;{{ number_format($vehicle->price, 2) }}</h4>

                                    <p><i class="fa fa-marker text-success"></i>&nbsp; {{ $location }}</p>
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

                            <a href="#" data-toggle="modal" data-target="#loanApplicationModal"
                                class="btn btn-success btn-md">Apply Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="loanCalculatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Loan Calculator</h5>
                <button type="button" class="close btn btn-warning text-danger" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="GET" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="price"
                            value="{{ $vehicle->price }}" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Financier</label>
                        <select name="partner_id" id="loanPartnerID" class="form-select">
                            <option value="">Select One</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Loan Product</label>
                        <select name="loan_product_id" id="loanproductID" class="form-select">
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
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn button-theme btn-md w-100">Cauculate</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('footer_scripts')
    <script src="{{ asset('js/main/loan.js') }}"></script>
@endsection
