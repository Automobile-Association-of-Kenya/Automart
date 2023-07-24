@extends('layouts.app')
@section('title')
    Services @parent
@endsection


@section('main')
<div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Services</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="services-2 content-area" style="margin-top: ">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>Our Services</h1>
                <p>Dedicated to AA Kenya vision of providing all-inclusive mobility solutions, we understand how best to meet your needs. Explore our other products and services.</p>
            </div>
            <div class="row" id="servicesSection">


                @foreach ($services as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="service-info-2">
                            <div class="icon">
                                <i class="flaticon-shield"></i>
                            </div>
                            <div class="detail">
                                <h3><a href="services-2.html">{{ $item->service }}</a></h3>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- services-2 end -->

    <!-- Contact 1 start -->
    <div class="contact-1 content-area-20">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>Service Request</h1>
                <p>You can reach us in case you need any of our services.</p>
            </div>
            <div class="row g-0 contact-innner">
                <div class="col-lg-7 col-md-12">
                    <div class="contact-form">
                        <h3 class="mb-20">Send us a Message</h3>
                        <form action="#" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <input type="text" class="form-control" id="floating-full-name"
                                            placeholder="Full Name">
                                        <label for="floating-full-name">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <input type="email" class="form-control" id="floating-email-address"
                                            placeholder="Email Address">
                                        <label for="floating-email-address">Email address</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <input type="text" class="form-control" id="floating-subject"
                                            placeholder="Subject">
                                        <label for="floating-subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <input type="text" class="form-control" id="floating-phone-Number"
                                            placeholder="Phone Number">
                                        <label for="floating-phone-Number">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
                                        <label for="floatingTextarea2">Comments</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-5">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="contact-info">
                        <h3 class="mb-20">Contact Info</h3>

                        <div class="ci-box d-flex mb-30">
                            <div class="icon">
                                <i class="flaticon-pin"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Address</h4>
                                <p>{{ $address?->link }}</p>
                            </div>
                        </div>

                        <div class="ci-box d-flex mb-30">
                            <div class="icon">
                                <i class="flaticon-phone"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Phone Number</h4>
                                @foreach ($phones as $item)
                                    <p>
                                        <a href="tel:{{ $item?->link }}">{{ $item?->link }}</a>
                                    </p>
                                @endforeach
                            </div>
                        </div>

                        <div class="ci-box d-flex mb-40">
                            <div class="icon">
                                <i class="flaticon-mail"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Email Address</h4>
                                @foreach ($emails as $item)
                                    <p>
                                        <a href="mailto:{{ $item?->link }}">{{ $item?->link }}</a>
                                    </p>
                                @endforeach
                            </div>
                        </div>


                        <h3 class="mb-20">Follow Us</h3>
                        <div class="social-media social-media-two">
                            <div class="social-list">
                                @foreach ($socials as $item)
                                    @if ($item->name == 'facebook')
                                        <div class="icon {{ strtolower($item?->name) }}">
                                            <div class="tooltip">{{ $item?->name }}</div>
                                            <span><i class="fa fa-{{ strtolower($item?->name) }}"></i></span>
                                        </div>
                                    @endif

                                    @if ($item->name == 'twitter')
                                        <div class="icon {{ strtolower($item?->name) }}">
                                            <div class="tooltip">{{ $item?->name }}</div>
                                            <span><i class="fa fa-{{ strtolower($item?->name) }}"></i></span>
                                        </div>
                                    @endif

                                    @if ($item->name == 'instagram')
                                        <div class="icon {{ strtolower($item?->name) }}">
                                            <div class="tooltip">{{ $item?->name }}</div>
                                            <span><i class="fa fa-{{ strtolower($item?->name) }}"></i></span>
                                        </div>
                                    @endif

                                    @if ($item->name == 'linkedin')
                                        <div class="icon {{ strtolower($item?->name) }}">
                                            <div class="tooltip">{{ $item?->name }}</div>
                                            <span><i class="fa fa-{{ strtolower($item?->name) }}"></i></span>
                                        </div>
                                    @endif

                                    @if ($item->name == 'whatsapp')
                                        <div class="icon {{ strtolower($item?->name) }}">
                                            <div class="tooltip">{{ $item?->name }}</div>
                                            <span><i class="fa fa-{{ strtolower($item?->name) }}"></i></span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Contact 1 end -->
@endsection

@section('footer_scrits')
    <script src="{{ asset('js/service.js') }}"></script>
@endsection
