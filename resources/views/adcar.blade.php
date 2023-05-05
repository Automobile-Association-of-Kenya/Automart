@extends('layouts.dashboard')

@section('title')
    Add Car | @parent
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
                <div class="col-md-2">
                    <!-- sidebar -->
                    <div class="col-md-12 ">
                        <a href="{{ route('dealer.home') }}"> <button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-home"></i> Home</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ route('dealer.mycars') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-car"></i> My Cars</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ route('dealer.subscriptions') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-credit-card"></i> Subscriptions</button></a>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('dealer.mysales') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-money-bill"></i> My Sale</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ route('dealer.addcar') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"><i
                                    class="fa fa-plus"></i> Add Car</button></a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <a href="{{ route('logout') }}"><button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left"> <i
                                    class="fa fa-sign-out-alt"></i> Logout</button></a>
                    </div>
                    <br>
                </div>

                <div class="col-md-10">
                    <div class="pageLoader" id="pageLoader"></div>
                    @include('partials.alert')
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

                            <div class="col-md-6 form-group">
                                <label for="">Country</label>
                                <select name="country" id="country" class="form-control form-control-sm">
                                    <option value="Kenya">Kenya</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">County</label>
                                <select name="county" id="county" class="form-control form-control-sm">
                                    @foreach ($counties as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                            <div class=" col-md-4 form-group">
                                <label for="">Engine CC <sup>*</sup></label>
                                <input class="form-control form-control-sm" type="number" id="enginecc"
                                    name="enginecc" placeholder="Engine CC" required>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="">Color</label>

                                <select class="form-control form-control-sm" id="exterior" name="exterior" required>
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
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="">Interior Type</label>
                                <select class="form-control form-control-sm" id="interior" name="interior" required>
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

                            <div class="col-md-12 form-group">
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

                        <div class="col-md-12 form-group">
                            <label>Transmission</label>
                            <select class="form-control form-control-sm" id="transmission" name="transmission" required>
                                <option value="">Select One</option>
                                <option value="Automatic">Automatic</option>
                                <option value="Manual">Manual</option>
                                <option value="Semi-Auto">Semi-Auto</option>
                                <option value="None">None</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group" style="padding-top:10px; padding-bottom:15px;">
                            <label class="form-label">Vehicle Description</label>
                            <textarea class="form-control form-control-sm" required id="description" name="description" required></textarea>
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
                            <div id="output"></div>

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
    </div>

@section('footer_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js"></script>

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
                    });


                    var previewImages = function(input, imgPreviewPlaceholder) {
                        if (input.files) {
                            var noFiles = input.files.length;
                            for (let i = 0; i < noFiles; i++) {
                                // if (input.files[i].size > 5000000) {
                                //     alert(input.files[i].name + ' is greater than 5mb');
                                //     input.value = ''
                                //     break;
                                // }
                                var reader = new FileReader();
                                reader.onload = function(event) {
                                    const div = document.createElement('span');
                                    div.classList.add('img_' + i)
                                    div.style.cssText = 'position:relative'
                                    const img = document.createElement('img');
                                    img.setAttribute('src', event.target.result);
                                    img.style.width = '400px';
                                    img.style.height = '200px';
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
                        document.querySelector('.removedImgs1').value = ''
                        previewImages(this, 'div.images-preview-div1');
                    });

                    /** compress cover photo*/
                    var input = document.getElementById('fileupload1');
                    input.addEventListener('change', function() {
                        let $this = $(this);

                        var file = input.files[0];
                        console.log(file);

                        var reader = new FileReader();

                        reader.onload = function() {
                            var img = new Image();
                            img.onload = function() {
                                var width = 800;
                                var height = 600;
                                var canvas = document.createElement('canvas');
                                canvas.width = width;
                                canvas.height = height;
                                canvas.getContext('2d').drawImage(img, 0, 0, width, height);
                                canvas.toBlob(function(blob) {
                                    var compressedFile = new File([blob], file.name, {
                                        type: file.type
                                    });
                                    // localStorage.setItem('cover_photo', JSON.stringify(
                                    //     compressedFile));
                                    // input.files[0] = compressedFile;
                                }, file.type, 0.5);
                            };
                            img.src = reader.result;
                        };
                        reader.readAsDataURL(file);
                    });

                    // /* end compress cover photo*/
                    // const removeImage = (input, imgPreviewPlaceholder, index) => {
                    //     let removedImages = document.querySelector('.removedImgs').value;
                    //     removedImages = removedImages += index + ',';
                    //     document.querySelector('.removedImgs').value = removedImages
                    //     const el = document.querySelector('.img_' + index);
                    //     el.parentElement.removeChild(el)
                    // }





                    // $('#vehicleAdditionForm').on('submit', function(event) {
                    //     console.log('submitted');
                    //     var croppedImages = JSON.parse(localStorage.getItem('croppedImages'));
                    //     let coverph = JSON.parse(localStorage.getItem('cover_photo'));
                    //     // console.log(coverph);
                    //     // console.log(croppedImages);
                    //     var files = [];
                    //     for (var i = 0; i < croppedImages.length; i++) {
                    //         console.log(typeof(croppedImages[i]));
                    //         var blob = dataURItoBlob(croppedImages[i]);
                    //         var file = new File([blob], 'image' + i + '.jpg', {
                    //             type: 'image/jpeg'
                    //         });
                    //         files.push(file);
                    //     }

                    //     var cover = dataURItoBlob(coverph);
                    //     let cover_photo = new File([cover], 'cp' + generateRandomString(7) + '.jpg', {
                    //         type: 'image/jpeg'
                    //     });
                    //     $('#fileupload1').prop('files', cover_photo);
                    //     $('#multiImagesUpload').prop('files', files);
                    //     console.log($('#fileupload1'));
                    //     console.log($('#multiImagesUpload'));
                    //     event.preventDefault();

                    // });

                    // function dataURItoBlob(dataURI) {
                    //     var byteString = atob(dataURI.split(',')[1]);
                    //     var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
                    //     var ab = new ArrayBuffer(byteString.length);
                    //     var ia = new Uint8Array(ab);
                    //     for (var i = 0; i < byteString.length; i++) {
                    //         ia[i] = byteString.charCodeAt(i);
                    //     }
                    //     return new Blob([ab], {
                    //         type: mimeString
                    //     });
                    // }

                    // function generateRandomString(length) {
                    //     let result = '';
                    //     const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                    //     const charactersLength = characters.length;

                    //     for (let i = 0; i < length; i++) {
                    //         result += characters.charAt(Math.floor(Math.random() * charactersLength));
                    //     }

                    //     return result;
                    // }

                    // $('#vehicleAdditionForm').on('submit', function(event) {
                    //     event.preventDefault();
                    //     let $this = $(this);
                    //     var DformData = new FormData();
                    //     console.log(DformData);
                    //     let title = $("input[name='title']").val(),
                    //         country = $("input[name='country']").val(),
                    //         county = $("input[name='county']").val(),
                    //         make = $("input[name='make']").val(),
                    //         model = $("input[name='model']").val(),
                    //         year = $("input[name='year']").val(),
                    //         price = $("input[name='price']").val(),
                    //         miles = $("input[name='miles']").val(),
                    //         enginecc = $("input[name='enginecc']").val(),
                    //         exterior = $("input[name='exterior']").val(),
                    //         interior = $("input[name='interior']").val(),
                    //         usage = $("input[name='usage']").val(),
                    //         fuel_type = $("input[name='fuel_type']").val(),
                    //         transmission = $("input[name='transmission']").val(),
                    //         description = $("input[name='description']").val(),
                    //         firstname = $("input[name='firstname']").val(),
                    //         lastname = $("input[name='lastname']").val(),
                    //         email = $("input[name='email']").val(),
                    //         phone = $("input[name='phone']").val();

                    //     DformData.append('title', title);
                    //     DformData.append('country', country);
                    //     DformData.append('county', county);
                    //     DformData.append('make', make);
                    //     DformData.append('model', model);
                    //     DformData.append('year', year);
                    //     DformData.append('price', price);
                    //     DformData.append('miles', miles);
                    //     DformData.append('enginecc', enginecc);
                    //     DformData.append('exterior', exterior);
                    //     DformData.append('interior', interior);
                    //     DformData.append('usage', usage);
                    //     DformData.append('fuel_type', fuel_type);
                    //     DformData.append('transmission', transmission);
                    //     DformData.append('description', description);
                    //     DformData.append('firstname', firstname);
                    //     DformData.append('lastname', lastname)
                    //     DformData.append('email', email);
                    //     DformData.append('phone', phone);

                    //     var input = document.getElementById('fileupload1');
                    //     var file = input.files[0];
                    //     var reader = new FileReader();
                    //     let croppedImages = [];

                    //     $.when(function() {
                    //         reader.onload = function() {
                    //             var img = new Image();
                    //             img.onload = function() {
                    //                 var width = 800;
                    //                 var height = 600;
                    //                 var canvas = document.createElement('canvas');
                    //                 canvas.width = width;
                    //                 canvas.height = height;
                    //                 canvas.getContext('2d').drawImage(img, 0, 0, width, height);
                    //                 canvas.toBlob(function(blob) {
                    //                     var compressedFile = new File([blob], file.name, {
                    //                         type: file.type
                    //                     });
                    //                     DformData.append('cover_photo', compressedFile);
                    //                 }, file.type, 0.5);
                    //             };
                    //             img.src = reader.result;
                    //         };

                    //         reader.readAsDataURL(file);

                    //         var multiInput = document.getElementById('multiImagesUpload');
                    //         let files = multiInput.files;
                    //         console.log(files);
                    //         for (let i = 0; i < files.length; i++) {
                    //             const element = files[i];
                    //             let reader2 = new FileReader();
                    //             reader2.onload = function() {
                    //                 var image = new Image();
                    //                 image.onload = function() {
                    //                     var width = 600;
                    //                     var height = 450;
                    //                     var canvas1 = document.createElement('canvas');
                    //                     canvas1.width = width;
                    //                     canvas1.height = height;
                    //                     canvas1.getContext('2d').drawImage(img, 0, 0, width,
                    //                     height);
                    //                     canvas1.toBlob(function(blob) {
                    //                         var compressedFile = new File([blob], file
                    //                         .name, {
                    //                             type: file.type
                    //                         });
                    //                         croppedImages.push(compressedFile)
                    //                     }, file.type, 0.5);
                    //                 };
                    //                 img.src = reader.result;
                    //             }
                    //         }
                    //     }).done(function() {
                    //         DformData.append('images', croppedImages);
                    //         // console.log(DformData.entries());
                    //         $.ajaxSetup({
                    //             headers: {
                    //                 'X-CSRF-TOKEN': $this.find("input[name='_token']").val(),
                    //             }
                    //         });
                    //         $.ajax({
                    //             url: '/SellYourCar',
                    //             type: 'POST',
                    //             data: DformData,
                    //             processData: false,
                    //             contentType: false,
                    //             success: function(response) {
                    //                 console.log(response);
                    //             },
                    //             error: function(xhr, status, error) {
                    //                 console.log(error);
                    //             }
                    //         });
                    //     });
                    // });
                    // var multiInput = $('#multiImagesUpload');
                    // multiInput.on('change', function() {
                    //     console.log('tehers');
                    //     let files = multiInput.prop('files');
                    //     console.log(files);
                    //     let croppedImages = [];
                    //     for (let i = 0; i < files.length; i++) {
                    //         const element = files[i];
                    //         let reader2 = new FileReader();
                    //         reader2.onload = function() {
                    //             var image = new Image();
                    //             image.onload = function() {
                    //                 var width = 600;
                    //                 var height = 450;
                    //                 var canvas1 = document.createElement('canvas');
                    //                 canvas1.width = width;
                    //                 canvas1.height = height;
                    //                 canvas1.getContext('2d').drawImage(img, 0, 0, width,
                    //                     height);
                    //                 canvas1.toBlob(function(blob) {
                    //                     var compressedFile = new File([blob], element
                    //                         .name, {
                    //                             type: element.type
                    //                         });
                    //                         console.log(compressedFile);
                    //                     croppedImages.push(compressedFile)
                    //                 }, file.type, 0.5);
                    //             };
                    //             img.src = reader.result;
                    //         }
                    //         // console.log(croppedImages);
                    //     }

                    // })


                    var compressedImages = []; // Array to store compressed images

                    // When input elements with id "imageInput" are changed
                    $("#multiImagesUpload").on("change", function(e) {
                        // Get the files selected
                        var files = e.target.files;

                        // Loop through each file
                        for (var i = 0; i < files.length; i++) {
                            var file = files[i];
                            var reader = new FileReader();

                            // Read the file as an image
                            reader.onload = function(e) {
                                var img = new Image();
                                img.src = e.target.result;

                                // Wait for the image to load
                                img.onload = function() {
                                    // Create a canvas element
                                    var canvas = document.createElement("canvas");
                                    var ctx = canvas.getContext("2d");

                                    // Set the canvas dimensions to the image dimensions
                                    canvas.width = 600;
                                    canvas.height = 450;

                                    // Draw the image on the canvas
                                    ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                                    // Get the compressed data URL of the canvas
                                    var compressedDataUrl = canvas.toDataURL("image/jpeg", 0.8);

                                    // Push the compressed data URL to the compressed images array
                                    compressedImages.push(compressedDataUrl);

                                    // Store the compressed images array to local storage
                                    localStorage.setItem("compressedImages", JSON.stringify(
                                        compressedImages));

                                    // Create an image element to display the compressed image
                                    var compressedImg = new Image();
                                    compressedImg.src = compressedDataUrl;

                                    // Append the compressed image to the output div
                                    $("#output").append(compressedImg);
                                };
                            };
                            // Read the file as a data URL
                            reader.readAsDataURL(file);
                        }
                    });

                        $('#vehicleAdditionForm').on('submit', function(e) {
                            e.preventDefault();
                            var form = $(this);
                            var formData = new FormData(form[0]);
                            // Compress image files
                            formData.set('images', localStorage.getItem('compressedImages'));

                            var files = formData.getAll('images');
                            let croppedImages = [];
                            $.when.apply($, $.map(files, function(file) {
                                var deferred = $.Deferred();
                                // new Compressor(file, {
                                //     quality: 0.6,
                                //     success: function(compressedFile) {
                                //         formData.delete('images[]');
                                //         formData.append('images[]', compressedFile);
                                //         deferred.resolve();
                                //     },
                                //     error: function() {
                                //         deferred.reject();
                                //     }
                                // });
                                return deferred.promise();
                            })).then(function() {
                                // Send form data via AJAX
                                console.log(formData.entries());
                                console.log(croppedImages);
                                // $.ajaxSetup({
                                //     headers: {
                                //         'X-CSRF-TOKEN': form.find("input[name='_token']").val(),
                                //     }
                                // });

                                // $.ajax({
                                //     url: '/SellYourCar',
                                //     type: 'POST',
                                //     data: formData,
                                //     cache: false,
                                //     contentType: false,
                                //     processData: false,
                                //     success: function(response) {
                                //         console.log(response);
                                //         // Handle response from Laravel routes
                                //     },
                                //     error: function(jqXHR, textStatus, errorThrown) {
                                //         console.log(textStatus);
                                //         // Handle AJAX error
                                //     }
                                // });
                            });
                        });

                    });
    </script>
@endsection
@endsection
