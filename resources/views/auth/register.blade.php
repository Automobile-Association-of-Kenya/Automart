
@extends('layouts.new')

@section('title')
Register : @parent
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
    <div class="" style="margin-bottom: 15em;">
        <div class="container d-flex justify-content-center">
            <div class="card bg-white" style="width: 43em; position: absolute; top:13em; margin-bottom: 10em;">
                <div class="card-header bg-white">
                    <h4>Want to sell now? Register.</h4>
                </div>
                <div class="card-body">
                    <!-- show success message -->
                    @include('partials.alert')

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Name"aria-label="First Name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Email" aria-label="Last Name" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Phone Number" aria-label="Phone Number" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" placeholder="Alternative Phone" aria-label="Alternative Phone" name="alt_phone" value="{{ old('phone') }}">
                                    @if ($errors->has('alt_phone'))
                                        <span class="text-danger">{{ $errors->first('alt_phone') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" name="password_confirmation">
                                 @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                            </div>

                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-sm bg-success" type="submit">Sign Up</button>
                        </div>
                    </form>
                    <p><span class="bolder"> Already have an Account? <a href="{{ route('login') }}" class="text-success"> Login Here</a></span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop checkout end -->
@endsection
