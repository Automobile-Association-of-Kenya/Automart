@extends('layouts.guest')
@section('title')
    Login @parent
@endsection

@section('content')
    <div class="col-lg-5 col-md-12 form-section">
        <div class="login-inner-form">

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
            {{-- <div class="card">
                <div class="card-header bg-white">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </a>
                    <h3>Sign in</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-primary-button>
                                {{ __('Resend Verification Email') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') invalid @enderror" placeholder="Email Address"
                                aria-label="Email Address">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off"
                                placeholder="Password" aria-label="Password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-box checkbox clearfix">
                            <div class="form-check checkbox-theme">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-md btn-warning">Login</button>
                        </div>

                    </form>
                </div>
                <div class="card-footer bg-white">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot Password</a>
                    @endif
                </div>
            </div> --}}
        </div>
    </div>
@endsection
