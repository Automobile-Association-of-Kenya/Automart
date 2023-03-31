@extends('layouts.new')
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>All Cars</h1>
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">All Cars</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Featured car start -->
    <div class="featured-car content-area" style="background-color:#FFFFFF">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- Option bar start -->
                    <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <div class="sorting-options2">
                                    <h5>You are currently viewing all</h5>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-sm-12">

                            </div>
                        </div>
                    </div>
                    
                    </div>
                 </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (!empty($vehicles) && $vehicles->count())
                            @foreach ($vehicles->all() as $vehicle)
                                <div class="col-lg-4 col-md-4">
                                    <a href="{{ route('details', $vehicle->id) }}" class="car-img">
                                        <div class="car-box-3">
                                            <div class="car-thumbnail">

                                                <div class="for">For Sale</div>
                                                <div class="price-box">

                                                    <span>Ksh. {{ number_format("$vehicle->price") }}</span>
                                                </div>
                                                <img class="d-block w-100"
                                                    src="{{ url('images/' . json_decode($vehicle->images, true)[0]) }}"
                                                    width="200px" height="500px" alt="car">

                                                <div class="carbox-overlap-wrapper">
                                                    <div class="overlap-box">
                                                        {{-- <div class="overlap-btns-area">
                                                        <a class="overlap-btn" data-bs-toggle="modal"
                                                            data-bs-target="#carOverviewModal">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </a>
                                                        <a class="overlap-btn wishlist-btn">
                                                            <i class="fa fa-heart-o"></i>
                                                        </a>
                                                        <a class="overlap-btn compare-btn">
                                                            <i class="fa fa-balance-scale"></i>
                                                        </a>
                                                        <div class="car-magnify-gallery">
                                                            <a href="{{ url('assets/img/car/car-1.jpg')}}" class="overlap-btn"
                                                                data-sub-html="<h4>Lamborghini</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <i class="fa fa-expand"></i>
                                                                <img class="hidden" src="{{ url('assets/img/car/car-1.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                            <a href="{{ url('assets/img/car/car-2.jpg')}}" class="hidden"
                                                                data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <img class="hidden" src="{{ url('assets/img/car/car-2.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                            <a href="{{ url('assets/img/car/car-3.jpg')}}" class="hidden"
                                                                data-sub-html="<h4>Bmw e46 m3 Diski Serie</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <img class="hidden" src="{{ url('assets/img/car/car-3.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                            <a href="{{ url('assets/img/car/car-4.jpg')}}" class="hidden"
                                                                data-sub-html="<h4>Volkswagen Scirocco 2016</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <img class="hidden" src="{{ url('assets/img/car/car-4.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                            <a href="{{ url('assets/img/car/car-5.jpg')}}" class="hidden"
                                                                data-sub-html="<h4>Porsche Cayen Last</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                                                <img class="hidden" src="{{ url('assets/img/car/car-5.jpg')}}"
                                                                    alt="hidden-img">
                                                            </a>
                                                        </div>
                                                    </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <h1 class="title">
                                                    <a style="color:black"
                                                        href="{{ route('details', $vehicle->id) }}">{{ $vehicle->carmodel ? $vehicle->carmodel->car_model_name : '' }}</a>
                                                </h1>
                                                <h1 class="title">
                                                    <a style="color:black"
                                                        href="{{ route('details', $vehicle->id) }}">{{ $vehicle->approved ? 'AA Approved' : '' }}</a>
                                                </h1>
                                                <ul class="custom-list">
                                                    <li>
                                                        <a
                                                            href="{{ route('details', $vehicle->id) }}">{{ $vehicle->carmake ? $vehicle->carmake->car_make_name : '' }}</a>
                                                    </li>

                                                </ul>
                                                <ul class="facilities-list clearfix">
                                                
                                                    <li>
                                                        <i class="flaticon-user"></i> {{ $vehicle->firstname }}
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-way"></i>
                                                        {{ number_format("$vehicle->miles") }} Kms
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-map-marker"></i>
                                                        {{ $vehicle->county }}
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-phone"></i> {{ $vehicle->phone }}
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-money"></i> Ksh.
                                                        {{ number_format("$vehicle->price" )}}
                                                    </li>
                                                    <li>
                                                        <i class="flaticon-calendar-1"></i>{{ $vehicle->year }}
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-eye"></i> <b>  {{ $vehicle->views }}</b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="footer clearfix" style="background-color:#00472F">
                                                <div class="pull-left ratings">
                                                    <i class="fa fa-phone"></i>
                                                    <span style="color:white">Call or Chat with the owner</span>
                                                    <i class="fa fa-envelope"></i>
                                                    <a href="https://wa.me/{{$vehicle->phone}}" style="color: #00472F; margin-left:5px">
                                                    <i class="fa fa-whatsapp"></i>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Page navigation start -->
                    <div class="pagination-box text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{ $vehicles->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured car end -->
@endsection
