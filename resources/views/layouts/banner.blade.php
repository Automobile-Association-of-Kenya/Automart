<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-slider-inner text-center">
            <div class="carousel-item banner-max-height active item-bg">
                <img class="d-block w-100 h-100" src="img/banner/img-5.jpg" alt="banner">
                <div class="carousel-content container banner-info-2 bi-2">
                    <div class="row bi5">
                        <div class="col-lg-7 text-start">
                            <div class="banner-content3">
                                <h3 class="mb-30">Buying or Selling Car?</h3>
                                <div class="price">
                                    <p>You are at the right place. Our platform offers a wide selection of vehicles from
                                        trusted dealers across the country, ensuring we match buyers with the perfect
                                        fit for their needs and budget. We also provide financing options to our clients
                                        to enable them acquire or sell their dream cars with ease. </p>
                                </div>
                                <div class="clearfix">
                                    <a href="#" class="btn-8">
                                        <span>Get Started as Buyer</span>
                                    </a>

                                    @auth
                                        @if (auth()->user()->role === 'dealer')
                                            <a href="{{ route('dealers.index') }}" class="btn-8">
                                                <span>Your dashboard</span>
                                            </a>
                                        @else
                                            <a href="#" class="btn-8">
                                                <span>Get Started as Seller</span>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('dealers.create') }}" class="btn-8">
                                            <span>Get Started as Seller</span>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 bg-white" style="border-radius:20px; padding:10px 10px 5px 10px;">
                            <h5 style="margin:0;padding: 2px;"><strong class="text-success">Buy Your Vehicle from Our
                                    Platform</strong></h5>
                            <p class="text-start" style="margin:0;padding: 2px;"><strong>Process</strong></p>
                            <ul class="list-group text-start">
                                <li class="list-group-item"><i class="fa fa-check-circle text-success"></i>&nbsp;Find
                                    the Vehicle of your budget!</li>
                                <li class="list-group-item"><i class="fa fa-check-circle text-success"></i>&nbsp;Ask
                                    financing or Buy directly buy providing address for delivery.</li>
                                <li class="list-group-item"><i class="fa fa-check-circle text-success"></i>&nbsp;You can
                                    also pick your Vehicle from our Dealer Yards and Pay.</li>
                            </ul>
                            <a href="{{ route('vehicles.list') }}" class="btn btn-success mt-2 btn-lg btn-block"><i class="fa fa-search"></i>&nbsp;Find
                                Your Vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
