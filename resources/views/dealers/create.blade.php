@extends('layouts.guest')

@section('title')
    Register @parent
@endsection

@section('content')
    <div class="col-lg-5 col-md-12 form-section">
        <div class="login-inner-form">
            <div class="card">
                <div class="card-header bg-white">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </a>
                    <P>Create Account</P>
                </div>
                <div class="card-body">

                    <form action="{{ route('register') }}" method="POST" id="registerForm">
                        @csrf
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
                                    <span class="input-group-text show-passwordRe"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label class="float-left">Password Confirmation</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="passwordConfirmationRe" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text show-passwordRe"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <input type="hidden" name="role" id="roleRe" value="buyer">
                        <div class="col-md-12 text-left">
                            <label class="">
                                <input type="checkbox" checked  name="" id="termsOfService">I agree to the<a
                                    href="#" class="terms">terms of service</a></label>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-md btn-warning btn-round" id="registerSubmit">Register</button>
                        </div>
                    </form>
                </div>
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


        </div>
    </div>
@endsection
@section('footer_scripts')
<script src="{{ asset('js/main/auth.js') }}"></script>
@endsection

