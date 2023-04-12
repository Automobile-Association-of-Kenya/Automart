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
            /* color: #FFF; */
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
                    All cars under Firstname: {{ $user->name }}, Email: {{ $user->email }}, Phone: {{ $user->number }}
                </div>


                @include('layouts.sidebar')

                <div class="col-md-10 mt-5 pt-5">
                    <div class="row">
                        @include('partials.alert')
                        @if (!empty($vehicles) && $vehicles->count())
                            @foreach ($vehicles->all() as $item)
                                <div class="col-md-4">
                                    <div class="car-box bg-white">
                                        <a href="{{ route('details', $item->id) }}">
                                            <div class="car-image">
                                                @php
                                                    $images = json_decode($item->images, true);
                                                @endphp
                                                @if (count($images) > 0)
                                                <img src="{{ url('images/'.$images[0]) }}" alt="car-photo" width="100%" height="250px">
                                                @else
                                                <img src="#" alt="car-photo" width="100%" height="250px">
                                                @endif
                                                <div class="tag">Best Deal</div>
                                            </div>
                                        </a>
                                        <div class="detail">
                                            <div class="location">
                                                <p class="text-black">
                                                    <i class="fa-solid fa-engine"></i>Model:
                                                    {{ $item->carmodel->car_model_name ?? '' }}
                                                </p>
                                            </div>
                                            <div class="location">
                                                <p class="text-black">
                                                    <i class="fa-solid fa-engine"></i>Make:
                                                    {{ $item->carmake->car_make_name ?? '' }}
                                                </p>
                                            </div>
                                            <div class="location">
                                                <p class="text-black">
                                                    <i class="fa-solid fa-engine"></i>Fuel: {{ $item->fuel_type }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="footer clearfix">
                                            <a href="{{ route('details', $item->id) }}" class="btn btn-primary"> <i
                                                    class="fa fa-eye"></i> More
                                                Details
                                            </a>
                                            <a href="{{ route('dealer.editcar', $item->id) }}" class="btn btn-warning"> <i
                                                    class="fa fa-edit"></i> Edit
                                                Details
                                            </a>
                                        </div>

                                    </div>
                                </div>

                                <!-- use this for slideshow -->
                                {{-- <div class="col-sm-12 col-md-4  " style="padding-bottom: 15px;">
                                    <div class="card" style="color: #000">
                                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                            <img src="{{ $vehicle->cover_photo !=null ? asset('images/'.$vehicle->cover_photo) : url('images/' . json_decode($vehicle->images, true)[0]) }}"
                                                style="" width="100%" height="300px" />
                                            <a href="{{ route('details', $vehicle->id) }}">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title">Year of Manufacture: <b>{{ $vehicle->year }}</b></h6>
                                            <h6 class="card-title">Price: <b>Ksh.
                                                    {{ number_format("$vehicle->price", 2) }}</b></h6>
                                            <h6 class="card-title">Make&Model:
                                                <b>{{ strtoupper($vehicle->carmake ? $vehicle->carmake->car_make_name : '') }}/{{ strtoupper($vehicle->carmodel ? $vehicle->carmodel->car_model_name : '') }}</b>
                                            </h6>
                                            <h6 class="card-title">Mileage: <b>{{ number_format("$vehicle->miles", 1) }}
                                                    Kms</b></h6>
                                            <h6 class="card-title">Dealer/Yard: <b>{{ $vehicle->firstname }}</b></h6>
                                            <i class="fas fa-phone fa-1x"></i>&nbsp;{{ $vehicle->phone }}
                                            <i class="fas fa-map-marker-alt fa-1x"></i>&nbsp;{{ $vehicle->county }} <br>
                                            <a href="{{ route('details', $vehicle->id) }}" class="btn btn-primary"> <i
                                                    class="fa fa-eye"></i> More
                                                Details
                                            </a>
                                            <a href="{{ route('dealer.editcar', $vehicle->id) }}" class="btn btn-warning"> <i
                                                    class="fa fa-edit"></i> Edit
                                                Details
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}
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
        // @if (session('loader'))
        //     $(window).on('load', function() {

        //         const myTimeout = setTimeout(myGreeting, 5000);

        //         function myGreeting() {
        //             $('#loading').hide();
        //         }

        //         function myStopFunction() {
        //             clearTimeout(myTimeout);
        //         }
        //     })
        // @endif
    </script>>
@endsection
