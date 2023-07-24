@extends('layouts.app')

@section('title')
    {{ $plan->name }} @parent
@endsection

@section('header_styles')
    {{-- <link rel="stylesheet" href="{{ asset('css/component.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        #completePayment {
            display: none;
        }
        #retryPayment {
            display: none;
        }
    </style>
@endsection

@section('main')
    <div class="contact-section">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="card">
                <div class="row">
                    <div class="col-lg-5 col-md-12" style="margin: auto;padding:2em 4em;">
                        <div>
                            <div class="">
                                <h1 style="color:black;">{{ $plan->name }}</h1>
                            </div>
                            <p>{{ $plan->description }}</p>
                            <p><strong>When you subscribe to this service, you get:- </strong></p>
                            @foreach ($plan->properties as $item)
                                <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;{{ $item->name }}</p>
                            @endforeach
                            {{-- <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p> --}}
                            <div class="social-list text-center">
                                <h3>Kes: <span
                                        class="text-success">{{ $plan->cost !== 'free' ? number_format($plan->cost, 2) : $plan->price }}</span>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="text-left mt-2" style="padding: 2em 0;">
                            <h4>Payment options</h4>
                            <p>You can make your payment through any of the following options </p>
                        </div>

                        <div id="accordion">

                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <a  data-toggle="collapse" data-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Mpesa
                                        </a>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
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
                                                id="subscriptionForPaymentID" value="{{ $plan->id }}">

                                            <input type="hidden" name="user_id" id="subscriberID"
                                                value="{{ auth()->id() }}">
                                            <input type="hidden" name="dealer_id" id="dealerID"
                                                value="{{ auth()->user()->dealer_id }}">

                                            <div class="form-group mb-2">
                                                <input type="text" class="form-control" name="price"
                                                    id="subscriptionPrice" value="{{ $plan->cost }}" disabled>
                                            </div>

                                            <div class="form-group mb-2">
                                                <input type="text" class="form-control form-control-lg mb-2"
                                                    name="phone" id="phoneNumber" placeholder="2547xxxxxxxx"
                                                    value="{{ intval(auth()->user()->phone) }}">
                                            </div>

                                            <div class="loadersection"></div>
                                            <div id="paymentfeedback"></div>
                                            <input type="hidden" name="checkOutId" id="checkOutId" value="">

                                            <div class="btn-group-md">
                                                <button type="button" class="btn btn-sm btn-success mr-2" id="completePayment">
                                                    <i class="fa fa-save fa-lg fa-fw"></i> Complete
                                                </button>

                                                <button type="submit" class="btn btn-sm btn-warning mr-2" id="retryPayment">
                                                    <i class="fa fa-save fa-lg fa-fw"></i> Retry
                                                </button>

                                                <button type="submit" class="btn btn-sm btn-success" id="mpesa-submit-button"><i
                                                    class="fa fa-save fa-lg fa-fw"></i> Process</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Paypal
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="post" id="paypalForm">
                                        </form>
                                        <div id="paypal-button-container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AcCsvkFgC0FezC6lMi_Cl9c8u0ohr90xdmJ67Qa_29xoj0GLkQGdEpfmc9evvnjN2m5Q-ks5pZ78Bq6q&currency=KSH"></script>
    <script src="{{ asset('js/main/subscriptions.js') }}"></script>

@endsection
