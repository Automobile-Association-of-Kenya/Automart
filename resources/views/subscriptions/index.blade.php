@extends('layouts.app')

@section('title')
    {{ $title }} @parent
@endsection

@section('header_styles')
@endsection

@section('main')
    <!-- Sub banner start -->

    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Subscription Plans</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sub Banner end -->

    <div class="pricing-tables content-area">
        <div class="container">
            <div class="main-title text-center">
                <h1>Subscription Plans</h1>
                <p>To help the company meet its obligations and provide seamless services, we charge a small levy to use our
                    platform as outlined below.</p>
            </div>
            <div class="row" id="plansSection">
                <div class="lds-roller">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                {{-- <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-1 plan">
                        <div class="plan-header">
                            <h5>Ultimate Plan</h5>
                            <p>Plan short description</p>
                            <div class="plan-price"><sup>$</sup>80<span>/month</span> </div>
                        </div>
                        <div class="plan-list">
                            <ul>
                                <li><i class="fa fa-globe"></i>Unlimited Websites</li>
                                <li><i class="fa fa-thumbs-up"></i>Unlimited Storage</li>
                                <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                                <li><i class="fa fa-user"></i>1000 Email Addresses</li>
                                <li><i class="fa fa-star"></i>Free domain with annual plan</li>
                                <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                                <li><i class="fa fa-server"></i>Premium DNS</li>
                            </ul>
                            <div class="plan-button text-center">
                                <a href="#" class="btn pricing-btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div> --}}


                {{-- <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-1 plan">
                        <div class="plan-header">
                            <h5>Deluxe Plan</h5>
                            <p>Plan short description</p>
                            <div class="plan-price"><sup>$</sup>80<span>/month</span> </div>
                        </div>
                        <div class="plan-list">
                            <ul>
                                <li><i class="fa fa-globe"></i>Unlimited Websites</li>
                                <li><i class="fa fa-thumbs-up"></i>Unlimited Storage</li>
                                <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                                <li><i class="fa fa-user"></i>1000 Email Addresses</li>
                                <li><i class="fa fa-star"></i>Free domain with annual plan</li>
                                <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                                <li><i class="fa fa-server"></i>Premium DNS</li>
                            </ul>
                            <div class="plan-button text-center">
                                <a href="#" class="btn pricing-btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="pricing-1 plan">
                        <div class="plan-header">
                            <h5>Professional Plan</h5>
                            <p>Plan short description</p>
                            <div class="plan-price"><sup>$</sup>80<span>/month</span> </div>
                        </div>
                        <div class="plan-list">
                            <ul>
                                <li><i class="fa fa-globe"></i>Unlimited Websites</li>
                                <li><i class="fa fa-thumbs-up"></i>Unlimited Storage</li>
                                <li><i class="fa fa-signal"></i>Unlimited Bandwidth</li>
                                <li><i class="fa fa-user"></i>1000 Email Addresses</li>
                                <li><i class="fa fa-star"></i>Free domain with annual plan</li>
                                <li><i class="fa fa-rocket"></i>4X Processing Power</li>
                                <li><i class="fa fa-server"></i>Premium DNS</li>
                            </ul>
                            <div class="plan-button text-center">
                                <a href="#" class="btn pricing-btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection


<div class="modal fade" id="subscriptionPaymentModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title" id="subscriptionOverviewModalLabel">
                    <h4 class="text-black"></h4>
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="subscriptiondescription"></p>
                <div class="row">
                    <div class="col-md-5" id="subscriptiondetails">

                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <nav class="nav-justified bg-white">
                                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab"
                                            href="#mpesaPaymentTab" role="tab" aria-controls="pop1"
                                            aria-selected="true">MPesa Payment</a>
                                        <a class="nav-item nav-link" id="vehicles-list-tab" data-toggle="tab"
                                            href="#cardPaymentTab" data-target="#cardPaymentTab" role="tab"
                                            aria-controls="pop1" aria-selected="true">Card
                                            Payment</a>
                                    </div>
                                </nav>
                            </div>

                            <div class="card-body tab-content">
                                <div id="paymentfeedbac"></div>
                                <div class="tab-pane fade show active" id="mpesaPaymentTab" role="tabpanel">
                                    <form action="{{ route('payments.store') }}" method="post" id="mpesaPaymentForm"
                                        id="mpesaPaymentForm">
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="">Enter the phone number you would like to pay with for
                                                this plan in the format indicated in the textbox below and click
                                                process. A
                                                popup will be sent to your phone. Accept and key in you mpesa pin to
                                                complete. </label>
                                        </div>
                                        <input type="hidden" name="subscription_for_payment_id"
                                            id="subscriptionForPaymentID">

                                        <input type="hidden" name="user_id" id="subscriberID"
                                            value="{{ auth()->id() }}">
                                        <input type="hidden" name="dealer_id" id="dealerID"
                                            value="{{ auth()->user()->dealer_id }}">

                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control" name="price"
                                                id="subscriptionPrice" disabled>
                                        </div>

                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control form-control-lg mb-2"
                                                name="phone" id="phoneNumber" placeholder="2547xxxxxxxx"
                                                value="{{ intval(auth()->user()->phone) }}">
                                        </div>

                                        <div class="loadersection"></div>
                                        <div id="paymentfeedback"></div>

                                        <button type="submit" class="btn btn-success"
                                            id="mpesa-submit-button"><i class="fa fa-save fa-lg fa-fw"></i> Process</button>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="cardPaymentTab" role="tabpanel">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @php
    die();
@endphp --}}

@section('footer_scripts')
    <script src="{{ asset('js/main/subscriptions.js') }}"></script>
@endsection
