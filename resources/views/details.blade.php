@extends('layouts.new')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/magnific-popup/magnific-popup.css') }}">
<style>
    .center {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>Car Details</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li class="active">Car Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Car details page start -->
    <div class="car-details-page content-area-4">
        <div class="container">
            <div class="row" style="background-color:#FFFFFF;">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="">
                        <div class="card">
                            <div class="">
                                <div class=" row">
                                    <div class="preview  col-md-6">
                                        <div class="preview-pic tab-content parent-container" style="position: relative;">
                                            @if ($vehicle->cover_photo != null)
                                                <div id="pict-0" class="tab-pane active" id="pic-0">
                                                    <a class="test-popup-link"
                                                        href="{{ url('images/' . $vehicle->cover_photo) }}">
                                                        <img src="{{ url('images/' . $vehicle->cover_photo) }}" /></a>
                                                </div>
                                                @foreach (json_decode($vehicle->images) as $key => $item)
                                                    <div id="pict-{{ $loop->index }}" class="tab-pane"
                                                        id="pic-{{ $loop->index }}">
                                                        <a class="test-popup-link" href="{{ url('images/' . $item) }}">
                                                            <img src="{{ url('images/' . $item) }}" /></a>
                                                    </div>
                                                @endforeach
                                            @else
                                                @foreach (json_decode($vehicle->images) as $key => $item)
                                                    @if ($loop->index == 0)
                                                        <div id="pict-{{ $loop->index }}" class="tab-pane active"
                                                            id="pic-{{ $loop->index }}">
                                                            <a class="test-popup-link" href="{{ url('images/' . $item) }}">
                                                                <img src="{{ url('images/' . $item) }}" />
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div id="pict-{{ $loop->index }}" class="tab-pane"
                                                            id="pic-{{ $loop->index }}">
                                                            <a class="test-popup-link" href="{{ url('images/' . $item) }}">
                                                                <img src="{{ url('images/' . $item) }}" />
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif

                                            <a data-target="#pic-1" data-toggle="tab" class="next-image"
                                                style="position: absolute;right:0;top:40%;padding:15px;background:#00472F;color:white;cursor:pointer;">
                                                <i class="fa fa-chevron-right"></i>
                                            </a>

                                            <a data-target="#pic-{{ count(json_decode($vehicle->images)) - 1 }}"
                                                data-toggle="tab" class="prev-image"
                                                style="position: absolute;left:0;top:40%;padding:15px;background:#00472F;color:white;cursor:pointer;">
                                                <i class="fa fa-chevron-left"></i>
                                            </a>
                                            <script>
                                                document.querySelector('.next-image').addEventListener('click', e => {
                                                    let element = document.querySelector('.next-image');
                                                    let number = (element.getAttribute('data-target').split('-')[1] * 1) + 1;
                                                    if (number > {{ count(json_decode($vehicle->images)) - 1 }}) {
                                                        number = 0;
                                                    }
                                                    element.parentNode.querySelectorAll('.tab-pane').forEach(tab => {
                                                        tab.classList.remove('active');
                                                    });
                                                    document.querySelector('#pict-' + number).classList.add('active')
                                                    element.setAttribute('data-target', '#pic-' + number);
                                                })

                                                document.querySelector('.prev-image').addEventListener('click', e => {
                                                    let element = document.querySelector('.prev-image');
                                                    let number = (element.getAttribute('data-target').split('-')[1] * 1) - 1;
                                                    if (number < 0) {
                                                        number = 0;
                                                    }
                                                    element.parentNode.querySelectorAll('.tab-pane').forEach(tab => {
                                                        tab.classList.remove('active');
                                                    });
                                                    document.querySelector('#pict-' + number).classList.add('active')
                                                    element.setAttribute('data-target', '#pic-' + number);

                                                })
                                            </script>
                                        </div>

                                        <ul class="preview-thumbnail nav nav-tabs">
                                            @foreach (json_decode($vehicle->images) as $key => $item)
                                                @if ($loop->index == 0)
                                                    <li class="active"><a data-target="#pic-{{ $loop->index }}"
                                                            data-toggle="tab"><img
                                                                src="{{ url('images/' . $item) }}" /></a></li>
                                                @else
                                                    <li><a data-target="#pic-{{ $loop->index }}" data-toggle="tab"><img
                                                                src="{{ url('images/' . $item) }}" /></a></li>
                                                @endif
                                            @endforeach
                                        </ul>

                                    </div>
                                    <div class="details col-md-6">
                                        <h3 class="product-title">{{ strtoupper($vehicle->carmake->car_make_name) }}
                                            {{ strtoupper($vehicle->carmodel->car_model_name) }}</h3>
                                        <div class="rating">
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <!-- <span class="review-no">41 reviews</span> -->
                                        </div>
                                        <p class="product-description">{{ $vehicle->description }}</p>
                                        <h4 class="price">current price: <span>KES {{ $vehicle->price }}</span></h4>
                                        <i class="flaticon-pin"></i>{{ $vehicle->county }}

                                        <div class="action" style="text-align:left, font-family:fantasy">
                                            <!-- <button class="btn btn-success btn-lg" type="button">Buy The Car</button> -->
                                            <h5 class="card-title" style="text-align:left, font-family:fantasy"> Safety Tips
                                            </h5>
                                            <ol type="disc">
                                                <li>Inspect the vehicle to make sure they meet your needs.</li>
                                                <li>Meet the seller at a safe public place.</li>
                                                <li>Don't send any pre-payments.</li>
                                                <li>Check all documentation and only pay if you're satisfied.</li>
                                            </ol>
                                        </div>
                                        <a target="blank" href="https://wa.me/{{ $vehicle->phone }}"
                                            style="color: #00472F; margin-left:5px">

                                            <button class="btn btn-success">
                                                <i class="fa fa-whatsapp"></i> WhatsApp seller
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">

                        <a href="#">
                            <div class="mask " style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body" style="color: #000; background-color:#00472F;">
                        <h5 class="card-title text-center" style="color:white">More Details.</h5>

                    </div>
                </div>
                <!-- Deal of the week end -->
            </div>
            <div class="col-md-12">
                <div class="row" style="color:#000; padding-bottom:10px;">
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5>Price:</h5>
                                <h5><b>Ksh.{{ number_format("$vehicle->price") }}</b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5>Mileage:</h5>
                                <h5><b>{{ number_format("$vehicle->miles") }} Kms</b></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5>Location:</h5>
                                <h5><b><i class="fas fa-map-marker-alt fa-1x"></i>&nbsp;{{ $vehicle->county }}
                                        {{ $vehicle->country }}&nbsp</b></h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card">
                            <h5 class="card-title">Contacts:</h5>
                            <div class="card-body">
                                <h6><b>{{ $vehicle->phone }} - {{ $vehicle->email }}</b></h6>

                            </div>
                        </div>
                    </div>

                    <div class="container-fluid" style=" !Important; border-radius:5px; padding-bottom:5px;">
                        <h4 style="font-family:Garamond;color:ghostblack;"><b>Vehicle Details</b></h4>
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                Make/Model:&nbsp;<b>{{ strtoupper($vehicle->carmake->car_make_name) }}
                                    {{ strtoupper($vehicle->carmodel->car_model_name) }}</b>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                Year of Manufacture:&nbsp;<b>{{ $vehicle->year }}</b>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                Transmission:&nbsp;<b>{{ strtoupper($vehicle->transmission) }}</b>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                Fuel:&nbsp;<b>{{ strtoupper($vehicle->fuel_type) }}</b>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                Color:&nbsp;<b>{{ strtoupper($vehicle->exterior) }}</b>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                Vehicle Type:&nbsp;<b>{{ strtoupper($vehicle->vehicle_type) }}</b>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                Vehicle Registration No.&nbsp;:&nbsp;<b>{{ strtoupper($vehicle->vin) }}</b>
                            </div>
                        </div>

                    </div>
                    &nbsp;
                    <div class="container-fluid" style=" !Important; border-radius:5px; padding-bottom:5px;">
                        <h4 style="font-family:Garamond; color: ghostblack;"><b>Vehicle Features</b></h4>
                        @foreach (json_decode($vehicle->features, true) as $feature)
                            <i class='fa fa-check' style='color: #006544;'></i>
                            |&nbsp;{{ $feature }}&nbsp;|&nbsp;&nbsp;
                        @endforeach
                        <table class="table" style="color:#fff;">
                            <tbody>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    &nbsp;
                    {{-- <div class="container-fluid" style="!Important; border-radius:5px; padding-bottom:5px;">
                            <h4 style="font-family:Garamond;color: ghostblack;"><b>Description</b></h4>
                            {{ $vehicle->description }}
                            <table class="table" style="color:#fff;">
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}


                    <!-- Car details page end -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:yellow">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Safety Tips</h5>
                                    <button type="button" onclick="closeModal()" class="close"
                                        style="background-color:" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- <div class="modal-body">
                                            <h5 class="card-title"> Beware of cons, please take note of the following;</h5>
                                            <div class="text-center">
            
                                                <p> 1. Inspect the vehicle to make sure they meet your needs.</p><br>
                                                <p style="margin-top:-30px; margin-right:130px"> 2.Meet the seller at a safe public
                                                    place.</p><br>
                                                <p style="margin-top:-30px;margin-right:178px"> 3.Don't send any pre-payments.</p></br>
                                                <p style="margin-top:-30px; margin-right:-10px"> 4.Check all documentation and only pay
                                                    if you're satisfied.</p></br>
                                            </div>
                                        </div> -->
                                <!-- <div class="modal-footer" >
                                          <button type="button" onclick="closeModal()" class="btn btn-secondary" style="background-color:green" data-dismiss="modal">Close</button>
                                        </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- <script>
                        $(window).on('load', function() {
                            $("#exampleModalCenter").modal("show");
                        })

                        function closeModal() {
                            $("#exampleModalCenter").modal("hide");
                        }
                    </script> -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                    <script src="{{ asset('assets/magnific-popup/jquery.magnific-popup.js') }}"></script>
                    <script>
                        $(document).ready(function() {
                            $('.image-link').magnificPopup({
                                type: 'image'
                            });
                        });
                    </script>
                @endsection
