<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-slider-inner text-center">
            <div class="carousel-item active item-bg">
                <img class="d-block w-100 h-100" src="images/automart.jpg" alt="banner">
                <div class="carousel-content container banner-info-2 bi-2">
                    <div class="row bi5">
                        <div class="col-lg-7 text-start">
                             {{-- style="background: rgb(175, 177, 175, 0.8);border-radius: 20px;" --}}
                            <div class="p-3">
                                <h4 class="mb-30 text-white">Buying or Selling Car?</h4>
                                <div class="price">
                                    <p>You are at the right place. Our platform offers a wide selection of vehicles from
                                        trusted dealers across the country, ensuring we match buyers with the perfect
                                        fit for their needs and budget. We also provide financing options to our clients
                                        to enable them acquire or sell their dream cars with ease. </p>
                                </div>
                                <div class="clearfix">
                                    <a href="{{ route('vehicles.list') }}" class="btn-8">
                                        <span>Buy a Vehicle</span>
                                    </a>&nbsp;&nbsp;&nbsp;

                                    <a href="{{ route('dashboard') }}" class="btn-8">
                                        <span>Sell Your Vehicle</span>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-5 bg-white m" style="border-radius:20px; padding:10px 10px 5px 10px;">
                            <p style="margin:0;padding: 2px;"><strong class="text-success">Buy Your Vehicle from Our
                                    Platform</strong></p>
                            <p class="text-start" style="margin:0;padding: 2px;"><strong>Process</strong></p>
                            <ul class="list-group text-start">
                                <li class="list-group-item" style="padding: 5px;"><i
                                        class="fa fa-check-circle text-success"></i>&nbsp;<small>Find the Vehicle of
                                        your budget!</small></li>
                                <li class="list-group-item" style="padding: 5px;"><i
                                        class="fa fa-check-circle text-success"></i>&nbsp;<small>Ask financing or Buy
                                        directly buy providing address for delivery.</small></li>
                                <li class="list-group-item" style="padding: 5px;"><i
                                        class="fa fa-check-circle text-success"></i>&nbsp;<small>You can also pick your
                                        Vehicle from our Dealer Yards and Pay.</small></li>
                            </ul>
                            <div class="shortcut-links-banner mt-2">
                            </div>
                            <a href="{{ route('vehicles.list') }}" class="btn btn-success mt-2 btn-lg btn-block"><i
                                    class="fa fa-search"></i>&nbsp;Find
                                Your Vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
