{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.guest')
@section('title')
    Password Reset Link @parent
@endsection

@section('header_styles')
    <style>
        #password-input {
            padding-right: 30px;
            /* Add space for the "Show Password" icon */
        }

        #show-password-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="col-lg-5 col-md-12 form-section">
        <div class="login-inner-form">
            <div class="card">
                <div class="card-header bg-white">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </a>
                    <h3>Enter Your Email for password reset </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.email') }}" method="POST" id="passwordResetLinkForm">
                        <div class="feedback" id="feedback"></div>

                        @csrf

                        <div class="form-group">
                            <label class="float-left">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="emailForget"
                                class="form-control @error('email') invalid @enderror" placeholder="Email Address"
                                aria-label="Email Address">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-md btn-warning btn-round" id="submitEmail">Send Link</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-12 col-md-12 row mb-4">

                    <div class="col-md-6">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text text-warning">Login</a>
                        @endif
                    </div>

                    <div class="col-md-6">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text text-warning">Register</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{ asset('js/main/auth.js') }}"></script>
@endsection
