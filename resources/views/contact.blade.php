@extends('layouts.app')

@section('title')
    Contact us @parent
@endsection

@section('header_styles')
    <style>
        .lds-roller {
            display: none;
        }
    </style>
@endsection

@section('main')
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="contact-1 content-area-20">
        <div class="container">
            <div class="main-title text-center">
                <h1>Contact Us</h1>
                <p>AA Automart prides itself on fostering a secure and trustworthy environment, implementing robust
                    verification procedures for both sellers and partners. This ensures that all parties involved can
                    confidently engage in transactions, promoting a safe and reliable marketplace.</p>
            </div>
            <div class="row g-0 contact-innner">
                <div class="col-lg-7 col-md-12">
                    <div class="contact-form">
                        <h3 class="mb-20">Send us a Message</h3>
                        <form action="{{ route('contactus') }}" method="post" enctype="multipart/form-data"
                            id="contactUsForm">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <input type="text" class="form-control" id="fullName" placeholder="Full Name"
                                            required>
                                        <label for="fullName">Full Name</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <input type="email" class="form-control" id="emailAddress"
                                            placeholder="Email Address" required>
                                        <label for="emailAddress">Email address</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject"
                                            required>
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <input type="text" class="form-control" id="phoneNumber"
                                            placeholder="Phone Number" required>
                                        <label for="phoneNumber">Phone Number</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-floating mb-20">
                                        <textarea class="form-control" placeholder="Leave a message here" id="Message" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>

                                <div id="contactfeedback"></div>

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

                                <a href="https://www.facebook.com/AAKenya" target="_blank">
                                    <div class="icon facebook">
                                        <div class="tooltip">Facebook</div>
                                        <span style="font-size:27px;"><i class="fa fa-facebook"></i></span>
                                    </div>
                                </a>

                                <a href="https://twitter.com/AAKenya" target="_blank">
                                    <div class="icon twitter">
                                        <div class="tooltip">Twitter</div>
                                        <span style="font-size:27px;"><i class="fa fa-twitter"></i></span>
                                    </div>
                                </a>

                                <a href="https://www.instagram.com/aa_kenya_/" target="_blank">
                                    <div class="icon instagram">
                                        <div class="tooltip">Instagram</div>
                                        <span style="font-size:27px;"><i class="fa fa-instagram"></i></span>
                                    </div>
                                </a>

                                <a href="https://www.youtube.com/@AA_Kenya" target="_blank">
                                    <div class="icon youtube">
                                        <div class="tooltip">Youtube</div>
                                        <span style="font-size:27px;"><i class="fa fa-youtube"></i></span>
                                    </div>
                                </a>

                                <a href="https://api.whatsapp.com/send/?phone=+254703877817&text=Hello" target="_blank">
                                    <div class="icon whatsapp">
                                        <div class="tooltip">Whatsapp</div>
                                        <span style=" font-size:27px;"><i class="fa fa-whatsapp"></i></span>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="map">
            <div id="map" class="contact-map"></div>
        </div>
    </div>

    @include('layouts.brands')
@endsection

@section('footer_scripts')
    {{-- <script>
        (function() {
            let contactUsForm = $('#contactUsForm'),
                fullName = $('#fullName'),
                emailAddress = $('#emailAddress'),
                subject = $('#subject'),
                phoneNumber = $('#phoneNumber'),
                Message = $('#Message');
            contactUsForm.on('submit', function(event) {
                event.preventDefault();
                let data = {
                    name: fullName.val(),
                    email: emailAddress.val(),
                    subject: subject.val(),
                    phone: phoneNumber.val(),
                    message: Message.val()
                }
                $.post('/').done().fail();
            })
        })()
    </script> --}}
@endsection
