@extends('layouts.app')

@section('title')
    Home @parent
@endsection

@section('main')
    <div class="banner" id="banner">
    @include('layouts.banner')
</div>
<!-- Banner end -->

<!-- Search box 2 start -->
<div class="search-box-2">
    @include('layouts.search')
</div>
<!-- Featured car start -->
<div class="featured-car content-area-21">
    <div class="container">
        <!-- Main title -->
        <div class="section-header d-flex">
            <h2 data-title="Types of car"> Featured Car</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="car-box-3">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="for">For Sale</div>
                            <div class="price-box">
                                <span class="del"><del>$950.00</del></span>
                                <br>
                                <span>$1050.00</span>
                            </div>
                            <img class="d-block w-100" src="img/car/car-1.jpg" alt="car">
                        </a>
                        <div class="carbox-overlap-wrapper">
                            <div class="overlap-box">
                                <div class="overlap-btns-area">
                                    <a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    <a class="overlap-btn wishlist-btn">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    <a class="overlap-btn compare-btn">
                                        <i class="fa fa-balance-scale"></i>
                                    </a>
                                    <div class="car-magnify-gallery">
                                        <a href="img/car/car-1.jpg" class="overlap-btn" data-sub-html="<h4>Lamborghini</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <i class="fa fa-expand"></i>
                                            <img class="hidden" src="img/car/car-1.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-2.jpg" class="hidden" data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-2.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-3.jpg" class="hidden" data-sub-html="<h4>Bmw e46 m3 Diski Serie</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-3.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-4.jpg" class="hidden" data-sub-html="<h4>Volkswagen Scirocco 2016</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-4.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-5.jpg" class="hidden" data-sub-html="<h4>Porsche Cayen Last</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-5.jpg" alt="hidden-img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-details.html">Lamborghini</a>
                        </h1>
                        <ul class="custom-list">
                            <li>
                                <a href="#">New Car</a> /
                            </li>
                            <li>
                                <a href="#">Automatic</a> /
                            </li>
                            <li>
                                <a href="#">Sports</a>
                            </li>
                        </ul>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2021
                            </li>
                        </ul>
                    </div>
                    <div class="footer clearfix">
                        <div class="pull-left ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>(65 Reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box-3">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag-2 bg-active">Featured</div>
                            <div class="price-box">
                                <span class="del"><del>$805.00</del></span>
                                <br>
                                <span>$780.00</span>
                            </div>
                            <img class="d-block w-100" src="img/car/car-2.jpg" alt="car">
                        </a>
                        <div class="carbox-overlap-wrapper">
                            <div class="overlap-box">
                                <div class="overlap-btns-area">
                                    <a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    <a class="overlap-btn wishlist-btn">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    <a class="overlap-btn compare-btn">
                                        <i class="fa fa-balance-scale"></i>
                                    </a>
                                    <div class="car-magnify-gallery">
                                        <a href="img/car/car-2.jpg" class="overlap-btn" data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <i class="fa fa-expand"></i>
                                            <img class="hidden" src="img/car/car-2.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-1.jpg" class="hidden" data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-1.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-3.jpg" class="hidden" data-sub-html="<h4>Bmw e46 m3 Diski Serie</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-3.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-4.jpg" class="hidden" data-sub-html="<h4>Volkswagen Scirocco 2016</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-4.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-5.jpg" class="hidden" data-sub-html="<h4>Porsche Cayen Last</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-5.jpg" alt="hidden-img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-details.html">Ferrari Red Car</a>
                        </h1>
                        <ul class="custom-list">
                            <li>
                                <a href="#">New Car</a> /
                            </li>
                            <li>
                                <a href="#">Automatic</a> /
                            </li>
                            <li>
                                <a href="#">Sports</a>
                            </li>
                        </ul>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2021
                            </li>
                        </ul>
                    </div>
                    <div class="footer clearfix">
                        <div class="pull-left ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>(65 Reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box-3">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="for">For Rent</div>
                            <div class="price-box">
                                <span class="del"><del>$830.00</del></span>
                                <br>
                                <span>$940.00</span>
                            </div>
                            <img class="d-block w-100" src="img/car/car-3.jpg" alt="car">
                        </a>
                        <div class="carbox-overlap-wrapper">
                            <div class="overlap-box">
                                <div class="overlap-btns-area">
                                    <a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    <a class="overlap-btn wishlist-btn">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    <a class="overlap-btn compare-btn">
                                        <i class="fa fa-balance-scale"></i>
                                    </a>
                                    <div class="car-magnify-gallery">
                                        <a href="img/car/car-3.jpg" class="overlap-btn" data-sub-html="<h4>Bmw e46 m3 Diski Serie</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <i class="fa fa-expand"></i>
                                            <img class="hidden" src="img/car/car-3.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-2.jpg" class="hidden" data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-2.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-1.jpg" class="hidden" data-sub-html="<h4>Lamborghini</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-1.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-4.jpg" class="hidden" data-sub-html="<h4>Volkswagen Scirocco 2016</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-4.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-5.jpg" class="hidden" data-sub-html="<h4>Porsche Cayen Last</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-5.jpg" alt="hidden-img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-details.html">Bmw e46 m3 Diski Serie</a>
                        </h1>
                        <ul class="custom-list">
                            <li>
                                <a href="#">New Car</a> /
                            </li>
                            <li>
                                <a href="#">Automatic</a> /
                            </li>
                            <li>
                                <a href="#">Sports</a>
                            </li>
                        </ul>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2021
                            </li>
                        </ul>
                    </div>
                    <div class="footer clearfix">
                        <div class="pull-left ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>(65 Reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box-3">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag-2 bg-active">Featured</div>
                            <div class="price-box">
                                <span class="del"><del>$950.00</del></span>
                                <br>
                                <span>$1050.00</span>
                            </div>
                            <img class="d-block w-100" src="img/car/car-4.jpg" alt="car">
                        </a>
                        <div class="carbox-overlap-wrapper">
                            <div class="overlap-box">
                                <div class="overlap-btns-area">
                                    <a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    <a class="overlap-btn wishlist-btn">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    <a class="overlap-btn compare-btn">
                                        <i class="fa fa-balance-scale"></i>
                                    </a>
                                    <div class="car-magnify-gallery">
                                        <a href="img/car/car-4.jpg" class="overlap-btn" data-sub-html="<h4>Volkswagen Scirocco 2016</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <i class="fa fa-expand"></i>
                                            <img class="hidden" src="img/car/car-4.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-2.jpg" class="hidden" data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-2.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-3.jpg" class="hidden" data-sub-html="<h4>Bmw e46 m3 Diski Serie</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-3.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-1.jpg" class="hidden" data-sub-html="<h4>Lamborghini</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-1.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-5.jpg" class="hidden" data-sub-html="<h4>Porsche Cayen Last</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-5.jpg" alt="hidden-img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-details.html">Volkswagen Scirocco 2016</a>
                        </h1>
                        <ul class="custom-list">
                            <li>
                                <a href="#">New Car</a> /
                            </li>
                            <li>
                                <a href="#">Automatic</a> /
                            </li>
                            <li>
                                <a href="#">Sports</a>
                            </li>
                        </ul>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2021
                            </li>
                        </ul>
                    </div>
                    <div class="footer clearfix">
                        <div class="pull-left ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>(65 Reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box-3">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="for">For Sale</div>
                            <div class="price-box">
                                <span class="del"><del>$805.00</del></span>
                                <br>
                                <span>$780.00</span>
                            </div>
                            <img class="d-block w-100" src="img/car/car-5.jpg" alt="car">
                        </a>
                        <div class="carbox-overlap-wrapper">
                            <div class="overlap-box">
                                <div class="overlap-btns-area">
                                    <a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    <a class="overlap-btn wishlist-btn">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    <a class="overlap-btn compare-btn">
                                        <i class="fa fa-balance-scale"></i>
                                    </a>
                                    <div class="car-magnify-gallery">
                                        <a href="img/car/car-5.jpg" class="overlap-btn" data-sub-html="<h4>Porsche Cayen Last</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <i class="fa fa-expand"></i>
                                            <img class="hidden" src="img/car/car-5.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-2.jpg" class="hidden" data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-2.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-3.jpg" class="hidden" data-sub-html="<h4>Bmw e46 m3 Diski Serie</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-3.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-4.jpg" class="hidden" data-sub-html="<h4>Volkswagen Scirocco 2016</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-4.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-1.jpg" class="hidden" data-sub-html="<h4>Lamborghini</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-1.jpg" alt="hidden-img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-details.html">Porsche Cayen Last</a>
                        </h1>
                        <ul class="custom-list">
                            <li>
                                <a href="#">New Car</a> /
                            </li>
                            <li>
                                <a href="#">Automatic</a> /
                            </li>
                            <li>
                                <a href="#">Sports</a>
                            </li>
                        </ul>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2021
                            </li>
                        </ul>
                    </div>
                    <div class="footer clearfix">
                        <div class="pull-left ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>(65 Reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="car-box-3">
                    <div class="car-thumbnail">
                        <a href="car-details.html" class="car-img">
                            <div class="tag-2 bg-active">Featured</div>
                            <div class="price-box">
                                <span class="del"><del>$830.00</del></span>
                                <br>
                                <span>$940.00</span>
                            </div>
                            <img class="d-block w-100" src="img/car/car-6.jpg" alt="car">
                        </a>
                        <div class="carbox-overlap-wrapper">
                            <div class="overlap-box">
                                <div class="overlap-btns-area">
                                    <a class="overlap-btn" data-bs-toggle="modal" data-bs-target="#carOverviewModal">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                    <a class="overlap-btn wishlist-btn">
                                        <i class="fa fa-heart-o"></i>
                                    </a>
                                    <a class="overlap-btn compare-btn">
                                        <i class="fa fa-balance-scale"></i>
                                    </a>
                                    <div class="car-magnify-gallery">
                                        <a href="img/car/car-6.jpg" class="overlap-btn" data-sub-html="<h4>Lexus GS F</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <i class="fa fa-expand"></i>
                                            <img class="hidden" src="img/car/car-6.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-2.jpg" class="hidden" data-sub-html="<h4>Ferrari Red Car</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-2.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-3.jpg" class="hidden" data-sub-html="<h4>Bmw e46 m3 Diski Serie</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-3.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-4.jpg" class="hidden" data-sub-html="<h4>Volkswagen Scirocco 2016</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-4.jpg" alt="hidden-img">
                                        </a>
                                        <a href="img/car/car-1.jpg" class="hidden" data-sub-html="<h4>Lamborghini</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy....</p>">
                                            <img class="hidden" src="img/car/car-1.jpg" alt="hidden-img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="car-details.html">Lexus GS F</a>
                        </h1>
                        <ul class="custom-list">
                            <li>
                                <a href="#">New Car</a> /
                            </li>
                            <li>
                                <a href="#">Automatic</a> /
                            </li>
                            <li>
                                <a href="#">Sports</a>
                            </li>
                        </ul>
                        <ul class="facilities-list clearfix">
                            <li>
                                <i class="flaticon-fuel"></i> Petrol
                            </li>
                            <li>
                                <i class="flaticon-way"></i> 4,000 km
                            </li>
                            <li>
                                <i class="flaticon-manual-transmission"></i> Manual
                            </li>
                            <li>
                                <i class="flaticon-car"></i> Sport
                            </li>
                            <li>
                                <i class="flaticon-gear"></i> Blue
                            </li>
                            <li>
                                <i class="flaticon-calendar-1"></i> 2021
                            </li>
                        </ul>
                    </div>
                    <div class="footer clearfix">
                        <div class="pull-left ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>(65 Reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured car end -->

<!-- Service section start -->
<div class="service-section">
    <div class="container">
        <!-- Main title -->
        <div class="section-header d-flex">
            <h2 data-title="We Are The Best"> Our Facilties</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="service-info-2">
                    <div class="icon">
                        <i class="flaticon-shield"></i>
                    </div>
                    <h3><a href="services.html">Highly Secured</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt Lorem ipsum dolor sit amet</p>
                    <a href="services.html" class="read-more">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="service-info-2">
                    <div class="icon">
                        <i class="flaticon-deal"></i>
                    </div>
                    <h3><a href="services.html">Trusted Agents</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt Lorem ipsum dolor sit amet</p>
                    <a href="services.html" class="read-more">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="service-info-2">
                    <div class="icon">
                        <i class="flaticon-money"></i>
                    </div>
                    <h3><a href="#">Get an Offer</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt Lorem ipsum dolor sit amet</p>
                    <a href="services.html" class="read-more">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="service-info-2">
                    <div class="icon">
                        <i class="flaticon-support-2"></i>
                    </div>
                    <h3><a href="#">Free Support</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt Lorem ipsum dolor sit amet</p>
                    <a href="services.html" class="read-more">
                        Read More
                    </a>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <a data-animation="flipInX" data-delay="0.8s" class="btn-9 btn" href="services.html">
                    <span></span><span></span><span></span><span></span>Learn More
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Service section end -->

<!-- Latest offers section strat -->
<div class="latest-offers-section content-area-21">
    <div class="container">
        <!-- Main title -->
        <div class="section-header d-flex">
            <h2 data-title="Latest Offers"> Our Offers</h2>
        </div>
        <div class="row mb-10">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="latest-offers-box">
                            <div class="latest-offers-box-inner">
                                <div class="latest-offers-box-overflow">
                                    <div class="latest-offers-box-photo">
                                        <img class="img-fluid" src="img/latest-offers/img-1.jpg" alt="latest-offers">
                                    </div>
                                    <div class="info">
                                        <div class="price-box-2"><sup>$</sup>650<span>/month</span></div>
                                        <h3>
                                            <a href="car-details.html">Toyota Prius</a>
                                        </h3>
                                    </div>
                                    <div class="new">New</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="latest-offers-box">
                            <div class="latest-offers-box-inner">
                                <div class="latest-offers-box-overflow">
                                    <div class="latest-offers-box-photo">
                                        <img class="img-fluid" src="img/latest-offers/img-2.jpg" alt="latest-offers">
                                    </div>
                                    <div class="info">
                                        <div class="price-box-2"><sup>$</sup>740<span>/month</span></div>
                                        <h3>
                                            <a href="car-details.html">Lamborghini Huracan</a>
                                        </h3>
                                    </div>
                                    <div class="new">New</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="latest-offers-box">
                            <div class="latest-offers-box-inner">
                                <div class="latest-offers-box-overflow">
                                    <div class="latest-offers-box-photo">
                                        <img class="img-fluid" src="img/latest-offers/img-3.jpg" alt="latest-offers">
                                    </div>
                                    <div class="info">
                                        <div class="price-box-2"><sup>$</sup>950<span>/month</span></div>
                                        <h3 class="category-title">
                                            <a href="car-details.html">Lamborghini</a>
                                        </h3>
                                    </div>
                                    <div class="new">New</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="latest-offers-box">
                    <div class="latest-offers-box-inner">
                        <div class="latest-offers-box-overflow">
                            <div class="latest-offers-box-photo">
                                <div class="latest-offers-box-photodd">
                                    <img class="img-fluid big-img" src="img/latest-offers/img-4.jpg" alt="latest-offers">
                                </div>
                            </div>
                            <div class="info">
                                <div class="price-box-2"><sup>$</sup>480<span>/month</span></div>
                                <h3 class="category-title">
                                    <a href="car-details.html">Red ferrari Car 2018</a>
                                </h3>
                            </div>
                            <div class="new">New</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest offers section end -->

<!-- Counters strat -->
<div class="counters-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box-1">
                    <i class="flaticon-car"></i>
                    <h1 class="counter">967</h1>
                    <h5>Total <span>Cars</span></h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box-1">
                    <i class="flaticon-blog"></i>
                    <h1 class="counter">1276</h1>
                    <h5>Dealer <span>Reviews</span></h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box-1">
                    <i class="flaticon-user"></i>
                    <h1 class="counter">396</h1>
                    <h5>Happy <span>Clients</span></h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="counter-box-1">
                    <i class="flaticon-medal"></i>
                    <h1 class="counter">177</h1>
                    <h5> award <span>winning</span></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters end -->

<!-- Our team start -->
<div class="our-team content-area-21">
    <div class="container">
        <!-- Main title -->
        <div class="section-header d-flex">
            <h2 data-title="Executive Team"> Our Team</h2>
        </div>
        <div class="featured-slider row slide-box-btn slider" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="slide slide-box">
                <div class="team-3">
                    <div class="team-thumb">
                        <a href="#">
                            <img src="img/avatar/avatar-12.jpg" alt="agent-2" class="img-fluid">
                        </a>
                        <div class="team-social flex-middle">
                            <div class="team-overlay"></div>
                            <div class="team-social-inner">
                                <a rel="nofollow" href="#" class="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="google">
                                    <i class="fa fa-google" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4>
                            <a href="agent-detail.html">John Pitarshon</a>
                        </h4>
                        <p>Creative Director</p>
                        <p class="mb-0"><a href="tel:+55-417-634-7071">+1 204 777 0187</a></p>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="team-3">
                    <div class="team-thumb">
                        <a href="#">
                            <img src="img/avatar/avatar-9.jpg" alt="team-3" class="img-fluid">
                        </a>
                        <div class="team-social flex-middle">
                            <div class="team-overlay"></div>
                            <div class="team-social-inner">
                                <a rel="nofollow" href="#" class="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="google">
                                    <i class="fa fa-google" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4>
                            <a href="agent-detail.html">Michelle Nelson</a>
                        </h4>
                        <p>Support Manager</p>
                        <p class="mb-0"><a href="tel:+55-417-634-7071">+1 204 777 0187</a></p>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="team-3">
                    <div class="team-thumb">
                        <a href="#">
                            <img src="img/avatar/avatar-10.jpg" alt="team-3" class="img-fluid">
                        </a>
                        <div class="team-social flex-middle">
                            <div class="team-overlay"></div>
                            <div class="team-social-inner">
                                <a rel="nofollow" href="#" class="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="google">
                                    <i class="fa fa-google" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4><a href="agent-detail.html">Martin Smith</a></h4>
                        <p>Web Developer</p>
                        <p class="mb-0"><a href="tel:+55-417-634-7071">+1 204 777 0187</a></p>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="team-3">
                    <div class="team-thumb">
                        <a href="#">
                            <img src="img/avatar/avatar-11.jpg" alt="team-3" class="img-fluid">
                        </a>
                        <div class="team-social flex-middle">
                            <div class="team-overlay"></div>
                            <div class="team-social-inner">
                                <a rel="nofollow" href="#" class="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="google">
                                    <i class="fa fa-google" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4><a href="agent-detail.html">Stone Carolyn</a></h4>
                        <p>Creative Director</p>
                        <p class="mb-0"><a href="tel:+55-417-634-7071">+1 204 777 0187</a></p>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="team-3">
                    <div class="team-thumb">
                        <a href="#">
                            <img src="img/avatar/avatar-10.jpg" alt="team-3" class="img-fluid">
                        </a>
                        <div class="team-social flex-middle">
                            <div class="team-overlay"></div>
                            <div class="team-social-inner">
                                <a rel="nofollow" href="#" class="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="google">
                                    <i class="fa fa-google" aria-hidden="true"></i>
                                </a>
                                <a rel="nofollow" href="#" class="linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4><a href="agent-detail.html">Martin Smith</a></h4>
                        <p>Web Developer</p>
                        <p class="mb-0"><a href="tel:+55-417-634-7071">+1 204 777 0187</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our team end -->

<!-- Testimonial 3 start -->
<div class="testimonial-3 content-area-21">
    <div class="container">
        <!-- Main title -->
        <div class="section-header sh-two d-flex">
            <h2 data-title="What Clients Say"> Our Testimonial</h2>
        </div>
        <div class="featured-slider row slide-box-btn slider" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="slide slide-box">
                <div class="testimonial-item-new">
                    <div class="author-img fix">
                        <div class="author-avatar">
                            <img src="img/avatar/avatar-1.jpg" alt="testimonial-5">
                            <div class="icon">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="author-content">
                        <h5 class="left-line pl-40">Somalia Silva, <span class="desig">Manager</span></h5>
                    </div>
                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-full"></i>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="testimonial-item-new">
                    <div class="author-img fix">
                        <div class="author-avatar">
                            <img src="img/avatar/avatar-2.jpg" alt="testimonial-5">
                            <div class="icon">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="author-content">
                        <h5 class="left-line pl-40">Michelle Nelson, <span class="desig">Consultant</span></h5>
                    </div>
                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-full"></i>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="testimonial-item-new">
                    <div class="author-img fix">
                        <div class="author-avatar">
                            <img src="img/avatar/avatar-3.jpg" alt="testimonial-5">
                            <div class="icon">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="author-content">
                        <h5 class="left-line pl-40">Carolyn Stone, <span class="desig">Designer</span></h5>
                    </div>
                    <p>But I must explain to you how all this mistake denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-full"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial 3 end -->

<!-- Blog start -->
<div class="blog content-area-21">
    <div class="container">
        <!-- Main title -->
        <div class="section-header d-flex">
            <h2 data-title="Latest News"> Our Blog</h2>
        </div>
        <div class="featured-slider row slide-box-btn slider" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
            <div class="slide slide-box">
                <div class="blog-3">
                    <div class="blog-image">
                        <img src="img/blog/blog-2.jpg" alt="blog" class="img-fluid bp">
                        <div class="date-box-2 db-2">14 Aug</div>
                        <div class="post-meta clearfix">
                            <span><a href="#"><i class="flaticon-user-1"></i></a>Admin</span>
                            <span><a href="#"><i class="flaticon-comment"></i></a>17K</span>
                            <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span>
                        </div>
                    </div>
                    <div class="detail">
                        <h3>
                            <a href="blog-details.html">Buying a Best Sports Car</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        <a href="blog-details.html" class="b-btn">Rea more...!</a>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="blog-3">
                    <div class="blog-image">
                        <img src="img/blog/blog-1.jpg" alt="blog-3" class="img-fluid bp">
                        <div class="date-box-2 db-2">27 Nov</div>
                        <div class="post-meta clearfix">
                            <span><a href="#"><i class="flaticon-user-1"></i></a>Admin</span>
                            <span><a href="#"><i class="flaticon-comment"></i></a>17K</span>
                            <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span>
                        </div>
                    </div>
                    <div class="detail">
                        <h3>
                            <a href="blog-details.html">Selling Your New Cars?</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        <a href="blog-details.html" class="b-btn">Rea more...!</a>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="blog-3">
                    <div class="blog-image">
                        <img src="img/blog/blog-2.jpg" alt="blog-3" class="img-fluid bp">
                        <div class="date-box-2 db-2">09 Sep</div>
                        <div class="post-meta clearfix">
                            <span><a href="#"><i class="flaticon-user-1"></i></a>Admin</span>
                            <span><a href="#"><i class="flaticon-comment"></i></a>17K</span>
                            <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span>
                        </div>
                    </div>
                    <div class="detail">
                        <h3>
                            <a href="blog-details.html">Find Your Dream Car</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        <a href="blog-details.html" class="b-btn">Rea more...!</a>
                    </div>
                </div>
            </div>
            <div class="slide slide-box">
                <div class="blog-3">
                    <div class="blog-image">
                        <img src="img/blog/blog-3.jpg" alt="blog-3" class="img-fluid bp">
                        <div class="date-box-2 db-2">08 Nov</div>
                        <div class="post-meta clearfix">
                            <span><a href="#"><i class="flaticon-user-1"></i></a>Admin</span>
                            <span><a href="#"><i class="flaticon-comment"></i></a>17K</span>
                            <span><a href="#"><i class="flaticon-calendar"></i></a>73k</span>
                        </div>
                    </div>
                    <div class="detail">
                        <h3>
                            <a href="blog-details.html">Find Your Dream Car</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        <a href="blog-details.html" class="b-btn">Rea more...!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->

<!-- Partners strat -->
<div class="partners">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="custom-slider slide-box-btn">
                    <div class="custom-box"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                    <div class="custom-box"><img src="img/brand/brand-2.png" alt="brand" class="img-fluid"></div>
                    <div class="custom-box"><img src="img/brand/brand-3.png" alt="brand" class="img-fluid"></div>
                    <div class="custom-box"><img src="img/brand/brand-4.png" alt="brand" class="img-fluid"></div>
                    <div class="custom-box"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                    <div class="custom-box"><img src="img/brand/brand-2.png" alt="brand" class="img-fluid"></div>
                    <div class="custom-box"><img src="img/brand/brand-3.png" alt="brand" class="img-fluid"></div>
                    <div class="custom-box"><img src="img/brand/brand-4.png" alt="brand" class="img-fluid"></div>
                    <div class="custom-box"><img src="img/brand/brand-1.png" alt="brand" class="img-fluid"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
