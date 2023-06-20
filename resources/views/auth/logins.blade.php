@extends('layouts.app')

@section('main')
    <div class="contact-section">
        <div class="container"><br>
            <br>
            <br>
            <br>
            <div class="row justify-content-center pt-10 pb-10">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="authfeedback"></div>




                                <div class="login-content p-4" id="login-section">
                                    <div class="login-title section-border text-center">
                                        <h3 class="pink">Login</h3>
                                    </div>
                                    <div class="login-form">

                                        <form action="{{ route('login') }}" id="loginForm" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="loginEmail"
                                                    class="form-control form-control-md" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="float-left" for="password">Password</label>
                                                <div class="input-group">
                                                    <input type="password" name="password" id="loginPassword"
                                                        class="form-control">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="show-password"><i
                                                                class="fa fa-eye"></i></span>
                                                    </div>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group mb-0 form-checkbox mt-1">
                                                <input type="checkbox"> Remember Me
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="submit" class="nir-btn">Login</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="sign-up text-center">
                                        <p class="m-0">Do not have an account? <a href="#" id="signupToggle"
                                                class="text-primary">Sign Up </a></p>
                                        <p>OR</p>
                                        <p><span><a href="#" class="text-primary" id="forgetPasswordToggle">Forgot
                                                    password?</a></span></p>
                                    </div>

                                </div>

                                <div class="login-content p-4" id="emailpassword-reset" style="display: none;">
                                    <div class="login-title section-border text-center">
                                        <h3 class="pink">Reset password</h3>
                                    </div>
                                    <div class="login-form">

                                        <form action="{{ route('password.email') }}" id="passwordResetForm" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="loginEmail"
                                                    class="form-control form-control-md" required>
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="submit" class="nir-btn" id="submitEmail">Send email password reset
                                                    link</button>
                                            </div>
                                        </form>

                                        <div class="sign-up">
                                            <p class="m-0">Already have an account? <a href="#" id="loginToggle1"
                                                    class="text-primary">Login</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="login-content p-4" id="register-section" style="display: none;">
                                    <div class="login-title section-border text-center">
                                        <h3 class="pink mb-1">Register</h3>
                                        <p>Access thousands of homes, traavel destinations, hotels and easy booking for many
                                            hotels all around the world!</p>
                                    </div>
                                    <div class="login-form">
                                        <form action="{{ route('register') }}" id="registerForm" method="POST">
                                            @csrf

                                            <div class="col-md-12">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="registerName"
                                                    class="form-control form-control-md border-primary">
                                            </div>

                                            <div class="col-md-12">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="registerEmail"
                                                    class="form-control form-control-md border-primary">
                                            </div>

                                            <div class="col-md-12">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" id="registerPhone"
                                                    class="form-control form-control-md border-primary">
                                            </div>

                                            <input type="hidden" name="role" id="registerRole" value="user">
                                            <div class="col-md-12">
                                                <label class="float-left">Password</label>
                                                <div class="input-group">
                                                    <input type="password" name="password" id="registerPassword"
                                                        class="form-control">
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
                                                        id="registerPasswordConfirmation" class="form-control">
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
                                            {{-- <div class="col-md-12">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" id="registerPassword"
                                                    class="form-control form-control-md border-primary">
                                            </div> --}}

                                            <div class="col-md-12 mb-0 form-checkbox mt-1">
                                                <input type="checkbox" required> By clicking this, you are agree to to<a
                                                    href="#" class=""> our terms of use</a> and <a
                                                    href="#" class="">privacy
                                                    policy</a> including the use of cookies
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="submit" class="nir-btn"
                                                    id="registerSubmit">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="sign-up">
                                        <p class="m-0">Already have an account? <a href="#" id="loginToggle"
                                                class="text-primary">Login</a></p>
                                    </div>
                                </div>

                                <div class="login-social border-t mt-1 pt-2 mb-1 text-center">
                                    <p class="mb-2">OR continue with</p>
                                    <a href="{{ route('facebook.login') }}" class="btn-facebook"><i
                                            class="fab fa-facebook" aria-hidden="true"></i>
                                        Facebook</a>
                                    <a href="{{ route('twitter.login') }}" class="btn-twitter"><i class="fab fa-twitter"
                                            aria-hidden="true"></i>
                                        Twitter</a>
                                    <a href="#" class="btn-google"><i class="fab fa-google"
                                            aria-hidden="true"></i>
                                        Google</a>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 bg-grey pb-3">
                                            <h4 class="mt-3 mb-3">Sign in to to unlock more benefits!</h4>
                                            <p><i class="fa fa-check text-success"></i>&nbsp;&nbsp;Best Price Guarantee on
                                                bookings</p>
                                            <p><i class="fa fa-check text-success"></i>&nbsp;&nbsp;Access our best Insider
                                                and VIP deals</p>
                                            <p><i class="fa fa-check text-success"></i>&nbsp;&nbsp;Earn AgodaCash to save
                                                even more</p>
                                            <p><i class="fa fa-check text-success"></i>&nbsp;&nbsp;Collect bookings towards
                                                your next VIP status</p>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="{{ asset('') }}" alt="">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@section('footer_scripts')
    <script src="{{ asset('js/auths.js') }}"></script>
@endsection
@endsection
