{{-- @extends('layouts.main')
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
    <div class="col-6 col-md-4" style="background-color : rgba(0,0,0, 0.3) !Important;">
      <span class="badge bg-info"
          style="width: 100%; padding-top:10px;
padding-bottom:10px; background-color: rgba(254,217,37, 0.8) !Important;"></span>
      <!-- Deal of the week start -->
      <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="{{ url('images/' . json_decode($vehicle->images, true)[0]) }}" class="img-fluid" />
              <a href="#">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
          </div>
         
      </div>
      <!-- Deal of the week end -->
  </div>
    <div class="col-md-8" style="padding-left : 20px; padding-right : 20px;">
        <h5>Car ID: <b>{{ $vehicle->carId }}</b></h5>
        <h5>Plate: <b>{{ strtoupper($vehicle->vin) }}</b></h5>
        <!-- Carousel wrapper -->
        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="4"
                    aria-label="Slide 5"></button>
                <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="5"
                    aria-label="Slide 6"></button>
            </div>
            <style>
                img {
                    width: auto;
                    height: auto;
                }
            </style>

            <!-- Inner -->
            <div class="carousel-inner">
                @php
                    $price = number_format("$vehicle->price", 2);
                    $make = strtoupper($vehicle->make);
                    $model = strtoupper($vehicle->model);
                    $phone = $vehicle->phone;
                    $place = $vehicle->county;
                @endphp
                <!-- Single item -->
                @foreach (json_decode($vehicle->images) as $key => $item)
                    <div class="carousel-item {{$key==0 ? 'active':''}}">
                        <img src="{{ url('images/' . $item) }}" class="d-block w-100" alt="Sunset Over the City"
                            style="height:370px;" />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Car Images </h5>
                            <p><b>make / model <i class="fas fa-phone fa-1x"></i>&nbsp;phone
                                    <i class="fas fa-map-marker-alt fa-1x"></i>&nbsp;place</b></p>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel wrapper -->
    </div>
    </div>
    <div class="row" style="padding-left: 20px; padding-top: 10px; padding-bottom: 20px; color: #fff;">
        <div class="col-6 col-md-4" style="background-color : rgba(0,0,0, 0.3) !Important;">
            <span class="badge bg-info"
                style="width: 100%; padding-top:10px;
padding-bottom:10px; background-color: rgba(254,217,37, 0.8) !Important;">DEAL
                OF THE WEEK</span>
            <!-- Deal of the week start -->
            <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="{{ url('images/photo_2021-08-27_11-16-30.jpg') }}" class="img-fluid" />
                    <a href="#">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body" style="color: #000">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">More Details</a>
                </div>
            </div>
            <!-- Deal of the week end -->
        </div>
        <div class="col-md-8">
            <div class="row" style="color:#000; padding-bottom:10px;">
                <div class="col-6 col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Price:</h5>
                            <h5><b>Ksh.{{ number_format("$vehicle->price") }}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>Mileage:</h5>
                            <h5><b>{{ number_format("$vehicle->miles") }} Kms</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h5><b><i class="fas fa-map-marker-alt fa-1x"></i>&nbsp;{{ $vehicle->country }}</b></h5>
                            <h5><b><i class="fas fa-map-marker-alt fa-1x"></i>&nbsp;{{ $vehicle->county }}</b></h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <h6><b><i class="fas fa-phone fa-1x"></i>{{ $vehicle->phone }}</b></h6>
                            <h6><b>{{ $vehicle->email }}</b></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="background-color : rgba(0, 0, 0, 0.7) !Important; border-radius:5px;">
                <h5 style="font-family:Garamond;">{{ strtoupper($vehicle->title) }}</h5>
            </div>
            <div class="container-fluid"
                style="background-color : rgba(0, 0, 0, 0.7) !Important; border-radius:5px; padding-bottom:5px;">
                <h4 style="font-family:Garamond;"><b>Vehicle Details</b></h4>
                <table class="table" style="color:#fff;">
                    <tbody>
                        <tr>
                            <td>
                                Make/Model:&nbsp;<b>{{ strtoupper($vehicle->carmake->car_make_name) }}/{{ strtoupper($vehicle->carmodel->car_model_name) }}</b>
                            </td>
                            <td>
                                Year of Manufacture:&nbsp;<b>{{ $vehicle->year }}</b>
                            </td>
                            <td>
                                Transmission:&nbsp;<b>{{ strtoupper($vehicle->transmission) }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Fuel:&nbsp;<b>{{ strtoupper($vehicle->fuel_type) }}</b>
                            </td>
                            <td>
                                Color:&nbsp;<b>{{ strtoupper($vehicle->exterior) }}</b>
                            </td>
                            <td>
                                Vehicle Type:&nbsp;<b>{{ strtoupper($vehicle->vehicle_type) }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Vehicle Registration No.&nbsp;:&nbsp;<b>{{ strtoupper($vehicle->phone) }}</b>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            &nbsp;
            <div class="container-fluid"
                style="background-color : rgba(0, 0, 0, 0.7) !Important; border-radius:5px; padding-bottom:5px;">
                <h4 style="font-family:Garamond;"><b>Vehicle Feartures</b></h4>
                @foreach (json_decode($vehicle->features, true) as $feature)
                    <i class='fa fa-check' style='color: #fed925;'></i> |&nbsp;{{ $feature }}&nbsp;|&nbsp;&nbsp;
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
            <div class="container-fluid"
                style="background-color : rgba(0, 0, 0, 0.7) !Important; border-radius:5px; padding-bottom:5px;">
                <h4 style="font-family:Garamond;"><b>Description</b></h4>
                {{ $vehicle->description }}
                <table class="table" style="color:#fff;">
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="slide car-details-section cds-2">
                        <!-- Heading start -->
                        <div class="heading-car clearfix">
                            <div class="pull-left">
                                <h3>{{ strtoupper($vehicle->carmake->car_make_name) }}
                                    {{ strtoupper($vehicle->carmodel->car_model_name) }}</h3>
                                <p>
                                    <i class="flaticon-pin"></i>{{ $vehicle->county }}
                                </p>
                            </div>
                            <div class="pull-right">
                                <div class="price-box-3"><sup>Kshs <span>{{ $vehicle->price }}</span></div>
                            </div>
                        </div>
                        <div class="product-slider-box cds-2 clearfix mb-30">
                            <div class="product-img-slide">
                                <div class="slider-for">
                                    @foreach (json_decode($vehicle->images) as $key => $item)
                                        <img src="{{ url('images/' . $item) }}" class="img-fluid w-100" alt="slider-car"
                                           style="max-width: 870px !important; height:590px">
                                    @endforeach
                                </div>
                                <div class="slider-nav">
                                    @foreach (json_decode($vehicle->images) as $key => $item)
                                        <div class="thumb-slide"><img src="{{ url('images/' . $item) }}" class="img-fluid"
                                                alt="small-car" width="133" height="95">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Advanced search start -->

                    </div>


                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">

                            <a href="#">
                                <div class="mask " style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body" style="color: #000">
                            <h5 class="card-title text-center">More Details.</h5>

                        </div>
                    </div>
                    <!-- Deal of the week end -->
                </div>

                <div class="col-md-12">
                    <div class="row" style="color:#000; padding-bottom:10px;">
                        <div class="col-6 col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Price:</h5>
                                    <h5><b>Ksh.{{ number_format("$vehicle->price") }}</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Mileage:</h5>
                                    <h5><b>{{ number_format("$vehicle->miles") }} Kms</b></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Location:</h5>
                                    <h5><b><i class="fas fa-map-marker-alt fa-1x"></i>&nbsp;{{ $vehicle->county }}
                                            {{ $vehicle->country }}&nbsp</b></h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="card">
                                <h5 class="card-title">Contacts:</h5>
                                <div class="card-body">
                                    <h6><b>{{ $vehicle->phone }} - {{ $vehicle->email }}</b></h6>

                                </div>
                            </div>
                        </div>

                        <div class="container-fluid" style=" !Important; border-radius:5px; padding-bottom:5px;">
                            <h4 style="font-family:Garamond;color:white;"><b>Vehicle Details</b></h4>
                            <table class="table" style="color:#000000;">
                                <tbody>
                                    <tr>
                                        <td>
                                            Make/Model:&nbsp;<b>{{ strtoupper($vehicle->carmake->car_make_name) }}
                                                {{ strtoupper($vehicle->carmodel->car_model_name) }}</b>
                                        </td>
                                        <td>
                                            Year of Manufacture:&nbsp;<b>{{ $vehicle->year }}</b>
                                        </td>
                                        <td>
                                            Transmission:&nbsp;<b>{{ strtoupper($vehicle->transmission) }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Fuel:&nbsp;<b>{{ strtoupper($vehicle->fuel_type) }}</b>
                                        </td>
                                        <td>
                                            Color:&nbsp;<b>{{ strtoupper($vehicle->exterior) }}</b>
                                        </td>
                                        <td>
                                            Vehicle Type:&nbsp;<b>{{ strtoupper($vehicle->vehicle_type) }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Vehicle Regiatration No.&nbsp;:&nbsp;<b>{{ strtoupper($vehicle->vin) }}</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        &nbsp;
                        <div class="container-fluid" style=" !Important; border-radius:5px; padding-bottom:5px;">
                            <h4 style="font-family:Garamond; color: whitesmoke;"><b>Vehicle Feartures</b></h4>
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
                        <div class="container-fluid" style="!Important; border-radius:5px; padding-bottom:5px;">
                            <h4 style="font-family:Garamond;color: ghostwhite;"><b>Description</b></h4>
                            {{ $vehicle->description }}
                            <table class="table" style="color:#fff;">
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Car details page end -->
                @endsection
