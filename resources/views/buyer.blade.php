@extends('layouts.dashboardb')
@section('content')
    <!-- show success message -->
    @if (session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ session('successMsg') }}
        </div>
    @endif
    <!-- show error messages -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <style>
        .show-when-target {
            visibility: hidden;
        }

        .show-when-target:target {
            visibility: visible;
        }

        .show-when-target:target {

            position: absolute;
            max-width: 94%;
            line-height: 2em;
            font-size: 1em;
            font-weight: bold;

            color: #FFF;
            border-radius: .4em;
            background: rgba(0, 0, 0, .5);
            ;
        }

        .show-when-target {
            cursor: pointer
        }

        .show-when-target {
            display: inline-block;
            max-width: 94%;
            line-height: 2em;
            font-size: 1em;
            font-weight: bold;

            margin: auto;
            color: #FFF;
            border-radius: .4em;
            -webkit-box-shadow: hsl(75, 80%, 15%) 0 .38em .08em;
            box-shadow: hsl(75, 80%, 15%) 0 .38em .08em;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, .3);
            background: #749A02;
        }
    </style>
    <div class="row" style="padding-right:10px">

        <!-- user profile start -->
        <div id="5" class="show-when-target:target">
            <div class="row">
                <div class="alert alert-success" role="alert">
                    Welcome to Your Profile: {{ $user->name }},
                </div>
                <div class="col-md-2">
                    <div class="col-md-12">
                        <a href="#5"><button type="submit" class="btn btn-primary btn-block">Dashboard</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="#0"><button type="submit" class="btn btn-primary btn-block">Liked</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="#1"><button type="submit" class="btn btn-primary btn-block">Saved</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ route('logout') }}"><button type="submit"
                                class="btn btn-danger btn-block">Logout</button></a>
                    </div>
                    <br>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4" style="padding-bottom:20px; color:#000;">
                            <div class="card">
                                <img src="{{ url('public/images/bg/user.jpg') }}" class="card-img-top"
                                    alt="Fissure in Sandstone" />
                                <div class="card-body">
                                    <h5 class="card-title"><b>User Details</b></h5>
                                    <p class="card-text"><b>Buyer Name:</b> {{ $user->name }}</p>
                                    <p class="card-text"><b>Email:</b> {{ $user->email }}</p>
                                    <a href="#!" class="btn btn-primary">Update</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" style="color:#000;">
                            <div class="card text-center">
                                <div class="card-header">Tips to Get Best Deals On Automart</div>
                                <div class="card-body">
                                    <h5 class="card-title"> Keep Items on Your Wish/Like List</h5>
                                    <p class="card-text">When you add a product to your wish list or online shopping cart,
                                        it&apos;s clear you&apos;re interested. If you act like you&apos;re going to buy
                                        something and
                                        then back out just before you make your purchase, there&apos;s a chance you&apos;ll
                                        get an
                                        email with a promo code or a &apos;price lowered&apos; notification to encourage you
                                        to go back and follow through.</p>
                                    <h5 class="card-title">Get Social</h5>
                                    <p class="card-text">Once you get car dealer contacts call and follow their socials.
                                        Many Car Dealers will announce special flash sales for their social media followers,
                                        and some even offer free shipping codes. If you really love a certain shop or brand,
                                        follow them on social media and take advantage of being in the loop. But tread
                                        carefully here.
                                        Sometimes, following your favorites on social media can tempt you with major impulse
                                        buys, so look out!</p>
                                </div>
                            </div>
                            <div class="container" style="padding-bottom:20px;padding-top:30px;">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-body">Liked</div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="card">
                                            <div class="card-body">Saved</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="w-100 mt-5">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: #CBBC27; border-radius: 10px;">
                    © {{now()->year}} Copyright:
                    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>

        <!-- user profile end -->


    @endsection
