@extends('layouts.app')

@section('title')
Vehicles | @parent
@endsection

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>All Cars</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">All Vehicles</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="search-box-2 bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inline-search-area">

                        <form action="{{ route('vehicle.search') }}" method="post" id="vehicleSearchForm">
                            <div class="row row-3">
                                @csrf
                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="searchmake" id="searchMake">
                                        <option> Select Make</option>
                                        @foreach ($makes as $item)
                                            <option value="{{ $item->car_make_id }}">{{ $item->car_make_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="selectmodel" id="selectModel">

                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="searchyear" id="searchYear">
                                        <option value="">Select Year</option>
                                        @for ($i = date('Y', strtotime(now())); $i <= 2003; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="searchtype" id="searchType">
                                        <option value="">Vehicle Type</option>
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

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <select class="form-control form-control-lg" name="searchprice" id="searchPrice">
                                        <option value="">Select Price</option>
                                        <option value="100000">From Ksh. {{ number_format(100000,2) }}</option>
                                        <option value="500000">From Ksh. {{ number_format(500000,2) }}</option>
                                        <option value="1000000">From Ksh. {{ number_format(1000000,2) }}</option>
                                        <option value="1500000">From Ksh. {{ number_format(1500000,2) }}</option>
                                        <option value="2000000">From Ksh. {{ number_format(2000000,2) }}</option>
                                        <option value="2500000">From Ksh. {{ number_format(200000,2) }}</option>
                                        <option value="3000000">From Ksh. {{ number_format(3000000,2) }}</option>
                                        <option value="3500000">From Ksh. {{ number_format(3500000,2) }} and Above</option>
                                    </select>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                    <button type="submit" class="btn white-btn btn-search w-100"
                                        style="background-color: #00472F;" id="searchSubmit">
                                        <i class="fa fa-search text-white"></i><strong>Find</strong>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="searchArea"></div>

    <!-- Featured car start -->
    <div class="featured-car content-area">
        <div class="container">
            <div class="section-header d-flex">
            <h2> Available Vehicles</h2>
        </div>
            <div class="row">
                @php
                    function formatNumber($number)
                    {
                        if (strlen($number) <= 10) {
                            return "+254".intval($number);
                        }else {
                            return $number;
                        }
                    }
                @endphp
                @if (!empty($vehicles) && $vehicles->count())
                    @foreach ($vehicles as $vehicle)
                        <div class="col-lg-4">
                            <a href="{{ route('details', $vehicle->id) }}" class="car-img">
                                <div class="car-box-3">
                                    <div class="car-thumbnail">

                                        @if ($vehicle->approved)
                                        <div class="for bg-warning"><h4 class="text-white">AA Approved</h4></div>
                                        @endif
                                        <div class="price-box">
                                            <span>Ksh. {{ number_format($vehicle->price,2) }}</span>
                                        </div>
                                        @php
                                            $images = json_decode($vehicle->images, true);
                                        @endphp
                                        @if (count($images) > 0)
                                        <img class="d-block w-100" src="{{ url('images/'.@$images[0]) }}" alt="car-photo">
                                        @else
                                        <img class="d-block w-100" src="#" alt="car-photo">
                                        @endif
                                        {{-- <img src="{{ url('images/' . json_decode($->images, true)[0]) }}"
                                            width="100%" height="230px" alt="car"> --}}
                                    </div>
                                    <div class="detail">
                                        <h4 class="title">
                                            <span><small>{{ $vehicle->carmake ? $vehicle->carmake->car_make_name : '' }}</small></span>&nbsp;&nbsp; <a href="{{ route('details', $vehicle->id) }}">{{ $vehicle->carmodel ? $vehicle->carmodel->car_model_name : '' }}</a>
                                        </h4>
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
                                                <i class="flaticon-money"></i> Ksh.
                                                {{ number_format($vehicle->price,2) }}
                                            </li>

                                            <li>
                                                YOM &nbsp;&nbsp;<i class="flaticon-calendar-1"></i>&nbsp;&nbsp;{{ $vehicle->year }}
                                            </li>

                                            <li>
                                                <i class="fa fa-eye"></i>{{ $vehicle->views ?? 0 }} Views
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="footer clearfix" style="background-color:#00472F">
                                        <div class="pull-left ratings">
                                            <i class="fa fa-phone"></i>
                                            <span style="color:white">Call or Chat with the owner</span>
                                            <i class="fa fa-envelope"></i>
                                            <a href="https://wa.me/{{ formatNumber($vehicle->phone) }}" target="_blank"
                                                style="color: #00472F; margin-left:5px">
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
        </div>

        <div class="pagination-box text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $vehicles->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection
