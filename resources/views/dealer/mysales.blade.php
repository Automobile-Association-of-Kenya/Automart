@extends('layouts.dashboard')
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

    @php
        $user = session('user');
    @endphp

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

        .images-preview-div img {
            padding: 0px;
            max-width: 200px;
            padding: 1% !important;
        }

        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            z-index: 100;
        }
    </style>
    @if (session('loader'))
        <div id="loading">
            <img id="loading-image" src="{{ asset('loader.gif') }}" alt="Loading..." />
        </div>
    @endif
    <div class="row" style="padding-right:10px">

        <!-- user profile start -->
        <div id="5" class="show-when-target:target">
            <div class="row" style="padding-bottom: 0px;">
                <div class="alert alert-success" role="alert">
                    All sold vehicles will be posted under Firstname: {{ $user->name }}, Email: {{ $user->email }},
                    Phone: {{ $user->number }}
                </div>
                <div class="col-md-2 mt-5 pt-5">
                    <!-- sidebar -->
                    <div class="col-md-12">
                        <a href="{{route('dealer.home')}}"> <button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-home"></i> Home</button></a>
                    </div>
                    </br>

                    <div class="col-md-12">
                        <a href="{{route('dealer.mycars')}}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-car"></i> My Cars</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="{{route('dealer.subscriptions')}}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-credit-card"></i> Subscriptions</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="{{route('dealer.mysales')}}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-money-bill"></i> My Sale</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="{{route('dealer.addcar')}}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-plus"></i> Add Car</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="{{ route('logout') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-sign-out-alt"></i> Logout</button></a>
                    </div>
                    </br>
                </div>
                <div class="col-md-10 mt-5 pt-5" style="color:#000" >
                    Hello
                    </br>
                    </br>
                    </br>
                    </br>
                    We'll keep this updated.
                </div>
            </div>
            <footer class="mt-5 w-100 pt-5">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: #CBBC27 ; border-radius: 10px;">
                    © {{ now()->year }} Copyright:
                    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>

        <!-- user profile end -->

        <!-- all cars tab start -->
        <div id="0" class="show-when-target w-100" style="background-color : #CBBC27 !Important;">
            <div class="row" style="padding-bottom: 0px;">
                <div class="alert alert-success" role="alert">
                    All cars under Firstname: {{ $user->name }}, Email: {{ $user->email }}, Phone: {{ $user->number }}
                </div>
                <div class="col-md-2">
                    <div class="col-md-12">
                        <a href="#5"> <button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-home"></i> Home</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#0"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-car"></i> My Cars</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#1"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-credit-card"></i> Subscriptions</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#2"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-money-bill"></i> My Sales</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#3"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-plus"></i> Add Car</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="{{ route('logout') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-sign-out-alt"></i> Logout</button></a>
                    </div>
                    </br>
                    </br>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <!-- image card 1 line 1 start -->
                        @if (!empty($vehicles) && $vehicles->count())
                            @foreach ($vehicles->all() as $vehicle)
                                <!-- use this for slideshow -->
                                <!-- @foreach (json_decode($vehicle->images, true) as $image)
    -->
                                <!-- <a href="{{ url('public/images/' . json_decode($vehicle->images, true)[0]) }}" class="portfolio-box">
                                                                            <img src="{{ url('public/images/' . json_decode($vehicle->images, true)[0]) }}" class="img-responsive" alt="--">
    @endforeach -->
                                <div class="col-6 col-md-4" style="padding-bottom: 15px;">
                                    <div class="card" style="color: #000">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <img src="{{ url('images/' . json_decode($vehicle->images, true)[0]) }}"
                                                style="" class="img-fluide" width="100%" height="300px" />
                                            <a href="{{ route('details', $vehicle->id) }}">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title">Year of Manufacture: <b>{{ $vehicle->year }}</b></h6>
                                            <h6 class="card-title">Price: <b>Ksh.
                                                    {{ number_format("$vehicle->price", 2) }}</b></h6>
                                            <h6 class="card-title">Make&Model: <b>{{ strtoupper($vehicle->carmake? $vehicle->carmake->car_make_name: '') }}/{{ strtoupper( $vehicle->carmodel ? $vehicle->carmodel->car_model_name:'') }}</b></h6>
                                            <h6 class="card-title">Mileage: <b>{{ number_format("$vehicle->miles", 1) }}
                                                    Kms</b></h6>
                                            <h6 class="card-title">Dealer/Yard: <b>{{ $vehicle->firstname }}</b></h6>
                                            <i class="fas fa-phone fa-1x"></i>&nbsp;{{ $vehicle->phone }}
                                            <i class="fas fa-map-marker-alt fa-1x"></i>&nbsp;{{ $vehicle->county }}
                                            <a href="{{ route('details', $vehicle->id) }}" class="btn btn-primary">More
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-success" role="alert">
                                You have not added any car
                            </div>
                        @endif
                    </div>
                    <div class="pagination" style="color:#fff;">
                        {{ $vehicles->links() }}
                    </div>
                </div>
            </div>
            <footer class="mt-5 w-100 pt-5">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: #CBBC27 ; border-radius: 10px;">
                    © {{ now()->year }} Copyright:
                    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>
        <!-- all cars tab end -->

        <!-- Subscriptions tab start -->
        <div id="1" class="show-when-target" style="background-color : #CBBC27 !Important;">
            <div class="row" style="padding-bottom: 0px;">
                <div class="alert alert-success" role="alert">
                    All Subscriptions made under Firstname: {{ $user->name }}, Email: {{ $user->email }}, Phone:
                    {{ $user->number }}
                </div>
                <div class="col-md-2">
                    <!-- sidebar -->
                    <div class="col-md-12">
                        <a href="#5"> <button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-home"></i> Home</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#0"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-car"></i> My Cars</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#1"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-credit-card"></i> Subscriptions</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#2"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-money-bill"></i> My Sells</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#3"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-plus"></i> Add Car</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="{{ route('logout') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-sign-out-alt"></i> Logout</button></a>
                    </div>
                    </br>
                </div>
                <div class="col-md-10">
                    Hello
                    </br>
                    </br>
                    </br>
                    </br>
                    We'll keep this payments updated.
                </div>
            </div>
            <footer class="mt-5 w-100 pt-5">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: #CBBC27 ; border-radius: 10px;">
                    © {{ now()->year }} Copyright:
                    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                </div>
                <!-- Copyright -->
            </footer>


        </div>
        <!-- Subscriptions tab end -->

        <!-- sold vehicles start -->
        <div id="2" class="show-when-target" style="background-color : #CBBC27 !Important;">
            <div class="row" style="padding-bottom: 0px;">
                <div class="alert alert-success" role="alert">
                    All sold vehicles will be posted under Firstname: {{ $user->name }}, Email: {{ $user->email }},
                    Phone: {{ $user->number }}
                </div>
                <div class="col-md-2">
                    <!-- sidebar -->
                    <div class="col-md-12">
                        <a href="#5"> <button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-home"></i> Home</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#0"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-car"></i> My Cars</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#1"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-credit-card"></i> Subscriptions</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#2"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-money-bill"></i> My Sells</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#3"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-plus"></i> Add Car</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="{{ route('logout') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-sign-out-alt"></i> Logout</button></a>
                    </div>
                    </br>
                </div>
                <div class="col-md-10">
                    Hello
                    </br>
                    </br>
                    </br>
                    </br>
                    We'll keep this updated.
                </div>
            </div>
            <footer class="mt-5 w-100 pt-5">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: #CBBC27 ; border-radius: 10px;">
                    © {{ now()->year }} Copyright:
                    <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>
        <!-- sold vehicles end -->

        <!-- add car start -->
        <div id="3" class="show-when-target" style="background-color : #CBBC27 !Important;">
            <div class="row" style="padding-bottom: 0px;">
                <div class="alert alert-success" role="alert">
                    All your vehicles will be posted under Firstname: {{ $user->name }}, Email: {{ $user->email }},
                    Phone: {{ $user->number }}
                </div>
                <div class="col-md-2">
                    <!-- sidebar -->
                    <div class="col-md-12">
                        <a href="#5"> <button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-home"></i> Home</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#0"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-car"></i> My Cars</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#1"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-credit-card"></i> Subscriptions</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#2"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-money-bill"></i> My Sells</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="#3"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-plus"></i> Add Car</button></a>
                    </div>
                    </br>
                    <div class="col-md-12">
                        <a href="{{ route('logout') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-sign-out-alt"></i> Logout</button></a>
                    </div>
                    </br>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12" style="padding-left : 20px; padding-right : 20px;">
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
                        <!--upload form here -->
                        <div class="pageLoader" id="pageLoader"></div>
                        <form action="{{ route('savecar') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h2 class="form-title" style="color: #00472F">Enter Vehicle Information » </h2>
                            <label class="gt-title" for="gt-title">Your listing title</label>
                            <input class="form-control" type="text" id="gt-title" tabindex="2" name="title"
                                placeholder="Enter listing title" required style="text-transform:uppercase">
                            <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                                <div class="col-6">
                                    <select name="country" id="country" class="gt-select" tabindex="3" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1" selected="selected">Select Your Country</option>
                                        <option class="level-0" value="Kenya" data-value="41">Kenya</option>
                                        <option class="level-0" value="Tanzania" data-value="48">Tanzania</option>
                                        <option class="level-0" value="Uganda" data-value="48">Uganda</option>
                                        <option class="level-0" value="Rwanda" data-value="48">Rwanda</option>
                                        <option class="level-0" value="Burundi" data-value="48">Burundi</option>
                                        <option class="level-0" value="Other" data-value="48">Other</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select name="county" id="county" tabindex="4" data-value="" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="" data-value="-1" selected="selected">Select Your County
                                        </option>
                                        <option class="level-0" value="Other" data-value="48">Other</option>
                                        <option class="level-0" value="Nairobi" data-value="48">Nairobi</option>
                                        <option class="level-0" value="Mombasa" data-value="48">Mombasa</option>
                                        <option class="level-0" value="Kwale" data-value="48">Kwale</option>
                                        <option class="level-0" value="Kilifi" data-value="48">Kilifi</option>
                                        <option class="level-0" value="Tana River" data-value="48">Tana River</option>
                                        <option class="level-0" value="Lamu" data-value="48">Lamu</option>
                                        <option class="level-0" value="Taita–Taveta " data-value="48">Taita–Taveta
                                        </option>
                                        <option class="level-0" value="Garissa" data-value="48">Garissa </option>
                                        <option class="level-0" value="Wajir" data-value="48">Wajir </option>
                                        <option class="level-0" value="Mandera" data-value="48">Mandera </option>
                                        <option class="level-0" value="Marsabit" data-value="48">Marsabit</option>
                                        <option class="level-0" value="Isiolo" data-value="48">Isiolo</option>
                                        <option class="level-0" value="Meru" data-value="48">Meru</option>
                                        <option class="level-0" value="Tharaka-Nithi" data-value="48">Tharaka-Nithi
                                        </option>
                                        <option class="level-0" value="Embu" data-value="48">Embu</option>
                                        <option class="level-0" value="Kitui" data-value="48">Kitui</option>
                                        <option class="level-0" value="Machakos" data-value="48">Machakos </option>
                                        <option class="level-0" value="Makueni" data-value="48">Makueni</option>
                                        <option class="level-0" value="Nyandarua" data-value="48">Nyandarua</option>
                                        <option class="level-0" value="Nyeri" data-value="48">Nyeri</option>
                                        <option class="level-0" value="Kirinyaga" data-value="48">Kirinyaga</option>
                                        <option class="level-0" value="Murang'a" data-value="48">Murang’a </option>
                                        <option class="level-0" value="Kiambu" data-value="48">Kiambu</option>
                                        <option class="level-0" value="Turkana " data-value="48">Turkana </option>
                                        <option class="level-0" value="West Pokot" data-value="48">West Pokot</option>
                                        <option class="level-0" value="Samburu" data-value="48">Samburu</option>
                                        <option class="level-0" value="Trans-Nzoia" data-value="48">Trans-Nzoia </option>
                                        <option class="level-0" value="Uasin Gishu" data-value="48">Uasin Gishu</option>
                                        <option class="level-0" value="Elgeyo-Marakwet" data-value="48">Elgeyo-Marakwet
                                        </option>
                                        <option class="level-0" value="Nandi" data-value="48">Nandi</option>
                                        <option class="level-0" value="Baringo" data-value="48">Baringo </option>
                                        <option class="level-0" value="Laikipia" data-value="48">Laikipia </option>
                                        <option class="level-0" value="Nakuru" data-value="48">Nakuru </option>
                                        <option class="level-0" value="Narok" data-value="48">Narok </option>
                                        <option class="level-0" value="Kajiado" data-value="48">Kajiado </option>
                                        <option class="level-0" value="Kericho" data-value="48">Kericho</option>
                                        <option class="level-0" value="Bomet" data-value="48">Bomet</option>
                                        <option class="level-0" value="Kakamega" data-value="48">Kakamega </option>
                                        <option class="level-0" value="Vihiga" data-value="48">Vihiga </option>
                                        <option class="level-0" value="Bungoma" data-value="48">Bungoma</option>
                                        <option class="level-0" value="Busia " data-value="48">Busia</option>
                                        <option class="level-0" value="Siaya " data-value="48">Siaya</option>
                                        <option class="level-0" value="Kisumu" data-value="48">Kisumu</option>
                                        <option class="level-0" value="Homa Bay" data-value="48">Homa Bay</option>
                                        <option class="level-0" value="Migori" data-value="48">Migori</option>
                                        <option class="level-0" value="Kisii" data-value="48">Kisii</option>
                                        <option class="level-0" value="Nyamira" data-value="48">Nyamira</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 10px;">
                                <div class="col-6">
                                    <label>Make</label>
                                    <!-- <input class="form-control" type="text" name="make" placeholder="Enter Vehicle Make" style="text-transform:uppercase" required> -->
                                    <select class="form-control" id="car_make" name="make" aria-hidden="true"
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;"
                                        required>
                                        <option value="Any Make" selected="false">Select Make</option>
                                        @foreach ($makes as $item)
                                            <option value="{{ $item->car_make_id }}">{{ $item->car_make_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Model</label>
                                    <select class="" name="model" id="car_model" required aria-hidden="true"
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;"
                                        required>
                                        <option value="Any Make" selected="false">Select Model</option>
                                    </select>

                                </div>
                            </div>
                            <label>Year of Manufacture</label>
                            <select name="year" id="year" tabindex="4" data-value="" required
                                style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                <option value="-1" selected="selected">Select Year of Manufacture</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                            </select>
                            <div class="row" style="padding-top:10px;">
                                <div class="col-6 col-md-4">
                                    <input class="form-control" type="number" id="price" name="price"
                                        placeholder="Enter vehicle selling Price (Ksh)" required>
                                </div>
                                <div class="col-6 col-md-4">
                                    <input class="form-control" type="number" id="miles" name="miles"
                                        placeholder="Enter mileage (Kms)" required>
                                </div>
                                <div class="col-6 col-md-4">
                                    <input class="form-control" type="text" id="gt-vin" tabindex="11"
                                        name="vin" placeholder="Enter Plate number" required
                                        style="text-transform:uppercase">
                                </div>
                            </div>

                            <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                <div class="col-6 col-md-4">
                                    <select id="exterior" tabindex="8" name="exterior" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1" selected="selected">Select Color</option>
                                        <option value="White">White</option>
                                        <option value="Black">Black</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Green">Green</option>
                                        <option value="Dark Green">Dark Green</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Dark Blue">Dark Blue</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-4">
                                    <select id="interior" value="" tabindex="4" name="interior" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1" selected="selected">Select Interior Type</option>
                                        <option value="Brown">Leather</option>
                                        <option value="Yellow">Cloth</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-4">
                                    <select id="fuel_type" tabindex="5" name="fuel_type" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1" selected="selected">Select Fuel Type</option>
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Hybrid">Hybrid</option>
                                        <option value="Diesel-Hybrid">Diesel-Hybrid</option>
                                        <option value="Electic">Electic</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <h2 class="form-title" style="color: #000000">Select Vehicle Features » </h2>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="checkbox" value="4WD/AWD" id="4WD/AWD"
                                        name="features[]">&nbsp;&nbsp;&nbsp;4WD/AWD
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="ABS Brakes" id="ABS Brakes"
                                        name="features[]">&nbsp;&nbsp;&nbsp;ABS Brakes
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Air Conditioning" id="Air Conditioning"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Air Conditioning
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Alloy Wheels" id="Alloy Wheels"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Alloy Wheels
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="checkbox" value="AM/FM Stereo" id="AM/FM Stereo"
                                        name="features[]">&nbsp;&nbsp;&nbsp;AM/FM Stereo
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Roof Racks" id="Roof Racks"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Roof Racks
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Auxiliary Audio Input" id="Auxiliary Audio Input"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Auxiliary Audio Input
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="CD Audio" id="CD Audio"
                                        name="features[]">&nbsp;&nbsp;&nbsp;CD Audio
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Cruise Control" id="Cruise Control"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Cruise Control
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Front Seat Heaters" id="Front Seat Heaters"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Front Seat Heaters
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Leather Seats" id="Leather Seats"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Leather Seats
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Memory Seat(s)" id="Memory Seat(s)"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Memory Seat(s)
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="checkbox" value=" Navigation System" id=" Navigation System"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Navigation System
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Overhead Airbags" id="Overhead Airbags"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Overhead Airbags
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Panoramic Sunroof" id="Panoramic Sunroof"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Panoramic Sunroof
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Parking Sensors" id="Parking Sensors"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Parking Sensors
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Power Locks" id="Power Locks"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Power Locks
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Power Mirrors" id="Power Mirrors"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Power Mirrors
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Power Seat(s)" id="Power Seat(s)"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Power Seat(s)
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Power Windows" id="Power Windows"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Power Windows
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Premium Package" id="Premium Package"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Premium Package
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Rear Defroster" id="Rear Defroster"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Rear Defroster
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Rear View Camera" id="Rear View Camera"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Rear View Camera
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Satellite Radio Ready" id="Satellite Radio Ready"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Satellite Radio Ready
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Side Airbags" id="Side Airbags"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Airbags
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="SiriusXM Trial Avail" id="SiriusXM Trial Avail"
                                        name="features[]">&nbsp;&nbsp;&nbsp;SiriusXM Trial Avail
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Technology Package" id="Technology Package"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Technology Package
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Traction Control" id="Traction Control"
                                        name="features[]">&nbsp;&nbsp;&nbsp;Traction Control
                                </div>
                            </div>
                            <div class="row" style="padding-top:10px; padding-bottom:15px;">
                                <div class="col-6">
                                    <label>Transmission</label>
                                    <select id="transmission" name="transmission" tabindex="13" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1" selected="selected">Select Transmission Type</option>
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Semi-Auto">Semi-Auto</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Vehicle Type</label>
                                    <select id="vehicle_type" name="vehicle_type" tabindex="14" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1" selected="selected">Vehicle Type</option>
                                        <option value="Convertibles">Convertibles</option>
                                        <option value="Hatchbacks">Hatchbacks</option>
                                        <option value="SUVs">SUVs</option>
                                        <option value="Saloon Car">Saloon Car</option>
                                        <option value="Station Wagons">Station Wagons</option>
                                        <option value="Pickup Trucks">Pickup Trucks</option>
                                        <option value="Buses, Taxis and Vans">Buses, Taxis and Vans</option>
                                        <option value="Motorbikes">Motorbikes</option>
                                        <option value="Trucks">Trucks</option>
                                        <option value="Machinery and Tractors">Machinery and Tractors</option>
                                        <option value="Trailers">Trailers</option>
                                        <option value="Minis">Minis</option>
                                        <option value="Coupes">Coupes</option>
                                        <option value="Quad Bikes">Quad Bikes</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-outline" style="padding-top:10px; padding-bottom:15px;">
                                <textarea class="form-control" required placeholder="Enter vehicle listing description." id="description"
                                    name="description" rows="4" style="background: #fff;" required></textarea>
                                <label class="form-label" for="description">Vehicle Description</label>
                            </div>
                            <div class="row">
                                <div class="col-6 col-lg-4">
                                    <label class="btn btn-success btn-file"><br>
                                        Upload Photos<input class="form-control" id="fileupload" type="file"
                                            name="images[]" tabindex="21" style="display:none" value="Upload Photos"
                                            multiple=""><br>
                                    </label></p>
                                </div>
                                <div class="col-sm-6 col-lg-8">
                                    <span class="instructions">Images will be automatically resized to fit
                                        the listing layout. We recommend that you upload photos in full
                                        resolution for better results.</span>
                                    <span class="instructions-cont">You may upload up to 12 images and each image may be
                                        no larger than 5MB</span>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-1">
                                        <div class="images-preview-div" style="margin:1%"> </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="form-title" style="color: #00472F">Personal Information</h2>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="text" id="firstname" tabindex="22"
                                        name="firstname" placeholder="Enter first name" value="{{ $user->name }}"
                                        required style="text-transform:uppercase">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" id="gt-lastname" tabindex="23"
                                        name="lastname" placeholder="Enter last name" value="{{ $user->name }}"
                                        required style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                                <div class="col-6">
                                    <input class="form-control" type="email" id="email" tabindex="24"
                                        name="email" value="{{ $user->email }}"
                                        placeholder="Enter your e-mail address " required>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="number" id="phone" tabindex="25"
                                        name="phone" value="{{ $user->number }}" placeholder="Enter phone number"
                                        required>
                                </div>
                                <div class="col-md-8">
                                    <input type="checkbox" value="Rear View Camera" id="Rear View Camera"
                                        name="features[]" required>&nbsp;&nbsp;&nbsp;
                                    <a class="text-center p-3" href="/Terms and conditions to seller.pdf"
                                        target="_blank">Terms And Conditions<br></a>
                                    By clicking this, you have agreed to terms and conditions
                                </div>
                            </div>
                            <button type="submit" style="background: #00472F;color:white;"  class="btn btn-primary btn-block mb-4">Submit &amp; pay for your
                                listing</button>
                        </form>
                    </div>
                </div>
                <footer class="mt-5 w-100 pt-5">
                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: #CBBC27 ; border-radius: 10px;">
                        © {{ now()->year }} Copyright:
                        <a class="text-center p-3" href="https://www.aakenya.co.ke/">Automobile Association of Kenya</a>
                    </div>
                    <!-- Copyright -->
                </footer>
            </div>
            <!-- add car end -->

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#car_make').on('change', function() {
                var carmake_id = this.value;
                $("#car_model").html('');
                $.ajax({
                    url: "{{ url('fetch/car-models') }}",
                    type: "POST",
                    data: {
                        car_make_id: carmake_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#car_model').html(
                            '<option value="">Select Car Model</option>');
                            result.data.forEach(model => {
                        document.querySelector('#car_model').innerHTML+='<option value="' + model
                                                    .id + '">' + model.name +
                                                    '</option>';
                    
                    });
                    }
                });
            })
        });
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#fileupload').on('change', function() {
                previewImages(this, 'div.images-preview-div');
            });
        });
    </script>
    <script>
        @if (session('loader'))
            $(window).on('load', function() {

                const myTimeout = setTimeout(myGreeting, 5000);

                function myGreeting() {
                    $('#loading').hide();
                }

                function myStopFunction() {
                    clearTimeout(myTimeout);
                }
            })
        @endif
    </script>>
@endsection
