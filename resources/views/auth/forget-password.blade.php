@extends('layouts.new')

@section('title')
    Login
    @parent
@endsection

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                {{-- <h1>Reset</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li class="active">Reset Password Link</li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Shop checkout start -->
    <div class="shop-checkout content-area-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card bg-white" style="width: 40em; position: absolute; top: 10em;">
                    <div class="card-header bg-white">
                        <h5><b>Enter email we will send you a link to reset your pasword</b></b></h5>
                    </div>
                    <div class="card-body">

                        @include('partials.alert')

                        <form action="{{ route('forget') }}" method="POST">

                          @csrf

                          <div class="form-group">

                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                              <div class="input-group">

                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>

                                  @if ($errors->has('email'))

                                      <span class="text-danger">{{ $errors->first('email') }}</span>

                                  @endif

                              </div>

                          </div>

                          <div class="form-group text-center">

                              <button type="submit" class="btn btn-success">

                                  Send Password Reset Link

                              </button>

                          </div>

                      </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop checkout end -->
@endsection
