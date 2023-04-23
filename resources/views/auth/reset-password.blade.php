@extends('layouts.guest')
@section('title')
    Password reset @parent
@endsection

@section('content')
    <div class="col-lg-5 col-md-12 form-section">
        <div class="login-inner-form">
            <div class="card">
                <div class="card-header bg-white">
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
                                    <span class="input-group-text" class="show-passwordReset"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="float-left" for="password_confirmation">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="passwordConfirmationRe" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text" class="show-passwordReset"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-md btn-warning" id="submitReset">Reset Password</button>
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
@endsection

@section('footer_scripts')
    <script src="{{ asset('js/main/auth.js') }}"></script>
@endsection
