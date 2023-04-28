@extends('layouts.app')

@section('title')
    Register  @parent
@endsection

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            {{-- <div class="breadcrumb-areas">
                <h1>Register</h1>
                <ul class="breadcrumbs">
                <li><a href="/">Home</a></li>
                    <li class="active">Register</li>
                </ul>
            </div> --}}
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Shop checkout start -->
    <div style="margin-bottom: 40em;">
        <div class="container d-flex justify-content-center">
            <div class="card bg-white col-md-6" style="position: absolute; top:13em; margin-bottom: 10em;">
                <div class="card-header bg-white">
                    <h4 class="text text-center">Want to sell now? Register.</h4>
                </div>
                <div class="card-body">
                    <!-- show success message -->
                    @include('partials.alert')

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control"name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <input type="hidden" name="role" id="role" value="dealer">

                            <div class="col-md-6 form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">Alternative Phone</label>
                                <input type="text" class="form-control" name="alt_phone" value="{{ old('phone') }}">
                                @if ($errors->has('alt_phone'))
                                    <span class="text-danger">{{ $errors->first('alt_phone') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>

                        </div>
                        <br>

                        <div class="form-group text-center">
                            <button class="btn btn-sm bg-success" type="submit">Sign Up</button>
                        </div>
                        <br>
                    </form>
                    <p><span class="bolder"> Already have an Account? <a href="{{ route('login') }}" class="text-success">
                                Login Here</a></span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop checkout end -->
@endsection
