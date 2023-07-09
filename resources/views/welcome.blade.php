@extends('layouts.app')

@section('title')
    Home @parent
@endsection

@section('main')
    @include('layouts.banner')
    <!-- Banner end -->

    <!-- Search box 2 start -->
    {{-- <div class="search-box-2"> --}}
    @include('layouts.search')
    {{-- </div> --}}
    <!-- Featured car start -->
    <div class="featured-car content-area-21 bg-white">
        <div class="container">
            <div class="featured-slider row slide-box-btn slider"
                data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach ($introvehicles as $item)
                    @php
                        $images = $item->images;
                        $image = @$images[0]?->image;
                        $vehicle_no = $item->vehicle_no ?? $item->id;
                    @endphp
                    <div class="slide slide-box">
                        {{-- <a href="{{ url('vehicle/' . $vehicle->vehicle_no . '/sponsored') }}"> --}}
                        {{-- <div class="car-box">
                                <div class="car-image">
                                    @if (file_exists("{{ asset('/vehicleimages/' . $image) }}"))
                                        <img class="d-block w-100" src="{{ asset('/vehicleimages/' . $image) }}"
                                            alt="{{ $vehicle->make->make . ' ' . $vehicle->model->model }}">
                                    @else
                                        <img class="d-block w-100" src="{{ asset('/images/default.jpg') }}"
                                            alt="{{ $vehicle->make->make . ' ' . $vehicle->model->model }}">
                                    @endif
                                    <div class="tag">Sponsored</div>
                                    <div class="facilities-list">
                                        <ul>
                                            <li>
                                                <i class="flaticon-way"></i>{{ $vehicle->mileage }} km
                                            </li>

                                            <li>
                                                <i class="flaticon-calendar-1"></i> {{ $vehicle->year }}
                                            </li>

                                            <li>
                                                <i class="flaticon-manual-transmission"></i>
                                                {{ $vehicle->transmission }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="detail">
                                    <h1 class="title" style="text-transform: capitalize;">
                                        <a
                                            href="{{ url('vehicle/' . $vehicle->vehicle_no . '/sponsored') }}">{{ $vehicle->year . ' ' . $vehicle->make->make . ' ' . $vehicle->model->model }}</a>
                                    </h1>
                                    <div class="pull-right">
                                        <p>Kes. <span
                                                class="price text-warning">{{ number_format($vehicle->price, 2) }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="footer">
                                        <a href="#" class="btn btn-success btn-sm" id="whatsappToggle"
                                            data-id="{{ $vehicle->id }}"><i class="fa fa-whatsapp"></i>&nbsp; Enquire</a>
                                        <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm"><i
                                                class="fa fa-hand"></i> Buy</a>
                                        <a href="{{ route('loan', $vehicle_no) }}"
                                            class="btn btn-success btn-sm float-ri"><i class="fa fa-"></i> Apply
                                            Loan</a>
                                </div>
                            </div> --}}
                        {{-- </a> --}}

                        <div class="car-box-3">
                            <div class="car-thumbnail">
                                <a href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}" class="car-img">
                                    <div class="for">{{ $item->usage }}</div>
                                    <div class="price-box">
                                        <span>Kes: {{ number_format($item->price, 2) }}</span>
                                    </div>
                                    {{-- @if (file_exists("{{ asset('/vehicleimages/' . $image) }}")) --}}
                                        <img class="d-block w-100" src="{{ asset('/vehicleimages/' . $image) }}"
                                            alt="{{ $item->make->make . ' ' . $item->model->model }}">
                                    {{-- @else
                                        <img class="d-block w-100" src="{{ asset('/images/default.jpg') }}"
                                            alt="{{ $item->make->make . ' ' . $item->model->model }}">
                                    @endif --}}
                                </a>
                                <div class="carbox-overlap-wrapper">
                                    <div class="overlap-box">
                                        <div class="overlap-btns-area">
                                            <a class="overlap-btn" data-bs-toggle="modal"
                                                data-bs-target="#vehicleDetailsModal" data-id="{{ $item->id }}"
                                                id="vehicleDetailsModalToggle">
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

                                                {{-- @if (is_array($images))
                                                    @foreach ($images as $image)
                                                        <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                            class="hidden"
                                                            data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                            <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                alt="hidden-img">
                                                        </a>
                                                    @endforeach --}}
                                                {{-- @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="detail text-center">
                                <h1 class="title">
                                    <a class="text-success"
                                        href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}">{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}</a>
                                </h1>
                                <ul class="custom-list">
                                    <li>
                                        <a href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}">{{ $item->usage }}</a>
                                        &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <a href="">{{ $item->transmission }}</a> &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <a href="#">{{ $item->fuel_type }}</a>
                                    </li>
                                </ul>
                                <ul class="facilities-list clearfix">
                                    <div class="text-center">
                                        <li>
                                        <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km
                                    {{-- </li>
                                    <li> --}}
                                        <i class="flaticon-gear"></i> {{ $item->enginecc }} cc
                                    </li>
                                    </div>
                                </ul>
                            </div>
                            <div class="footer">
                                <div class="buttons mb-2 text-center">
                                    <a href="#" class="btn btn-success btn-sm" id="whatsappToggle"
                                        data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp; Enquire</a>
                                    <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm"><i
                                            class="fa fa-hand"></i> Buy</a>
                                    <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-success btn-sm float-ri"><i
                                            class="fa fa-"></i> Apply
                                        Loan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('layouts.pricesection')

    <div class="featured-car content-area-21 bg-white">
        <div class="container">
            <div class="main-title">
                <h3>Latest Vehicles</h3>
                <p>On this platform, you can get newly manufactured, imported cars and refurbished vehicles at affordable
                    prices. </p>
            </div>
            <div class="row bg-grey pt-4 pb-2" id="latestCarsSection">

                @foreach ($vehicles as $item)
                    @php
                        $images = $item->images;
                        $image = @$images[0]?->image;
                        $vehicle_no = $item->vehicle_no ?? $item->id;
                    @endphp
                    <div class="col-lg-3 col-md-6">
                        <div class="car-box-3">
                            <div class="car-thumbnail">
                                <a href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}" class="car-img">
                                    <div class="for">{{ $item->usage }}</div>
                                    <div class="price-box">
                                        <span>Kes: {{ number_format($item->price, 2) }}</span>
                                    </div>
                                    @if (file_exists("{{ asset('/vehicleimages/' . $image) }}"))
                                        <img class="d-block w-100" src="{{ asset('/vehicleimages/' . $image) }}"
                                            alt="{{ $item->make->make . ' ' . $item->model->model }}">
                                    @else
                                        <img class="d-block w-100" src="{{ asset('/images/default.jpg') }}"
                                            alt="{{ $item->make->make . ' ' . $item->model->model }}">
                                    @endif
                                </a>
                                <div class="carbox-overlap-wrapper">
                                    <div class="overlap-box">
                                        <div class="overlap-btns-area">
                                            <a class="overlap-btn" data-bs-toggle="modal"
                                                data-bs-target="#vehicleDetailsModal" data-id="{{ $item->id }}"
                                                id="vehicleDetailsModalToggle">
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


                                                @if (is_array($images))
                                                    @foreach ($images as $image)
                                                    <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                            class="hidden"
                                                            data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                            <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                alt="hidden-img">
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="detail text-center">
                                <h1 class="title">
                                    <a class="text-success"
                                        href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}">{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}</a>
                                </h1>
                                <ul class="custom-list">
                                    <li>
                                        <a
                                            href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}">{{ $item->usage }}</a>
                                        &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <a href="">{{ $item->transmission }}</a> &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <a href="#">{{ $item->fuel_type }}</a>
                                    </li>
                                </ul>
                                <ul class="facilities-list clearfix text-center">
                                    <li>
                                        <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km
                                    </li>
                                    <li>
                                        <i class="flaticon-gear"></i> {{ $item->enginecc }} cc
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <div class="buttons mb-2 text-center">
                                    <a href="#" class="btn btn-success btn-sm" id="whatsappToggle"
                                        data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp; Enquire</a>
                                    <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm"><i
                                            class="fa fa-hand"></i> Buy</a>
                                    <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-success btn-sm float-ri"><i
                                            class="fa fa-"></i> Apply
                                        Loan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 text-center">
                    <a class="btn-9 btn bg-white" href="{{ route('new') }}">
                        <span></span><span></span><span></span><span></span><strong>View More</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if (count($discounts) > 0)
        <div class="featured-car content-area-21 bg-white">
            <div class="container">
                <div class="main-title">
                    <h3><b>Vehicles on Offer</b></h3>
                    <p>Get the best cars in the market at discounted prices. </p>
                </div>
                <div class="row bg-grey pt-4 pb-2" id="vehiclesonoffer">
                    @foreach ($discounts as $item)
                        @php
                            $images = $item->images;
                            $vehicle_no = $item->vehicle_no ?? $item->id;
                        @endphp
                        <div class="col-lg-3 col-md-6">
                            <div class="car-box-3">
                                <div class="car-thumbnail">
                                    <a href="{{ url('/vehicle/' . $vehicle_no . '/discount') }}" class="car-img">
                                        <div class="for">{{ $item->usage }}</div>
                                        <div class="price-box">
                                            <span
                                                class="del"><del>{{ number_format($item->initial_price, 2) }}</del></span>
                                            <br>
                                            <span>Kes: {{ number_format($item->current_price, 2) }}</span>
                                        </div>
                                            <img class="d-block w-100"
                                                src="{{ asset('/vehicleimages/' . @$images[0]->image . '') }}"
                                                alt="car">
                                            {{-- <img class="d-block w-100" src="{{ asset('/images/default.jpg') }}"
                                                alt="{{ $item->make->make . ' ' . $item->model->model }}"> --}}
                                    </a>

                                    <div class="carbox-overlap-wrapper">
                                        <div class="overlap-box">
                                            <div class="overlap-btns-area">
                                                <a class="overlap-btn" data-bs-toggle="modal"
                                                    data-bs-target="#vehicleDetailsModal" data-id="{{ $item->id }}"
                                                    id="vehicleDetailsModalToggle">
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

                                                    @if (is_array($images))
                                                        @foreach ($images as $image)
                                                            <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                class="hidden"
                                                                data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                                <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                    alt="hidden-img">
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="detail text-center">
                                    <h3 class="title">
                                        <a class="text-success"
                                            href="{{ url('/vehicle/' . $vehicle_no . '/discount') }}">{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}</a>
                                    </h3>
                                    <ul class="custom-list">
                                        <li>
                                            <a
                                                href="{{ url('/vehicle/' . $vehicle_no . '/discount') }}">{{ $item->usage }}</a>
                                            &nbsp;|&nbsp;
                                        </li>
                                        <li>
                                            <a href="">{{ $item->transmission }}</a> &nbsp;|&nbsp;
                                        </li>
                                        <li>
                                            <a href="#">{{ $item->fuel_type }}</a>
                                        </li>
                                    </ul>
                                    <ul class="facilities-list clearfix text-center">
                                        <li>
                                            <i class="flaticon-way"></i> {{ $item->mileage ?? 0 }} km
                                        </li>
                                        <li>
                                            <i class="flaticon-gear"></i> {{ $item->enginecc }} cc
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer">
                                    <div class="buttons mb-2 text-center">
                                        <a href="#" class="btn btn-success btn-sm" id="whatsappToggle"
                                            data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp;
                                            Enquire</a>
                                        <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm"><i
                                                class="fa fa-hand"></i> Buy</a>
                                        <a href="{{ route('loan', $vehicle_no) }}"
                                            class="btn btn-success btn-sm float-ri"><i class="fa fa-"></i> Apply
                                            Loan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-12 text-center">
                        <a class="btn-9 btn bg-white" href="{{ route('vehicles.discounts') }}">
                            <span></span><span></span><span></span><span></span><strong>View More</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <div class="service-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center">
                    <div class="main-title">
                        <h1>Our Services</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                        <a class="btn-3 btn-defaults none-btn-992" href="{{ url('services') }}">
                            Read More <i class="arrow"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="row" id="servicesSection">
                        <div class="text-center">
                            <div class="lds-roller">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection
