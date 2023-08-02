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

        .form-control {
            border: 1px solid #fed945;
        }
    </style>
@endsection

@section('main')
    <div class="contact-section">
        <div class="container mt-2 mb-4"><br>
            <br>
            <br>
            <br>
            <br>
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-4" id="login-section">
                            <div class="card-header bg-white text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/logo.png') }}" alt="logo"
                                        style="width: 100px; height: 80px;">
                                </a>
                                <h3>Sign in</h3>
                            </div>

                            <div class="card-body">
                                @include('layouts.alert')
                                <form action="{{ route('login') }}" id="loginForm" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="loginEmail"
                                            class="form-control form-control-md @error('email') @enderror" required value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="float-left" for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="loginPassword" class="form-control @error('email') @enderror" required value="{{ old('password') }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="show-password"><i
                                                        class="fa fa-eye"></i></span>
                                            </div>
                                            @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 form-checkbox mt-1">
                                        <input type="checkbox"> Remember Me
                                    </div>

                                    <div class="form-group text-center mt-1">
                                        <button type="submit" class="btn btn-success">Login</button>
                                    </div>
                                </form>
                            </div>

                            <div class="sign-up text-center mt-2">
                                <p class="m-0">Do not have an account? <a href="#" id="signupToggle"
                                        class="text-primary">Sign Up </a></p>
                                <p>OR</p>
                                <p><span><a href="#" class="text-primary" id="forgetPasswordToggle">Forgot
                                            password?</a></span></p>
                            </div>

                        </div>

                        <div class="card p-4" id="emailpassword-reset" style="display: none;">
                            <div class="card-header bg-white text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/logo.png') }}" alt="logo"
                                        style="width: 100px; height: 80px;">
                                </a>
                                <h3>Reset Password</h3>
                            </div>

                            <div class="card-body">
                                @include('layouts.alert')
                                <form action="{{ route('password.email') }}" id="passwordResetForm" method="POST">
                                    @csrf
                                    <div id="forgotauthfeedback"></div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="resetEmail"
                                            class="form-control form-control-md" required>
                                    </div>

                                    <div class="form-group text-center mt-2">
                                        <button type="submit" class="btn btn-success" id="submitEmail">Send email password
                                            reset
                                            link</button>
                                    </div>
                                </form>

                                <div class="sign-up">
                                    <p class="m-0">Already have an account? <a href="#" id="loginToggle1"
                                            class="text-primary">Login</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="card p-4" id="register-section" style="display: none;">
                            <div class="card-header bg-white text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/logo.png') }}" alt="logo"
                                        style="width: 100px; height: 80px;">
                                </a>
                                <h3>Create Account</h3>
                            </div>

                            <div class="card-body">
                                @include('layouts.alert')
                                <form action="{{ route('register') }}" id="registerForm" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="registerName"
                                            class="form-control form-control-md ">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="registerEmail"
                                            class="form-control form-control-md ">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="registerPhone"
                                            class="form-control form-control-md ">
                                    </div>

                                    <input type="hidden" name="role" id="registerRole" value="user">
                                    <div class="form-group">
                                        <label class="float-left">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="registerPassword"
                                                class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text show-passwordRe"><i
                                                        class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="float-left">Password Confirmation</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation"
                                                id="registerPasswordConfirmation" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text show-passwordRe"><i
                                                        class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group mb-0 form-checkbox mt-1">
                                        <input type="checkbox" required> <small>By clicking this, you are agree to to<a
                                                href="{{ route('terms') }}" class="text-success"> <strong>our terms of
                                                    use</strong></a> and <a href="{{ route('privacy') }}"
                                                class="text-success"><strong>privacy
                                                    policy</strong></a></small>
                                    </div>

                                    <div class="form-group text-center mt-2">
                                        <button type="submit" class="btn btn-success"
                                            id="registerSubmit">Register</button>
                                    </div>
                                </form>
                            </div>

                            <div class="sign-up">
                                <h5 class="m-0">Already have an account? &nbsp;<a href="#" id="loginToggle"
                                        class="text-primary">Login</a></h5>

                                {{-- <h5 class="m-0">Partner with us? &nbsp;<a href="#" id="partnerToggle"
                                        class="text-success">Click here</a></h5> --}}
                            </div>
                        </div>

                        <div class="card p-4" id="partner-section" style="display: none;">
                            <div class="card-header bg-white text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/logo.png') }}" alt="logo"
                                        style="width: 100px; height: 80px;">
                                </a>
                                <h3>Create Partner Account</h3>
                            </div>

                            <div class="card-body">
                                @include('layouts.alert')
                                <form action="{{ route('partner.store') }}" id="partnerForm" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="partnertype">Type</label>
                                        <select name="partnertype" id="partnertype" class="form-select">
                                            <option value="">Select One</option>
                                            <option value="Bank">Bank</option>
                                            <option value="Micro-finance">Micro-finance</option>
                                            <option value="Sacco">Sacco</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="partnername">Company Name</label>
                                        <input type="text" name="partnername" id="partnerName"
                                            class="form-control form-control-md">
                                    </div>

                                    <div class="form-group">
                                        <label for="partnername"> Company Address</label>
                                        <input type="text" name="partneraddress" id="partnerAddress"
                                            class="form-control form-control-md ">
                                    </div>

                                    <div class="form-group">
                                        <label for="partneremail">Company Email</label>
                                        <input type="email" name="partneremail" id="partnerEmail"
                                            class="form-control form-control-md ">
                                    </div>

                                    <div class="form-group">
                                        <label for="partnerphone">Company Phone</label>
                                        <input type="text" name="partnerphone" id="partnerPhone"
                                            class="form-control form-control-md ">
                                    </div>

                                    <div class="col-lg-12">
                                        <hr>
                                        <h5><strong>Contact Person Details</strong></h5>
                                        <hr>
                                    </div>

                                    <div class="form-group">
                                        <label for="contactname">Name</label>
                                        <input type="text" name="contactname" id="contactName"
                                            class="form-control form-control-md ">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactemail">Email</label>
                                        <input type="email" name="contactemail" id="contactEmail"
                                            class="form-control form-control-md ">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactphone">Phone</label>
                                        <input type="text" name="contactphone" id="contactPhone"
                                            class="form-control form-control-md ">
                                    </div>

                                    <input type="hidden" name="role" id="partnerRole" value="partner">

                                    <div class="form-group">
                                        <label class="float-left">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="partnerPassword"
                                                class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text show-password-patner"><i
                                                        class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 form-checkbox mt-1">
                                        <input type="checkbox" required> <small>By clicking this, you are agree to to<a
                                                href="{{ route('terms') }}" class="text-success"> <strong>our terms of
                                                    use</strong></a> and <a href="{{ route('privacy') }}"
                                                class="text-success"><strong>privacy
                                                    policy</strong></a></small>
                                    </div>

                                    <div class="form-group text-center mt-2">
                                        <button type="submit" class="btn btn-success">Register</button>
                                    </div>
                                </form>
                            </div>

                            <div class="sign-up">
                                <p class="m-0">Already have an account? <a href="#" id="partnerLoginToggle"
                                        class="text-primary">Login</a></p>
                            </div>
                        </div>

                        <div id="authfeedback"></div>

                        <div class="login-social border-t mt-1 pt-2 mb-1 text-center">
                            <a href="{{ route('google.login') }}" class="btn-google"><img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="">
                                <span style="color: blue;">Sign in with gmail</span></a>
                            {{-- <a href="{{ route('facebook.login') }}" class="btn-facebook"><i class="fa fa-facebook"
                                    aria-hidden="true"></i>
                                Facebook</a> --}}
                        </div>
                    </div>

                    <div class="col-md-6" style="padding: 1em;">
                        <div class="text-center" style="background: #F7F9F9; border-radius: 15px;padding:2.5em;">
                            <img src="{{ asset('images/img.png') }}" alt="">
                            <p class="mt-2">We provide secure and trusted platform that helps you maximise on your
                                potential by giving you a pool of customers to market to. Get started by joining this pool
                                of customers, dealers and partner and get cutting edge advertising experience. </p>
                        </div>
                        <div class="alert-info mt-2" style="border-radius: 15px;padding:2.5em;">
                            <h5 class="text-center mb-4">When You Sign Up/In </h5>
                            <p><i class="fa fa-check-circle"></i>&nbsp; Access to thousands of vehicles you can choose
                                from.</p>
                            <p><i class="fa fa-check-circle"></i>&nbsp; You can enquire about vehcles at your convenience.
                            </p>
                            <p><i class="fa fa-check-circle"></i>&nbsp; Advetise your vehicles with ease and access
                                millions of potential customers country wide.</p>
                            <p><i class="fa fa-check-circle"></i>&nbsp; Connect with our partners on this platform and
                                facilitate easy loans and financial support to your customers.</p>
                            <p><i class="fa fa-check-circle"></i>&nbsp; Easy communication from potential customers on your
                                advertisements.</p>
                            <p><i class="fa fa-check-circle"></i>&nbsp; Make money on this platform by advertising your
                                vehicles on this platform and access exclusive local and international customers.</p>
                            <h6 class="mt-2 mb-1"><strong>Partners</strong></h6>
                            <p><i class="fa fa-check-circle"></i>&nbsp; Get access to thousands of customers for your loan
                                products.</p>
                            <p><i class="fa fa-check-circle"></i>&nbsp; Receive applications for loans directly on your
                                dashboard and process as necessary.</p>
                            <p><i class="fa fa-check-circle"></i>&nbsp; Make profit by collaborating with us to provide our
                                customers with loan products for vehicles to our customers to facilitate their purchases.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/main/auths.js') }}"></script>
@endsection
