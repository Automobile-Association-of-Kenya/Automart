<div class="banner" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner banner-slider-inner text-center">
            <div class="carousel-item active item-bg">
                <img class="d-block w-100 h-100" src="images/automart.jpg" alt="banner">
                <div class="carousel-content container banner-info-2 bi-2">
                    <div class="row bi5">

                        <div class="col-lg-7 text-start">
                            <div class="p-3" style="background: rgba(123, 139, 123, 0.8);border-radius: 5px;">
                                <h4 class="mb-30 text-white">Buying or Selling a Vehicle?</h4>
                                <div class="price">
                                    <p>AA Automart is an online platform designed to streamline the car
                                        buying and selling process by connecting car dealers/sellers, buyers, and
                                        various partners. It serves as a comprehensive marketplace where individuals can
                                        easily sell and buy cars, while also providing access to financing options
                                        through its network of trusted partners. </p>
                                </div>
                                <div class="clearfix">
                                    <a href="{{ route('vehicles.list') }}" class="btn btn-lg btn-success">
                                        <span class="text-white">Buy a Car</span> <i class="fa fa-arrow-right text-white"></i>
                                    </a>&nbsp;&nbsp;&nbsp;

                                    <a href="{{ route('dealer.vehicles') }}" class="btn btn-lg btn-outline-warning">
                                        <span class='text-white'>Sell Your Car</span> <i class="fa fa-arrow-right text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="search-box-4 sb-7 sb-8">
                                <p style="margin:0;padding: 2px;"><strong class="text-success">Buy Your Vehicle from Our
                                        Platform</strong></p>
                                <p class="text-start" style="margin:0;padding: 2px;"><strong>Process</strong></p>
                                <ul class="list-group text-start">
                                    <li class="list-group-item" style="padding: 5px;"><i
                                            class="fa fa-check-circle text-success"></i>&nbsp;<small>Find the Vehicle of
                                            your budget!</small></li>
                                    <li class="list-group-item" style="padding: 5px;"><i
                                            class="fa fa-check-circle text-success"></i>&nbsp;<small>Ask financing or
                                            Buy
                                            directly by providing address for delivery.</small></li>
                                    <li class="list-group-item" style="padding: 5px;"><i
                                            class="fa fa-check-circle text-success"></i>&nbsp;<small>You can also pick
                                            your
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
</div>
