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
                <h1>Subscription Plans</h1>
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
                <p>To help the company meet its obligations and provide seamless services, we charge a small levy to use our platform as outlined below.</p>
            </div>
            <div class="row" id="plansSection">

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


@section('footer_scripts')
    <script src="{{ asset('js/main/subscriptions.js') }}"></script>
@endsection
