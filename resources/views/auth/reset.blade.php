@extends('layouts.app')

@section('title')
    Password reset @parent
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
    <div style="margin-bottom: 15em;">
        <div class="container d-flex justify-content-center">
            <div class="card bg-white" style="width: 43em; position: absolute; top:13em; margin-bottom: 10em;">
                <div class="card-header bg-white">
                    <h4>Enter new password</h4>
                </div>
                <div class="card-body">
                    <!-- show success message -->
                    @include('partials.alert')

                    <form action="{{ route('reset.password') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="email" value="{{ $reset->email }}">
                            <input type="hidden" name="_token" value="{{ $reset->token }}">

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

                            <div class="form-group mt-2">
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

                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-sm bg-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('footer_scripts')
    <script src="{{ asset('js/auth.js') }}"></script>
@endsection
@endsection
