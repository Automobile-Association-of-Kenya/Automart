@extends('layouts.dashboard')

@section('title')
    Add Car @parent
@endsection

@section('content')
    @php
        $user = session('user');
    @endphp

    <style>
        label sup{
            color: red;
        }
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
            /* color: #FFF; */
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

        label {
            color: #333333;
        }
    </style>

    @if (session('loader'))
        <div id="loading">
            <img id="loading-image" src="{{ asset('loader.gif') }}" alt="Loading..." />
        </div>
    @endif
    <div class="row" style="padding-right:10px">

        <!-- user profile start -->
        <div id="5" class="">
            <div class="row" style="padding-bottom: 0px;">
                <div class="alert alert-success" role="alert">
                    All your vehicles will be posted under Firstname: {{ $user->name }}, Email: {{ $user->email }},
                    Phone: {{ $user->number }}
                </div>

                @include('layouts.sidebar')

                <div class="col-md-10">
                    <div class="pageLoader" id="pageLoader"></div>
                    @include('partials.alert')

                    <div class="feedback"></div>
                    <p class="text text-red">All fields marked with * are mandatory. </p>

                    <form action="{{ route('savecar') }}" method="POST" enctype="multipart/form-data"
                        id="vehicleAdditionForm">
                        {{ csrf_field() }}
                        <h2 class="form-title" style="color: #00472F">Enter Vehicle Information » </h2>

                        <div class="row">

                            <div class="col-md-12 form-group">
                                <label for="">Enter listing title</label>
                                <input class="form-control form-control-sm" type="text" name="title" required>
                            </div>

                            <input type="hidden" name="str_id" id="str_id" value="{{ $str_id }}">

                            <div class="col-md-6 form-group">
                                <label for="">Country</label>
                                <select name="country" id="country" class="form-control form-control-sm">
                                    <option value="Kenya">Kenya</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">County</label>
                                <select name="county" id="county" class="form-control form-control-sm" required>
                                    @foreach ($counties as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Make <sup>*</sup></label>
                                <select class="form-control form-control-sm" id="car_make" name="make" required>
                                    <option value="Any Make" selected="false">Make</option>
                                    @foreach ($makes as $item)
                                        <option value="{{ $item->car_make_id }}">{{ $item->car_make_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Model <sup>*</sup></label>
                                <select class="form-control form-control-sm" name="model" id="car_model" required
                                    aria-hidden="true" required>
                                    <option value="">Select One </option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Year of Manufacture <sup>*</sup></label>
                                <select class="form-control form-control-sm" name="year" id="year" required>
                                    <option value="">Select One</option>
                                    @for ($i = date('Y', strtotime(now())); $i >= 2000; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px;">
                            <div class="col-md-4 form-group">
                                <label for="">Price <sup>*</sup></label>
                                <input class="form-control form-control-sm" type="number" id="price" name="price"
                                    placeholder="selling Price (Ksh)" required>
                            </div>
                            <div class=" col-md-4 form-group">
                                <label for="">Mileage</label>
                                <input class="form-control form-control-sm" type="number" id="miles" name="miles"
                                    placeholder="mileage (Kms)">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Engine CC <sup>*</sup></label>
                                <input class="form-control form-control-sm" type="number" id="enginecc" name="enginecc"
                                    placeholder="Engine CC" required>
                            </div>

                            <div class="col-md-4">
                                <label>Vehicle Type</label>
                                <select id="vehicle_type" name="vehicle_type" class="form-control form-control-sm"
                                    tabindex="14">

                                    <option value="" selected="selected">Vehicle Type</option>
                                    <option value="Convertibles">Convertibles</option>
                                    <option value="Hatchbacks">Hatchbacks</option>
                                    <option value="SUVs">SUVs</option>
                                    <option value="Saloon Car">Saloon Car</option>
                                    <option value="Station Wagons">Station Wagons</option>
                                    <option value="Pickup Trucks">Pickup Trucks</option>
                                    <option value="Buses">Buses</option>
                                    <option value="Taxis">Taxis</option>
                                    <option value="Vans">Vans</option>
                                    <option value="Motorbikes">Motorbikes</option>
                                    <option value="Trucks">Trucks</option>
                                    <option value="Machinery">Machinery</option>
                                    <option value="Tractors">Tractors</option>
                                    <option value="Trailers">Trailers</option>
                                    <option value="Minis">Minis</option>
                                    <option value="Coupes">Coupes</option>
                                    <option value="Quad Bikes">Quad Bikes</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="">Color</label>

                                <select class="form-control form-control-sm" id="exterior" name="exterior">
                                    <option value="">Select One</option>
                                    <option value="Black">Black</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Beige">Beige</option>
                                    <option value="Dark Green">Dark Green</option>
                                    <option value="Dark Blue">Dark Blue</option>
                                    <option value="Green">Green</option>
                                    <option value="Grey">Grey</option>
                                    <option value="Navy Blue">Navy Blue</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Red">Red</option>
                                    <option value="Sage Grey">Sage Grey</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Urban Green">Urban Green</option>
                                    <option value="White">White</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Other">Other</option>
                                    <option value="Bronze">Bronze</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Maroon">Maroon</option>
                                    <option value="Purple">Purple</option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="">Interior Type</label>
                                <select class="form-control form-control-sm" id="interior" name="interior">
                                    <option value="">Select One</option>
                                    <option value="Leather">Leather</option>
                                    <option value="Fabric">Fabric</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="">Vehicle Usage</label>
                                <select class="form-control form-control-sm" id="usage" name="usage" required>
                                    <option value="">Select One</option>
                                    <option value="New">New</option>
                                    <option value="Local">Locally Used</option>
                                    <option value="Foreign">Foreign Used</option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="">Fuel Type</label>
                                <select class="form-control form-control-sm" id="fuel_type" name="fuel_type" required>
                                    <option value="">Select One</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="Diesel-Hybrid">Diesel-Hybrid</option>
                                    <option value="Electic">Electic</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                            <label>Transmission</label>
                            <select class="form-control form-control-sm" id="transmission" name="transmission" required>
                                <option value="">Select One</option>
                                <option value="Automatic">Automatic</option>
                                <option value="Manual">Manual</option>
                                <option value="Semi-Auto">Semi-Auto</option>
                                <option value="None">None</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Vehicle Description</label>
                            <textarea class="form-control form-control-sm" required id="description" name="description" required></textarea>
                        </div>
                        </div>


                        <h2 class="form-title" style="color: #000000">Select Vehicle Features » </h2>

                        <div class="row" style="color:#000;">
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

                        <div class="row" style="color:#000;">
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

                        <div class="row" style="color:#000;">
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

                        <div class="row" style="color:#000;">
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
                        <div class="row" style="color:#000;">
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
                        <div class="row" style="color:#000;">
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
                        <div class="row" style="color:#000;">
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



                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="">Upload Cover Photo</label>
                                <div class="input-group coverPhotoUpload">
                                    <input type="file" id="fileupload1" name="cover_photo"
                                        placeholder="Upload Photos">
                                </div>
                                <input type="hidden" name="removedImages1" class="removedImgs1" value=''>
                            </div>
                            <div class="col-sm-6 form-group" style="color:#000;">
                                <span class="instructions">This is the image that will appear on the top.</span>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="mt-1">
                                    <div class="images-preview-div1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>
                                    Upload Photos
                                </label>
                                <input type="hidden" name="removed-images" class="removedImgs">
                                <input type="file" name="images[]" placeholder="Upload Photos" id="multiImagesUpload"
                                    multiple=""><br>
                            </div>

                            <div class="col-md-8" style="color:#000;">
                                <span class="instructions">Images will be automatically resized to fit
                                    the listing layout. We recommend that you upload photos in full
                                    resolution for better results.</span>
                                <span class="instructions-cont">You may upload up to 12 images and each image may be
                                    no larger than 5MB</span>
                            </div>

                            <div class="col-md-12">
                                <div class="mt-1 mb-2">
                                    <div class="images-preview-div" style="margin:1%"> </div>
                                </div>
                            </div>
                            <div id="output">
                                <div class="uploadAlert"></div>
                                <button type="submit" class="btn btn-md btn-primary" id="vehicleImagesUpload"><i
                                        class="fa fa-arrow-up"></i>&nbsp;&nbsp;Upload Images</button>
                            </div>
                            <div class="uploadfeedback"></div>
                        </div>

                        <div class="row">
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
                            </div>

                            <div class="col-md-12">
                                <input type="checkbox" value="Rear View Camera" id="Rear View Camera" name="features[]"
                                    required>&nbsp;&nbsp;&nbsp;
                                <a class="text-center p-3" style="color:#000;" href="/Terms and conditions to seller.pdf"
                                    target="_blank">Terms And
                                    Conditions<br></a>
                            </div>

                            <div class="col-md-12" style="color:#000;">
                                By clicking this, you have agreed to terms and conditions
                            </div>

                        </div>

                        <button style="background: #00472F;color:white;" type="submit" id="vehicleSubmit"
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
    </div>

@section('footer_scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js"></script> --}}
    <script src="{{ asset('js/create.js') }}"></script>
@endsection
@endsection
