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
                    <li class="breadcrumb-item"><a href="{{ route('dealers.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="col-lg-3">
                    <a href="#">
                        <div class="card text-center mb-2 alert-success">
                            <div class="card-body text-center">
                                <h5 class="card-title">Vehicles</h5>
                                <p class="card-text" id="vehicleCount">{{ count($vehicles) }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- <div class="col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Sales</h5>
                            <p class="card-text" id="salesCount"></p>
                        </div>
                    </div>
                </div> --}}

                <div class="col-lg-3">
                    <a href="#">
                        <div class="card text-center mb-2 bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">Trade In</h5>
                                <p class="card-text" id="tradeInCount">{{ count($tradeins) }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3">
                    <a href="#">
                        <div class="card text-center mb-2 alert-success">
                            <div class="card-body">
                                <h5 class="card-title">Quote Requests</h5>
                                <p class="card-text" id="quoteCount">{{ count($quotes) }}</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </section>

        <section class="vehicles">
            <div class="card mt-4">
                <div class="card-header bg-white">
                    <h5><b>My Vehicles</b></h5>
                    <a href="{{ route('dealer.vehicles') }}" class="btn btn-success float-right"><i class="fa fa-pl"></i>&nbsp;&nbsp;Add new</a>
                </div>

                <div class="card-body">
                
                    <table class="table table-bordered hover vehicleDataTable ">
                        <thead>
                            <th>#</th>
                            <th>NO</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Price</th>
                            <th>CC</th>
                            <th>Mileage</th>
                            <th>Fuel</th>
                            <th>Trans</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($vehicles as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->vehicle_no }}</td>
                                    <td>{{ $item->make->make }}</td>
                                    <td>{{ $item->model->model }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ number_format($item->price,2) }}</td>
                                    <td>{{ $item->enginecc }}</td>
                                    <td>{{ $item->mileage }}</td>
                                    <td>{{ $item->fuel_type }}</td>
                                    <td>{{ $item->transmission }}</td>
                                    {{-- <td>{{ $item-> }}</td> --}}
                                    <td>
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown" class="btn btn-success btn-sm">Action</a>
                                            <ul class="dropdown-menu"><li class="dropdown-item"><a href="#"><i class="fa fa-list text-success\"></i>&nbsp;View</a></li><li class="dropdown-item"><a href="#" id="editProduct"  data-id=" + id + "><i class="fa fa-edit text-warning"></i>&nbsp;Edit</a></li></ul></li></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </main>
@endsection



@section('footer_scrips')
    <script src="{{ asset('js/main/dealer.js') }}"></script>
@endsection
