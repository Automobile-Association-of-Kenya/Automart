@extends('layouts.app')
@section('title')
    Login @parent
@endsection

@section('header_styles')
    {{-- <link rel="stylesheet" href="{{ asset('css/components.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
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

        /* .input-group-sm > .input-group-prepend > .form-control-plaintext.input-group-text,
  .input-group-sm > .input-group-append > .form-control-plaintext.input-group-text,
  .input-group-sm > .input-group-prepend > .form-control-plaintext.btn,
  .input-group-sm > .input-group-append > .form-control-plaintext.btn, .form-control-plaintext.form-control-lg, .input-group-lg > .form-control-plaintext.form-control,
  .input-group-lg > .input-group-prepend > .form-control-plaintext.input-group-text,
  .input-group-lg > .input-group-append > .form-control-plaintext.input-group-text,
  .input-group-lg > .input-group-prepend > .form-control-plaintext.btn,
  .input-group-lg > .input-group-append > .form-control-plaintext.btn {
    padding-right: 0;
    padding-left: 0; }

.form-control-sm, .input-group-sm > .form-control,
.input-group-sm > .input-group-prepend > .input-group-text,
.input-group-sm > .input-group-append > .input-group-text,
.input-group-sm > .input-group-prepend > .btn,
.input-group-sm > .input-group-append > .btn {
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border-radius: 0.2rem; }

select.form-control-sm:not([size]):not([multiple]), .input-group-sm > select.form-control:not([size]):not([multiple]),
.input-group-sm > .input-group-prepend > select.input-group-text:not([size]):not([multiple]),
.input-group-sm > .input-group-append > select.input-group-text:not([size]):not([multiple]),
.input-group-sm > .input-group-prepend > select.btn:not([size]):not([multiple]),
.input-group-sm > .input-group-append > select.btn:not([size]):not([multiple]) {
  height: calc(1.8125rem + 2px); }

.form-control-lg, .input-group-lg > .form-control,
.input-group-lg > .input-group-prepend > .input-group-text,
.input-group-lg > .input-group-append > .input-group-text,
.input-group-lg > .input-group-prepend > .btn,
.input-group-lg > .input-group-append > .btn {
  padding: 0.5rem 1rem;
  font-size: 1.25rem;
  line-height: 1.5;
  border-radius: 0.3rem; }

select.form-control-lg:not([size]):not([multiple]), .input-group-lg > select.form-control:not([size]):not([multiple]),
.input-group-lg > .input-group-prepend > select.input-group-text:not([size]):not([multiple]),
.input-group-lg > .input-group-append > select.input-group-text:not([size]):not([multiple]),
.input-group-lg > .input-group-prepend > select.btn:not([size]):not([multiple]),
.input-group-lg > .input-group-append > select.btn:not([size]):not([multiple]) {
  height: calc(2.875rem + 2px); } */
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
                        <div class="login-inner-form">
                            <div class="card">
                                <div class="card-header bg-white text-center">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                                    </a>
                                    <h3>Sign in</h3>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('login') }}" method="POST" id="loginForm">
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label class="float-left">Email Address</label>
                                            <input type="email" name="email" value="{{ old('email') }}" id="emailLo"
                                                class="form-control @error('email') invalid @enderror"
                                                placeholder="Email Address" aria-label="Email Address">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="float-left" for="password">Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="passwordLo" class="form-control"
                                                    autocomplete>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="show-password"><i
                                                            class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group form-box checkbox clearfix mb-2">
                                            <div class="form-check checkbox-theme">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>

                                        <div class="feedback" id="feedback"></div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-md btn-warning"
                                                id="loginUser">Login</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-12 col-md-12 row mb-4">
                                    <div class="col-md-12 text-center mb-2">
                                        <span>You can also join as a dealer by <a href="{{ route('dealers.create') }}"
                                                class="text text-warning">clicking here</a></span>
                                    </div><br>

                                    <div class="col-md-6 text-center">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text text-warning">Forgot
                                                Password</a>
                                        @endif
                                    </div>

                                    <div class="col-md-6 text-center">
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="text text-warning">Register</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="login-social border-t mt-1 pt-2 mb-1 text-center">
                                    <p class="mb-2">OR continue with</p>
                                    <a href="{{ route('facebook.login') }}" class="btn-facebook"><i class="fa fa-facebook"
                                            aria-hidden="true"></i>
                                        Facebook</a>
                                    <a href="{{ route('twitter.login') }}" class="btn-twitter"><i class="fa fa-twitter"
                                            aria-hidden="true"></i>
                                        Twitter</a>
                                    <a href="#" class="btn-google"><i class="fa fa-google" aria-hidden="true"></i>
                                        Google</a>
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
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/main/auth.js') }}"></script>
@endsection
