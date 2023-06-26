@extends('layouts.app')
@section('title')
    Services @parent
@endsection


@section('main')
    <div class="services-2 content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title text-center">
                <h1>Our Services</h1>
                <p>To ensure quality customer experience, we provide the following services.</p>
            </div>
            <div class="row" id="servicesSection">


                @foreach ($services as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="service-info-2">
                            <div class="icon">
                                {!! $item->caret !!}
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
                                <p>Moonshine St. 14/05 Light City, London, United Kingdom</p>
                            </div>
                        </div>
                        <div class="ci-box d-flex mb-30">
                            <div class="icon">
                                <i class="flaticon-phone"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Phone Number</h4>
                                <p>
                                    <a href="tel:0477-0477-8556-552">+0477 8556 552</a>
                                </p>
                                <p>
                                    <a href="tel:0477-0477-8556-552">+0422 8552 588</a>
                                </p>
                            </div>
                        </div>
                        <div class="ci-box d-flex mb-40">
                            <div class="icon">
                                <i class="flaticon-mail"></i>
                            </div>
                            <div class="detail align-self-center">
                                <h4>Email Address</h4>
                                <p>
                                    <a href="mailto:info@themevessel.com">info@themevessel.com</a>
                                </p>
                                <p>
                                    <a href="mailto:info@themevessel.com">mdsobuzvaddro@gmail.com</a>
                                </p>
                            </div>
                        </div>

                        <h3 class="mb-20">Follow Us</h3>
                        <div class="social-media social-media-two">
                            <div class="social-list">
                                <div class="icon facebook">
                                    <div class="tooltip">Facebook</div>
                                    <span><i class="fa fa-facebook"></i></span>
                                </div>
                                <div class="icon twitter">
                                    <div class="tooltip">Twitter</div>
                                    <span><i class="fa fa-twitter"></i></span>
                                </div>
                                <div class="icon instagram">
                                    <div class="tooltip">Instagram</div>
                                    <span><i class="fa fa-instagram"></i></span>
                                </div>
                                <div class="icon github">
                                    <div class="tooltip">Github</div>
                                    <span><i class="fa fa-github"></i></span>
                                </div>
                                <div class="icon youtube mr-0">
                                    <div class="tooltip">Youtube</div>
                                    <span><i class="fa fa-youtube"></i></span>
                                </div>
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
