@extends('layouts.app')

@section('title')
    {{ $make->make }} @parent
@endsection

@section('header_styles')
@endsection

@section('main')
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ $make->make }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="featured-car content-area">
        <div class="container">
            @include('layouts.search')

            <div class="row mt-4">

                <div class="col-md-12 mt-4">
                    {{-- <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <div class="sorting-options2">
                                    <h5>Showing 1-20 of <span id="countResults">{{ count($vehicles) }}</span> Vehicles</h5>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="row mt-4" id="vehiclesection">
                        @foreach ($data as $item)
                            @php
                            $vehicle = $item["vehicle"];
                            $model = $item["model"];

                            @endphp
                            <div class="col-lg-4 col-md-6">
                                <div class="car-box-3">

                                    <div class="car-thumbnail">
                                        <a href="{{ route('model.vehicles',$model->id) }}" class="car-img">
                                            <img class="d-block w-100"
                                                src="{{ asset('/vehicleimages/' . @$vehicle->images[0]->image . '') }}"
                                                alt="car">
                                        </a>
                                    </div>

                                    <div class="detail text-center">
                                        <h1 class="title">
                                            <a class="text-success"
                                                href="{{ route('model.vehicles',$model->id) }}">{{ $model->model . '  (' . $model->vehicles_count . ') ' }}</a>
                                        </h1>
                                    </div>
                                    {{-- <div class="footer">
                                        <div class="buttons mb-2 text-center">
                                            <a href="#" class="btn btn-success btn-sm mt-2" id="whatsappToggle"
                                                data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp;
                                                Enquire</a>
                                            <a href="{{ route('buy', $vehicle_no) }}"
                                                class="btn btn-success btn-sm mt-2"><i class="fa fa-hand"></i> Buy</a>
                                            <a href="{{ route('loan', $vehicle_no) }}"
                                                class="btn btn-success btn-sm mt-2"><i class="fa fa-"></i>
                                                Apply
                                                Loan</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>

        @include('layouts.brands')
    @endsection

    @section('footer_scripts')
    @endsection
