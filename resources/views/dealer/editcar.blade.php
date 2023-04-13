@extends('layouts.dashboard')
@section('content')
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
                    All your vehicles will be posted under Firstname: {{ $user->name }}, Email: {{ $user->email }},
                    Phone: {{ $user->number }}
                </div>
                @include('layouts.sidebar')
                <div class="col-md-10 mt-5 pt-5">
                    <div class="col-md-12" style="padding-left : 20px; padding-right : 20px;">
                        @include('partials.alert')
                        <div class="pageLoader" id="pageLoader"></div>
                        <form action="{{ route('updatecar', $details->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h2 class="form-title" style="color: #00472F">Edit Vehicle Information » </h2>
                            <label class="gt-title" for="gt-title">Your listing title</label>
                            <input class="form-control" type="text" id="gt-title" tabindex="2" name="title"
                                placeholder="Enter listing title" required style="text-transform:uppercase"
                                value="{{ $details->title }}">
                            <div class="row" style="padding-top: 10px; padding-bottom: 1px;">
                                <div class="col-md-12">
                                    <select name="country" id="country" class="gt-select" tabindex="3" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1" selected="selected">Country</option>
                                        <option class="level-0" value="Kenya" selected data-value="41">Kenya</option>

                                    </select>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <select name="county" id="county" tabindex="4" data-value="" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="" data-value="-1" selected="selected">County
                                        </option>
                                        <option class="level-0" value="Other"
                                            {{ $details->county == 'Other' ? 'selected' : '' }} data-value="48">Other
                                        </option>
                                        <option class="level-0" value="Nairobi"
                                            {{ $details->county == 'Nairobi' ? 'selected' : '' }} data-value="48">Nairobi
                                        </option>
                                        <option class="level-0" value="Mombasa"
                                            {{ $details->county == 'Mombasa' ? 'selected' : '' }} data-value="48">Mombasa
                                        </option>
                                        <option class="level-0" value="Kwale"
                                            {{ $details->county == 'Kwale' ? 'selected' : '' }} data-value="48">Kwale
                                        </option>
                                        <option class="level-0" value="Kilifi"
                                            {{ $details->county == 'Kilifi' ? 'selected' : '' }} data-value="48">Kilifi
                                        </option>
                                        <option class="level-0" value="Tana River"
                                            {{ $details->county == 'Tana River' ? 'selected' : '' }} data-value="48">Tana
                                            River</option>
                                        <option class="level-0" value="Lamu"
                                            {{ $details->county == 'Lamu' ? 'selected' : '' }} data-value="48">Lamu
                                        </option>
                                        <option class="level-0" value="Taita-Taveta"
                                            {{ $details->county == 'Taita-Taveta' ? 'selected' : '' }} data-value="48">
                                            Taita–Taveta
                                        </option>
                                        <option class="level-0" value="Garissa"
                                            {{ $details->county == 'Garissa' ? 'selected' : '' }} data-value="48">Garissa
                                        </option>
                                        <option class="level-0" value="Wajir"
                                            {{ $details->county == 'Wajir' ? 'selected' : '' }} data-value="48">Wajir
                                        </option>
                                        <option class="level-0" value="Mandera"
                                            {{ $details->county == 'Mandera' ? 'selected' : '' }} data-value="48">Mandera
                                        </option>
                                        <option class="level-0" value="Marsabit"
                                            {{ $details->county == 'Marsabit' ? 'selected' : '' }} data-value="48">
                                            Marsabit
                                        </option>
                                        <option class="level-0" value="Isiolo"
                                            {{ $details->county == 'Isiolo' ? 'selected' : '' }} data-value="48">Isiolo
                                        </option>
                                        <option class="level-0" value="Meru"
                                            {{ $details->county == 'Meru' ? 'selected' : '' }} data-value="48">Meru
                                        </option>
                                        <option class="level-0" value="Tharaka-Nithi"
                                            {{ $details->county == 'Tharaka-Nithi' ? 'selected' : '' }} data-value="48">
                                            Tharaka-Nithi
                                        </option>
                                        <option class="level-0" value="Embu"
                                            {{ $details->county == 'Embu' ? 'selected' : '' }} data-value="48">Embu
                                        </option>
                                        <option class="level-0" value="Kitui"
                                            {{ $details->county == 'Kitui' ? 'selected' : '' }} data-value="48">Kitui
                                        </option>
                                        <option class="level-0" value="Machakos"
                                            {{ $details->county == 'Machakos' ? 'selected' : '' }} data-value="48">
                                            Machakos
                                        </option>
                                        <option class="level-0" value="Makueni"
                                            {{ $details->county == 'Makueni' ? 'selected' : '' }} data-value="48">Makueni
                                        </option>
                                        <option class="level-0" value="Nyandarua"
                                            {{ $details->county == 'Nyandarua' ? 'selected' : '' }} data-value="48">
                                            Nyandarua</option>
                                        <option class="level-0" value="Nyeri"
                                            {{ $details->county == 'Nyeri' ? 'selected' : '' }} data-value="48">Nyeri
                                        </option>
                                        <option class="level-0" value="Kirinyaga"
                                            {{ $details->county == 'Kirinyaga' ? 'selected' : '' }} data-value="48">
                                            Kirinyaga</option>
                                        <option class="level-0" value="Murang'a"
                                            {{ $details->county == "Murang'a" ? 'selected' : '' }} data-value="48">
                                            Murang’a
                                        </option>
                                        <option class="level-0" value="Kiambu"
                                            {{ $details->county == 'Kiambu' ? 'selected' : '' }} data-value="48">Kiambu
                                        </option>
                                        <option class="level-0" value="Turkana"
                                            {{ $details->county == 'Turkana' ? 'selected' : '' }} data-value="48">Turkana
                                        </option>
                                        <option class="level-0" value="West Pokot"
                                            {{ $details->county == 'West Pokot' ? 'selected' : '' }} data-value="48">West
                                            Pokot</option>
                                        <option class="level-0" value="Samburu"
                                            {{ $details->county == 'Samburu' ? 'selected' : '' }} data-value="48">Samburu
                                        </option>
                                        <option class="level-0" value="Trans-Nzoia"
                                            {{ $details->county == 'Trans-Nzoia' ? 'selected' : '' }} data-value="48">
                                            Trans-Nzoia </option>
                                        <option class="level-0" value="Uasin Gishu"
                                            {{ $details->county == 'Uasin Gishu' ? 'selected' : '' }} data-value="48">
                                            Uasin
                                            Gishu</option>
                                        <option class="level-0" value="Elgeyo-Marakwet"
                                            {{ $details->county == 'Elgeyo-Marakwet' ? 'selected' : '' }} data-value="48">
                                            Elgeyo-Marakwet
                                        </option>
                                        <option class="level-0" value="Nandi"
                                            {{ $details->county == 'Nandi' ? 'selected' : '' }} data-value="48">Nandi
                                        </option>
                                        <option class="level-0" value="Baringo"
                                            {{ $details->county == 'Baringo' ? 'selected' : '' }} data-value="48">Baringo
                                        </option>
                                        <option class="level-0" value="Laikipia"
                                            {{ $details->county == 'Laikipia' ? 'selected' : '' }} data-value="48">
                                            Laikipia
                                        </option>
                                        <option class="level-0" value="Nakuru"
                                            {{ $details->county == 'Nakuru' ? 'selected' : '' }} data-value="48">Nakuru
                                        </option>
                                        <option class="level-0" value="Narok"
                                            {{ $details->county == 'Narok' ? 'selected' : '' }} data-value="48">Narok
                                        </option>
                                        <option class="level-0" value="Kajiado"
                                            {{ $details->county == 'Kajiado' ? 'selected' : '' }} data-value="48">Kajiado
                                        </option>
                                        <option class="level-0" value="Kericho"
                                            {{ $details->county == 'Kericho' ? 'selected' : '' }} data-value="48">Kericho
                                        </option>
                                        <option class="level-0" value="Bomet"
                                            {{ $details->county == 'Bomet' ? 'selected' : '' }} data-value="48">Bomet
                                        </option>
                                        <option class="level-0" value="Kakamega"
                                            {{ $details->county == 'Kakamega' ? 'selected' : '' }} data-value="48">
                                            Kakamega
                                        </option>
                                        <option class="level-0" value="Vihiga"
                                            {{ $details->county == 'Vihiga' ? 'selected' : '' }} data-value="48">Vihiga
                                        </option>
                                        <option class="level-0" value="Bungoma"
                                            {{ $details->county == 'Bungoma' ? 'selected' : '' }} data-value="48">Bungoma
                                        </option>
                                        <option class="level-0" value="Busia"
                                            {{ $details->county == 'Busia' ? 'selected' : '' }} data-value="48">Busia
                                        </option>
                                        <option class="level-0" value="Siaya"
                                            {{ $details->county == 'Siaya' ? 'selected' : '' }} data-value="48">Siaya
                                        </option>
                                        <option class="level-0" value="Kisumu"
                                            {{ $details->county == 'Kisumu' ? 'selected' : '' }} data-value="48">Kisumu
                                        </option>
                                        <option class="level-0" value="Homa Bay"
                                            {{ $details->county == 'Homa Bay' ? 'selected' : '' }} data-value="48">Homa
                                            Bay
                                        </option>
                                        <option class="level-0" value="Migori"
                                            {{ $details->county == 'Migori' ? 'selected' : '' }} data-value="48">Migori
                                        </option>
                                        <option class="level-0" value="Kisii"
                                            {{ $details->county == 'Kisii' ? 'selected' : '' }} data-value="48">Kisii
                                        </option>
                                        <option class="level-0" value="Nyamira"
                                            {{ $details->county == 'Nyamira' ? 'selected' : '' }} data-value="48">Nyamira
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 10px;">
                                <div class="col-md-4 ">
                                    <label>Make</label>
                                    <!-- <input class="form-control" type="text" name="make" placeholder="Enter Vehicle Make" style="text-transform:uppercase" required> -->
                                    <select class="form-control" id="car_make" name="make" aria-hidden="true"
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;"
                                        required>
                                        <option value="Any Make" selected="false">Make</option>
                                        @foreach ($makes as $item)
                                            <option value="{{ $item->car_make_id }}"
                                                {{ $details->make == $item->car_make_id ? 'selected' : '' }}>
                                                {{ $item->car_make_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-4 ">
                                    <label>Model</label>
                                    <select class="" name="model" id="car_model" required aria-hidden="true"
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;"
                                        required>
                                        <option value="Any Make" selected="false">Model</option>
                                        @if ($details->carmodel != null)
                                            <option value="{{ $details->carmodel->car_model_id }}" selected>
                                                {{ $details->carmodel->car_model_name }}
                                            </option>
                                        @endif
                                    </select>

                                </div>
                                <div class="col-md-4">

                                    <label>Year of Manufacture</label>
                                    <select name="year" id="year" tabindex="4" data-value="" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1">Select Year of Manufacture</option>
                                        <option value="2021" {{ $details->year == '2021' ? 'selected' : '' }}>2021
                                        </option>
                                        <option value="2020" {{ $details->year == '2020' ? 'selected' : '' }}>2020
                                        </option>
                                        <option value="2019" {{ $details->year == '2019' ? 'selected' : '' }}>2019
                                        </option>
                                        <option value="2018" {{ $details->year == '2018' ? 'selected' : '' }}>2018
                                        </option>
                                        <option value="2017" {{ $details->year == '2017' ? 'selected' : '' }}>2017
                                        </option>
                                        <option value="2016" {{ $details->year == '2016' ? 'selected' : '' }}>2016
                                        </option>
                                        <option value="2015" {{ $details->year == '2015' ? 'selected' : '' }}>2015
                                        </option>
                                        <option value="2014" {{ $details->year == '2014' ? 'selected' : '' }}>2014
                                        </option>
                                        <option value="2013" {{ $details->year == '2013' ? 'selected' : '' }}>2013
                                        </option>
                                        <option value="2012" {{ $details->year == '2012' ? 'selected' : '' }}>2012
                                        </option>
                                        <option value="2011" {{ $details->year == '2011' ? 'selected' : '' }}>2011
                                        </option>
                                        <option value="2010" {{ $details->year == '2010' ? 'selected' : '' }}>2010
                                        </option>
                                        <option value="2009" {{ $details->year == '2009' ? 'selected' : '' }}>2009
                                        </option>
                                        <option value="2008" {{ $details->year == '2008' ? 'selected' : '' }}>2008
                                        </option>
                                        <option value="2007" {{ $details->year == '2007' ? 'selected' : '' }}>2007
                                        </option>
                                        <option value="2006" {{ $details->year == '2006' ? 'selected' : '' }}>2006
                                        </option>
                                        <option value="2005" {{ $details->year == '2005' ? 'selected' : '' }}>2005
                                        </option>
                                        <option value="2004" {{ $details->year == '2004' ? 'selected' : '' }}>2004
                                        </option>
                                        <option value="2003" {{ $details->year == '2003' ? 'selected' : '' }}>2003
                                        </option>
                                        <option value="2002" {{ $details->year == '2002' ? 'selected' : '' }}>2002
                                        </option>
                                        <option value="2001" {{ $details->year == '2001' ? 'selected' : '' }}>2001
                                        </option>
                                        <option value="2000" {{ $details->year == '2000' ? 'selected' : '' }}>2000
                                        </option>
                                    </select>
                                </div>
                            </div>




                            <div class="row" style="padding-top:10px;">
                                <div class="col-md-4">
                                    <input class="form-control" type="number" id="price" name="price"
                                        placeholder="selling Price (Ksh)" required value="{{ $details->price }}">
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" id="miles" name="miles"
                                        placeholder="mileage (Kms)" required value="{{ $details->miles }}">
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" id="enginecc" name="enginecc"
                                        placeholder="mileage (Kms)" required value="{{ $details->enginecc }}">
                                </div>

                            </div>

                            <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                <div class="col-md-4 mt-1">
                                    <select id="exterior" tabindex="8" name="exterior" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1">Color</option>
                                        <option value="White" {{ $details->exterior == 'White' ? 'selected' : '' }}>White
                                        </option>
                                        <option value="Black" {{ $details->exterior == 'Black' ? 'selected' : '' }}>Black
                                        </option>
                                        <option value="Silver" {{ $details->exterior == 'Silver' ? 'selected' : '' }}>
                                            Silver
                                        </option>
                                        <option value="Green" {{ $details->exterior == 'Green' ? 'selected' : '' }}>Green
                                        </option>
                                        <option value="Dark Green"
                                            {{ $details->exterior == 'Dark Green' ? 'selected' : '' }}>Dark Green</option>
                                        <option value="Blue" {{ $details->exterior == 'Blue' ? 'selected' : '' }}>Blue
                                        </option>
                                        <option value="Dark Blue"
                                            {{ $details->exterior == 'Dark Blue' ? 'selected' : '' }}>Dark Blue</option>
                                        <option value="Brown" {{ $details->exterior == 'Brown' ? 'selected' : '' }}>
                                            Brown
                                        </option>
                                        <option value="Yellow" {{ $details->exterior == 'Yellow' ? 'selected' : '' }}>
                                            Yellow</option>
                                        <option value="Other" {{ $details->exterior == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <select id="interior" value="" tabindex="4" name="interior" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1">Interior Type</option>
                                        <option value="Leather" {{ $details->interior == 'Leather' ? 'selected' : '' }}>
                                            Leather</option>
                                        <option value="Fabric" {{ $details->interior == 'Fabric' ? 'selected' : '' }}>
                                            Fabric</option>
                                        <option value="Other" {{ $details->interior == 'Other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <select id="usage" value="" tabindex="4" name="usage" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1">Vehicle Usage</option>
                                        <option value="New" {{ $details->usage == 'New' ? 'selected' : '' }}>
                                            New </option>
                                        <option value="Local" {{ $details->usage == 'Local' ? 'selected' : '' }}>
                                            Locally Used</option>
                                        <option value="Foreign" {{ $details->usage == 'Foreign' ? 'selected' : '' }}>
                                            Foreign Used
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <select id="fuel_type" tabindex="5" name="fuel_type" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="-1">Fuel Type</option>
                                        <option value="Petrol" {{ $details->fuel_type == 'Petrol' ? 'selected' : '' }}>
                                            Petrol</option>
                                        <option value="Diesel" {{ $details->fuel_type == 'Diesel' ? 'selected' : '' }}>
                                            Diesel</option>
                                        <option value="Hybrid" {{ $details->fuel_type == 'Hybrid' ? 'selected' : '' }}>
                                            Hybrid</option>
                                        <option value="Diesel-Hybrid"
                                            {{ $details->fuel_type == 'Diesel-Hybrid' ? 'selected' : '' }}>Diesel-Hybrid
                                        </option>
                                        <option value="Electic"
                                            {{ $details->fuel_type == 'Electric' ? 'selected' : '' }}>
                                            Electic</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <h2 class="form-title" style="color: #000000">Select Vehicle Features » </h2>
                            <div class="row" style="color:#000;">
                                <div class="col-md-3">
                                    <input type="checkbox" value="4WD/AWD" id="4WD/AWD" name="features[]"
                                        {{ in_array('4WD/AWD', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;4WD/AWD
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="ABS Brakes" id="ABS Brakes" name="features[]"
                                        {{ in_array('ABS Brakes', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;ABS
                                    Brakes
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Air Conditioning" id="Air Conditioning"
                                        name="features[]"
                                        {{ in_array('Air Conditioning', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Air
                                    Conditioning
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Alloy Wheels" id="Alloy Wheels" name="features[]"
                                        {{ in_array('Alloy Wheels', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Alloy
                                    Wheels
                                </div>
                            </div>
                            <div class="row" style="color:#000;">
                                <div class="col-md-3">
                                    <input type="checkbox" value="AM/FM Stereo" id="AM/FM Stereo" name="features[]"
                                        {{ in_array('AM/FM Stereo', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;AM/FM
                                    Stereo
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Roof Racks" id="Roof Racks" name="features[]"
                                        {{ in_array('Roof Racks', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Roof
                                    Racks
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Auxiliary Audio Input" id="Auxiliary Audio Input"
                                        name="features[]"
                                        {{ in_array('Auxiliary Audio Input', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Auxiliary
                                    Audio Input
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="CD Audio" id="CD Audio" name="features[]"
                                        {{ in_array('CD Audio', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;CD
                                    Audio
                                </div>
                            </div>
                            <div class="row" style="color:#000;">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Cruise Control" id="Cruise Control" name="features[]"
                                        {{ in_array('Cruise Control', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Cruise
                                    Control
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Front Seat Heaters" id="Front Seat Heaters"
                                        name="features[]"
                                        {{ in_array('Front Seat Heaters', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Front
                                    Seat Heaters
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Leather Seats" id="Leather Seats" name="features[]"
                                        {{ in_array('Leather Seats', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Leather
                                    Seats
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Memory Seat(s)" id="Memory Seat(s)" name="features[]"
                                        {{ in_array('Memory Seat(s)', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Memory
                                    Seat(s)
                                </div>
                            </div>
                            <div class="row" style="color:#000;">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Navigation System" id=" Navigation System"
                                        name="features[]"
                                        {{ in_array('Navigation System', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Navigation
                                    System
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Overhead Airbags" id="Overhead Airbags"
                                        name="features[]"
                                        {{ in_array('Overhead Airbags', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Overhead
                                    Airbags
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Panoramic Sunroof" id="Panoramic Sunroof"
                                        name="features[]"
                                        {{ in_array('Panoramic Sunroof', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Panoramic
                                    Sunroof
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Parking Sensors" id="Parking Sensors"
                                        name="features[]"
                                        {{ in_array('Parking Sensors', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Parking
                                    Sensors
                                </div>
                            </div>
                            <div class="row" style="color:#000;">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Power Locks" id="Power Locks" name="features[]"
                                        {{ in_array('Power Locks', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Power
                                    Locks
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Power Mirrors" id="Power Mirrors" name="features[]"
                                        {{ in_array('Power Mirrors', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Power
                                    Mirrors
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Power Seat(s)" id="Power Seat(s)" name="features[]"
                                        {{ in_array('Power Seat(s)', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Power
                                    Seat(s)
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Power Windows" id="Power Windows" name="features[]"
                                        {{ in_array('Power Windows', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Power
                                    Windows
                                </div>
                            </div>
                            <div class="row" style="color:#000;">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Premium Package" id="Premium Package"
                                        name="features[]"
                                        {{ in_array('Premium Package', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Premium
                                    Package
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Rear Defroster" id="Rear Defroster" name="features[]"
                                        {{ in_array('Rear Defroster', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Rear
                                    Defroster
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Rear View Camera" id="Rear View Camera"
                                        name="features[]"
                                        {{ in_array('Rear View Camera', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Rear
                                    View Camera
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Satellite Radio Ready" id="Satellite Radio Ready"
                                        name="features[]"
                                        {{ in_array('Satellite Radio Ready', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Satellite
                                    Radio Ready
                                </div>
                            </div>
                            <div class="row" style="color:#000;">
                                <div class="col-md-3">
                                    <input type="checkbox" value="Side Airbags" id="Side Airbags" name="features[]"
                                        {{ in_array('Side Airbags', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Airbags
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="SiriusXM Trial Avail" id="SiriusXM Trial Avail"
                                        name="features[]"
                                        {{ in_array('SiriusXM Trial Avail', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;SiriusXM
                                    Trial Avail
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Technology Package" id="Technology Package"
                                        name="features[]"
                                        {{ in_array('Technology Package', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Technology
                                    Package
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" value="Traction Control" id="Traction Control"
                                        name="features[]"
                                        {{ in_array('Traction Control', json_decode($details->features)) ? 'checked' : '' }}>&nbsp;&nbsp;&nbsp;Traction
                                    Control
                                </div>
                            </div>
                            <div class="row" style="padding-top:10px; padding-bottom:15px;">
                                <div class=" col-md-12">
                                    <label>Transmission</label>
                                    <select id="transmission" name="transmission" tabindex="13" required
                                        style="width: 100%; background-color: rgba(0,0,0, 0.6); color: #fff; border-radius:8px;padding-top:10px;padding-bottom:10px;">
                                        <option value="" s>Transmission Type</option>
                                        <option value="Automatic"
                                            {{ $details->transmission == 'Automatic' ? 'selected' : '' }}>Automatic
                                        </option>
                                        <option value="Manual"
                                            {{ $details->transmission == 'Manual' ? 'selected' : '' }}>
                                            Manual</option>
                                        <option value="Semi-Auto"
                                            {{ $details->transmission == 'Semi-Auto' ? 'selected' : '' }}>Semi-Auto
                                        </option>
                                        <option value="None" {{ $details->transmission == 'None' ? 'selected' : '' }}>
                                            None</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-outline" style="padding-top:10px; padding-bottom:15px;">
                                <textarea class="form-control" required placeholder="Enter vehicle listing description." id="description"
                                    name="description" rows="4" style="background: #fff;" required>{{ $details->description }}</textarea>
                                <label class="form-label" for="description">Vehicle Description</label>
                            </div>
                            <div class="row">
                                <div class="col-6 col-lg-4">
                                    <label class="btn btn-success btn-file"><br>
                                        Upload Cover Photo
                                        <input type="hidden" name="removedImages1" class="removedImgs1" value=''>
                                        <input class="form-control" type="file" id="fileupload1" name="cover_photo"
                                            tabindex="21" style="display:none" value="Upload Photos"><br>
                                    </label></p>
                                </div>
                                <div class="col-sm-6 col-lg-8" style="color:#000;">
                                    <span class="instructions">This is the image that will appear on the top.</span>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-1">
                                        <div class="images-preview-div1" style="margin:10px;width:20px;"> </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-1">
                                        <div class="images-preview-div1" style="margin:10px;width:20px;">
                                            <img src="{{ asset('images/' . $details->cover_photo) }}" width="300px"
                                                height="200px" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-lg-4">
                                    <label class="btn btn-success btn-file"><br>
                                        Upload Photos
                                        <input type="hidden" name="removedImages" value=''>
                                        <input class="form-control" id="fileupload" type="file" name="images[]"
                                            tabindex="21" style="display:none" value="Upload Photos"
                                            multiple=""><br>
                                    </label></p>
                                </div>
                                <div class="col-sm-6 col-lg-8" style="color:#000;">
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

                                <div class="row">
                                    @php
                                        $images = json_decode($details->images, true);
                                    @endphp
                                    @if (count($images) > 0)
                                        @foreach ($images as $item)
                                            <div class="col-md-4" id="carImageDel">
                                                <img src="{{ asset('images/' . $item) }}" width="100%" height="200px"
                                                    alt="">
                                                <div class="text-center">
                                                    <button id="deleteImage" data-carid="{{ $details->id }}"
                                                        data-imagename="{{ $item }}"><i
                                                            class="fa fa-trash text-danger"></i></button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
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
                                        name="phone" value="{{ $details->phone }}" placeholder="Enter phone number"
                                        required>
                                </div>
                                <div class="col-md-8">
                                    <input type="checkbox" value="Rear View Camera" id="Rear View Camera"
                                        name="features[]" required checked>&nbsp;&nbsp;&nbsp;
                                    <a class="text-center p-3" style="color:#000;"
                                        href="/Terms and conditions to seller.pdf" target="_blank">Terms And
                                        Conditions<br></a>
                                    <div class="" style="color:#000;">
                                        By clicking this, you have agreed to terms and conditions
                                    </div>
                                </div>
                            </div>
                            <button style="background: #00472F;color:white;" type="submit"
                                class="btn btn-primary btn-block mb-4">Submit</button>
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

        <!-- user profile end -->




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
                            document.querySelector('#car_model').innerHTML +=
                                '<option value="' + model
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
                    var noFiles = input.files.length;
                    for (let i = 0; i < noFiles; i++) {
                        if (input.files[i].size > 5000000) {
                            alert(input.files[i].name + ' is greater than 5mb');
                            input.value = ''
                            break;
                        }
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            const div = document.createElement('span');
                            div.classList.add('img_' + i)
                            div.style.cssText = 'position:relative'
                            const img = document.createElement('img');
                            img.setAttribute('src', event.target.result);
                            const deleter = document.createElement('span');
                            deleter.innerHTML = '<i class="fa fa-times-circle"></i>'
                            deleter.style.cssText =
                                'cursor:pointer;position:absolute;font-size: 1.3em;right:-3px;color:red;padding:6px;clip-path:circle()';
                            deleter.addEventListener('click', e => {
                                removeImage(input, imgPreviewPlaceholder, i);
                            })
                            div.appendChild(img);
                            div.appendChild(deleter);
                            document.querySelector(imgPreviewPlaceholder).appendChild(div)

                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#fileupload').on('change', function() {
                document.querySelector('.removedImgs').value = ''
                previewImages(this, 'div.images-preview-div');
            });

            const removeImage = (input, imgPreviewPlaceholder, index) => {
                let removedImages = document.querySelector('.removedImgs').value;
                removedImages = removedImages += index + ',';
                document.querySelector('.removedImgs').value = removedImages
                const el = document.querySelector('.img_' + index);
                el.parentElement.removeChild(el)
            }
        });
    </script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            $('body').on('click', '#deleteImage', function(event) {
                event.preventDefault();
                let $this = $(this);
                let data = {
                    'id': $this.data('carid'),
                    'image': $this.data('imagename')
                }
                let token = $("input[name='_token']").val();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": token,
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/deletevehicleimage',
                    data: data,
                    success: function(params) {
                        console.log(params)
                        let result = JSON.parse(params);
                        if (result.status === "success") {
                            $this.parents().find("#carImageDel").remove();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            });
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var noFiles = input.files.length;
                    for (let i = 0; i < noFiles; i++) {
                        if (input.files[i].size > 5000000) {
                            alert(input.files[i].name + ' is greater than 5mb');
                            input.value = ''
                            break;
                        }
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            const div = document.createElement('span');
                            div.classList.add('img_' + i)
                            div.style.cssText = 'position:relative'
                            const img = document.createElement('img');
                            img.setAttribute('src', event.target.result);
                            const deleter = document.createElement('span');
                            deleter.innerHTML = '<i class="fa fa-times-circle"></i>'
                            deleter.style.cssText =
                                'cursor:pointer;position:absolute;font-size: 1.3em;right:-3px;color:red;padding:6px;clip-path:circle()';
                            deleter.addEventListener('click', e => {
                                removeImage(input, imgPreviewPlaceholder, i);
                            })
                            div.appendChild(img);
                            div.appendChild(deleter);
                            document.querySelector(imgPreviewPlaceholder).appendChild(div)

                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#fileupload1').on('change', function() {
                document.querySelector('.removedImgs').value = ''
                previewImages(this, 'div.images-preview-div1');
            });

            const removeImage = (input, imgPreviewPlaceholder, index) => {
                let removedImages = document.querySelector('.removedImgs').value;
                removedImages = removedImages += index + ',';
                document.querySelector('.removedImgs').value = removedImages
                const el = document.querySelector('.img_' + index);
                el.parentElement.removeChild(el)
            }
        });
    </script>
@endsection
