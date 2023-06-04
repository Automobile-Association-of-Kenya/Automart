@extends('layouts.app')

@section('title')
    New @parent
@endsection

@section('header_styles')
@endsection

@section('main')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>New</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">New</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Featured car start -->
    <div class="featured-car content-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    @include('layouts.right')
                </div>

                <div class="col-lg-9 col-md-12">
                    <!-- Option bar start -->
                    <div class="option-bar clearfix">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <div class="sorting-options2">
                                    <h5>Showing 1-20 of {{ count($vehicles) }} Listings</h5>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-6 col-sm-12">
                                {{-- <div class="sorting-options float-end">
                                    <a href="car-list-rightside.html" class="change-view-btn float-right"><i
                                            class="fa fa-th-list"></i></a>
                                    <a href="{{ url('') }}" class="change-view-btn active-view-btn float-right"><i class="fa fa-th-large"></i></a>
                        </div> --}}
                                <div class="sorting-options-3 float-end">
                                    <select class="selectpicker search-fields" name="default-order">
                                        <option>Default Order</option>
                                        <option>Price High to Low</option>
                                        <option>Price: Low to High</option>
                                        <option>Newest Properties</option>
                                        <option>Oldest Properties</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row" id="vehiclesection">
                        @foreach ($vehicles as $item)
                            @php
                                $images = json_decode($item['images']);
                                $tags = json_decode($item['tags']);
                            @endphp
                            <div class="col-lg-4 col-md-4">
                                <div class="car-box-3">
                                    <div class="car-thumbnail">
                                        <a href="#" class="car-img">
                                            <div class="for">{{ $tags[0] }}</div>
                                            <div class="price-box">
                                                {{-- <span class="del"><del>$950.00</del></span> --}}
                                                {{-- <br> --}}
                                                <span>Kes: {{ number_format($item->price, 2) }}</span>
                                            </div>
                                            <img class="d-block w-100"
                                                src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                alt="car">
                                        </a>
                                        <div class="carbox-overlap-wrapper">
                                            <div class="overlap-box">
                                                <div class="overlap-btns-area">
                                                    <a class="overlap-btn" data-bs-toggle="modal"
                                                        data-bs-target="#carOverviewModal" data-id="{{ $item->id }}"
                                                        id="vehicleDetailsModalToggle">
                                                        <i class="fa fa-eye-slash"></i>
                                                    </a>
                                                    <a class="overlap-btn wishlist-btn">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                    {{-- <a class="overlap-btn compare-btn">
                                                        <i class="fa fa-balance-scale"></i>
                                                    </a> --}}
                                                    <div class="car-magnify-gallery">
                                                        <a href="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                            class="overlap-btn"
                                                            data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                            <i class="fa fa-expand"></i>
                                                            <img class="hidden"
                                                                src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                                alt="hidden-img">
                                                        </a>
                                                        @foreach ($images as $image)
                                                            <a href="{{ asset('/vehicleimages/' . $image . '') }}"
                                                                class="hidden"
                                                                data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                                <img src="{{ asset('/vehicleimages/' . $image . '') }}"
                                                                    alt="hidden-img">
                                                            </a>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @foreach ($images as $image)
                                    @endforeach

                                    <div class="detail">
                                        <h1 class="title">
                                            <a
                                                href="{{ route('vehicles.show', $item->id) }}">{{ $item->model->model }}</a>
                                        </h1>
                                        <ul class="custom-list">
                                            <li>
                                                <a href="{{ route('vehicles.show', $item->id) }}">{{ $item->usage }}</a>
                                                /
                                            </li>
                                            <li>
                                                <a href="">{{ $item->transmission }}</a> /
                                            </li>
                                            <li>
                                                <a href="#">{{ $item->type?->type }}</a>
                                            </li>
                                        </ul>
                                        <ul class="facilities-list clearfix">

                                            <li>
                                                <i class="flaticon-fuel"></i> {{ $item->fuel_type }}
                                            </li>
                                            <li>
                                                <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km
                                            </li>

                                            <li>
                                                <i class="flaticon-manual-transmission"></i> {{ $item->transmission }}
                                            </li>
                                            <li>
                                                <i class="flaticon-car"></i> {{ $item->type?->type }}
                                            </li>

                                            <li>
                                                <i class="flaticon-gear"></i> {{ $item->color }}
                                            </li>
                                            <li>
                                                <i class="flaticon-calendar-1"></i> {{ $item->year }}
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Page navigation start -->
                    <div class="pagination-box p-box-2 text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="pagination">
                                {{ $vehicles->links() }}
                                {{-- <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-left"></i></a>
                                </li>

                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                </li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured car end -->
@endsection

@section('footer_scripts')
@endsection
