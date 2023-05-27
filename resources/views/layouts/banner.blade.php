<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner banner-slider-inner">
        <div class="carousel-item active item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-6.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h3>Find your Dream Car</h3>
                </div>
                <p>This platform provides a wide selection of vehicles from trusted dealers across the country. We ensure a perfect match between buyers and with perfect vehicle that fits their needs and budget. </p>
                <a href="{{ route('new.arrivals') }}" class="btn-8">
                    <span>Get Started Now</span>
                </a>
            </div>
        </div>
        <div class="carousel-item item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-4.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h3>Are you a Vehicle Dealer?</h3>
                </div>
                {{-- <p>We provide a plartform that brings together vehicle buyers, sellers and vehicle financing providers under one plartform to do business in vehicle market hermoniously. </p> --}}
                <p>Are you searching for a platform with expansive reach that will advertise your vehicles to potential customer accross the country? We are here to do the advertisement work for and let you focus on your core business of selling cars.</p>
                <a href="{{ route('dealers.create') }}" class="btn-8">
                    <span>Learn more</span>
                </a>
            </div>
        </div>

        <div class="carousel-item item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-5.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h3>Best place for sell car!</h3>
                </div>
                <p>This plartform rovides the best marketplace to find customers globally for your vehicles. </p>
                <a href="{{ route('dealers.create') }}" class="btn-8">
                    <span>Get Started Now</span>
                </a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
