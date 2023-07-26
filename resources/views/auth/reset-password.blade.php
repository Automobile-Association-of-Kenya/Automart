@extends('layouts.guest')
@section('title')
    Password reset @parent
@endsection

@section('main')
    <div class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-12 bg-img" style="text-align: center;margin:auto;">
                    <div class="informeson">
                        <div class="typing">
                            <h1 class="text-success">AutoMart AA Kenya</h1>
                        </div>
                        <p class="text-success">At our platform, we bring together a vast selection of high-quality cars and a wide range of
                            accessories from trusted manufacturers and sellers. From sleek sedans to rugged SUVs, we offer a
                            diverse inventory of vehicles to suit every style and preference. </p>
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
                                @include('layouts.alert')
                                <div class="feedback" id="feedback"></div>
                                <form action="{{ route('password.store') }}" method="POST" id="passwordSetForm">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <input type="hidden" name="email" value="{{ $request->email }}">

                                    <div class="form-group">
                                        <label class="float-left" for="passwordReset">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="passwordReset" class="form-control">
                                            <div class="input-group-append" autocomplete>
                                                <span class="input-group-text show-passwordReset"><i
                                                        class="fa fa-eye"></i></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">

                                        <label class="float-left" for="passwordConfirmationReset">Confirm Password</label>

                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" id="passwordConfirmationReset"
                                                class="form-control" autocomplete>
                                            <div class="input-group-append">
                                                <span class="input-group-text show-passwordReset"><i
                                                        class="fa fa-eye"></i></span>
                                            </div>
                                        </div>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>

                                    <div class="">
                                        <button type="submit" class="btn btn-md btn-success" id="submitReset">Reset
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
    <script src="{{ asset('js/main/auths.js') }}"></script>
@endsection
