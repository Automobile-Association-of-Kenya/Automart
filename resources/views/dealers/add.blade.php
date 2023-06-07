@extends('layouts.app')

@section('title')
    Dealer Create @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .show-passwordAdmin {
            cursor: pointer;
        }
    </style>
@endsection

@section('main')
    <div class="contact-section">
        <div class="container"><br>
            <br>
            <br>
            <br>
            <br>
            <div class="card">
                <div class="row">
                    <div class="col-lg-5 col-md-12 authsection" style="margin: auto;padding:4em;">
                        <div>
                            <div class="">
                                <h1 style="color:black;">AA AutoMart</h1>
                            </div>
                            <p>At our platform, we bring together a vast selection of high-quality cars and a wide range of
                                accessories from trusted manufacturers and sellers. From sleek sedans to rugged SUVs, we
                                offer a
                                diverse inventory of vehicles to suit every style and preference. </p>
                            <p><strong>When you sign in you access</strong></p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;</p>
                            <div class="social-list text-center">
                                <div class="buttons">
                                    <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                    <a href="#" class="dribbble-bg"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="login-inner-form">
                            <div class="card" style="width:100%;">
                                <div class="card-header bg-white text-center">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                                    </a>
                                    <h3><b>Add Dealer Information </b></h3>
                                </div>
                                <div class="card-body">


                                    <form action="{{ route('dealers.store') }}" method="POST" id="addDealerForm">

                                        @csrf
                                        <p><b>Dealer Information</b></p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="float-left">Dealer Name</label>
                                                <input type="text" name="dealername" id="dealerAddName"
                                                    value="{{ old('dealername') }}"
                                                    class="form-control @error('dealername') invalid @enderror" required>
                                                @if ($errors->has('dealername'))
                                                    <span class="text-danger">{{ $errors->first('dealername') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label class="float-left">Dealer Phone</label>
                                                <input type="text" name="dealerphone" id="dealerAddPhone"
                                                    value="{{ old('dealerphone') }}"
                                                    class="form-control @error('dealerphone') invalid @enderror" required>
                                                @if ($errors->has('dealerphone'))
                                                    <span class="text-danger">{{ $errors->first('dealerphone') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label class="float-left">Dealer Email</label>
                                                <input type="email" name="dealeremail" id="dealerAddEmail"
                                                    value="{{ old('dealeremail') }}"
                                                    class="form-control @error('dealeremail') invalid @enderror" required>
                                                @if ($errors->has('dealeremail'))
                                                    <span class="text-danger">{{ $errors->first('dealeremail') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label class="float-left">Zip/Potal Address</label>
                                                <input type="text" name="address" id="dealerAddAddress"
                                                    value="{{ old('address') }}"
                                                    class="form-control @error('address') invalid @enderror">
                                                @if ($errors->has('address'))
                                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label class="float-left">County</label>
                                                <select class="form-control form-control-md" name="county_id" id="countyAddID"
                                                    style="width: 100%;"></select>
                                                {{-- <select name="county_id" id=""
                                            class="form-control form-control-md chzn-select" required></select> --}}
                                                @if ($errors->has('county_id'))
                                                    <span class="text-danger">{{ $errors->first('county_id') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label class="float-left">City/Town</label>
                                                <input type="text" name="city" id="dealerAddCity"
                                                    value="{{ old('city') }}"
                                                    class="form-control @error('city') invalid @enderror">
                                                @if ($errors->has('city'))
                                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div id="feedback" class="dealersfeedback"></div>
                                        </div>

                                        <div class="col-md-12 text-left">
                                            <label class="terms">
                                                <input type="checkbox" checked name="terms" id="termsOfService"
                                                    required> I
                                                agree to the<a href="{{ route('terms') }}" class="terms">terms of
                                                    service</a></label>
                                        </div>
                                        <div id="feedback" class="dealersfeedback"></div>

                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-md btn-warning btn-round"
                                                id="registerSubmit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="feedback"></div>
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
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/main/auth.js') }}"></script>
    {{-- Pa$$w0rd! --}}
    {{-- mygyno@mailinator.com --}}
@endsection
