@extends('layouts.app')

@section('title')
    Login
    @parent
@endsection

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            {{-- <div class="breadcrumb-areas">
                <h1>Login</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li class="active">Login</li>
                </ul>
            </div> --}}
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Shop checkout start -->
    <div style="margin-bottom: 30em;">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card bg-white col-md-5" style="position: absolute; top: 10em;">
                    <div class="card-header bg-white">
                        <h3><b>Login</b></h3>
                    </div>
                    <div class="card-body">

                        @include('partials.alert')

                        <form action="{{ route('userlogin') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control form-control-md" placeholder="Email"
                                        aria-label="Email" name="email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control form-control-md" placeholder="Password"
                                        aria-label="Password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <br>

                            <div class="col-md-12 text-center form-group">
                                <button class="btn btn-sm bg-success" type="submit">Login</button>
                            </div>
                        </form>
                        <div class="d-flex justify-space-between">
                            <div class="col-md-6 text-left"><a href="{{ route('seller.create') }}" class="text-success"> Register
                                    Here</a></div>

                            <div class="col-md-6  text-right"><a href="{{ route('forget.password') }}" class="text-success">
                                    Forgot Password</a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop checkout end -->
@endsection
