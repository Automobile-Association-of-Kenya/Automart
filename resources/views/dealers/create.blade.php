@extends('layouts.guest')

@section('title')
    Dealer Create @parent
@endsection

@section('header_styles')
    <style>
        .show-passwordAdmin {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="col-lg-7 col-md-12 form-section">
        {{-- <div class="login-inner-form"> --}}
        <div class="card">

            <div class="card-body">
                <div id="feedback"></div>

                <form action="{{ route('dealers.store') }}" method="POST" id="dealerCreateForm">

                    @csrf
                    <h3><b>Dealer Information</b></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="float-left">Dealer Name</label>
                            <input type="text" name="dealername" id="dealerName" value="{{ old('dealername') }}"
                                class="form-control @error('dealername') invalid @enderror" required>
                            @if ($errors->has('dealername'))
                                <span class="text-danger">{{ $errors->first('dealername') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="float-left">Dealer Phone</label>
                            <input type="text" name="dealerphone" id="dealerPhone" value="{{ old('dealerphone') }}"
                                class="form-control @error('dealerphone') invalid @enderror" required>
                            @if ($errors->has('dealerphone'))
                                <span class="text-danger">{{ $errors->first('dealerphone') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="float-left">Dealer Email</label>
                            <input type="email" name="dealeremail" id="dealerEmail" value="{{ old('dealeremail') }}"
                                class="form-control @error('dealeremail') invalid @enderror" required>
                            @if ($errors->has('dealeremail'))
                                <span class="text-danger">{{ $errors->first('dealeremail') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="float-left">Zip/Potal Address</label>
                            <input type="text" name="address" id="dealerAddress" value="{{ old('address') }}"
                                class="form-control @error('address') invalid @enderror">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="float-left">County</label>
                            <select name="county_id" id="countyID" class="form-control form-control-md chzn-select"
                                required></select>
                            @if ($errors->has('county_id'))
                                <span class="text-danger">{{ $errors->first('county_id') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="float-left">City/Town</label>
                            <input type="text" name="city" id="dealerCity" value="{{ old('city') }}"
                                class="form-control @error('city') invalid @enderror">
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                    </div>

                    <hr>
                    <h3><b>Admin Information</b></h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="float-left">Name</label>
                            <input type="text" name="name" id="adminName" value="{{ old('name') }}"
                                class="form-control @error('name') invalid @enderror" required>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="float-left">Phone</label>
                            <input type="text" name="phone" id="adminPhone" value="{{ old('phone') }}"
                                class="form-control @error('phone') invalid @enderror" required>
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="float-left">Email</label>
                            <input type="email" name="email" id="adminEmail" value="{{ old('email') }}"
                                class="form-control @error('email') invalid @enderror" required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="float-left">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="adminPassword" class="form-control" required>
                                <div class="input-group-append">
                                    <span class="input-group-text show-passwordAdmin"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                    </div>

                    <div class="col-md-12 text-left">
                        <label class="terms">
                            <input type="checkbox" checked name="terms" id="termsOfService" required> I agree to the<a
                                href="{{ route('terms') }}" class="terms">terms of service</a></label>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-md btn-warning btn-round"
                            id="registerSubmit">Register</button>
                    </div>
                </form>
            </div>
            <div id="feedback"></div>

            <div class="col-md-12 row mb-2">
                <div class="col-md-12 col-md-12 row mb-4">
                    <div class="col-md-6">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text text-warning">Login</a>
                        @endif
                    </div>

                    <div class="col-md-6">

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text text-warning">Forgot Password</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        {{-- </div> --}}
    </div>
@endsection
@section('footer_scripts')
    <script src="{{ asset('js/main/auth.js') }}"></script>
@endsection
