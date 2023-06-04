@extends('layouts.guest')
@section('title')
    Password reset @parent
@endsection

@section('main')
    <div class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-12 bg-img">
                    <div class="informeson">
                        <div class="typing">
                            <h1 class="text-white">Welcome To AutoMart</h1>
                        </div>
                        <p>At our platform, we bring together a vast selection of high-quality cars and a wide range of
                            accessories from trusted manufacturers and sellers. From sleek sedans to rugged SUVs, we offer a
                            diverse inventory of vehicles to suit every style and preference. </p>
                        <div class="social-list">
                            <div class="buttons">
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                <a href="#" class="dribbble-bg"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 form-section">
                    <div class="login-inner-form">
                        <div class="card">
                            <div class="card-header bg-white text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                                </a>
                                <h3>Reset Password</h3>
                            </div>
                            <div class="card-body">
                                <div class="feedback" id="feedback"></div>
                                <form action="{{ route('password.store') }}" method="POST" id="passwordSetForm">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <div class="form-group">
                                        <label class="float-left" for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="passwordRe" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text" class="show-passwordReset"><i
                                                        class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="float-left" for="password_confirmation">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="passwordConfirmationRe"
                                                class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text" class="show-passwordReset"><i
                                                        class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>

                                    <div class="">
                                        <button type="submit" class="btn btn-md btn-warning" id="submitReset">Reset
                                            Password</button>
                                    </div>

                                </form>
                            </div>
                            <div class="card-footer bg-white">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgot Password</a>
                                @endif
                            </div>
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
