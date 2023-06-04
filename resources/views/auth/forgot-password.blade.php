@extends('layouts.app')
@section('title')
    Password Reset Link @parent
@endsection

@section('header_styles')
    <style>
        #password-input {
            padding-right: 30px;
            /* Add space for the "Show Password" icon */
        }

        #show-password-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
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
            <div class="card">
                <div class="row">
                    <div class="col-lg-7 col-md-12 authsection" style="margin: auto;padding:4em;">
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

                    <div class="col-lg-5 col-md-12">
                        <div class="login-inner-form" style="margin: 5em 0;">
                            <div class="card">
                                <div class="card-header bg-white text-center">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                                    </a>
                                    <h3>Enter Your Email for password reset </h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('password.email') }}" method="POST" id="passwordResetLinkForm">
                                        <div class="feedback" id="feedback"></div>

                                        @csrf

                                        <div class="form-group">
                                            <label class="float-left">Email Address</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                id="emailForget" class="form-control @error('email') invalid @enderror"
                                                placeholder="Email Address" aria-label="Email Address">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-md btn-warning btn-round"
                                                id="submitEmail">Send Link</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-12 col-md-12 row mb-4">

                                    <div class="col-md-6 text-center">
                                        @if (Route::has('login'))
                                            <a href="{{ route('login') }}" class="text text-warning">Login</a>
                                        @endif
                                    </div>

                                    <div class="col-md-6 text-center">
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="text text-warning">Register</a>
                                        @endif
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
    <script src="{{ asset('js/main/auth.js') }}"></script>
@endsection
