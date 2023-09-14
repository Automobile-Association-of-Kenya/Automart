@extends('layouts.app')

@section('title')
    {{ $model->model }} @parent
@endsection

@section('header_styles')
@endsection

@section('main')
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ $model->model }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Featured car start -->
    <div class="featured-car content-area">
        <div class="container">
            @include('layouts.search')

            <div class="row mt-4">
                <div class="col-lg-12 col-md-12">

                    <div class="row" id="vehiclesection">

                        @foreach ($vehicles as $item)
                            @php
                                $images = $item->images;
                                $vehicle_no = $item->vehicle_no ?? $item->id;
                            @endphp
                            <div class="col-lg-3 col-md-6">
                                <div class="car-box-3">

                                    <div class="car-thumbnail">
                                        <a href="{{ url('/vehicle/' . $vehicle_no) }}" class="car-img">
                                            @if ($item->sponsored === 1)
                                                <div class="tag-2 bg-active">Sponsored</div>
                                            @else
                                                <div class="for">{{ $item->usage }}</div>
                                            @endif

                                            <div class="price-box">
                                                <span>Kes: {{ number_format($item->price, 2) }}</span>
                                            </div>
                                            <img class="d-block w-100"
                                                src="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}" alt="car">
                                        </a>
                                        <div class="carbox-overlap-wrapper">
                                            <div class="overlap-box">
                                                <div class="overlap-btns-area">
                                                    <a class="overlap-btn" data-bs-toggle="modal"
                                                        data-bs-target="#vehicleDetailsModal"
                                                        data-id="{{ $item->id }}" id="vehicleDetailsModalToggle">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </a>
                                                    <a class="overlap-btn wishlist-btn" data-id="{{ $item->id }}">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>

                                                    <div class="car-magnify-gallery">
                                                        <a href="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}"
                                                            class="overlap-btn"
                                                            data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                            <i class="fa fa-expand"></i>
                                                            <img class="hidden"
                                                                src="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}"
                                                                alt="hidden-img">
                                                        </a>
                                                        @foreach ($images as $image)
                                                            <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                class="hidden"
                                                                data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                                <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                    alt="hidden-img">
                                                            </a>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="detail text-center">
                                        <h1 class="title">
                                            <a class="text-success"
                                                href="{{ url('/vehicle/' . $vehicle_no) }}">{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}</a>
                                        </h1>
                                        <ul class="custom-list">
                                            <li>
                                                <a href="{{ url('/vehicle/' . $vehicle_no) }}">{{ $item->usage }}</a>
                                                &nbsp;|&nbsp;
                                            </li>
                                            <li>
                                                <a href="">{{ $item->transmission }}</a> &nbsp;|&nbsp;
                                            </li>
                                            <li>
                                                <a href="#">{{ $item->fuel_type }}</a>
                                            </li>
                                        </ul>

                                        <ul class="custom-list">
                                            <li>
                                                <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km &nbsp;|&nbsp;
                                            </li>
                                            <li>
                                                <i class="flaticon-gear"></i> {{ $item->enginecc }} cc
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="footer">
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
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="pagination-box p-box-2 text-center">
                        <nav>
                            <ul class="pagination" id="pagination">
                                {!! $vehicles->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.brands')

@endsection

@section('footer_scripts')
@endsection
