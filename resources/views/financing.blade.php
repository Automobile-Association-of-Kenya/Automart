@extends('layouts.app')

@section('title')
    Financing @parent
@endsection

@section('header_styles')
@endsection

@section('main')

<div class="banner" id="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner banner-slider-inner text-center">
                <div class="carousel-item active item-bg">
                    <img class="d-block w-100 h-100" src="images/automart.jpg" alt="banner">
                    <div class="carousel-content container banner-info-2 bi-2">
                        <div class="row bi5">
                            <div class="col-lg-5 text-start">
                                <div class="p-3" style="background: rgb(175, 177, 175, 0.8);border-radius: 5px;">
                                    <h4 class="mb-30 text-white">Buying or Selling a Vehicle?</h4>
                                    <div class="price">
                                        <p class="te">AA Automart is an online platform designed to streamline the car
                                            buying and selling process by connecting car dealers/sellers, buyers, and
                                            various partners. It serves as a comprehensive marketplace where individuals can
                                            easily sell and buy cars, while also providing access to financing options
                                            through its network of trusted partners. </p>
                                    </div>
                                    <div class="clearfix">
                                        <a href="{{ route('vehicles.list') }}" class="btn-8">
                                            <span>Buy a Car</span>
                                        </a>&nbsp;&nbsp;&nbsp;

                                        <a href="{{ route('dealer.vehicles') }}" class="btn-8">
                                            <span>Sell Your Car</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="search-box-4 sb-7 sb-8">
                                    <p style="margin:0;padding: 2px;"><strong class="text-success"></strong></p>
                                    <p class="text-start" style="margin:0;padding: 2px;"><strong>Process</strong></p>
                                    <ul class="list-group text-start">
                                        <li class="list-group-item" style="padding: 5px;"><i
                                                class="fa fa-check-circle text-success"></i>&nbsp;<small>Competitive Interest Rates: Our financial partners offer highly competitive interest rates,
ensuring that you get the best deal possible on your car financing.</small></li>
                                        <li class="list-group-item" style="padding: 5px;"><i
                                                class="fa fa-check-circle text-success"></i>&nbsp;<small>Easy Application Process: Applying for financing through our platform is quick and
straightforward. You can complete the application online, saving you time and effort.</small></li>
                                        <li class="list-group-item" style="padding: 5px;"><i
                                                class="fa fa-check-circle text-success"></i>&nbsp;<small>Flexible Repayment Terms: We offer flexible repayment terms, so you can choose a plan
that suits your budget and lifestyle.</small></li>
                                        <li class="list-group-item" style="padding: 5px;"><i
                                                class="fa fa-check-circle text-success"></i>&nbsp;<small>Fast Approval: Say goodbye to long approval waiting times. Thanks to our efficient
system, you&#39;ll receive fast approval for your car financing application.Fast Approval: Say goodbye to long approval waiting times. Thanks to our efficient
system, you&#39;ll receive fast approval for your car financing application.</small></li>
                                        <li class="list-group-item" style="padding: 5px;"><i
                                                class="fa fa-check-circle text-success"></i>&nbsp;<small>No Hidden Charges: Transparency is crucial to us. Rest assured, there are no hidden fees
or surprises with our financing product.</small></li>
                                        <li class="list-group-item" style="padding: 5px;"><i
                                                class="fa fa-check-circle text-success"></i>&nbsp;<small>Dedicated Support: Our customer support team is always ready to assist you throughout
the financing process, ensuring a smooth and pleasant experience.</small></li>
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

    @include('layouts.partners')
@endsection

@section('footer_scripts')
@endsection
