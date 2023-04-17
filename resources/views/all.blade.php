@extends('layouts.app')

@section('title')
All Listings | @parent
@endsection

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>All Cars</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">All Cars</li>
                </ul>
            </div>
        </div>
    </div>

     <div class="search-box-2 bg-warning">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inline-search-area">
                        <div class="row row-3">
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="select-brand">
                                    <option> Select Make</option>
                                    @foreach ($makes as $item)
                                        <option value="{{ $item->car_make_id }}">{{ $item->car_make_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="selectModel">
                                    <option>Select Model</option>
                                </select>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="select-location">
                                    <option>Select Location</option>
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="select-year">
                                    <option>Select Year</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2021</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <select class="selectpicker search-fields" name="select-type">
                                    <option>Select Type Of Car</option>
                                    <option>New Car</option>
                                    <option>Used Car</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-6 search-col">
                                <button class="btn white-btn btn-search w-100" style="background-color: #00472F;">
                                    <i class="fa fa-search text-white"></i><strong>Find</strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured car start -->
    <div class="featured-car content-area">
        <div class="container">
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

                                            <span>Ksh. {{ number_format("$vehicle->price") }}</span>
                                        </div>
                                        @php
                                            $images = json_decode($vehicle->images, true);
                                        @endphp
                                        @if (count($images) > 0)
                                        <img src="{{ url('images/'.@$images[0]) }}" alt="car-photo" width="100%" height="250px">
                                        @else
                                        <img src="#" alt="car-photo" width="100%" height="300px">
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
                                                <i class="flaticon-phone"></i> {{ $vehicle->phone }}
                                            </li>
                                            <li>
                                                <i class="flaticon-money"></i> Ksh.
                                                {{ number_format("$vehicle->price") }}
                                            </li>
                                            <li>
                                                <i class="flaticon-calendar-1"></i>{{ $vehicle->year }}
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
