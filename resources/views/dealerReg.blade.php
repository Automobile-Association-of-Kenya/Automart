{{-- @extends('layouts.main')
@section('content')
    <!-- show success message -->
    @if (session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ session('successMsg') }}
        </div>
    @endif
    @if (session('errorMsg'))
        <div class="alert alert-danger" role="alert">
            {{ session('errorMsg') }}
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

    <div class="container"
        style="background-image: url('./public/images/bg/Motor Website FHD-01.jp'); 
  background-repeat: no-repeat;background-position: center; background-size: cover; border-radius:10px;">
        <div class="row" style="padding-top: 15px; padding-bottom: 15px; padding-left: 15px;">
            <div class="col-md">
                <!-- left side -->
            </div>

            <div class="col-md" style="background-color: rgba(255, 255, 255, 0.7); padding-top: 10px; border-radius:10px;">
                <span class="badge bg-info"
                    style="width: 100%; padding-top:10px;padding-bottom:10px; background-color: rgba(0, 0, 0, 0.9) !Important;">WANT
                    TO SELL NOW? REGISTER HERE.</span>
                <form action="{{ route('dealerreg') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row" style="padding-bottom:15px; padding-top:15px;">
                        <div class="col-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                        </div>
                        <div class="col-6">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required>
                        </div>
                    </div>
                    <div class="container-fluid" style="padding-top:5px; padding-bottom:10px;">
                        <input type="number" class="form-control" name="number" id="number"
                            placeholder="Your Phone Number" required>
                    </div>
                    <div class="container-fluid" style="padding-top:5px; padding-bottom:10px;">
                        <input type="number" class="form-control" name="number2" id="number2"
                            placeholder="Your Secondary Phone Number" required>
                    </div>
                    <div class="container-fluid" style="padding-top:5px; padding-bottom:10px;">
                        <select name="county" id="county" tabindex="4" data-value="" required
                            style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                            <option value="" data-value="-1" selected="selected">Select Your County</option>
                            <option class="level-0" value="Other" data-value="48">Other</option>
                            <option class="level-0" value="Nairobi" data-value="48">Nairobi</option>
                            <option class="level-0" value="Mombasa" data-value="48">Mombasa</option>
                            <option class="level-0" value="Kwale" data-value="48">Kwale</option>
                            <option class="level-0" value="Kilifi" data-value="48">Kilifi</option>
                            <option class="level-0" value="Tana River" data-value="48">Tana River</option>
                            <option class="level-0" value="Lamu" data-value="48">Lamu</option>
                            <option class="level-0" value="Taita–Taveta " data-value="48">Taita–Taveta </option>
                            <option class="level-0" value="Garissa" data-value="48">Garissa </option>
                            <option class="level-0" value="Wajir" data-value="48">Wajir </option>
                            <option class="level-0" value="Mandera" data-value="48">Mandera </option>
                            <option class="level-0" value="Marsabit" data-value="48">Marsabit</option>
                            <option class="level-0" value="Isiolo" data-value="48">Isiolo</option>
                            <option class="level-0" value="Meru" data-value="48">Meru</option>
                            <option class="level-0" value="Tharaka-Nithi" data-value="48">Tharaka-Nithi</option>
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
                            <option class="level-0" value="Elgeyo-Marakwet" data-value="48">Elgeyo-Marakwet</option>
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
                    <div class="container-fluid" style="padding-top:5px; padding-bottom:10px;">
                        <input type="text" class="form-control" name="dName" id="dName"
                            placeholder="Preffered Dealer Name" required>
                    </div>
                    <div class="row" style="padding-bottom:15px; padding-top:px;">
                        <div class="container-fluid" style="padding-top:10px; padding-bottom:15px;">
                            <input id="pass" class="form-control" type="Password" name="pass"
                                placeholder="Choose Your Password" required>
                        </div>
                        <div class="container-fluid" style="padding-top:10px; padding-bottom:15px;">
                            <input id="pass" class="form-control" type="Password" name="pass"
                                placeholder="Confirm Your Password" required>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">
                        <h6>Register</h6>
                    </button>

                </form>
            </div>

            <div class="col-md">
                <!-- right side -->
            </div>
        </div>
    </div>

@endsection --}}
@extends('layouts.new')
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>Register</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Shop checkout start -->
    <div class="shop-checkout content-area-5">
        <div class="container">
            <div class="from-checkout">
                <div class="row">
                    <div class="col-lg-2 col-md-12">
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="heading-4">
                            <h4>WANT TO SELL NOW? REGISTER HERE.</h4>
                        </div>
                        <!-- show success message -->
                        @if (session('successMsg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('successMsg') }}
                            </div>
                        @endif
                        @if (session('errorMsg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('errorMsg') }}
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
                        <form action="{{ route('dealerreg') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name"
                                            aria-label="First Name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email"
                                            aria-label="Last Name" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone Number"
                                    aria-label="Company Name" name="number">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Secondary Phone Number"
                                    aria-label="Address" name="number2">
                            </div>
                            <div class="form-group">

                                <select name="county" class="" id="county" tabindex="4" data-value="" required
                                    style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                    <option value="" data-value="-1" selected="selected">Select Your County</option>
                                    <option class="level-0" value="Other" data-value="48">Other</option>
                                    <option class="level-0" value="Nairobi" data-value="48">Nairobi</option>
                                    <option class="level-0" value="Mombasa" data-value="48">Mombasa</option>
                                    <option class="level-0" value="Kwale" data-value="48">Kwale</option>
                                    <option class="level-0" value="Kilifi" data-value="48">Kilifi</option>
                                    <option class="level-0" value="Tana River" data-value="48">Tana River</option>
                                    <option class="level-0" value="Lamu" data-value="48">Lamu</option>
                                    <option class="level-0" value="Taita–Taveta " data-value="48">Taita–Taveta </option>
                                    <option class="level-0" value="Garissa" data-value="48">Garissa </option>
                                    <option class="level-0" value="Wajir" data-value="48">Wajir </option>
                                    <option class="level-0" value="Mandera" data-value="48">Mandera </option>
                                    <option class="level-0" value="Marsabit" data-value="48">Marsabit</option>
                                    <option class="level-0" value="Isiolo" data-value="48">Isiolo</option>
                                    <option class="level-0" value="Meru" data-value="48">Meru</option>
                                    <option class="level-0" value="Tharaka-Nithi" data-value="48">Tharaka-Nithi</option>
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
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Preferred Dealer Name"
                                    aria-label="State / Country" name="dName">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password"
                                            aria-label="Post Code" name="pass">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                            aria-label="Phone Number" name="pass">
                                    </div>
                                </div>
                            </div>
                            <button class="btn w-25 btn-sm bg-success" type="submit"><span class="text-white h3">Sign
                                    Up</span></button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop checkout end -->
@endsection
