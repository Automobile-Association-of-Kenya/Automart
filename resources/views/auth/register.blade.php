@extends('layouts.app')

@section('title')
    Register @parent
@endsection

@section('header_styles')
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('main')
    <div class="contact-section">
        <div class="container"><br>
            <br>
            <br>
            <br>
            <div class="card">
                <div class="row">
                    <div class="col-lg-7 col-md-12" style="margin: auto;padding:4em;">
                        <div>
                            <div class="">
                                <h1 style="color:black;">AA AutoMart</h1>
                            </div>
                            <p>At our platform, we bring together a vast selection of high-quality cars and a wide range of
                                accessories from trusted manufacturers and sellers. From sleek sedans to rugged SUVs, we
                                offer a
                                diverse inventory of vehicles to suit every style and preference. </p>
                            <p><strong>When you sign up as buyer you access</strong></p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;Access to unlimited vehicles
                                on offer.</p>
                            <p><span class="fa fa-check-circle fa-1x text-success"></span>&nbsp;Notifications on new deals
                                and vehicles that might interest you</p>
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
                                    <P>Create Account</P>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('register') }}" method="POST" id="registerForm">
                                        @csrf
                                        <div id="registerfeedback"></div>
                                        <div class="col-md-12">
                                            <label class="float-left">Full Name</label>
                                            <input type="text" name="name" id="nameRe" value="{{ old('name') }}"
                                                class="form-control @error('name') invalid @enderror">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <label class="float-left">Phone</label>
                                            <input type="text" name="phone" id="phoneRe" value="{{ old('phone') }}"
                                                class="form-control @error('phone') invalid @enderror">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <label class="float-left">Email Address</label>
                                            <input type="email" name="email" id="emailRe" value="{{ old('email') }}"
                                                class="form-control @error('email') invalid @enderror">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <label class="float-left">Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="passwordRe" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text show-passwordRe"><i
                                                            class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <label class="float-left">Password Confirmation</label>
                                            <div class="input-group">
                                                <input type="password" name="password_confirmation"
                                                    id="passwordConfirmationRe" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text show-passwordRe"><i
                                                            class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <span
                                                    class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>

                                        <input type="hidden" name="role" id="roleRe" value="buyer">
                                        <div class="col-md-12 text-left">
                                            <label class="">
                                                <input type="checkbox" checked name="" id="termsOfService">I agree to
                                                the<a href="#" class="terms">terms of service</a></label>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-md btn-warning btn-round"
                                                id="registerSubmit">Register</button>
                                        </div>

                                    </form>
                                </div>

                                <div class="col-md-12 row mb-2">
                                    <div class="col-md-12 text-center mb-2">
                                        <span>You can also join as a dealer by <a href="{{ route('dealers.create') }}"
                                                class="text text-warning">clicking here</a></span>
                                    </div><br>
                                    <div class="col-md-6 text-center">
                                        @if (Route::has('login'))
                                            <a href="{{ route('login') }}" class="text text-warning">Login</a>
                                        @endif
                                    </div>

                                    <div class="col-md-6 text-center">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text text-warning">Forgot
                                                Password</a>
                                        @endif
                                    </div>

                                </div>


                                <div class="login-social border-t mt-1 pt-2 mb-1 text-center">
                                    <p class="mb-2">OR continue with</p>
                                    <a href="{{ route('facebook.login') }}" class="btn-facebook"><i
                                            class="fa fa-facebook" aria-hidden="true"></i>
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
