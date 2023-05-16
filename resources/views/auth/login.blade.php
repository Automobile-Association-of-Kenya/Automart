@extends('layouts.guest')
@section('title')
    Login @parent
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

@section('content')
    <div class="col-lg-5 col-md-12 form-section">
        <div class="login-inner-form">
            <div class="card">
                <div class="card-header bg-white">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </a>
                    <h3>Sign in</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST" id="loginForm">
                        <div class="feedback" id="feedback"></div>

                        @csrf
                        <div class="form-group">
                            <label class="float-left">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="emailLo"
                                class="form-control @error('email') invalid @enderror" placeholder="Email Address"
                                aria-label="Email Address">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="float-left" for="password">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="passwordLo" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="show-password"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-box checkbox clearfix">
                            <div class="form-check checkbox-theme">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-md btn-warning btn-round" id="loginUser">Login</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-12 col-md-12 row mb-4">
                    <div class="col-md-6">
                        <a href="{{ url('auth/facebook') }}" class="btn btn-primary">Login with Facebook</a>
                    </div>

                    <div class="col-md-6">
                        <a href="{{ url('auth/google') }}" class="btn btn-danger">Login with Google</a>
                    </div>
                </div>
                <div class="col-md-12 col-md-12 row mb-4">
                    <div class="col-md-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text text-warning">Forgot Password</a>
                        @endif
                    </div>

                    <div class="col-md-6">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text text-warning">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{ asset('js/main/auth.js') }}"></script>
@endsection
