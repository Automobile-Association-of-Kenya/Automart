{{-- @extends('layouts.main')
@section('content')
    <!-- show success message -->
    @if (session('successMsg'))
        <div class="alert alert-success" role="alert">
            {{ session('successMsg') }}
        </div>
    @endif
    <!-- show error messages -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="row" style="padding-bottom:0px;">
        <div class="col-6" style="background-color : rgba(0,0,0, 0.3) !Important; padding-top: 10px; padding-bottom: 10px;">
            <div class="card text-center" style="color: #000;">
                <div class="card-header">
                    <i class="fas fa-map-marker-alt fa-2x"></i>
                    <h3 style="color: #006544">Our Address</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">8th Floor, Renaissance Corporate Park, Upper Hill, Nairobi, Kenya</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6"
                    style="background-color : rgba(0,0,0, 0.3) !Important; padding-top: 10px; padding-bottom: 10px;">
                    <div class="card text-center" style="color: #000;">
                        <div class="card-header">
                            <i class="fas fa-envelope-square fa-2x"></i>
                            <h3 style="color: #006544">Email Us</h3>
                        </div>
                        <div class="card-body">
                            <p>customercare@aakenya.co.ke<br>customeradvocate@aakenya.co.ke</p>
                        </div>
                    </div>
                </div>
                <div class="col-6"
                    style="background-color : rgba(0,0,0, 0.3) !Important; padding-top: 10px; padding-bottom: 10px;">
                    <div class="card text-center" style="color: #000;">
                        <div class="card-header">
                            <i class="fas fa-phone fa-2x"></i>
                            <h3 style="color: #006544">Call Us</h3>
                        </div>
                        <div class="card-body" style="padding-top:50px;">
                            <p><b><i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;0709933999<br><i
                                        class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;0709933000</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6" style="padding-left:15px; padding-top:15px;">
            <!-- show success message -->
            @if (session('successMsg'))
                <div class="alert alert-success" role="alert">
                    {{ session('successMsg') }}
                </div>
            @endif
            <!-- show error messages -->
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{ route('store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row" style="padding-bottom:15px;">
                    <div class="col-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                    </div>
                    <div class="col-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            data-rule="email" data-msg="Please enter a valid email" required>
                    </div>
                </div>
                <div class="container-fluid" style="padding-top:12px; padding-bottom:15px;">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                        data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                </div>
                <div class="form-outline" style="padding-top:10px; padding-bottom:15px;">
                    <textarea class="form-control" required placeholder="Type your message here" id="message" name="message"
                        rows="4" style="background: #fff;" required></textarea>
                    <label class="form-label" for="message"><b>
                            <h4 style="color: #fed935">message</h4>
                        </b></label>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                    <h6>Send Message</h6>
                </button>
        </div>
        </form>
    </div>
    </div>
@endsection --}}
@extends('layouts.new')
@section('content')
     <!-- Sub banner start -->
     <div class="sub-banner">
      <div class="container breadcrumb-area">
          <div class="breadcrumb-areas">
              <h1>Contact Us</h1>
              <ul class="breadcrumbs">
                  <li><a href="index.html">Home</a></li>
                  <li class="active">Contact Us</li>
              </ul>
          </div>
      </div>
  </div>
  <!-- Sub Banner end -->

  <!-- Contact 1 start -->
  <div class="contact-1 content-area-20">
      <div class="container">
          <!-- Main title -->
          <div class="main-title text-center">
              <h1>Contact Us</h1>
              <p></p>
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
                                      <textarea class="form-control" placeholder="Leave a comment here"
                                          id="floatingTextarea2"></textarea>
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
                              <p>8th Floor, Renaissance Corporate Park, Upper Hill, Nairobi, Kenya</p>
                          </div>
                      </div>
                      <div class="ci-box d-flex mb-30">
                          <div class="icon">
                              <i class="flaticon-phone"></i>
                          </div>
                          <div class="detail align-self-center">
                              <h4>Phone Number</h4>
                              <p>
                                  <a href="tel:0709933999">0709933999</a>
                              </p>
                              <p>
                                  <a href="tel:0477-0477-8556-552">0709933000</a>
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
                                  <a href="mailto:customercare@aakenya.co.ke">customercare@aakenya.co.ke</a>
                              </p>
                              <p>
                                  <a href="customeradvocate@aakenya.co.ke">customeradvocate@aakenya.co.ke</a>
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
  <!-- Contact 1 end -->

  <!-- Google map start -->
  {{-- <div class="section">
      <div class="map">
          <div id="map" class="contact-map"></div>
      </div>
  </div> --}}
  <!-- Google map end -->
@endsection