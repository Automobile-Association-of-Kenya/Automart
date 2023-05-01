<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner banner-slider-inner">
        <div class="carousel-item active item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-6.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h2>Find your Dream Car</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                <a href="#" class="btn-8" target=".search-box-2">
                    <span>Get Started Now</span>
                </a>
            </div>
        </div>
        <div class="carousel-item item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-4.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h2>Welcome to Auto Car</h2>
                </div>
                <p>We provide a plartform that brings together vehicle buyers, sellers and vehicle financing providers under one plartform to do business in vehicle market hermoniously. </p>
                <a href="{{ route('about') }}" class="btn-8">
                    <span>Learn more</span>
                </a>
            </div>
        </div>

        <div class="carousel-item item-bg">
            <img class="d-block w-100 h-100" src="img/banner/img-5.jpg" alt="banner">
            <div class="carousel-content prl-30 container banner-info-2 bi-2 text-start">
                <div class="typing">
                    <h2>Best place for sell car!</h2>
                </div>
                <p>This plartform rovides the best marketplace to find customers globally for your vehicles. </p>
                <a href="{{ route('dealer.create') }}" class="btn-8">
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
