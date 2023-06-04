@extends('layouts.dealerlayout')

@section('title')
    Dealer @parent
@endsection

@section('header_styles')
@endsection

@section('header_styles')
@endsection

@section('page')
    Dealer
@endsection

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h4>Dashboard</h4>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body text-center">
                            <h5 class="card-title">Vehicles</h5>
                            <p class="card-text" id="vehicleCount"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Sales</h5>
                            <p class="card-text" id="salesCount"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Trade In</h5>
                            <p class="card-text" id="tradeInCount"></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Quote Requests</h5>
                            <p class="card-text" id="quoteCount"></p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="vehicles">
            <div class="card">
                <div class="card-header">
                    <h5><b>My Vehicles</b></h5>
                </div>

                <div class="card-body">
                    <table class="table table-bordered"></table>
                    <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    </table>
                </div>

            </div>
        </section>
    </main>
@endsection



@section('footer_scrips')
    <script src="{{ asset('js/dealer.js') }}"></script>
@endsection
