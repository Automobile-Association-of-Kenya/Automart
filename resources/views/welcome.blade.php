@extends('layouts.app')

@section('title')
    Home @parent
@endsection

@section('main')
    @include('layouts.banner')


    @include('layouts.search')

    <div class="featured-car content-area-21 bg-white">
        <div class="container">
            <div class="featured-slider row slide-box-btn slider">
                @foreach ($introvehicles as $item)
                    @php
                        $images = $item->images;
                        $image = @$images[0]?->image;
                        $vehicle_no = $item->vehicle_no ?? $item->id;
                    @endphp
                    <div class="slide slide-box">
                        <div class="car-box-3">
                            <div class="car-thumbnail">
                                <a href="{{ url('/vehicle/' . $vehicle_no . '/latest') }}" class="car-img">
                                    @if ($item->sponsored === 1)
                                        <div class="tag-2 bg-active">Sponsored</div>
                                    @else
                                        <div class="for">{{ $item->usage }}</div>
                                    @endif
                                    <div class="price-box">
                                        <span>Kes: {{ number_format($item->price, 2) }}</span>
                                    </div>
                                    <img class="d-block w-100" src="{{ asset('/vehicleimages/' . $image) }}"
                                        alt="{{ $item->make->make . ' ' . $item->model->model }}">
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
                                                <a href="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                    class="overlap-btn"
                                                    data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                    <i class="fa fa-expand"></i>
                                                    <img class="hidden"
                                                        src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                        alt="{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}">
                                                </a>

                                                @if (is_array($images))
                                                    @foreach ($images as $image)
                                                        <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                            class="hidden"
                                                            data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                            <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                alt="{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}">
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

                                <ul class="custom-list">
                                    <li>
                                        <i class="flaticon-way text-warning"></i> {{ $item->mileage ?? 0 }} km
                                        &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <i class="flaticon-gear text-warning"></i> {{ $item->enginecc }} cc
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <div class="buttons mb-2 text-center">
                                    <a href="#" class="btn btn-success btn-sm mt-2" id="whatsappToggle"
                                        data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp; Enquire</a>
                                    <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i class="fa-solid fa-money-check"></i> Buy</a>
                                    <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i
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

    @include('layouts.prices')

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
                                    @if ($item->sponsored === 1)
                                        <div class="tag-2 bg-active">Sponsored</div>
                                    @else
                                        <div class="for">{{ $item->usage }}</div>
                                    @endif
                                    <div class="price-box">
                                        <span>Kes: {{ number_format($item->price, 2) }}</span>
                                    </div>
                                    <img class="d-block w-100" src="{{ asset('/vehicleimages/' . $item->cover_photo) }}"
                                        alt="{{ $item->make->make . ' ' . $item->model->model }}">

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
                                                <a href="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                    class="overlap-btn"
                                                    data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                    <i class="fa fa-expand"></i>
                                                    <img class="hidden"
                                                        src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                        alt="{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}">
                                                </a>

                                                @if (is_array($images))
                                                    @foreach ($images as $image)
                                                        <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                            class="hidden"
                                                            data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                            <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                alt="{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}">
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
                                <ul class="custom-list">

                                    <li>
                                        <i class="flaticon-way text-warning"></i> {{ $item->mileage ?? 0 }} km
                                        &nbsp;|&nbsp;
                                    </li>
                                    <li>
                                        <i class="flaticon-gear text-warning"></i> {{ $item->enginecc }} cc
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <div class="buttons mb-2 text-center">
                                    <a href="#" class="btn btn-success btn-sm  mt-2" id="whatsappToggle"
                                        data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp; Enquire</a>
                                    <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i class="fa-solid fa-money-check"></i> Buy</a>
                                    <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i
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
                                        @if ($item->sponsored === 1)
                                            <div class="tag-2 bg-active">Sponsored</div>
                                        @else
                                            <div class="for">{{ $item->usage }}</div>
                                        @endif
                                        <div class="price-box">
                                            <span
                                                class="del"><del>{{ number_format($item->initial_price, 2) }}</del></span>
                                            <br>
                                            <span>Kes: {{ number_format($item->current_price, 2) }}</span>
                                        </div>
                                        <img class="d-block w-100"
                                            src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                            alt="{{ $item->make->make . ' ' . $item->model->model }}">
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
                                                    <a href="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                        class="overlap-btn"
                                                        data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                        <i class="fa fa-expand"></i>
                                                        <img class="hidden"
                                                            src="{{ asset('/vehicleimages/' . $item->cover_photo . '') }}"
                                                            alt="{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}">
                                                    </a>

                                                    @if (is_array($images))
                                                        @foreach ($images as $image)
                                                            <a href="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                class="hidden"
                                                                data-sub-html="<h4>{{ $item->model->model }}</h4><p>{{ $item->description }}</p>">
                                                                <img src="{{ asset('/vehicleimages/' . $image->image . '') }}"
                                                                    alt="{{ $item->year . ' ' . $item->make->make . ' ' . $item->model->model }}">
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
                                    <ul class="custom-list">

                                        <li>
                                            <i class="flaticon-way text-warning"></i> {{ $item->mileage ?? 0 }} km
                                            &nbsp;|&nbsp;
                                        </li>
                                        <li>
                                            <i class="flaticon-gear text-warning"></i> {{ $item->enginecc }} cc
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer">
                                    <div class="buttons mb-2 text-center">
                                        <a href="#" class="btn btn-success btn-sm mt-2" id="whatsappToggle"
                                            data-id="{{ $item->id }}"><i class="fa fa-whatsapp"></i>&nbsp;
                                            Enquire</a>
                                        <a href="{{ route('buy', $vehicle_no) }}" class="btn btn-success btn-sm mt-2"><i class="fa-solid fa-money-check"></i> Buy</a>
                                        <a href="{{ route('loan', $vehicle_no) }}" class="btn btn-success btn-sm"><i
                                                class="fa fa-"></i> Apply
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

    @include('layouts.brands')
@endsection

@section('footer_scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection
